<!DOCTYPE html>
<html x-data="{ href: '', currentpath: '{{url()->current()}}', currentroute: '{{ Route::currentRouteName() }}', compact: $persist(false), metatags: [], xtitle: '',
    nameMetas() {
        return this.metatags.filter(
            (m) => {
                return m.name != undefined;
            }
        );
    },
    propertyMetas() {
        return this.metatags.filter(
            (m) => {
                return m.property != undefined;
            }
        );
    },}"
 lang="{{ str_replace('_', '-', app()->getLocale()) }}"
x-init="
window.landingUrl = '{{Request::getRequestUri()}}'; window.landingRoute = '{{ Route::currentRouteName() }}'; window.renderedpanel = 'pagecontent';
@foreach (session()->get('metatags') as $tag)
    @if (isset($tag['name']))
        metatags.push(
            {
                name: '{{$tag['name']}}',
                content: '{{$tag['content']}}',
                is_name: true,
            }
        );
    @else
        metatags.push(
            {
                property: '{{$tag['property']}}',
                content: '{{$tag['content']}}',
                is_name: false
            }
        );
    @endif
@endforeach
if (metatags.length > 0) {
    theLink = window.landunUrl;
    setTimeout(() => {
        if ($store.app.xpages == undefined) {
            $store.app.xpages = [];
        }
        if ($store.app.xpages[theLink] == undefined) {
            $store.app.xpages[theLink] = {};
        }
        $store.app.xpages[theLink].meta = JSON.stringify(metatags);
    }, 500);

}
xtitle='{{session()->get('title') ?? config('app.name')}}';
"
@xmetachange="
    console.log($event.detail.data);
    metatags = JSON.parse($event.detail.data);
"
@xtitlechange="
    console.log($event.detail.data);
    xtitle = $event.detail.data;
"
@pagechanged.window="
currentpath=$event.detail.currentpath;
currentroute=$event.detail.currentroute;"
@routechange.window="currentroute=$event.detail.route;"
>
    <head>

        <title x-text="xtitle"></title>
        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <template x-for="tag in nameMetas()">
            <meta :name="tag.name" :content="tag.content" >
        </template>

        <template x-for="tag in propertyMetas()">
                <meta :property="tag.property" :content="tag.content" >
        </template>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('css')
        @stack('header_js')
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('css/blog.css')}}">
    </head>
    <body x-data="initPage" x-init="initAction();"
        @linkaction.window="initialised = false; fetchLink($event.detail);"
        @performaction.window="initialised = false;  fetchAction($event.detail);"
        @formsubmit.window="postForm($event.detail);"
        @popstate.window="historyAction($event)"
        class="font-sans antialiased text-sm transition-colors ">
        <div class="min-h-screen bg-white flex flex-col">
            <main class="flex flex-col items-stretch flex-grow w-full">

                <x-easyadmin::guest.mobile.nav></x-easyadmin::guest.mobile.nav>

                <div x-data="{show: true}" x-show="show"
                @contentupdate.window="
                console.log('content update in dashboard');
                console.log($event.detail.target);
                if ($event.detail.target == 'renderedpanel') {
                    console.log('target reached');
                    show = false;
                    setTimeout(() => {

                        $el.innerHTML = $event.detail.content;
                        show = true;},
                        400
                    );
                }
                " id="renderedpanel"
                x-transition:enter="transition ease-out duration-250"
                x-transition:enter-start="translate-x-6"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-250"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="opacity-0 -translate-x-6"
                class="">
                @fragment('page-content')
                    {{ $slot }}
                @endfragment
                </div>
            </main>
        </div>
        {{-- <div x-show="ajaxLoading" class="h-full w-full absolute top-0 left-0 z-50 bg-base-300 opacity-30 flex flex-row justify-center items-center">
            <img src="/images/loading.gif" class="h-10 w-10 opacity-100 z-[60] bg-transparent" alt="">
        </div> --}}
        <x-display.loading></x-display.loader>
        <x-easyadmin::display.notice />
        <x-easyadmin::display.toast />
        @stack('js')


    </body>
</html>
