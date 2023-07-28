
<style>
    /* Custom style */
    .header-right {
        width: calc(100% - 3.5rem);
    }
    .sidebar:hover {
        width: 16rem;
    }
    @media only screen and (min-width: 768px) {
        .header-right {
            width: calc(100% - 16rem);
        }
    }
  </style>
  <div >
      <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white  text-black ">

        <!-- Header -->
        <div class="fixed w-full flex items-center justify-between h-14 text-white bg-white z-10 px-6">

            <div class="flex">
                <img class="h-12" src="{{asset('images/home/ynotz it solutions-01.webp')}}" alt="">

            </div>
            <div>
                <a href="/logout" class="flex items-center px-1 py-1 text-red-600 hover:text-red-700  text-sm font-inter_medium rounded-md hover:bg-red-200">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-5 h-5 mr-1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                      </svg> --}}

                    logout
                    </a>
            </div>

        </div>
        <!-- ./Header -->

        <!-- Sidebar -->
        <div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-white h-full text-white transition-all duration-300 border-none z-10 sidebar">
          <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
            <ul class="flex flex-col py-4 space-y-1">


              <li>

                <a href="" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('admin.index')}}', route: 'admin.index', fragment: 'page-content'});"  class="relative flex flex-row items-center h-12 focus:outline-none hover:bg-[#1976BC]  text-black font-inter_medium border-r-4 hover:text-white border-l-4 border-transparent hover:border-white
                pr-6" :class="currentroute=='admin.index' ? 'bg-ynotz text-white' : ''">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                </a>
              </li>
              <li>

                <a href="" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('admin.approve-affiliates')}}', route: 'admin.approve-affiliates', fragment: 'page-content'});" @class(['relative flex flex-row items-center h-11 focus:outline-none hover:bg-[#1976BC]  text-black font-inter_medium border-r-4 hover:text-white border-l-4 border-transparent hover:border-white  pr-6']) :class="currentroute=='admin.approve-affiliates' ? 'bg-ynotz text-white' : ''">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                      </svg>

                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Approve Affiliates</span>

                </a>
              </li>
              <li>

                <a href="" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('admin.coupons')}}', route: 'admin.coupons', fragment: 'page-content'});" @class(['relative flex flex-row  items-center h-11 focus:outline-none hover:bg-[#1976BC]  text-black font-inter_medium border-r-4 hover:text-white border-l-4 border-transparent hover:border-white pr-6']) :class="currentroute=='admin.coupons' ? 'bg-ynotz text-white' : ''">
                    <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Manage Coupons</span>
                </a>
              </li>
              <li>

                <a href="" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('admin.bookings')}}', route: 'admin.bookings', fragment: 'page-content'});"  @class(['relative flex flex-row  items-center h-11 focus:outline-none hover:bg-[#1976BC]  text-black font-inter_medium border-r-4 hover:text-white border-l-4 border-transparent hover:border-white pr-6']) :class="currentroute=='admin.bookings' ? 'bg-ynotz text-white' : ''">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                      </svg>

                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Bookings</span>

                </a>
              </li>

              <li>

                <a href="" @click.prevent.stop="$dispatch('linkaction', {link: '{{route('admin.affiliates')}}', route: 'admin.affiliates', fragment: 'page-content'});"  @class(['relative flex flex-row  items-center h-11 focus:outline-none hover:bg-[#1976BC]  text-black font-inter_medium border-r-4 hover:text-white border-l-4 border-transparent hover:border-white pr-6']) :class="currentroute=='admin.affiliates' || currentroute=='admin.manage-affiliate-refferals' ? 'bg-ynotz text-white' : ''">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                      </svg>


                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Affiliates</span>

                </a>
              </li>



            </ul>

          </div>
        </div>
