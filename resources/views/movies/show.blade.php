<x-layout>
    <div class="font-[sans-serif] text-[#333]">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 items-center lg:gap-8 gap-4 h-full">
            <div class="max-md:order-1 lg:col-span-2 md:h-screen w-full bg-[#000842] md:rounded-tr-xl md:rounded-br-xl lg:p-12 p-8">
                <img src="https://readymadeui.com/signin-image.webp" class="lg:w-[70%] w-full h-full object-contain block mx-auto" alt="login-image" />
            </div>
            <div class="w-full p-6">
                <form>
                    <div class="mb-12">
                        <h3 class="text-3xl font-extrabold">Movie Name: {{$movie->title}}</h3>
                        <p class="text-sm mt-4 ">Cast: {{$movie->cast}}</p>

                        <p class="text-sm mt-4 ">Producer: {{$movie->producer}}</p>
                        <p class="text-sm mt-4 ">Genre :{{$movie->genre}} </p>
                        <p class="text-sm mt-4 ">Release Date :{{$movie->release_date}} </p>
                        <p class="text-sm mt-4 ">Budget :{{$movie->budget}} </p>
                    </div>


                    <div class="mt-12">

                        <a href="/movies"><button type="button" class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded-full text-black bg-blue-600 hover:bg-blue-700 focus:outline-none">
                            Back
                        </button></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>
