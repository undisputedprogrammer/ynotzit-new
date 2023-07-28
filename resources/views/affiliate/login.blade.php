<x-default-layout>


    {{-- <x-marketer.nav></x-marketer.nav> --}}


    <div class="h-[70vh]  py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 w-[90%] mx-auto sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform  sm:skew-y-0 -rotate-6 sm:rounded-3xl rounded-xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl rounded-xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">Hello! Login to continue</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <form action="/affiliate/authenticate" method="POST" enctype="multipart/form-data" class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                @csrf
                                <div class="relative">
                                <div class="relative z-0">
                                    <input autocomplete="off" type="email" id="email" name="email" class="px-0 block py-2.5  w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{old('email')}}" />

                                    <label for="email" class=" font-satoshimedium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                                </div>
                            </div>
                            <div class="relative">
                                <div class="relative z-0">
                                    <input type="password" required id="password" name="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />

                                    <label for="password" class=" font-satoshimedium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>

                                    @if ($errors->any())
                                        <p class="text-xs mt-1.5 font-montmedium text-red-600">{{$errors->first('password')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="relative ">
                                <button class="bg-blue-500 font-satoshimedium text-white rounded-md px-2 py-1">Login</button>
                            </div>
                            {{-- <div class="relative ">
                                <p class="text-sm font-satoshiregular">Don't have an account? <a href="/rv/sign-up" class="text-blue-500">Sign-up</a></p>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-default-layout>
