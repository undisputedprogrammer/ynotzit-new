<x-admin.admin-layout>


        <div class="w-full">
            <x-admin.admin-alert :message="$message"></x-admin.admin-alert>
            <div class="flex flex-col w-[90%] mx-auto">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b bg-ynotz text-white font-medium dark:border-neutral-500">
                          <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4">Company</th>
                            <th scope="col" class="px-6 py-4">Mobile</th>
                            <th scope="col" class="px-6 py-4">Offer</th>
                            <th scope="col" class="px-6 py-4">Coupon used</th>
                            <th scope="col" class="px-6 py-4">Refferal</th>
                            <th scope="col" class="px-6 py-4">Price</th>
                            <th scope="col" class="px-6 py-4">Status</th>
                            <th scope="col" class="px-6 py-4">Action</th>


                          </tr>
                        </thead>
                        <tbody class=" pb-10">
                            @if (count($bookings)>0)
                            @php
                                $no = 0;
                            @endphp
                                @foreach ($bookings as $booking)
                                @php
                                    $no++;
                                @endphp
                                <tr
                                 class="border-b dark:border-neutral-500 font-inter_regular">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$no}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$booking['name']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$booking['company']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$booking['phone']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$booking['offer']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$booking->coupon->code}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$booking->reffered->name}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$booking['price']}}/-</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$booking['status']}}</td>
                                    <td x-data="{open:false}" class="whitespace-nowrap px-6 py-4 flex @if ($booking['status']=='closed') text-cyan-500 @elseif ($booking['status']=='cancelled') text-red-600 @endif ">
                                        {{-- <a class=" w-6 h-6" href="/admin/booking/delete/{{$booking['id']}}"><img class="w-5 h-full" src="{{asset('images/icons/delete-icon.svg')}}" alt="">
                                        </a> --}}
                                        @if ($booking['status']=='closed')
                                            Closed
                                        @elseif ($booking['status']=='cancelled')
                                            Cancelled
                                        @else

                                        <img @click="open=!open" @click.outside="open=false" :class="open ? 'rotate-180' : ''" class=" ml-2 w-5 ease-in-out duration-200 " src="{{asset('images/icons/down-arrow.svg')}}" alt="">
                                        @endif

                                        <div x-cloak x-show="open" x-transition class="absolute right-10  z-30 mt-5 w-fit  rounded-md bg-white shadow-lg " role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                            <div class="py-1 font-inter_regular" role="none">

                                            <a href="" @click.prevent.stop="$dispatch('performaction', {link: '{{route('admin.update-booking-status')}}', route: 'admin.update-booking-status', fragment: 'page-content', params: {bid: '{{$booking['id']}}', status: 'booked'}})" class="text-gray-700 block px-4  text-sm mx-1 hover:bg-orange-100 rounded-md" >Booked</a>


                                              <a href="/admin/change-status?bid={{$booking['id']}}&status=closed"
                                              @click.prevent.stop="$dispatch('performaction', {link: '{{route('admin.update-booking-status')}}', route: 'admin.update-booking-status', fragment: 'page-content', params: {bid: '{{$booking['id']}}', status: 'closed'}, fresh:true})"
                                              class="text-gray-700 block px-4  text-sm  mx-1 hover:bg-green-100 rounded-md" >Closed</a>

                                              <a href="/admin/booking/delete/{{$booking['id']}}"
                                              @click.prevent.stop="$dispatch('performaction', {link: '{{route('admin.update-booking-status')}}', route: 'admin.update-booking-status', fragment: 'page-content', params: {bid: '{{$booking['id']}}', status: 'cancelled'}, fresh:true})"
                                              class="text-gray-700 block px-4  text-sm mx-1 hover:bg-red-100 rounded-md" >Cancel</a>

                                            </div>

                                    </td>

                                </tr>
                                @endforeach

                                @else
                                <tr>
                                    <td colspan="10" class=" font-inter_regular text-center py-3">No bookings yet</td>
                                </tr>
                            @endif




                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>


        </div>


</x-admin.admin-layout>
