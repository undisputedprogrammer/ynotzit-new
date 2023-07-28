<x-admin.admin-layout>


        <div class="w-full">
            {{-- {{$message['success']}} --}}
            <x-admin.admin-alert :message="$message"></x-admin.admin-alert>
            <div class="flex flex-col w-[90%] mx-auto my-5">

                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full bg-white text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500 bg-ynotz text-white">
                          <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4">Email</th>
                            <th scope="col" class="px-6 py-4">Phone</th>
                            <th scope="col" class="px-6 py-4">Influencer</th>
                            <th scope="col" class="px-6 py-4">Place</th>
                            <th scope="col" class="px-6 py-4">Gender</th>
                            <th scope="col" class="px-6 py-4">Age</th>
                            <th scope="col" class="px-6 py-4">Action</th>


                          </tr>
                        </thead>
                        <tbody>
                            @if (count($registrations)>0)
                            @php
                                $no = 0;
                            @endphp
                                @foreach ($registrations as $registration)
                                @php
                                    $no++;
                                @endphp
                                <tr class="border-b dark:border-neutral-500 font-inter_medium">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$no}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$registration['name']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$registration['email']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$registration['phone']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        @if ($registration['influencer']==1)
                                                Yes
                                            @else
                                                No
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$registration['place']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$registration['gender']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$registration['age']}}</td>
                                    <td class="whitespace-nowrap px-6 py-4 flex space-x-5">

                                    <a href="" @click.prevent.stop="$dispatch('performaction', {link: '/admin/approve-affiliates', route: 'admin.approve-affiliates', fragment: 'page-content', params: {rid :'{{$registration['id']}}', action: 'approve'}});">
                                        <img class="w-5" src="{{asset('images/icons/user-plus.svg')}}" alt="">
                                    </a>

                                    <a href="" @click.prevent.stop="$dispatch('performaction', {link: '/admin/approve-affiliates', route: 'admin.approve-affiliates', fragment: 'page-content', params: {rid :'{{$registration['id']}}', action: 'reject'}});"><img class="w-5" src="{{asset('images/icons/user-minus.svg')}}" alt=""></a></td>

                                </tr>
                                @endforeach

                                @else
                                <tr>
                                    <td colspan="9" class=" py-3 font-inter_regular text-center">No fresh registrations to show</td>
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
          const setup = () => {
            const getTheme = () => {
              if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
              }
              return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
              window.localStorage.setItem('dark', value)
            }

            return {
              loading: true,
              isDark: getTheme(),
              toggleTheme() {
                this.isDark = !this.isDark
                setTheme(this.isDark)
              },
            }
          }
        </script>
    </x-admin.admin-layout>
