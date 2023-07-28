<x-easyadmin::guest-layout>

    {{-- title --}}
<div class="w-full relative">
    <img class="w-full" src="{{asset('images/offers/Title.webp')}}" alt="">
    <div class="absolute top-0 left-0 h-full w-full flex items-center">
        <h1 class=" uppercase text-center w-full text-white font-inter_bold text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl">Super Startup offer!</h1>
    </div>
</div>

<div class="w-[92%] xl:w-[70%] mx-auto mt-4 lg:mt-12">
    <div>
    <h3 class=" font-semibold sm:text-lg md:text-xl lg:text-2xl xl:text-3xl lg:font-inter_bold lg:mb-9 xl:mb-14  mx-auto">Brand Identity Package</h3>

    <div class=" lg:flex justify-evenly xl:justify-between">
    <ul class=" flex flex-wrap lg:flex-col lg:space-y-10  list-disc list-inside my-5 text-xs sm:text-sm lg:text-base xl:text-xl  font-inter_semibold lg:font-inter_medium">
        <li class="mr-4 md:mr-5 leading-7">Logo</li>
        <li class="mr-4 md:mr-5 leading-7">Visiting Card</li>
        <li class="mr-4 md:mr-5 leading-7">ID Card</li>
        <li class=" leading-7 sm:mr-4">Letter Head</li>
        <li class="mr-4 md:mr-5 leading-7">Envolope</li>
    </ul>


    <div class="w-full lg:w-[75%] xl:w-[60%] flex flex-wrap justify-between">
        <img class=" w-[48%] mb-3 lg:mb-5" src="{{asset('images/offers/i-1.png')}}" alt="">
        <img class=" w-[48%] mb-3 lg:mb-5" src="{{asset('images/offers/i-2.png')}}" alt="">
        <img class=" w-[48%] mb-3 lg:mb-5" src="{{asset('images/offers/i-3.png')}}" alt="">
        <img class=" w-[48%] mb-3 lg:mb-5" src="{{asset('images/offers/i-4.png')}}" alt="">
    </div>

    </div>


</div>

<div class=" text-center w-full font-inter_semibold my-1.5 lg:my-4 xl:my-12 lg:font-inter_bold md:text-lg lg:text-xl xl:text-2xl">Starts @ ₹12,000/-</div>

</div>

<div class=" bg-gray-100 py-7">
    <div class="w-[94%] xl:w-[70%] mx-auto">
    <h3 class="  font-semibold sm:text-lg md:text-xl lg:text-2xl xl:text-3xl lg:font-inter_bold  lg:mb-9 xl:mb-14 ">Brand Website Package</h3>
    <div class="  lg:flex justify-evenly xl:justify-between">
    <ul class=" lg:order-2 flex flex-wrap lg:flex-col lg:space-y-10  list-disc list-inside my-5 text-[11px] sm:text-sm lg:text-base xl:text-xl  font-inter_semibold lg:font-inter_medium">
        <li class="ml-3 md:mr-5 leading-7">Mobile Friendly</li>
        <li class="ml-3 md:mr-5 leading-7">Fast Loading</li>
        <li class=" md:mr-5 leading-7 ml-3">Search Engine Friendly</li>
        <li class=" leading-7 sm:mr-4 ml-3">Single Page App</li>
        <li class="ml-3 md:mr-5 leading-7">Product/Service Gallery</li>
        <li class="ml-3 md:mr-5 leading-7">Blog</li>
        <li class="ml-3 md:mr-5 leading-7">Image Gallery</li>
    </ul>

    <img class=" lg:order-1 w-[92%] lg:w-[55%] mx-auto lg:mx-0 bg-white rounded-md" src="{{asset('images/offers/buisiness website.png')}}" alt="">

    </div>

    <div class=" text-center w-full font-inter_semibold mt-4 lg:mt-7 xl:my-12 lg:font-inter_bold md:text-lg lg:text-xl xl:text-2xl">Starts @ ₹29,000/-</div>

</div>

</div>

<div class="relative ">
    <img class="  w-full aspect-[390/477] sm:aspect-[390/390] md:aspect-auto object-cover" src="{{asset('images/offers/Offer Background (1).webp')}}" alt="">
    <img class="absolute bottom-0 left-0 -translate-x-[35%] md:h-full md:-translate-x-2" src="{{asset('images/offers/banner-girl.png')}}" alt="">

    <div class="absolute top-[15%] sm:top-[15%] left-0 md:left-[40%] w-full md:w-fit">
        <h3 class=" uppercase text-white font-inter_bold text-xl xl:text-2xl 2xl:text-5xl  text-center">Super startup offer</h3>
        <div class="flex text-white font-inter_medium mt-2 xl:mt-6 justify-center space-x-5 w-[90%] mx-auto">
            <p class="text-center xl:text-lg 2xl:text-2xl">Brand Identity Package<br><span class="text-sm xl:text-base">(₹12,000/-)</span></p>
            <p class=" self-center font-semibold xl:text-2xl 2xl:text-3xl">+</p>
            <p class=" text-center xl:text-lg 2xl:text-2xl">Buisiness Website Package<br><span class="text-sm xl:text-base">(₹29,000/-)</span></p>
        </div>

        <div class=" mt-3 lg:mt-9 xl:mt-12 hidden md:flex md:flex-col ">
            <h3 class="  uppercase text-white font-inter_semibold text-lg text-center lg:text-2xl 2xl:text-3xl">for <s class=" font-bold decoration-4"> <span class=" text-yellow-300">₹41000/-</span> </s></h3>
            <h3 class="  uppercase text-yellow-300 font-inter_semibold text-lg text-center lg:text-2xl 2xl:text-3xl mt-2.5">?</h3>
            {{-- <p class="text-white text-center font-inter_medium text-base xl:text-lg">Apply coupon code to get your special price</p> --}}
            <div class=" self-center mt-2 lg:mt-6 2xl:mt-10  md:flex xl:w-fit xl:right-[25%] xl:flex-col xl:items-center">
                <p class="text-white font-inter_medium text-sm xl:text-base md:order-2 xl:order-1">Apply coupon code to get your special price</p>
                <div class="flex justify-center mt-4 md:order-1 xl:order-2 md:mt-0 md:mr-2 xl:mt-5 2xl:mt-2"><x-pointdow></x-pointdow></div>

            </div>
        </div>

    </div>

    <div class=" absolute top-[55%] sm:top-[47%] md:top-[60%] right-4  md:hidden w-[47%] ">
        <h3 class=" uppercase text-white font-inter_semibold text-lg sm:text-2xl text-center">for <s class=" decoration-2"><span class=" text-yellow-300">₹41000/-</span></s></h3>
        <h3 class=" uppercase  font-inter_semibold text-lg sm:text-2xl text-center text-yellow-300">?</h3>
        {{-- <p class="text-white font-inter_medium text-base">Apply coupon code to get your special price</p> --}}

        <div class=" md:flex xl:w-fit xl:right-[25%] xl:flex-col xl:items-center mt-3">
            <p class="text-white text-center font-inter_medium text-sm 2xl:text-base md:order-2 xl:order-1">Apply coupon code to get your special price</p>
            <div class="flex justify-center mt-4 md:order-1 xl:order-2 md:mt-0 md:mr-2 xl:mt-3 2xl:mt-5"><x-pointdow></x-pointdow></div>

        </div>
    </div>

    {{-- <div class=" hidden absolute bottom-10 md:bottom-3 xl:bottom-8 2xl:bottom-8 right-3 md:right-9 w-[47%] md:flex xl:w-fit xl:right-[25%] xl:flex-col xl:items-center">
        <p class="text-white font-inter_medium text-sm 2xl:text-base md:order-2 xl:order-1">Apply coupon code to get your special price</p>
        <div class="flex justify-center mt-4 md:order-1 xl:order-2 md:mt-0 md:mr-2 xl:mt-3 2xl:mt-5"><x-pointdow></x-pointdow></div>

    </div> --}}



</div>



<div class=" w-full py-6 ">
    <div class="w-fit mx-auto">
        <h3 class=" font-inter_semibold text-lg md:text-xl 2xl:text-2xl">Apply your coupon code</h3>
        <div class="w-[60%] md:w-[70%] flex my-4 2xl:my-6">
            <input id="inp-code" class=" text-sm md:text-base focus:ring-0 border-2 ring-gray-300  focus:border-gray-300 border-gray-300" type="text" placeholder="Your coupon code here">
            <button id="btn-apply" class="px-3 bg-gray-300 font-inter_medium focus:bg-gray-400">Apply</button>
        </div>
        <p id="error-log" class=" text-xs font-inter_medium text-red-600"></p>

        <div id="spin" class="flex justify-center my-4 hidden">
            <x-spin></x-spin>
        </div>

        <div id="discount" class="hidden">
            <h3 class=" font-inter_regular text-sm md:text-base"><span class=" font-inter_medium font-bold">Congratulations!</span> Coupon code is applied</h3>

            <h3 class=" text-sm font-inter_semibold my-2 md:text-base">Your Special discounted price is </h3>

            <h3 id="discounted-price" class=" font-inter_semibold text-xl text-yellow-400 text-center md:text-2xl xl:my-5 2xl:text-2xl">₹9999/-</h3>

            <div class="">
                <form
                x-data="{ doSubmit() {
                    let form = document.getElementById('booking-form');
                    let formdata = new FormData(form);
                    $dispatch('formsubmit',{url:'{{route('book-offer')}}', route: 'book-offer',fragment: 'page-content', formData: formdata, target: 'booking-form'});

                }}"
                 action="/offer/booking" @submit.prevent.stop="doSubmit()" id="booking-form" method="POST" class="flex flex-col px-6 border-y-2 border-gray-400 py-6 space-y-4"

                 @formresponse.window="
                 console.log('inside form response');
                 if ($event.detail.target == $el.id) {
                 console.log('response for form submission');
                 console.log($event.detail.content);

                 if ($event.detail.content.success) {
                     $dispatch('shownotice', {message: $event.detail.content.message, mode: 'success', redirectUrl: '{{route('super-startup-offer')}}', redirectRoute: 'super-startup-offer'});
                     $dispatch('formerrors', {errors: []});
                 } else if (typeof $event.detail.content.errors != undefined) {
                     $dispatch('shownotice', {message: $event.detail.content.message, mode: 'error', redirectUrl: null, redirectRoute: null});

                 } else{
                     $dispatch('formerrors', {errors: $event.detail.content.errors});
                 }
             }"
                 >
                    @csrf
                    <input class=" border-black rounded-md focus:placeholder-blue-600" type="text" name="name" placeholder="Your Name" required>
                    <input class=" border-black rounded-md focus:placeholder-blue-600" type="text" name="company" placeholder="Company Name" required>
                    <input class="py-2 px-3 border border-black focus:outline-2 outline-blue-600 focus:border-0 rounded-md focus:placeholder-blue-600" type="phone" name="phone" minlength="10" required placeholder="Phone Number">
                    <input type="text" id="coupon" name="coupon" class="hidden">
                    <input type="text" name="price" id="price" class=" hidden">
                    <div class="flex justify-center mt-3">
                        <button type="submit" class=" bg-yellow-400 px-2 py-1.5 font-inter_semibold rounded-full border-2 border-yellow-400 hover:bg-white focus:scale-105 ease-in-out duration-150">Book Now</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>



<x-guest.footer></x-common.footer>

<script>

    let couponExist = false;

    document.getElementById('btn-apply').addEventListener('click',(e)=>{

     couponExist = false;

    e.target.disabled=true;

        if(!document.getElementById('discount').classList.contains('hidden')){
                    document.getElementById('discount').classList.toggle('hidden');
        }

        if(document.getElementById('inp-code').value==""){
                if(!document.getElementById('discount').classList.contains('hidden')){
                    document.getElementById('discount').classList.toggle('hidden');
                }
                document.getElementById('error-log').innerText="Coupon code cannot be empty";
                e.target.disabled=false;
                // document.getElementById('spin').classList.toggle('hidden');
                return;
            }

        document.getElementById('spin').classList.toggle('hidden');

        axios.get('/api/coupon', {
            params: {
            code: document.getElementById('inp-code').value,
            }
        })
        .then(function (response) {
            let res = response.data;
            console.log(res);
            if(response.data.message == "Coupon found"){
                couponExist = true;
            }

            if(couponExist==true){
                document.getElementById('discounted-price').innerText='₹'+res.price+'/-';
                document.getElementById('error-log').innerText="";
                document.getElementById('spin').classList.toggle('hidden');
                document.getElementById('coupon').value = res.code;
                document.getElementById('price').value = res.price;
                if(document.getElementById('discount').classList.contains('hidden')){
                    document.getElementById('discount').classList.toggle('hidden');
                }
                e.target.disabled=false;
            }

            else{
                document.getElementById('spin').classList.toggle('hidden');
                if(!document.getElementById('discount').classList.contains('hidden')){
                    document.getElementById('discount').classList.toggle('hidden');
                }
                document.getElementById('error-log').innerText="Invalid coupon code";
                e.target.disabled=false;
            }

        })
        .catch(function (error) {
            couponExist = false;
        });








    })
</script>


</x-easyadmin::guest-layout>
