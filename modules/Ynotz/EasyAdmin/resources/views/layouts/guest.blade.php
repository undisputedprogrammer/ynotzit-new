<!DOCTYPE html>
<html x-data="{ href: '', currentpath: '{{url()->current()}}', currentroute: '{{ Route::currentRouteName() }}', compact: $persist(false)}"
 lang="{{ str_replace('_', '-', app()->getLocale()) }}"
x-init="window.landingUrl = '{{\Request::getRequestUri()}}'; window.landingRoute = '{{ Route::currentRouteName() }}'; window.renderedpanel = 'pagecontent';"
@pagechanged.window="
currentpath=$event.detail.currentpath;
currentroute=$event.detail.currentroute;"
@routechange.window="currentroute=$event.detail.route;"
>
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
        <x-easyadmin::display.notice />
        <x-easyadmin::display.toast />
        @stack('js')


    </body>
</html>
