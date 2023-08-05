<x-easyadmin::guest-layout>

<div class="  mx-auto  mt-3 mb-12 lg:mb-20 w-[90%] 2xl:w-[80%] justify-between border-b-2 border-gray-400">
    <div class=" w-full flex flex-col md:flex-row 2xl:justify-evenly items-center md:space-x-4  ">
        <div class="order-2 md:order-1 basis-1/4 md:basis-3/5 lg:basis-[65%] xl:basis-[60%]">
            <h1 class="  text-lg lg:text-2xl xl:text-3xl text-black font-inter_bold ">{{$blog->title}}</h1>

            <p class=" font-montregular text-sm md:text-base font-inter_medium my-3  ">{{$blog->description}}</p>
        </div>


        {{-- search field begins --}}

        {{-- checkpoint --}}

        <div x-data="{
            show: false,
            resultshow: true,
            text: '',
            prompt: 'Type to search',
            blogs: [],

            toggle() {
                this.getBlogs(this.text);
                if(this.text!=''){
                    this.prompt = 'Search results :'
                }

            },

            get searchResults() {
                return this.blogs.filter(
                    i => i.title.includes(this.text)
                )
            },

            getBlogs(input) {
                axios.get('/api/search/blogs', {
                params: {
                        title: this.text
                    }
                })
                .then(function (response) {
                    //console.log(response.data);
                    if(this.blogs != response.data){
                        this.blogs = response.data;
                        //this.searchResults();
                        $dispatch('test',{html: response.data});
                    }

                    // this.blogs=response.data;

                }).catch(function(error){
                    console.log(error);
                });
            },


        }" @click.outside="show=false"  class="relative w-full  md:basis-2/5 lg:basis-[32%] xl:basis-[38%] 2xl:basis-[30%] order-1 md:order-2">
            <div class="absolute inset-y-0 right-0 flex items-center  pointer-events-none font-satoshimedium">
              <img class=" mr-1 h-8 " src="{{asset('images/icons/SEARCH-02.webp')}}" alt="">
            </div>
            <input @click="show=true" @input="toggle()" x-model="text"  id="search" type="text" class="  w-full border-2 border-stone-400 font-montregular " placeholder="Search in Blogs..." autocomplete="off">

            {{-- search results area begins --}}


            <div x-show="show" x-cloak x-transition id="search-results" class="  absolute top-[100%] mt-1.5 w-full bg-white shadow-md rounded-md px-[4px] flex flex-col pb-1 font-montmedium text-sm">
                <p class=" text-sm font-montmedium leading-none" x-text="prompt"></p>

                <div x-show="resultshow" x-transition id="search-update" @test.window="
                resultshow = false;
                setTimeout(() => {
                    $el.innerHTML=$event.detail.html;
                    resultshow = true;},
                    100
                );
                " class=" opacity-100 bg-white">
                <template x-model="blogs" x-for="blog in searchResults"  >
                    <a class=" py-1.5 px-1.5 mt-[2px] bg-gray-100 rounded-sm  " href="">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>

                            <p class="text-sm font-montmedium leading-[1px]" x-text="blog.title" ></p>
                        </div>
                    </a>
                </template>
            </div>





            </div>

            {{-- search results area ends --}}

        </div>

        {{-- search field ends --}}
    </div>

    <div class=" lg:flex  justify-between 2xl:justify-evenly">
    <div class=" basis-[65%] xl:basis-[60%]">


        <div class="w-full mb-9 lg:mb-0  ">
            @php

                // $blog=$data['blog'];
                // dd($blog['image']);
                $datedata=strtotime($blog['created_at']);
                // $blog['created_at']=$datedata->format('d/m/Y');
            @endphp
            <img class=" 2xl:w-[85%] aspect-video object-cover" src="/storage/images/{{$blog['image']}}" alt="">
            <div class=" flex justify-between items-center w-[85%]">
            <p class=" text-[10px] lg:text-xs font-montmedium text-gray-400 mt-1">{{$blog->created_at->format('d/m/y')}} | By YNOTZ IT Solutions</p>
            @auth
                <div class="flex" id="target-action"
                @actionresponse.window="
                    console.log('inside action response');
                    if ($event.detail.target == $el.id) {
                    console.log('response for action ');
                    console.log($event.detail.content);

                    if ($event.detail.content.success) {
                        $dispatch('shownotice', {message: $event.detail.content.message, mode: 'success', redirectUrl: '{{route('blogs')}}', redirectRoute: 'blogs', fragment: 'page-content'});
                        $dispatch('formerrors', {errors: []});
                    } else if (typeof $event.detail.content.errors != undefined) {
                        $dispatch('shownotice', {message: $event.detail.content.message, mode: 'error', redirectUrl: null, redirectRoute: null});

                    } else{
                        $dispatch('formerrors', {errors: $event.detail.content.errors});
                    }
                }"
                >
                    <a @click.prevent.stop="$dispatch('linkaction', {link: '{{route('edit-blog')}}', route: 'edit-blog', fragment: 'page-content', params:{'id':'{{$blog->id}}'}});" class=" cursor-pointer">
                        <img class="w-5 h-5 mr-3" src="{{asset('images/icons/edit-icon.svg')}}" alt="">
                    </a>
                    <a @click.prevent.stop="$dispatch('performaction', {link: '{{route('delete-blog')}}', route: 'delete-blog', fragment: 'page-content' , params:{'id': '{{$blog->id}}'}, target: 'target-action'})" href="/blog/delete/{{$blog->id}}" class=" cursor-pointer">
                        <img class="w-5 h-5" src="{{asset('images/icons/delete-icon.svg')}}" alt="">
                    </a>
                </div>
            @endauth

            </div>
            {{-- {{dd($data)}} --}}
            {!!$blog->content!!}
            {{-- {{dd($blog)}} --}}
        </div>
    </div>
    <div class=" basis-[32%] xl:basis-[38%] 2xl:basis-[30%]">
        <h1 class=" text-xl font-inter_semibold">Popular posts</h1>

        @foreach ($popular as $value)
            <div @click.prevent.stop="$dispatch('linkaction',{link: '/blog?title={{$value['slug']}}', route: 'view-blog', fragment : 'page-content'})" class=" flex w-full space-x-2 py-4 my-3 border-b-2 items-center cursor-pointer">
                <img class=" h-20 aspect-video" src="/storage/images/{{$value['image']}}" alt="">
                <div class="flex flex-col">
                    <h3 class=" font-medium text-sm line-clamp-2">{{$value['title']}}</h3>
                    <p class="font-inter_regular text-sm line-clamp-2 text-gray-500">{{$value['description']}}</p>
                </div>

            </div>
        @endforeach




    </div>
</div>
</div>

<x-guest.footer/>

</x-easyadmin::guest-layout>
