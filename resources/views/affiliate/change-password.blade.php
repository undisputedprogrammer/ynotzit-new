<x-affiliate.affiliate-layout>

    <section class="bg-gray-50 mt-24 xl:ml-60">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-[70vh] lg:py-0">

            <div class="w-full p-6 bg-white rounded-lg shadow  md:mt-0 sm:max-w-md sm:p-8">
                <h2 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                    Change Password
                </h2>
                <form id="password-reset-form"
                x-data="{ doSubmit() {
                    let form = document.getElementById('password-reset-form');
                    let formdata = new FormData(form);
                    $dispatch('formsubmit',{url:'{{route('affiliate-reset-password')}}', route: 'affiliate-reset-password',fragment: 'page-content', formData: formdata, target: 'password-reset-form'});

                }}"
                class="mt-4 space-y-4 lg:mt-5 md:space-y-5" @submit.prevent.stop="doSubmit();" method="POST" action=""
                @formresponse.window="

            if ($event.detail.target == $el.id) {


            if ($event.detail.content.success) {
                $dispatch('shownotice', {message: $event.detail.content.message, mode: 'success', redirectUrl: '{{route('affiliate-home')}}', redirectRoute: 'affiliate-home'});
                $dispatch('formerrors', {errors: []});
            } else if (typeof $event.detail.content.errors != undefined) {
                $dispatch('shownotice', {message: $event.detail.content.message, mode: 'error', redirectUrl: null, redirectRoute: null});

            } else{
                $dispatch('formerrors', {errors: $event.detail.content.errors});
            }
            }"
                >
                    @csrf
                    {{-- <div>
                        <label for="oldpassword" class="block mb-2 text-sm font-medium text-gray-900 ">Old Password</label>
                        <input type="password" name="old-password" id="oldpassword" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="••••••••" required>
                    </div> --}}
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">New Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required>
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required>
                        @error('password')
                            <p class=" text-xs text-red-600">{{$message}}</p>
                        @enderror
                    </div>


                    <button type="submit" class="w-full font-semibold text-white bg-ynotz hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300  rounded-lg text-sm px-5 py-2.5 text-center ">Reset password</button>
                </form>
            </div>
        </div>
      </section>

</x-affiliate.affiliate-layout>
