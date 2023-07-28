{{-- {{dd($coupons[0]->offer)}} --}}
<x-affiliate.affiliate-layout>





    <div class=" mt-20 lg:mt-24 xl:ml-60">

        @if (session('message'))



        <div role="alert" class="w-[90%] mx-auto lg:w-[80%] mb-5">
            <div class="bg-green-400 text-white font-bold rounded-t px-4 py-2">
              Success
            </div>
            <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
              <p>{{session('message')}}</p>
            </div>
          </div>

        @endif

        <h1 class=" text-stone-600 text-center font-montsemibold text-lg md:text-xl xl:text-2xl">Manage Coupons</h1>

        {{-- notice --}}

        <div class=" w-[92%] max-w-2xl mx-auto flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 mt-5 md:mt-9 dark:text-blue-400 dark:border-blue-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class=" font-montregular">
              <span class="font-montsemibold">Notice ! </span> You can create maximum of only 8 coupons. Coupons once created cannot be edited or deleted.
            </div>

            {{-- notice ends --}}


          </div>

        <div class="md:flex md:justify-center md:space-x-7 md:py-7 md:max-w-2xl mx-auto">

        <div class="w-[90%] max-w-sm mx-auto md:mx-0 my-5 h-fit md:my-0 border-2 rounded-lg border-gray-500 border-dashed py-5">
            <h3 class=" text-lg font-montsemibold text-center">Create new coupon</h3>
            <form id="cpn-form"
            x-data="{ doSubmit() {
                let form = document.getElementById('cpn-form');
                let formdata = new FormData(form);
                $dispatch('formsubmit',{url:'{{route('affiliate-create-coupon')}}', route: 'affiliate-create-coupon',fragment: 'page-content', formData: formdata, target: 'cpn-form'});

            }}"
            action="/affiliate/coupon/create" method="POST" class=" mt-4"
            @submit.prevent.stop="doSubmit();"

            @formresponse.window="

            if ($event.detail.target == $el.id) {


            if ($event.detail.content.success) {
                $dispatch('shownotice', {message: $event.detail.content.message, mode: 'success', redirectUrl: '{{route('affiliate-coupons')}}', redirectRoute: 'affiliate-coupons'});
                $dispatch('formerrors', {errors: []});
            } else if (typeof $event.detail.content.errors != undefined) {
                $dispatch('shownotice', {message: $event.detail.content.message, mode: 'error', redirectUrl: null, redirectRoute: null});

            } else{
                $dispatch('formerrors', {errors: $event.detail.content.errors});
            }
            }"
            >
                @csrf

                <div class="w-[90%] mx-auto flex flex-col space-y-4">


                    {{-- <select id="offers" name="offer" class=" border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5  " required>
                        <option value="">-- Choose an offer --</option>
                        @foreach ($offers as $offer)
                            <option value="{{$offer['id']}}">{{$offer['name']}}</option>
                        @endforeach

                    </select> --}}


                    <input type="text" class=" rounded-md bg-white border-black" name="code" placeholder="Enter new coupon code" value="{{old('code')}}" required>

                    @error('code')
                    <p class=" text-red-600 text-xs text-center">{{$message}}</p>

                    @enderror
                    <button type="submit" name="submit" class=" bg-black text-white rounded-md px-4 py-2.5">Add</button>
                    @error('submit')
                    <p class=" text-red-600 text-xs text-center">{{$message}}</p>

                    @enderror

                </div>
            </form>
        </div>

        <div class="w-[90%] mx-auto md:mx-0 max-w-sm xl:max-w-md xl:w-fit">
            <div class="flex flex-col">
                <div class="overflow-x-auto hide-scroll sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 md:py-0 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full text-center text-sm font-light">
                        <thead
                          class="border-b bg-neutral-800 font-medium text-white ">
                          <tr class="text-sm md:text-base">
                            <th scope="col" class=" px-4 py-2">#</th>
                            <th scope="col" class=" px-4 py-2 ">Coupon</th>
                            {{-- <th scope="col" class=" px-6 py-4">Refferals closed</th> --}}
                            {{-- <th scope="col" class=" px-4 py-2">Applicable to</th> --}}
                            <th scope="col" class=" px-4 py-2">Created on</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $sno=1;
                            @endphp
                            @if(count($coupons)>0)
                            @foreach ($coupons as $coupon)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap  px-4 py-2 font-medium">{{$sno++}}</td>
                                <td class="whitespace-nowrap  px-4 py-2">{{$coupon['code']}}</td>
                                {{-- <td class="whitespace-nowrap  px-6 py-4">2</td> --}}
                                {{-- <td class="whitespace-nowrap  px-4 py-2">All offers</td> --}}
                                <td class="whitespace-nowrap  px-4 py-2">{{date_format($coupon['created_at'], "d M Y")}}</td>
                            </tr>

                            @endforeach
                            @else
                            <tr>
                                <td colspan="3" class="py-4">
                                    <p class=" text-sm font-montmedium text-gray-700">You haven't create any coupons yet</p>
                                </td>
                            </tr>
                            @endif


                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

    </div>

</x-affiliate.affiliate-layout>
