
<style>
    ul.breadcrumb li+li::before {
        content: "\276F";
        padding-left: 8px;
        padding-right: 4px;
        color: inherit;
    }

    ul.breadcrumb li span {
        opacity: 60%;
    }

    #sidebar {
        -webkit-transition: all 300ms cubic-bezier(0, 0.77, 0.58, 1);
        transition: all 300ms cubic-bezier(0, 0.77, 0.58, 1);
    }

    #sidebar.show {
        transform: translateX(0);
    }

    #sidebar ul li a.active {
        background: #1976BC;
        background-color: #1976BC;
    }
</style>

<!-- Navbar start -->
<nav id="navbar" class="fixed top-0 py-3 md:py-4 z-40 flex w-full flex-row justify-between bg-white px-4 sm:justify-between items-center shadow-sm">
    <img class="h-10 md:h-12 ml-2.5 md:ml-6" src="{{asset('images/home/ynotz it solutions-01.webp')}}" alt="">
    <button id="btnSidebarToggler" type="button" class="py-1 text-2xl mr-2.5 md:mr-6 text-white hover:text-gray-200 xl:hidden">
        <svg id="navClosed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
            stroke="#1976BC" class="h-7 w-7 md:w-9 md:h-9">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
            stroke="#1976BC" class="hidden h-7 w-7 md:w-9 md:h-9">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</nav>
<!-- Navbar end -->

<!-- Sidebar start-->
<div id="containerSidebar" class="z-40">
    <div class="navbar-menu relative z-40">
        <nav id="sidebar"
            class="fixed  left-0 bottom-0 flex w-3/4 -translate-x-full xl:translate-x-0 flex-col overflow-y-auto bg-gray-100 rounded-tr-lg pt-6 pb-8 sm:max-w-xs md:w-60 xl:w-60">
            <!-- one category / navigation group -->
            <div class="px-4 pb-6">

                <ul class="mb-8 text-sm font-medium flex flex-col space-y-3 font-inter_medium text-black">

                    <li>

                        <a class="flex items-center rounded py-3 pl-3 pr-4  "
                        :class="currentroute == 'affiliate-home' ? 'hover:bg-[#1976bc] bg-ynotz text-white' : 'hover:bg-blue-100' "
                            href=""
                            @click.prevent.stop="$dispatch('linkaction', {link: '{{route('affiliate-home')}}', route: 'affiliate-home', fragment: 'page-content'})">
                            <span class="select-none">Dashboard</span>
                        </a>

                    </li>
                    <li>

                        <a class="flex items-center rounded py-3 pl-3 pr-4  "
                        :class="currentroute == 'affiliate-coupons' ? 'hover:bg-[#1976bc] bg-ynotz text-white' : 'hover:bg-blue-100' "
                            href=""
                            @click.prevent.stop="$dispatch('linkaction', {link: '{{route('affiliate-coupons')}}', route: 'affiliate-coupons', fragment: 'page-content'})">
                            <span class="select-none">My Coupons</span>
                        </a>
                    </li>

                    <li>

                        <a class="flex items-center rounded py-3 pl-3 pr-4  "
                        :class="currentroute == 'affiliate-refferals' ? 'hover:bg-[#1976bc] bg-ynotz text-white' : 'hover:bg-blue-100' "
                            href=""
                            @click.prevent.stop="$dispatch('linkaction', {link: '{{route('affiliate-refferals')}}', route: 'affiliate-refferals', fragment: 'page-content'})">
                            <span class="select-none">Referrals</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4  hover:bg-blue-100"
                            href="#link1">
                            <span class="select-none">Income</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4  hover:bg-blue-100"
                            href="/marketer/change-username">
                            <span class="select-none">Change username</span>
                        </a>
                    </li> --}}
                    <li>

                        <a class="flex items-center rounded py-3 pl-3 pr-4  "
                        :class="currentroute == 'affiliate-change-password' ? 'hover:bg-[#1976bc] bg-ynotz text-white' : 'hover:bg-blue-100' "
                            href=""
                            @click.prevent.stop="$dispatch('linkaction', {link: '{{route('affiliate-change-password')}}', route: 'affiliate-change-password', fragment: 'page-content'})">
                            <span class="select-none">Change password</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-red-600 rounded py-3 pl-3 pr-4  hover:bg-red-100"
                            href="/affiliate/logout">
                            <span class="select-none">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- navigation group end-->





            <!-- example copies end -->
        </nav>
    </div>
    <div class="mx-auto lg:ml-80"></div>
</div>
<!-- Sidebar end -->

<main>
    <!-- your content goes here -->
</main>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", () => {
        const navbar = document.getElementById("navbar");
        const sidebar = document.getElementById("sidebar");
        const btnSidebarToggler = document.getElementById("btnSidebarToggler");
        const navClosed = document.getElementById("navClosed");
        const navOpen = document.getElementById("navOpen");

        btnSidebarToggler.addEventListener("click", (e) => {
            e.preventDefault();
            sidebar.classList.toggle("show");
            navClosed.classList.toggle("hidden");
            navOpen.classList.toggle("hidden");
        });

        sidebar.style.top = parseInt(navbar.clientHeight) - 1 + "px";
    });
</script>
