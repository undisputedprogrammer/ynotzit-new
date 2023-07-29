<div class="bg-black w-full mt-4 overflow-hidden">
    <div class=" lg:pt-16 md:pt-10 pt-5 w-[80%] sm:w-[75%] md:w-[75%] xl:w-[84%] 2xl:w-[80%] mx-auto">
        <h1 class="text-white lg:text-xl xl:text-2xl md:text-lg font-inter_bold text-sm">Quick links</h1>
      <div class="mb-7 md:mb-14 mt-4">
      <div class="text-white flex     pt-2 md:pt-8 lg:pt-12 justify-between    text-xs sm:text-[13px] sm:leading-4 md:text-sm 2xl:text-base font-inter_regular ">
        <div class=" flex flex-col">
            <a @click.prevent.stop="$dispatch('linkaction',{link: '{{route('home')}}', route: 'home', fragment: 'page-content'})" href="/" >Home</a>
            <a @click.prevent.stop="$dispatch('linkaction',{link: '{{route('about')}}', route: 'about', fragment: 'page-content'})" href="/about" class="md:pt-6 pt-2 ">About us</a>
            <a @click.prevent.stop="$dispatch('linkaction',{link: '{{route('services')}}', route: 'services', fragment: 'page-content'})" href="/services" class="md:pt-6 pt-2">Services</a>


        </div>
        <div class=" flex flex-col pl-6">
            {{-- <a href="/careers" >Careers</a> --}}
            <a @click.prevent.stop="$dispatch('linkaction',{link: '{{route('contact')}}', route: 'contact', fragment: 'page-content'})" href="/contact" class="">Contact</a>
            <a @click.prevent.stop="$dispatch('linkaction',{link: '{{route('affiliate-home')}}', route: 'affiliate-home', fragment: 'page-content'})" href="/affiliate/home" class="md:pt-6 pt-2">Affiliate login</a>
            <a @click.prevent.stop="$dispatch('linkaction',{link: '{{route('services')}}', route: 'services', fragment: 'page-content'})" href="/services" class="md:pt-6 pt-2">Web Development</a>



        </div>
        <div class=" flex flex-col pl-6">
            <a @click.prevent.stop="$dispatch('linkaction',{link: '{{route('services')}}', route: 'services', fragment: 'page-content'})" href="/services" >Software Solutions</a>
            {{-- <a href="/services/digitalMarketing" class="md:pt-6 pt-2">Digital Marketing</a> --}}
            {{-- <a href="/services/SEO" class="md:pt-6 pt-2">Search Engine Optimisation</a> --}}

            <a @click.prevent.stop="$dispatch('linkaction',{link: '{{route('services')}}', route: 'services', fragment: 'page-content'})" href="/services" class="md:pt-6 pt-2">Graphics / videos / photos</a>
            <a @click.prevent.stop="$dispatch('linkaction',{link: '{{route('home')}}', route: 'home', fragment: 'page-content'})" href="/privacy-policy" class="md:pt-6 pt-2">Privacy Policy</a>

        </div>

      </div>
      </div>
      <div class="flex justify-between w-[92%] sm:w-full mx-auto pt-5 border-t border-white  lg:pb-10 md:pb-9 pb-2">
        <div>
        <h1 class="text-white lg:text-lg sm:text-base font-inter_semibold   text-sm">Connect with Us</h1>
        <div class="flex mt-1.5 sm:mt-2.5">
        <a target="_blank" href="https://www.facebook.com/ynotzitsolutions"><img src="{{asset('images/icons/fb-2.webp')}}" alt="" class=" md:w-[26px] md:pt-[2px] w-5 mr-1 aspect-square"></a>
        <a target="_blank" href="https://instagram.com/ynotzit?igshid=MmJiY2I4NDBkZg=="><img src="{{asset('images/icons/insta-2.webp')}}" alt="" class=" md:w-7 w-5 mx-1 aspect-square"></a>
        <a target="_blank" href="https://www.linkedin.com/company/ynotzitsolutions/"><img src="{{asset('images/icons/ln-2.webp')}}" alt="" class=" md:w-7 w-5 mx-1 aspect-square"></a>
        {{-- <a href=""><img src="{{asset('images/icons/mail-id-01.webp')}}" alt="" class="lg:w-10 md:w-7 w-5"></a> --}}
        <a target="_blank" href="https://wa.me/9497344553?text=Hi,%20Let's%20schedule%20a%20meeting"><img src="{{asset('images/icons/wp-2.webp')}}" alt="" class=" md:w-[26px] md:pt-[2px] w-5 mx-1 aspect-square"></a>

    </div>
    </div>
        <div class="sm:mt-0  text-white    ">
            <h1 class=" text-sm sm:text-base lg:text-lg font-inter_semibold mb-2.5"> Address</h1>
            <div class=" font-inter_regular text-xs xl:text-sm flex flex-col space-y-2">
                <p class=" text-xs sm:text-sm lg:text-base">YNOTZ IT Solutions Private Limited,<br> 6th floor, Heavenly Plaza,</p>
                <p class=" text-xs sm:text-sm lg:text-base">Padamugal, Kakkanad,Kochi-682021</p>
                <p class=" text-xs sm:text-sm lg:text-base">info@ynotzitsolutions.com</p>
            </div>

        </div>
      </div>
    </div>
  </div>
