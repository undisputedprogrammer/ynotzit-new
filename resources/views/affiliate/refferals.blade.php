{{-- {{dd($coupons[6]->bookings_count)}} --}}

<x-affiliate.affiliate-layout>



    <div class=" mt-20 lg:mt-24 xl:ml-60">
        <h1 class=" text-stone-600 text-center font-inter_semibold text-lg md:text-xl xl:text-2xl">Your refferals</h1>

        <div class="flex flex-col w-[94%] mx-auto max-w-xl mt-7">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full  text-left text-sm font-light">
                    <thead class="border-b-2 font-medium dark:border-neutral-500">
                      <tr>
                        <th scope="col" class="px-2.5 md:px-6 py-4">#</th>
                        <th scope="col" class="px-2.5 md:px-6 py-4">Coupon</th>
                        <th scope="col" class="px-2.5 md:text-center md:px-6 py-4">Leads generated</th>
                        <th scope="col" class="px-2.5 md:text-center md:px-6 py-4">Leads closed</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $sno=1;
                            $bookingExist = false;
                        @endphp
                        @if (count($coupons)>0)
                            @foreach ($coupons as $coupon)
                            <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-2.5 md:px-6 py-4 font-medium">{{$sno++;}}</td>
                                <td class="whitespace-nowrap px-2.5 md:px-6 py-4">{{$coupon['code']}}</td>
                                <td class="whitespace-nowrap px-2.5 md:px-6 py-4 text-center text-orange-500 font-medium">{{count($coupon->bookings)}}</td>
                                <td class="whitespace-nowrap text-center px-2.5 md:px-6 py-4 font-medium text-green-500">{{$coupon->bookings_count}}</td>
                            </tr>

                            @endforeach
{{--
                            @if (count($coupons)>0 && !$bookingExist)
                            <tr class=" ">
                                <td colspan="4" class=" py-2"><p class=" font-montmedium text-red-400 text-center">No bookings yet</p></td>
                            </tr>
                            @endif --}}


                            @else
                            <tr>
                                <td colspan="4">
                                    <p class=" font-inter_medium text-red-400 text-center">You haven't created any coupons yet</p>
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

</x-affiliate.affiliate-layout>
