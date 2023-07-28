<x-affiliate.affiliate-layout>




    <div class="mt-20 md:mt-20 lg:mt-24 xl:ml-60">

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

        <h1 class=" text-stone-600 text-center font-montsemibold text-lg md:text-xl xl:text-2xl">Hi {{auth()->user()->name}}</h1>

        <div class="w-[96%] mx-auto justify-evenly flex flex-col space-y-3 sm:space-y-0 font-montsemibold sm:flex-row sm:flex-wrap mt-3">
            <a href="/affiliate/manage-coupons" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('affiliate-coupons')}}', route: 'affiliate-coupons', fragment: 'page-content'})" class=" w-[90%] sm:w-[45%] mx-auto md:w-[30%] rounded-md from-gray-700 to-black bg-gradient-to-r  text-white font-bold text-center py-5">Coupons Generated : {{count($coupons)}}</a>

            <a href="/affiliate/refferals" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('affiliate-refferals')}}', route: 'affiliate-refferals', fragment: 'page-content'})" class=" w-[90%] sm:w-[45%] mx-auto md:w-[30%] rounded-md from-orange-400 bg-gradient-to-r to-orange-600 text-white font-bold text-center py-5">Refferal leads : {{count($refferals)}}</a>

            <a href="/affiliate/refferals" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('affiliate-refferals')}}', route: 'affiliate-refferals', fragment: 'page-content'})" class=" w-[90%] sm:w-[45%] mx-auto md:w-[30%] rounded-md from-pink-400 bg-gradient-to-r to-pink-600 text-white font-bold text-center py-5">Leads Closed : {{count($refferalsClosed)}}</a>

        </div>


        <div class=" w-[96%]  mx-auto">

        <div class="flex flex-col py-6 md:py-9">


            <div class=" w-full max-w-5xl mx-auto flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class=" font-montregular">
                  <span class="font-montsemibold">Notice !</span> The available offers and their details are given below. The offer is only applicable using the affiliate marketer coupon code. Make sure that you share your coupon code with the offer link.
                </div>
              </div>



            <div class=" w-[96%]  mx-auto">
            <h1 class=" font-montsemibold text-xl">Current Offers</h1>
            <div class="overflow-x-auto hide-scroll sm:-mx-6 lg:-mx-8">
              <div class="inline-block  mx-auto py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full text-left border-2 text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                      <tr>
                        <th scope="col" class="px-3 lg:px-3 py-4">#</th>
                        <th scope="col" class="px-3 lg:px-3 py-4">Short code</th>
                        <th scope="col" class="px-3 lg:px-3 py-4">Offer name</th>
                        <th scope="col" class="px-3 lg:px-3 py-4">Link</th>
                        <th scope="col" class="px-3 lg:px-3 py-4">MRP</th>
                        <th scope="col" class="px-3 lg:px-3 py-4">Offer price</th>
                        <th scope="col" class="px-3 lg:px-3 py-4">Refferal commission</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $sno=1;
                        @endphp
                        @foreach ($offers as $offer)
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-3 lg:px-3 py-4 font-medium">{{$sno++}}</td>
                            <td class="whitespace-nowrap px-3 lg:px-3 py-4 font-medium">{{$offer['short_code']}}</td>
                            <td class="whitespace-nowrap px-3 lg:px-3 py-4 ">{{$offer['name']}}</td>
                            <td class="whitespace-nowrap px-3 lg:px-3 py-4 text-blue-500 underline">
                                <div class="flex space-x-2">
                                    <a href="{{$offer['url']}}" target="_blank">{{$offer['url']}}</a>
                                    <x-affiliate.copy-group></x-affiliate.copy-group>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-3 lg:px-3 py-4">{{$offer['rate']}}/-</td>
                            <td class="whitespace-nowrap px-3 lg:px-3 py-4">{{$offer['discount']}}/-</td>
                            <td class="whitespace-nowrap px-3 lg:px-3 py-4">{{$offer['commission']}}%</td>
                          </tr>

                        @endforeach


                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            </div>
          </div>
    </div>

    <script>

document.addEventListener("DOMContentLoaded", () => {
        let copyBtn = document.getElementById('copy-btn');
        let copiedBtn = document.getElementById('copied-btn');


        copyBtn.addEventListener('click',(e)=>{
            navigator.clipboard.writeText(e.target.previousElementSibling.innerText);
            console.log(e.target.previousElementSibling.innerText);
            copyBtn.classList.toggle('hidden');
            copiedBtn.classList.toggle('hidden');

            setTimeout(() => {
                copyBtn.classList.toggle('hidden');
                copiedBtn.classList.toggle('hidden');
            }, 2000);
        });

    });



    </script>

</x-affiliate.affiliate-layout>

