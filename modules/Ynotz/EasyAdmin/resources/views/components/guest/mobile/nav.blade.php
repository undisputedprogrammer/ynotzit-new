<nav x-data="{open:false}" class="  w-full flex items-end bg-white md:items-end justify-between h-[60px] md:h-[100px] xl:h-[110px] md:pb-4  md:px-24 lg:px-28 2xl:px-28 ">


        <img @click.prevent.stop="$dispatch('linkaction', {link: '{{route('home')}}', route: 'home', fragment: 'page-content'})" class=" cursor-pointer h-9 md:h-11 lg:h-12 xl:h-14 2xl:h-14 ml-4" src="{{asset('images/home/ynotz it solutions-01.webp')}}" alt="">

    <button class="text-gray-500 w-10 h-10 relative focus:outline-none mr-1.5 md:hidden" @click="open = !open">
        <span class="sr-only">Open main menu</span>
        <div class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
            <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out text-black" :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
            <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out text-black" :class="{' opacity-0  text-transparent ': open } "></span>
            <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out text-black" :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
        </div>
    </button>

    <div class=" hidden md:flex space-x-4 lg:space-x-5 xl:space-x-6 font-inter_light text-sm 2xl:text-base pb-3">
        <a href="/home" :class ="{'font-inter_medium': currentroute=='home'}" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('home')}}', route: 'home', fragment: 'page-content'})">Home</a>
        <a href="/about" :class ="{'font-inter_medium': currentroute=='about'}" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('about')}}', route: 'about', fragment: 'page-content'})">About</a>
        <a href="/services" :class ="{'font-inter_medium': currentroute=='services'}" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('services')}}', route: 'services', fragment: 'page-content'})">Our services</a>
        <a href="/blogs" :class ="{'font-inter_medium': currentroute=='blogs'}" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('blogs')}}', route: 'blogs', fragment: 'page-content'})">Blog</a>
        <a href="/contact" :class ="{'font-inter_medium': currentroute=='contact'}" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('contact')}}', route: 'contact', fragment: 'page-content'})">Contact</a>
    </div>


    <div x-cloak x-transition x-show="open" class="h-fit flex flex-col justify-between bg-white absolute top-[60px] left-0  w-full md:hidden px-4 z-30 pt-4">

        <div class="flex flex-col space-y-1 h-fit font-inter_medium">
            <a  class=" px-2 py-1 hover:bg-sky-100 rounded-md  " href="/" :class="{'bg-sky-100' : currentroute=='home'}" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('home')}}', route: 'home', fragment: 'page-content'});
            open=!open;">HOME</a>
            <a  class=" px-2 py-1 hover:bg-sky-100 rounded-md " :class="{'bg-sky-100' : currentroute=='about'}" href="" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('about')}}', route: 'about', fragment: 'page-content'});
            open=!open;" >ABOUT US</a>
            <a  class=" px-2 py-1 hover:bg-sky-100 rounded-md " :class="{'bg-sky-100' : currentroute=='services'}" href="" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('services')}}', route: 'services', fragment: 'page-content'});
            open=!open;" href="/services">OUR SERVICES</a>
            <a  class=" px-2 py-1 hover:bg-sky-100 rounded-md " href="/blogs" :class="{'bg-sky-100' : currentroute=='blogs'}" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('blogs')}}', route: 'blogs', fragment: 'page-content'});
            open=!open;" >BLOGS</a>
        </div>

        <a class=" w-fit font-inter_regular text-white bg-ynotz text-center font-myriadpro  my-3 px-3 py-1 text-sm rounded-lg ml-1.5 " href="/contact" @click.prevent.stop="$dispatch('linkaction',{link: '{{route('contact')}}', route: 'contact', fragment: 'page-content'});
        open=!open;">CONTACT US</a>
    </div>

</nav>
