@props([
    'form',
    'errors',
    '_old'
])
@php
    $wclasses = [
        '1/2' => 'w-1/2',
        '1/3' => 'w-1/3',
        '1/4' => 'w-1/4',
        '2/3' => 'w-2/3',
        '2/5' => 'w-2/5',
        '3/4' => 'w-3/4',
        '3/5' => 'w-3/5',
        'full' => 'w-full'
    ];
    $form_width = isset($form['width']) && isset($wclasses[$form['width']]) ? $wclasses[$form['width']] : 'w-1/2';
@endphp
<div class="flex flex-col space-y-2 w-full items-center">
<div class="w-full text-right px-4">
    <a href="#" class="btn btn-sm py-2 normal-case" @click.prevent.stop="window.history.back();">Go Back</a>
</div>
<form x-data="{
        postUrl: '',
        successRedirectUrl: null,
        successRedirectRoute: null,
        {{-- cancelRoute: null, --}}
        doSubmit() {
            let form = document.getElementById('{{$form['id']}}');
            let fd = new FormData(form);
            {{-- fd.append('x_fr', 'form_user_create'); --}}
            $dispatch('formsubmit', { url: this.postUrl, formData: fd, target: '{{$form['id']}}', fragment: 'create_form' });
        }
    }" action="" id="{{$form['id']}}"
    @submit.prevent.stop="doSubmit();"
        @formresponse.window="
        {{-- console.log($event.detail); --}}
        if ($event.detail.target == $el.id) {
            {{-- console.log('response for form submission');
            console.log($event.detail.content); --}}
            let theId = null;
            if ($event.detail.content.instance != undefined && $event.detail.content.instance != undefined != null) {
                theId = $event.detail.content.instance.id;
            } else {
                theId = $event.detail.content.id;
            }
            let theUrl = $event.detail.content.instance != undefined ? successRedirectUrl.replace('_X_', theId) : successRedirectUrl;
            console.log('theUrl');
            console.log(theUrl);
            if ($event.detail.content.success) {
                $dispatch('shownotice', {message: $event.detail.content.message, mode: 'success', redirectUrl: theUrl, redirectRoute: successRedirectRoute});
                $dispatch('formerrors', {errors: []});
            } else if (typeof $event.detail.content.errors != undefined) {
                $dispatch('formerrors', {errors: $event.detail.content.errors});
            } else{
                $dispatch('shownotice', {message: $event.detail.content.error, mode: 'error', redirectUrl: null, redirectRoute: null});
            }
        }
    "
    class="{{$form_width}} border border-base-300 bg-base-200 shadow-sm rounded-md p-3 flex flex-col"
    x-init="
        postUrl = '{{ count($form['action_route_params']) > 0 ? route($form['action_route'], $form['action_route_params']) : route($form['action_route']) }}';
        @if (isset($form['success_redirect_route']))
            @if (isset($form['success_redirect_key']))
            successRedirectUrl = '{{route($form['success_redirect_route'], '_X_')}}';
            @else
            successRedirectUrl = '{{route($form['success_redirect_route'], '_X_')}}';
            @endif
            successRedirectRoute = '{{$form['success_redirect_route']}}';
        @endif
        {{-- console.log('successRedirectUrl');
        console.log(successRedirectUrl); --}}
        {{-- @if (isset($form['cancel_route']))
            cancelRoute = '{{route($form['cancel_route'])}}';
        @endif --}}
    "
    >
    {{$form['success_redirect_key']}}
    @if ($form['method'] != 'POST')
        @method($form['method'])
    @endif
    @fragment('create_form')
        <h3 class="text-xl text-center mt-4">{{$form['title']}}</h3>
        {{-- <div class="divider mb-6"></div> --}}
        <div class="flex flex-col space-y-8">
            @if ($form['layout'] != null && count($form['layout']) > 0 && $form['layout']['item_type'] == 'layout')
                <x-easyadmin::partials.layoutrenderer
                    :item="$form['layout']"
                    :form_items="$form['items']"
                    :form="$form"
                    :_old="$_old ?? []"
                    :errors="$errors" />
            @elseif ($form['layout'] == null)
                @foreach ($form['items'] as $item)
                    <x-easyadmin::partials.inputrenderer
                        :item="$item"
                        :form="$form"
                        :_old="$_old ?? []"
                        :errors="$errors"  />
                @endforeach
            @endif
            {{-- @foreach ($form['items'] as $key => $item)
                @if ($form['method'] != 'POST')
                    @method($form['method'])
                @endif
                @switch($item['item_type'])
                    @case('input')
                        @php
                            $html_inputs = [
                                "button",
                                "checkbox",
                                "color",
                                "date",
                                "datetime-local",
                                "email",
                                // "file",
                                "hidden",
                                // "image",
                                "month",
                                "number",
                                "password",
                                // "radio",
                                // "range",
                                // "reset",
                                "search",
                                // "submit",
                                "tel",
                                "text",
                                "time",
                                "url",
                                "week",
                            ];
                        @endphp
                        @if (in_array($item['input_type'], $html_inputs))
                            <x-dynamic-component
                            :component="'easyadmin::inputs.text'"
                            :element="$item"
                            :label_position="$form['label_position'] ?? 'top'"
                            :_old="$_old ?? []"
                            :xerrors="$errors ?? []"
                            />
                        @else
                            <x-dynamic-component :component="$item['input_type']"
                            :element="$item"
                            :label_position="$form['label_position'] ?? 'top'"
                            :_old="$_old ?? []"
                            :xerrors="$errors ?? []"
                            />
                        @endif
                    @default
                        @break
                @endswitch
            @endforeach --}}
            <div class="flex flex-row justify-between mt-8 mb-4">
                <a href="#" class="btn btn-link py-2 normal-case" @click.prevent.stop="window.history.back();">{{$form['cancel_label']}}</a>
                <button class="btn btn-sm py-2" type="submit">{{$form['submit_label']}}</button>
            </div>
        </div>
    @endfragment
    {{-- <div class="form-control flex flex-row w-full mb-4">
        <a href="#" class="btn btn-link py-2 normal-case" @click.prevent.stop="window.history.back();">{{$form['cancel_label']}}</a>
    </div> --}}
</form>
</div>
