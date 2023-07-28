@props(['blogs'])



<div class=" w-[90%] 2xl:w-[84%] mx-auto my-[3rem] flex flex-col space-y-6 sm:flex-row sm:justify-evenly sm:flex-wrap sm:space-y-0 ">

    @if ($blogs != null)

    @foreach ($blogs as $blog)
    <div @click.prevent.stop="$dispatch('linkaction',{link:'{{route('view-blog')}}', route:'view-blog', fragment: 'page-content', params:{title:'{{$blog['slug']}}'}})"  class=" w-full border border-black flex flex-col space-y-3 lg:space-y-5 pb-3 lg:pb-5 rounded-sm sm:w-[45%] md:w-[40%] lg:w-[30%] xl:w-[29%] sm:mb-6 h-fit shadow-md shadow-gray-300 hover:shadow-lg transition duration-200 hover:scale-[100.2%]">
        <img class=" w-full aspect-video object-cover" src="/storage/images/{{$blog['image']}}" alt="">
        <h3 class=" font-inter_semibold line-clamp-1  text-base xl:text-lg px-2">{{$blog['title']}}</h3>
        <p class=" line-clamp-2 font-inter_regular text-xs xl:text-sm px-2">{{$blog['description']}}</p>

        <button class=" self-center w-[50%] py-2 text-center border-2 border-black rounded-full font-inter_semibold hover:bg-gray-100 ">Read more</button>

    </div>
    @endforeach

    @else
        <h1 class=" text-base font-inter_semibold text-center my-16 lg:text-xl 2xl:text-2xl">Sorry! Blogs will be uploaded soon</h1>
    @endif
    {{-- <div class=" w-full border border-black flex flex-col space-y-3 lg:space-y-5 pb-3 lg:pb-5 rounded-sm sm:w-[45%] md:w-[40%] lg:w-[30%] xl:w-[29%] sm:mb-6 h-fit shadow-md shadow-gray-300 hover:shadow-lg transition duration-200 hover:scale-[100.2%]">
        <img class=" w-full aspect-video object-cover" src="{{asset('images/home/blog-image-1.webp')}}" alt="">
        <h3 class=" font-inter_semibold  text-base xl:text-lg px-2">How to build an ecommerce app in limited cost</h3>
        <p class=" line-clamp-5 font-inter_regular text-xs xl:text-sm px-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, ullam natus dicta voluptatibus consectetur vel est corporis ad, laborum autem, ab velit dolores. Illum, pariatur iste ipsam nihil esse reiciendis ea. Nobis repellat est quod, laudantium dolores, nesciunt ad, minus porro quia laboriosam debitis non!</p>

        <button class=" self-center w-[50%] py-2 text-center border-2 border-black rounded-full font-inter_semibold hover:bg-gray-100 ">Read more</button>

    </div>

    <div class=" w-full border border-black flex flex-col space-y-3 lg:space-y-5 pb-3 lg:pb-5 rounded-sm sm:w-[45%] md:w-[40%] lg:w-[30%] xl:w-[29%]  h-fit sm:mb-6 shadow-md shadow-gray-300 hover:shadow-lg transition duration-200 hover:scale-[100.2%]">
        <img class=" w-full aspect-video object-cover" src="{{asset(
            'images/home/blog-image-2.webp'
        )}}" alt="">
        <h3 class=" font-inter_semibold  text-base xl:text-lg px-2">How to build an ecommerce app in limited cost 2</h3>
        <p class=" line-clamp-5 font-inter_regular text-xs xl:text-sm px-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, ullam natus dicta voluptatibus consectetur vel est corporis ad, laborum autem, ab velit dolores. Illum, pariatur iste ipsam nihil esse reiciendis ea. Nobis repellat est quod, laudantium dolores, nesciunt ad, minus porro quia laboriosam debitis non!</p>

        <button class=" self-center w-[50%] py-2 text-center border-2 border-black rounded-full font-inter_semibold hover:bg-gray-100 ">Read more</button>

    </div>

    <div class=" w-full border border-black flex flex-col space-y-3 lg:space-y-5 pb-3 lg:pb-5 rounded-sm sm:w-[45%] md:w-[40%] lg:w-[30%] xl:w-[29%] h-fit sm:mb-6 shadow-md shadow-gray-300 hover:shadow-lg transition duration-200 hover:scale-[100.2%]">
        <img class=" w-full aspect-video object-cover" src="{{asset('images/home/blog-image-3.webp')}}" alt="">
        <h3 class=" font-inter_semibold  text-base xl:text-lg px-2">How to build an ecommerce app in limited cost</h3>
        <p class=" line-clamp-5 font-inter_regular text-xs xl:text-sm px-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, ullam natus dicta voluptatibus consectetur vel est corporis ad, laborum autem, ab velit dolores. Illum, pariatur iste ipsam nihil esse reiciendis ea. Nobis repellat est quod, laudantium dolores, nesciunt ad, minus porro quia laboriosam debitis non!</p>

        <button class=" self-center w-[50%] py-2 text-center border-2 border-black rounded-full font-inter_semibold hover:bg-gray-100 ">Read more</button>

    </div> --}}

</div>


