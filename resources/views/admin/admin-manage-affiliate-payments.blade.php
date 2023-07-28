<x-admin.admin-layout>


    <div class="w-full">


        <div class="flex flex-col w-[90%] mx-auto my-5">

            <div class="mb-1 p-1 bg-ynotz rounded-md w-fit h-fit hover:scale-[97%] ease-in-out">

                <a href="/admin/manage/affiliates" class="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.3" stroke="white" class="w-5 h-5 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                  </svg>
                </a>

            </div>

            <x-admin.admin-modal></x-admin.admin-modal>


            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full  bg-white text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500 bg-ynotz text-white">
                      <tr>
                        <th scope="col" class="px-6 py-4">#</th>
                        <th scope="col" class="px-6 py-4">Affiliate name</th>
                        <th scope="col" class="px-6 py-4">Coupon</th>
                        <th scope="col" class="px-6 py-4">Offer</th>
                        <th scope="col" class="px-6 py-4">Offer price</th>
                        <th scope="col" class="px-6 py-4">Commission</th>
                        <th scope="col" class="px-6 py-4">Status</th>

                        <th scope="col" class="px-6 py-4">Commission status</th>

                        <th scope="col" class="px-6 py-4">Credited on</th>




                      </tr>
                    </thead>
                    <tbody>
                        @if (count($bookings)>0)
                        @php
                            $no = 0;
                        @endphp
                            @foreach ($bookings as $booking)
                            @php
                                $no++;
                            @endphp
                            <tr class="border-b dark:border-neutral-500 hover:bg-gray-100 font-inter_medium">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{$no}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$booking['name']}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$booking->coupon->code}}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{$booking->offer}}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-center">
                                    {{$booking->offers->discount}}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-center">{{$booking->commission}}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-center @if ($booking->status=='booked')
                                    text-orange-500
                                    @elseif ($booking->status=='closed')
                                    text-green-500
                                    @elseif ($booking->status=='canceled')
                                    text-red-600
                                @endif">
                                    {{$booking->status}}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-center @if ($booking->affiliate_payment=='Pending')
                                    text-orange-500
                                    @elseif ($booking->affiliate_payment=='Credited')
                                    text-green-500

                                @endif">
                                    @if ($booking->status!='closed')
                                        ---
                                        @else
                                        {{$booking->affiliate_payment}}
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-center @if ($booking->affiliate_payment=='Credited')
                                    text-black
                                @endif">
                                    @if ($booking->status!='closed')
                                        ---
                                        @elseif ($booking->affiliate_payment=='Credited')
                                        {{date_format($booking['updated_at'], "d M Y")}}
                                        @else
                                        <button onclick="showpaymentform({{$booking->id}})" class=" bg-cyan-600 rounded-md shadow-md text-white px-2 py-1 text-sm font-semibold focus:scale-[97%] ease-in-out duration-150">
                                            Mark Payment
                                        </button>
                                    @endif
                                </td>



                            </tr>
                            @endforeach

                            @else
                            <tr>
                                <td colspan="9" class=" py-3 font-inter_regular text-center">No leads from this affiliate</td>
                            </tr>
                        @endif





                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

    </div>
    <script>
        let modal = document.getElementById('payment-modal');
        let idField = document.getElementById('booking_id');

        function showpaymentform(id){
            idField.value = id;
            modal.classList.toggle('hidden');
        }
    </script>

</x-admin.admin-layout>
