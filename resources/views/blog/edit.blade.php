<x-easyadmin::guest-layout>

<section class="bg-gray-100">
    <div class="mx-auto max-w-screen-lg px-4 py-16 sm:px-6 lg:px-8">
      <div class="flex justify-center w-full">


        <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12 w-full">
          <form
          x-data="{ doSubmit() {
            let form = document.getElementById('blog-edit-form');
            let formdata = new FormData(form);
            $dispatch('formsubmit',{url:'{{route('update-blog')}}', route: 'update-blog',fragment: 'page-content', formData: formdata, target: 'blog-edit-form'});

            }}"
           action="" id="blog-edit-form" @submit.prevent.stop="doSubmit()" class="space-y-4 w-full" method="post" enctype="multipart/form-data"

           @formresponse.window="
            console.log('inside '+$event.detail.target);
            console.log($el.id);
            if ($event.detail.target == $el.id) {
            console.log('response for form submission');
            console.log($event.detail.content);

            if ($event.detail.content.success) {
                $dispatch('shownotice', {message: $event.detail.content.message, mode: 'success', redirectUrl: $event.detail.content.redirectUrl, redirectRoute: 'view-blog', fragment: 'page-content'});
                $dispatch('formerrors', {errors: []});
            } else if (typeof $event.detail.content.errors != undefined) {
                $dispatch('shownotice', {message: $event.detail.content.message, mode: 'error', redirectUrl: null, redirectRoute: null});

            } else{
                $dispatch('formerrors', {errors: $event.detail.content.errors});
            }
        }"
           >
            @csrf
            <div>
              <label class="sr-only" for="title">Title</label>
              <input
                class="w-full rounded-lg border-gray-200 p-3 text-sm"
                placeholder="Blog title"
                type="text"
                name="title"
                id="title"

                value="{{$blog->title}}"
              />
              @error('title')
                  <p class="text-red-600 text-xs font-inter_medium">{{$message}}</p>
              @enderror
            </div>

            {{-- hidden field --}}
            <input class=" hidden" type="text" name="blog_id" value="{{$blog->id}}">

            <div>
                <label class="sr-only" for="title
                ">Description</label>
                <input
                  class="w-full rounded-lg border-gray-200 p-3 text-sm"
                  placeholder="Enter a short description"
                  type="text"
                  name="description"
                  id="description"

                  value="{{$blog->description }}"
                />
            </div>



            <input type="file" name="blogimg"  placeholder="Change image">






            <div>
              <label class="sr-only" for="message">Code</label>

              <textarea
                class="w-full rounded-lg border-gray-200 p-3 text-sm"
                placeholder="Code"
                rows="8"
                id="code"
                name="code"
                required
              >{{ $blog->content }}</textarea>
            </div>

            <div class="mt-4">
              <button
                type="submit"
                class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto"
              >
                See Preview
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


  {{-- <script>
    let uploader= document.getElementById('blog-img');
    let label=document.getElementById('file-label');
    uploader.addEventListener('change',()=>{
       label.innerText = uploader.files[0].name;
    })
</script> --}}

</x-easyadmin::guest-layout>
