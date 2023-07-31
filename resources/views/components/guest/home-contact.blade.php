<div class=" lg:flex justify-evenly items-center overflow-hidden">
    {{-- dudu section --}}
    <div class=" lg:flex justify-center order-1 sm:order-1 lg:w-[40%]">
        <div class=" lg:w-[55%]  lg:order-2 ">
            <div class=" relative mt-[7rem]  lg:mt-[7rem] transition  ">
                <div class=" w-fit mx-auto ">
                    <img class=" w-16 sm:w-20 xl:w-24 2xl:w-28  lg:-translate-x-4" src="{{asset('images/home/dudu-5-copy.webp')}}" alt="Our dearest Dudu">
                </div>

                <img class="absolute w-36  sm:w-40 md:w-44 lg:w-48 xl:w-52 right-[calc(55%)] sm:right-[53%] md:right-[53%] lg:right-[72%] xl:right-[68%] 2xl:right-[68%] bottom-[75%]" src="{{asset('images/home/home-contact-dialog-1.webp')}}" alt="Dudu speaking">

                <img class="absolute w-36  sm:w-40 md:w-44 lg:w-48 xl:w-52 left-[57%] sm:left-[55%] md:left-[55%] lg:left-[63%] xl:left-[60%] 2xl:left-[60%] bottom-[75%]" src="{{asset('images/home/home-contact-dialog-2.webp')}}" alt="Dudu speaking">

            </div>

        </div>
    </div>

    <div class=" mt-5 mb-2.5  order-2 lg:w-1/2 2xl:w-[45%]">
        <h1 class="  order-1 sm:order-2 font-inter_semibold text-base sm:text-lg lg:text-xl xl:text-2xl 2xl:text-3xl text-center sm:mt-4 md:mt-4 lg:mt-0 ">Let's talk about what we can build together</h1>

        <p class="  font-inter_regular text-center w-[90%]  mx-auto mt-4 text-xs sm:text-[13px] sm:leading-4 md:text-sm 2xl:text-base">Whatever may be your requirement - be it a simple website design, a complex data driven web application development an ecommerce website, a native or cross platform mobile app development, a logo and brand identity design, a video production or a full fledged digital marketing campaign - we have a solution for you.</p>

        <div class="flex flex-col items-center relative mt-[4.5rem] sm:mt-20 md:mt-[6.5rem] xl:mt-[6.5rem] ">
            <img class="w-36  sm:w-40 md:w-44 lg:w-48 xl:w-48 absolute bottom-[58%] left-[58%] xs:left-[56%] sm:left-[55%] lg:left-[56%]" src="{{asset('images/home/home-contact-dialog-3.webp')}}" alt="dudu speaking">
            <img class="w-16 2xl:w-20 translate-y-[6px] -rotate-[3deg]" src="{{asset('images/home/dudu-6.webp')}}" alt="">
            <a href="/contact" @click.prevent.stop="$dispatch('linkaction',{link:'{{route('contact')}}', route: 'contact', fragment: 'page-content'});" class=" text-base 2xl:text-lg uppercase font-inter_semibold px-3.5 2xl:px-5 py-2 2xl:py-3.5 rounded-full shadow-md shadow-sky-100 ease-in-out transition duration-300 hover:shadow-lg hover:bg-[#0f63a3] border-2 border-[#1976bc] bg-[#1976bc] text-white ">Get in touch with us</a>
        </div>
    </div>



</div>
