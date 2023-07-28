<x-admin.admin-layout>


        <div class="w-full">

            <div class="flex flex-col w-[90%] mx-auto my-5">

                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full  bg-white text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500 bg-ynotz text-white">
                          <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4">Email</th>
                            <th scope="col" class="px-6 py-4">Phone</th>
                            <th scope="col" class="px-6 py-4">Coupons created</th>
                            <th scope="col" class="px-6 py-4">Leads generated</th>
                            <th scope="col" class="px-6 py-4">Successful leads</th>

                            <th scope="col" class="px-6 py-4">Pending payments</th>




                          </tr>
                        </thead>
                        <tbody>
                            @if (count($marketers)>0)
                            @php
                                $no = 0;
                            @endphp
                                @foreach ($marketers as $marketer)
                                @php
                                    $no++;
                                @endphp

                                <tr @click.prevent.stop="$dispatch('linkaction', {link: '{{route('admin.manage-affiliate-refferals')}}', route: 'admin.manage-affiliate-refferals', fragment: 'page-content', params: {mid: '{{$marketer['id']}}'}});"class="border-b dark:border-neutral-500 hover:bg-gray-100 font-inter_medium">

                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$no}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$marketer['name']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$marketer['email']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$marketer['phone']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center">
                                        {{$marketer['coupons_count']}}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center">{{$marketer['leads']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center">{{$marketer['closed']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center @if ($marketer['pending_payments']==0)
                                    text-green-500
                                    @else
                                    text-orange-500

                                    @endif">{{$marketer['pending_payments']}}
                                </td>



                                </tr>

                                @endforeach

                                @else
                                <tr>
                                    <td colspan="9" class=" py-3 font-inter_regular text-center">No affiliates available</td>
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
