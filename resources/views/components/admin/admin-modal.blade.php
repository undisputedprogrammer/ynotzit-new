<div id="payment-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50  w-full p-4 hidden overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full w3-animate-zoom">
    <div class="relative w-full max-w-md mt-24 max-h-full mx-auto ">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg  shadow ">
            <button id="close-modal" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center " data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Enter payment details</h3>
                <form x-data="{ doSubmit() {
                    let form = document.getElementById('payment-form');
                    let booking_id = document.getElementById('booking_id').value;
                    let formdata = new FormData(form);
                    $dispatch('formsubmit',{url:'{{route('admin.mark-payment')}}', route: 'admin.mark-payment',fragment: 'page-content', formData: formdata, target: 'payment-form'});

                }}" id="payment-form" class="space-y-6" @submit.prevent.stop="doSubmit();" action="" method="POST"
                @formresponse.window="
            console.log('inside form response');
            if ($event.detail.target == $el.id) {
            console.log('response for form submission');
            console.log($event.detail.content);

            if ($event.detail.content.success) {
                $dispatch('shownotice', {message: $event.detail.content.message, mode: 'success', redirectUrl: '{{route('admin.affiliates')}}', redirectRoute: 'admin.affiliates'});
                $dispatch('formerrors', {errors: []});
            } else if (typeof $event.detail.content.errors != undefined) {
                $dispatch('formerrors', {errors: $event.detail.content.errors});
            } else{
                $dispatch('shownotice', {message: $event.detail.content.error, mode: 'error', redirectUrl: null, redirectRoute: null});
            }
        }"
                >
                    @csrf
                    <div>
                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 ">Amount</label>
                        <input type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="" required>
                    </div>
                    <input type="text" name="booking_id" id="booking_id" class="hidden">

                    <div>
                        <label for="Transaction_id" class="block mb-2 text-sm font-medium text-gray-900 ">Transaction ID</label>
                        <input type="text" name="transaction_id" id="transaction_id" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                    </div>

                    <button type="submit" class=" font-montsemibold w-full text-white bg-ynotz hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Mark payment</button>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('close-modal').addEventListener('click',()=>{
        document.getElementById('payment-modal').classList.toggle('hidden');
    })
</script>
