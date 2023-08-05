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
        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
        <title>{{ config('app.name', 'YNOTZ IT Solutions') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('css')
        @stack('header_js')
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    </head>
    <body x-data="initPage" x-init="initAction();"
        @linkaction.window="initialised = false;  fetchLink($event.detail);"
        @performaction.window="initialised = false;  fetchAction($event.detail);"
        @formsubmit.window="postForm($event.detail);"
        @popstate.window="historyAction($event)"
        class="font-sans antialiased text-sm transition-colors ">
        <div class="min-h-screen bg-white flex flex-col">
            <main class="flex flex-col items-stretch flex-grow w-full">

                {{-- <x-easyadmin::guest.mobile.nav></x-easyadmin::guest.mobile.nav> --}}
                <x-display.loader></x-display.loader>
                <x-employee.employee-bars/>

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
                x-transition:enter="transition ease-in-out duration-250"
                x-transition:enter-start=" scale-[96%]"
                x-transition:enter-end="scale-[100%]"
                x-transition:leave="transition ease-in-out duration-250"
                x-transition:leave-start="scale-[100%]"
                x-transition:leave-end="opacity-0 scale-[96%]"
                class="ml-14 mt-20 mb-10 md:ml-64  rounded-tl-md px-2.5">

                @fragment('page-content')
                    {{ $slot }}
                @endfragment

                </div>
            </main>
        </div>
        <x-display.notice />
        <x-display.toast />

        @stack('js')


    </body>
</html>
