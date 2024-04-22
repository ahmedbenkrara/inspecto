<div class="sm:px-[20px] md:px-[80px] pt-[100px] pb-[40px] bg-[#f8f4f1]">
    <div class="w-full grid md:grid-cols-2 lg:grid-cols-3 gap-y-5">
        <div>
            <h1 class="text-[28px] font-[700] font-poppins text-[#1e1e2f]">
                Inspecto<div class="bg-[#97c680] ml-[2px] w-[6px] h-[6px] inline-block"></div>
            </h1>
        </div>
        <div>
            <div class="grid grid-cols-2 gap-y-[25px]">
                <a href="{{ url('/search') }}" class="cursor-pointer z-[1] block opacity-90 font-poppins font-[300] text-[16px]">Trouver Auto</a>
                <a href="{{ url('/diagnostics') }}" class="cursor-pointer z-[1] block opacity-90 font-poppins font-[300] text-[16px]">Diagnostique</a>
                <a href="{{ url('/about') }}" class="cursor-pointer z-[1] block opacity-90 font-poppins font-[300] text-[16px]">À Propos</a>
                <a href="{{ url('/contact') }}" class="cursor-pointer z-[1] block opacity-90 font-poppins font-[300] text-[16px]">Contact</a>
            </div>
        </div>
        <div class="md:col-span-2 lg:col-span-1">
            <div class="md:w-full lg:w-fit ml-auto">
                <h1 class="sm:hidden lg:block opacity-90 font-poppins font-[600] text-[17px] text-black">Rejoignez notre communauté</h1>
                    <form class="flex md:w-full lg:w-fit h-fit mt-4" action="/newsletter" method="post">
                        @csrf
                        <input class="input w-full block px-6 py-[16px] outline-none border-[1px]" type="email" name="email" placeholder="Entrer votre email">
                        <button class="block px-4 text-white bg-[#1d6363] font-[500]">GO</button>
                    </form>
                
            </div>
        </div>
    </div>
    <hr class="mt-[70px] mb-[30px]">
    <div class="sm:flex md:hidden gap-x-4 w-fit mx-auto mb-4">
        <div class="social w-[40px] h-[40px] text-black rounded-full border-[1px] cursor-pointer flex items-center justify-center">
            <a target="_blink" href="{{ $footerData['facebook'] }}"><i class="fa-brands fa-facebook-f text-[18px]"></i></a>
        </div>
        <div class="social w-[40px] h-[40px] text-black rounded-full border-[1px] cursor-pointer flex items-center justify-center">
            <a target="_blink" href="{{ $footerData['instagram'] }}"><i class="fa-brands fa-instagram text-[18px]"></i></a>
        </div>
        <div class="social w-[40px] h-[40px] text-black rounded-full border-[1px] cursor-pointer flex items-center justify-center">
            <a target="_blink" href="{{ $footerData['linkedin'] }}"><i class="fa-brands fa-linkedin-in text-[18px]"></i></a>
        </div>
        <div class="social w-[40px] h-[40px] text-black rounded-full border-[1px] cursor-pointer flex items-center justify-center">
            <a target="_blink" href="{{ $footerData['whatsapp'] }}"><i class="fa-brands fa-whatsapp text-[18px]"></i></a>
        </div>
    </div>
    <div class="flex justify-between">
        <div class="flex items-center sm:mx-auto md:mx-0">
            <i class="block fa-solid fa-copyright text-black sm:text-[28px] md:text-[38px]"></i>
            <p class="font-poppins font-[300] sm:text-[14px] md:text-[16px] ml-2">2023 Inspecto. All rights reserved</p>
        </div>
        <div class="sm:hidden md:grid grid-cols-4 gap-x-4">
            <div class="social w-[40px] h-[40px] text-black rounded-full border-[1px] cursor-pointer flex items-center justify-center">
                <a target="_blink" href="{{ $footerData['facebook'] }}"><i class="fa-brands fa-facebook-f text-[18px]"></i></a>
            </div>
            <div class="social w-[40px] h-[40px] text-black rounded-full border-[1px] cursor-pointer flex items-center justify-center">
                <a target="_blink" href="{{ $footerData['instagram'] }}"><i class="fa-brands fa-instagram text-[18px]"></i></a>
            </div>
            <div class="social w-[40px] h-[40px] text-black rounded-full border-[1px] cursor-pointer flex items-center justify-center">
                <a target="_blink" href="{{ $footerData['linkedin'] }}"><i class="fa-brands fa-linkedin-in text-[18px]"></i></a>
            </div>
            <div class="social w-[40px] h-[40px] text-black rounded-full border-[1px] cursor-pointer flex items-center justify-center">
                <a target="_blink" href="{{ $footerData['whatsapp'] }}"><i class="fa-brands fa-whatsapp text-[18px]"></i></a>
            </div>
        </div>
    </div>
</div>