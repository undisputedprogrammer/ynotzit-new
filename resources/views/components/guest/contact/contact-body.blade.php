<div class="mt-10 lg:flex justify-center items-start space-y-6 xl:w-[92%] 2xl:w-[75%] mx-auto">

    <div class=" lg:flex flex-col justify-start items-start lg:w-[40%]">

        {{-- dudu section --}}
        <div class=" order-1 md:w-[40%] lg:w-[26%]  xl:w-[23%] 2xl:w-[30%]    transition ease-in-out mx-auto">
            <div class=" relative mt-[9rem] sm:mt-[8rem] lg:mt-[8rem] xl:mt-[10rem] ml-16 lg:-ml-16 ">
                <div class=" w-fit sm:mx-auto ">
                    <img class=" w-20 sm:w-20   lg:w-24 xl:w-28 2xl:w-28 translate-x-3 sm:-translate-x-24" src="{{asset('images/home/dudu-5.png')}}" alt="Our dearest Dudu">
                </div>

                <img class="absolute w-36 md:w-40 lg:w-44 xl:w-48 2xl:w-52 left-[5.4rem] sm:left-[41%] md:left-[32%] lg:left-[33%] xl:left-[32%] 2xl:left-[38%] bottom-[75%]" src="{{asset('images/home/Contact dialog.png')}}" alt="Dudu speaking">

            </div>

        </div>

        {{-- address section --}}
        <div class=" order-2 relative h-fit hidden lg:flex flex-col w-[90%] sm:w-[80%]   mx-auto my-8 2xl:ml-8">
            <div class=" w-16 aspect-square absolute rounded-full left-0 bg-pink-200 ">

            </div>
            <div class=" z-20 ml-4 xl:ml-6 my-5">
                <h1 class=" font-inter_bold   text-lg xl:text-xl">Our Address

                </h1>
                <p class=" font-inter_medium text-gray-600 text-sm xl:text-base ">YNOTZ IT Solutions Private Limited</p>
                <p class=" font-inter_medium text-gray-600 text-sm xl:text-base ">FS-6, Heavenly Plaza</p>
                <p class=" font-inter_medium text-gray-600 text-sm xl:text-base ">Padamugal, Kakkanad, Kochi-682021</p>
                <p class="font-inter_medium text-gray-600 text-sm xl:text-base flex items-center">
                    <img class="w-5 h-5" src="{{asset('images/icons/phone.svg')}}" alt="">
                    +91 9497344553
                </p>
            </div>

        </div>

    </div>


    <div class=" w-[90%] sm:w-[80%] lg:w-[55%] 2xl:w-[45%] mx-auto mt-6">
        <h1 class=" font-inter_bold text-2xl z-20  sm:text-3xl lg:text-4xl 2xl:text-5xl ">Get in touch with us</h1>

        {{-- contact form --}}
        <form action="" class="w-full bg-white px-4 py-6 my-5 border border-black rounded-2xl flex flex-col space-y-3 shadow-lg shadow-gray-200 transition duration-200 hover:scale-[100.3%] hover:shadow-gray-400">

            {{-- name --}}
            <div class="relative">
                <input type="text" id="name" name="name" class="block px-3 py-2  w-full  text-gray-900 bg-transparent  border-1 border-black rounded-2xl appearance-none    focus:outline-none focus:ring-0 z-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="name" class="absolute bg-white font-inter_medium text-gray-500  duration-300 transform -translate-y-4 scale-75 top-2 z-20 origin-[0] bg-whitepx-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-4">Name</label>
            </div>

            {{-- email --}}
            <div class="relative">
                <input type="email" id="email" name="email" class="block px-3 py-2  w-full  text-gray-900 bg-transparent  border-1 border-black rounded-2xl appearance-none    focus:outline-none focus:ring-0 z-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="email" class="absolute bg-white font-inter_medium text-gray-500  duration-300 transform -translate-y-4 scale-75 top-2 z-20 origin-[0] bg-whitepx-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-4">Email ID</label>
            </div>

            {{-- phone --}}
            <div class=" flex justify-between w-full">
                <select name="country " id="country" class="border-black text-gray-600 font-inter_regular border py-2 rounded-2xl w-[33%]">
                    <option value="India" selected>India</option>
                    <option value="Pak">Pakistan</option>
                </select>
                <div class="relative w-[65%]">
                    <input type="phone" id="phone" name="phone" class="block px-3 py-2.5  w-full  text-gray-900 bg-transparent  border border-black rounded-2xl appearance-none    focus:outline-none focus:ring-0 z-0 focus:border-blue-600 peer" placeholder=" " />
                    <label for="phone" class="absolute bg-white font-inter_medium text-gray-500  duration-300 transform -translate-y-4 scale-75 top-2 z-20 origin-[0] bg-whitepx-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-4">Phone</label>
                </div>
            </div>

            {{-- company --}}
            <div class="relative">
                <input type="text" name="company" id="company" class="block px-3 py-2  w-full  text-gray-900 bg-transparent  border-1 border-black rounded-2xl appearance-none    focus:outline-none focus:ring-0 z-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="company" class="absolute bg-white font-inter_medium text-gray-500  duration-300 transform -translate-y-4 scale-75 top-2 z-20 origin-[0] bg-whitepx-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-4">Company</label>
            </div>

            {{-- requirements --}}
            <div class=" border border-black rounded-2xl px-2 py-1">
                <textarea id="req" name="mesage" rows="4" class="w-full px-0   border-0  focus:ring-0  font-inter_regular" placeholder="Tell us about your requirements..." required></textarea>
            </div>


            <button type="submit" class=" self-center font-inter_bold rounded-full w-[30%] text-center py-2 border-2 border-black ">Let's talk</button>
        </form>
    </div>


        <div class=" lg:hidden relative h-fit  flex flex-col w-[90%] sm:w-[80%] xl:w-[86%] mx-auto my-8">
            <div class=" w-16 aspect-square absolute rounded-full left-0 bg-pink-200 ">

            </div>
            <div class=" z-20 ml-4 my-5">
                <h1 class=" font-inter_bold   text-lg ">Our Address

                </h1>
                <p class=" font-inter_medium text-gray-600 text-sm ">YNOTZ IT Solutions Private Limited</p>
                <p class=" font-inter_medium text-gray-600 text-sm ">FS-6, Heavenly Plaza</p>
                <p class=" font-inter_medium text-gray-600 text-sm ">Padamugal, Kakkanad, Kochi-682021</p>
                <p class="font-inter_medium text-gray-600 text-sm xl:text-base flex items-center">
                    <img class="w-5 h-5" src="{{asset('images/icons/phone.svg')}}" alt="">
                    +91 9497344553
                </p>
            </div>

        </div>





</div>
