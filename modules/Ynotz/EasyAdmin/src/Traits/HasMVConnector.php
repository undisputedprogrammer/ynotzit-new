<?php
/***
 *  This trait is to be used in the controller for quick setup.
 */
namespace Ynotz\EasyAdmin\Traits;

use Ynotz\EasyAdmin\Exceptions\ModelIntegrityViolationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Ynotz\EasyAdmin\ImportExports\DefaultArrayExports;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

trait HasMVConnector {
    private $itemName = null;
    private $unauthorisedView = 'easyadmin::admin.unauthorised';
    private $errorView = 'easyadmin::admin.error';
    private $indexView = 'easyadmin::admin.indexpanel';
    private $showView = 'easyadmin::admin.show';
    private $createView = 'easyadmin::admin.form';
    private $editView = 'easyadmin::admin.form';

    public function index()
    {
        if (is_string($this->indexView)) {
            $view = $this->indexView ?? 'admin.'.Str::plural($this->getItemName()).'.index';
        } elseif(is_array($this->indexView)) {
            $target = $this->request->input('x_target');
            $view = isset($target) && isset($this->indexView[$target]) ? $this->indexView[$target] : $this->indexView['default'];
        }

        try {
            $result = $this->connectorService->index(
                intval($this->request->input('items_count', 10)),
                $this->request->input('page'),
                $this->request->input('search', []),
                $this->request->input('sort', []),
                $this->request->input('filter', []),
                $this->request->input('adv_search', []),
                $this->request->input('index_mode', true),
                $this->request->input('selected_ids', ''),
                'results',
            );
            return $this->buildResponse($view, $result);
        } catch (AuthorizationException $e) {
            info($e);
            return $this->buildResponse($this->unauthorisedView);
        } catch (Throwable $e) {
            info($e);
            return $this->buildResponse($this->errorView, ['error' => $e->__toString()]);
        }

    }

    public function show($id)
    {
        $instance = $this->connectorService->show($id);
        return $this->buildResponse($this->showView, ['model' => $instance]);
    }

    public function selectIds()
    {
        $ids = $this->connectorService->getIdsForParams(
            $this->request->input('search', []),
            $this->request->input('sort', []),
            $this->request->input('filter', []),
            $this->request->input('adv_search', [])
        );

        return response()->json([
            'success' => true,
            'ids' => $ids
        ]);
    }

    public function download()
    {
        $results = $this->connectorService->indexDownload(
            $this->request->input('search', []),
            $this->request->input('sort', []),
            $this->request->input('filter', []),
            $this->request->input('adv_search', []),
            $this->request->input('selected_ids', '')
        );

        $respone = Excel::download(
            new DefaultArrayExports(
                $results,
                $this->connectorService->getDownloadCols(),
                $this->connectorService->getDownloadColTitles()
            ),
            $this->connectorService->downloadFileName.'.'
                .$this->request->input('format', 'xlsx')
        );

        ob_end_clean();

        return $respone;
    }

    public function create()
    {
        $view = $this->createView ?? 'admin.'.Str::plural($this->getItemName()).'.create';
        try {
            $data = $this->connectorService->getCreatePageData();
            return $this->buildResponse($view, $data);
        } catch (AuthorizationException $e) {
            info($e);
            return $this->buildResponse($this->unauthorisedView);
        } catch (Throwable $e) {
            info($e);
            return $this->buildResponse($this->errorView, ['error' => $e->__toString()]);
        }
    }

    public function edit($id)
    {
        $view = $this->editView ?? 'admin.'.Str::plural($this->getItemName()).'.edit';
        try {
            $data = $this->connectorService->getEditPageData($id);
            return $this->buildResponse($view, $data);
        } catch (AuthorizationException $e) {
            info($e);
            return $this->buildResponse($this->unauthorisedView);
        } catch (Throwable $e) {
            info($e);
            return $this->buildResponse($this->errorView, ['error' => $e->__toString()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $rules = $this->connectorService->getStoreValidationRules();
            if (count($rules) > 0) {
                $validator = Validator::make($this->connectorService->prepareForStoreValidation($request->all()), $rules);
                // $view = $this->createView ?? 'admin.'.Str::plural($this->getItemName()).'.create';
                // $data = $this->connectorService->getCreatePageData();

                if ($validator->fails()) {
                    // $data['_old'] = $request->all();
                    // $data['errors'] = $validator->errors();
                    // info('errors:');
                    // info($data['errors']);
                    return response()->json(
                        [
                            'success' => false,
                            'errors' => $validator->errors()
                        ],
                        status: 401
                    );
                    // return $this->buildResponse($view, $data);
                }
                // return 'success';
                $instance = $this->connectorService->store(
                    $validator->validated()
                );
            } else {
                if (config('easyadmin.enforce_validation')) {
                    return response()->json(
                        [
                            'success' => false,
                            'errors' => 'Validation rules not defined'
                        ],
                        status: 401
                    );
                }
                $instance = $this->connectorService->store($request->all());
            }

            return response()->json([
                'success' => true,
                'instance' => $instance,
                'message' => 'New '.$this->getItemName().' added.'
            ]);
        } catch (AuthorizationException $e) {
            info($e);
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
        catch (\Throwable $e) {
            info($e);
            $name = Str::lower($this->connectorService->getModelShortName());
            $msg = config('app.debug') ? $e->__toString()
                : 'Unexpected Error! Unable to add the '.$name.'.';
            return response()->json(
                [
                    'success' => false,
                    'message' => $msg
                ]
            );
        }
    }

    public function update($id, Request $request)
    {
        try {
            $rules = $this->connectorService->getUpdateValidationRules($id);

            if (count($rules) > 0) {
                $validator = Validator::make($this->connectorService->prepareForUpdateValidation($request->all()), $rules);
                // $view = $this->createView ?? 'admin.'.Str::plural($this->getItemName()).'.create';
                // $data = $this->connectorService->getCreatePageData();

                if ($validator->fails()) {
                    // $data['_old'] = $request->all();
                    // $data['errors'] = $validator->errors();
                    // info('errors:');
                    // info($data['errors']);
                    return response()->json(
                        [
                            'success' => false,
                            'errors' => $validator->errors()
                        ],
                        status: 401
                    );
                    // return $this->buildResponse($view, $data);
                }
                // return 'success';
                $result = $this->connectorService->update($id, $validator->validated());
            } else {
                if (config('easyadmin.enforce_validation')) {
                    return response()->json(
                        [
                            'success' => false,
                            'errors' => 'Validation rules not defined'
                        ],
                        status: 401
                    );
                } else {
                    $result = $this->connectorService->update($id, $request->all());
                }
            }

            return response()->json([
                'success' => true,
                'instance' => $result,
                'message' => 'New '.$this->getItemName().' updated.'
            ]);
        } catch (AuthorizationException $e) {
            info($e);
            return response()->json(
                [
                    'success' => false,
                    'message' => $e->getMessage()
                ]
            );
        }
        catch (\Throwable $e) {
            info($e);
            $name = Str::lower($this->connectorService->getModelShortName());
            $msg = config('app.debug') ? $e->getMessage()
                : 'Unable to update the '.$name.'.';
            return response()->json(
                [
                    'success' => false,
                    'message' => $msg
                ]
            );
        }
    }

    public function destroy($id)
    {
        try {
           $msg = $this->connectorService->destroy($id);
            return response()->json([
                'success' => true,
                'message' => 'Item deleted '.$msg
            ]);
        } catch (ModelIntegrityViolationException $e) {
            info($e);
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        } catch (AuthorizationException $e) {
            info($e);
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
        catch (\Throwable $e) {
            info($e);
            $msg = config('app.debug') ? $e->getMessage()
                : 'Unable to delete the item. It may be referenced by some other part of the program.';
            return response()->json([
                'success' => false,
                'message' => $msg
            ]);
        }
    }

    public function suggestlist()
    {
        $search = $this->request->input('search', null);

        return response()->json([
            'success' => true,
            'results' => $this->connectorService->suggestlist($search)
        ]);
    }

    private function getItemName()
    {
        return $this->itemName ?? $this->generateItemName();
    }

    private function generateItemName()
    {
        $t = explode('\\', $this->connectorService->getModelShortName());
        return Str::snake(array_pop($t));
    }
}
?>
