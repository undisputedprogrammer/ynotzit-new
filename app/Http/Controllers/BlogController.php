<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Ynotz\Metatags\Helpers\MetatagHelper;
use Ynotz\SmartPages\Http\Controllers\SmartController;

class BlogController extends SmartController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function upload(Request $request){
        if (! Gate::allows('is-employee')) {
            abort(403);
        }
        return $this->buildResponse('blog.upload');
    }

    public function save(Request $request){

        $request->validate([
            'title'=>['required','min:25','max:180'],
            'description'=>['required', 'min:40'],
            'code'=>['required']
        ]);

        if($request->hasFile('blogimg')){
            $formats = ['png','webp','jpg','jpeg'];
            $ext=$request->file('blogimg')->extension();
            $ok=false;
            for($i=0; $i<3; $i++){
                if($formats[$i]==$ext){
                    $ok=true;
                }
            }

            if(!$ok){
                return response()->json(array('success'=>false,'message'=>'Unsupported file format'));
            }

            $filename='blog_image'.time().'.'.$ext;
            $path=$request->file('blogimg')->move('storage/images',$filename);


        }
        else{
            return response()->json(array('success'=>false, 'message'=>'Could not upload image'));
        }

        $sentences = explode('.',$request['title']);

         $slug = Str::of($sentences[0])->slug('-');

         $blog=Blog::create([
            'title'=>$request['title'],
            'description'=>$request['description'],
            'content'=>$request['code'],
            'image'=>$filename,
            'slug'=> $slug
        ]);

        return response()->json(array('success'=>true, 'message'=>'Blog uploaded successfully','redirectUrl'=>'/blog'.'?title='.$blog->slug));
    }

    public function search(Request $request){
        $blogs = Blog::where('title','like','%'.$request['title'].'%')->get(['title','slug'])->take(10);

        $view =  view('blog.search-results',compact('blogs'));
        return response($view);
    }

    public function single(Request $request){

        $blog=Blog::where('slug',$request['title'])->get()->first();
        $recents = Blog::orderBy('id', 'DESC')->get()->take(3);
        $popular = Blog::orderBy('id', 'DESC')->get()->take(4);
        // dd($blog);
        $b= Blog::find(4);
        $data=[
            'blog'=>$blog,
        ];
        MetatagHelper::clearAllMeta();
        MetatagHelper::setTitle($blog['title']);
        MetatagHelper::addMetatags(['description'=>$blog['description']]);
        return $this->buildResponse('blog.display-blog', compact('blog','popular'));
    }

    public function delete(Request $request){
        if (! Gate::allows('is-employee')) {
            abort(403);
        }
        $blog=Blog::find($request->id);
        $blog->delete();
        return response()->json(array('success'=>true,'message'=>'Blog deleted successfully'));
    }

    public function edit(Request $request){
        $blog=Blog::find($request->id);
        return $this->buildResponse('blog.edit', compact('blog'));

    }

    public function update(Request $request){
        if (! Gate::allows('is-employee')) {
            abort(403);
        }
        $request->validate([
            'title'=>['required','min:25','max:180'],
            'description'=>['required', 'min:40'],
            'code'=>['required']
        ]);

        $blog= Blog::find($request->blog_id);

        $blog['title']=$request['title'];
        $blog['description']=$request['description'];
        $blog['content']= $request['code'];

        $sentences = explode('.',$request['title']);

        $slug = Str::of($sentences[0])->slug('-');

        $blog['slug'] = $slug;

        if($request->file('blogimg')){
            $formats = ['png','webp','jpg','jpeg'];
            $ext=$request->file('blogimg')->extension();
            $ok=false;
            for($i=0; $i<3; $i++){
                if($formats[$i]==$ext){
                    $ok=true;
                }
            }

            if(!$ok){
                return response()->json(array('success'=>false,'message'=>'Unsupported file format'));
            }
            $oldfile=$blog['image'];
            $ext=$request->file('blogimg')->extension();
            $filename='blog_image'.time().'.'.$ext;
            $path=$request->file('blogimg')->move('storage/images',$filename);
            $blog['image']=$filename;
            unlink(storage_path('app/images/'.$oldfile));
        }

        $blog->save();

        return response()->json(array('success'=>true,'message'=>'Blog updated successfully','redirectUrl'=>'/blog'.'?title='.$blog->slug));
    }
}


