@props(['blogs'])
@if (count($blogs)>2)


<div class=" flex flex-col overflow-hidden mb-4 md:mb-8 pb-2">
    <h1 class=" uppercase order-1 sm:order-2 font-inter_semibold text-lg sm:text-xl lg:text-2xl xl:text-3xl 2xl:text-4xl text-center sm:mt-4 md:mt-4 lg:mt-0 ">Read recent blogs</h1>

    {{-- dudu section --}}
    <div class=" lg:flex justify-center lg:w-[75%] lg:mx-auto order-2 sm:order-1">
        <div class=" lg:w-[35%]  lg:order-2 ">
            <div class=" relative mt-[9rem] sm:mt-[10rem] lg:mt-[11rem] xl:mt-[12.5rem] 2xl:mt-[12rem] transition  lg:-translate-y-4">
                <div class=" w-fit mx-auto ">
                    <img class=" w-[4rem] sm:w-24 xl:w-28 2xl:w-32 sm:translate-x-4 lg:-translate-x-0" src="{{asset('images/home/dudu-5-copy.webp')}}" alt="Our dearest Dudu">
                </div>

                <img class="absolute w-44 xs:w-44  sm:w-48 lg:w-52 xl:w-56 right-[54%] sm:right-[53%] md:right-[52%] lg:right-[59%] xl:right-[60%] 2xl:right-[60%] bottom-[75%]" src="{{asset('images/home/home-blog-dialogue-1.webp')}}" alt="Dudu speaking">

                <img class="absolute w-40  sm:w-40 md:w-44 lg:w-48 xl:w-52 left-[57%] xs:left-[61%] sm:left-[61%] md:left-[58%] lg:left-[66%] xl:left-[66%] 2xl:left-[66%] bottom-[75%]" src="{{asset('images/home/home-blog-dialogue-2.webp')}}" alt="Dudu speaking">

            </div>

        </div>
    </div>

    {{-- blogs section --}}

    <div class=" flex flex-col my-11 xl:my-16 space-y-5 sm:space-y-0 sm:flex-row justify-evenly order-3 xl:w-[88%] mx-auto">

        @foreach ($blogs as $blog)
            <div @click.prevent.stop="$dispatch('linkaction',{link:'{{route('view-blog')}}', route:'view-blog', fragment: 'page-content', params:{title:'{{$blog['slug']}}'}})" class="w-[74%] sm:w-[30%]  sm:mx-0 mx-auto  relative">
                <img class="h-full object-contain" src="/storage/images/{{$blog['image']}}" alt="Blog-image">
                <p class=" font-inter_regular text-xs xl:text-sm w-[90%] right-[5%] bg-gradient-to-b rounded-2xl from-transparent to-white absolute bottom-4 2xl:bottom-6 text-black px-1.5 py-1 sm:line-clamp-2">{{$blog['title']}}</p>
            </div>
        @endforeach



    </div>

    <a @click.prevent.stop="$dispatch('linkaction',{link:'{{route('blogs')}}', route: 'blogs', fragment: 'page-content'})" class=" order-3 w-fit self-center -mt-7 lg:-mt-4 xl:-mt-8 text-sm font-inter_semibold px-2.5 lg:px-4 lg:py-2 lg:rounded-full py-1 border-2 border-black rounded-2xl hover:scale-[102%] transition ease-in-out duration-200 hover:shadow-md shadow-gray-500" href="">View more</a>



</div>

@endif
