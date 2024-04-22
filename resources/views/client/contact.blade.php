@extends('layouts.master')
@section('title')
    Contact | Inspecto
@endsection
@section('body')
<div class="w-full h-fit bg-white">
    <div class="sm:w-[90%] md:w-[80%] lg:w-[70%] mx-auto py-[50px] flex items-center">
        <div class="mr-[10%] w-[1px] h-[150px] bg-gray-200 sm:hidden md:block">
            <div class="w-[1px] h-[100px] bg-black"></div>
        </div>
        <div class="w-full">
            <h1 class="font-poppins font-[600] sm:text-[20px] md:text-[25px]">Nous adorons vous lire,</h1>
            <h1 class="font-poppins font-[600] sm:text-[20px] md:text-[25px]">Contactez-nous 👋</h1>
            @if(Session::has('success'))
                <p class="text-sm w-full px-4 py-3 mt-4" style="background:#cce5ff; color:#004085; border:1px solid #b8daff;">{{ Session::get('success') }}</p>
            @endif
            <form action="/contact" method="post" class="mt-[30px]">
                @csrf
                <div class="flex gap-x-[20px]">
                    <div class="w-1/2">
                        <label for="fname" class="block font-varelarounded sm:text-[13px] md:text-[14px] mb-[4px]">Prenom</label>
                        <input id="fname" name="fname" class="bg-[#fafafa] w-full block sm:text-[14px] md:text-[16px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px]" type="text" placeholder="Prenom">
                    </div>
                    <div class="w-1/2">
                        <label for="lname" class="block font-varelarounded sm:text-[13px] md:text-[14px] mb-[4px]">Nom</label>
                        <input id="lname" name="lname" class="bg-[#fafafa] w-full block sm:text-[14px] md:text-[16px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px]" type="text" placeholder="Nom">
                    </div>
                </div>
                <div class="flex gap-x-[20px] mt-[20px]">
                    <div class="w-1/2">
                        <label for="subject" class="block font-varelarounded sm:text-[13px] md:text-[14px] mb-[4px]">Sujet</label>
                        <input id="subject" name="sujet" class="bg-[#fafafa] w-full block sm:text-[14px] md:text-[16px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px]" type="text" placeholder="Sujet">
                    </div>
                    <div class="w-1/2">
                        <label for="email" class="block font-varelarounded sm:text-[13px] md:text-[14px] mb-[4px]">Email</label>
                        <input id="email" name="email" class="bg-[#fafafa] w-full block sm:text-[14px] md:text-[16px] sm:px-[12px] sm:py-[6px] md:px-4 md:py-2 outline-none border-[1px]" type="text" placeholder="Email">
                    </div>
                </div>
                <div class="mt-[20px]">
                    <label for="message" class="block font-varelarounded sm:text-[13px] md:text-[14px] mb-[4px]">Message</label>
                    <textarea name="message" id="message" class="bg-[#fafafa] w-full block sm:text-[14px] md:text-[16px] sm:px-[12px] sm:py-[4px] md:px-4 md:py-2 h-[150px] outline-none border-[1px] resize-none" placeholder="Message"></textarea>
                </div>
                <div class="mt-[20px]">
                    <div class="sm:w-full md:w-1/2 md:pr-[20px]">
                        <button type="submit" class="btnhover w-full bg-black text-white sm:text-[14px] md:text-[16px] sm:px-4 sm:py-[6px] md:px-4 md:py-[9px] font-varelarounded text-[14px]">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection