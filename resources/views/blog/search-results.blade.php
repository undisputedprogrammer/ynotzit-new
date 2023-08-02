{{-- <x-easyadmin::guest-layout>
@fragment('search-result') --}}

    @if ($blogs != null)


        @foreach ($blogs as $blog)
            <a @click.prevent.stop="$dispatch('linkaction',{link: '/blog?title={{$blog['slug']}}', route: 'view-blog', fragment: 'page-content'})" class="  rounded-sm overflow-hidden line-clamp-1 text-overlow-ellipsis whitespace-nowrap" href="/blog?title={{$blog['slug']}}">
                <div class="flex items-center space-x-2 bg-gray-100 bg-opacity-100 opacity-100 hover:bg-yellow-100 py-1 px-1 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>

                    <p class="text-sm font-montmedium leading-[1px] w-[calc(100%-1.5rem)] "  >{{$blog['title']}}</p>
                </div>
            </a>
        @endforeach

        @else
        <div class="flex items-center justify-center space-x-2 bg-gray-100 bg-opacity-100 opacity-100  py-1 px-1 rounded-sm">


            <p class="text-sm font-montmedium leading-[1px]">No results found</p>
        </div>
    @endif

    {{-- @endfragment

</x-easyadmin::guest-layout> --}}
