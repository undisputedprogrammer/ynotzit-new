<x-default-layout>





<div class="min-h-screen bg-gray-100 py-7 sm:p-12">
  <div class="mx-auto w-[94%] max-w-md px-6 py-12 bg-white border-0 shadow-lg rounded-3xl">
    <h1 class=" text-xl sm:text-2xl font-bold mb-8">Register as affiliate marketer</h1>
    <form id="registration-form"
    x-data="{ doSubmit() {
        let form = document.getElementById('registration-form');
        let formdata = new FormData(form);
        $dispatch('formsubmit',{url:'{{route('affiliate-submit-form')}}', route: 'affiliate-submit-form',fragment: 'page-content', formData: formdata, target: 'registration-form'});

    }}"
     action="/affiliate/registration/submit" @submit.prevent.stop="doSubmit();" method="POST"
     @formresponse.window="

            if ($event.detail.target == $el.id) {


            if ($event.detail.content.success) {
                document.getElementById('registration-form').reset();
                $dispatch('shownotice', {message: $event.detail.content.message, mode: 'success', redirectUrl: '{{route('affiliate-register')}}', redirectRoute: 'affiliate-register'});
                $dispatch('formerrors', {errors: []});
            } else if (typeof $event.detail.content.errors != undefined) {
                $dispatch('shownotice', {message: $event.detail.content.message, mode: 'error', redirectUrl: null, redirectRoute: null});

            } else{
                $dispatch('formerrors', {errors: $event.detail.content.errors});
            }
            }"
     >
      @csrf
        <div class="relative z-0">
            <input type="text" id="name" name="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="name" class="absolute text-sm font-montmedium text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
        </div>

        <div class="relative z-0 mt-4">
            <input type="email" id="email" name="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="email" class="absolute text-sm font-montmedium text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
        </div>


        <div class="relative z-0 mt-4">
            <input type="phone" id="phone" name="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="phone" class="absolute text-sm font-montmedium text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone</label>
        </div>



      <fieldset class=" z-0 w-full p-px mt-5">
        <legend class=" text-gray-700 font-montmedium text-sm transform  -top-3 origin-0">Are you a social media influencer</legend>
        <div class="block pt-3 pb-2 space-x-4">
          <label>
            <input
              type="radio"
              name="influencer"
              value="1"
              required
              class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"
            />
            Yes
          </label>
          <label>
            <input
              type="radio"
              name="influencer"
              value="0"
              class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"
            />
            No
          </label>
        </div>

      </fieldset>

      <div class="relative z-0 mt-4">
        <input type="text" id="place" name="place" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="place" class="absolute text-sm font-montmedium text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Where are you from ?</label>
    </div>


    <fieldset class=" z-0 w-full p-px mt-5">
        <legend class=" text-gray-700 font-montmedium text-sm transform  -top-3 origin-0">Gender</legend>
        <div class="flex flex-col pt-3 pb-2 space-y-2">
          <label>
            <input
              type="radio"
              name="gender"
              value="male"
              required
              class=" text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"
            />
            Male
          </label>
          <label>
            <input
              type="radio"
              name="gender"
              value="female"
              class=" text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"
            />
            Female
          </label>

          <label>
            <input
              type="radio"
              name="gender"
              value="non-specified"
              class=" text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"
            />
            I'd rather not specify
          </label>

        </div>

      </fieldset>

      <div class="relative z-0 mt-4">
        <input type="number" id="age" name="age" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="age" class="absolute text-sm font-montmedium text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Age</label>
    </div>





      <button
        id="button"
        type="submit"
        class="w-full px-6 py-3 mt-5 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-[#1976BC] hover:shadow-lg focus:outline-none"
      >
        Register
      </button>
    </form>
  </div>
</div>

<script>

</script>

</x-default-layout>
