@extends('layouts.master')
@section('title')
    Page d'accueil | Inspecto
@endsection

@section('header')
    @include('mycomponents.header')
@endsection

@section('body')
<div class="mx-auto sm:w-[95%] lg:w-[85%] my-[100px]">
    <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-x-[20px] gap-y-[20px] sm:mb-[40px] md:mb-[60px]">
        <div class="sm:order-2 md:order-1">
            {{-- <img class="rounded-lg w-full object-cover" src="{{url('/images/services.avif')}}" alt=""> --}}
            <img class="rounded-lg w-full object-cover" src="https://images.unsplash.com/photo-1591278169757-deac26e49555?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80" alt="">
        </div>
        <div class="ml-auto flex items-center sm:order-1 md:order-2">
            <div>
                <div class="text-[#1d6363] bg-[#f0f8ef] font-poppins font-semibold w-fit text-[10px] rounded-lg px-[12px] py-[6px] mb-4">NOS SERVICES</div>
                <h1 class="font-poppins sm:text-[30px] md:text-[28px] lg:text-[35px] lg:w-[400px] font-[500] leading-[40px]">Découvrez nos services automobiles<div class="bg-[#97c680] ml-[4px] w-[6px] h-[6px] inline-block"></div></h1>
                <p class="text-[#686671] font-varelarounded sm:text-[16px] md:text-[14px] lg:text-[16px] lg:w-[420px] sm:mt-[10px] md:mt-[6px] lg:mt-[10px]">Découvrez la gamme complète de services que nous proposons pour simplifier votre expérience d’achat et de possession de voiture.</p>
            </div>
        </div>
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4">
        <div class="">
            <div class="w-[56px] h-[56px] rounded-full bg-white flex items-center mx-auto mb-4 justify-center text-[20px] circlebox ">
                <i class="fa-solid fa-wallet text-[#1d6363]"></i>
            </div>
            <h1 class="break-words font-poppins sm:text-[13px] sm:max-w-[200px] mx-auto md:text-[16px] font-[500] text-center">Recherche de voiture basée sur le budget</h1>
        </div>
        <div class="">
            <div class="w-[56px] h-[56px] rounded-full bg-white flex items-center mx-auto mb-4 justify-center text-[20px] circlebox ">
                <i class="fa-solid fa-car text-[#1d6363]"></i>
            </div>
            <h1 class="break-words font-poppins sm:text-[13px] sm:max-w-[200px] mx-auto md:text-[16px] font-[500] text-center">Diagnostic complet du véhicule</h1>
        </div>
        <div class="">
            <div class="w-[56px] h-[56px] rounded-full bg-white flex items-center mx-auto mb-4 justify-center text-[20px] circlebox ">
                <i class="fa-solid fa-sack-dollar text-[#1d6363]"></i>
            </div>
            <h1 class="break-words font-poppins sm:text-[13px] sm:max-w-[200px] mx-auto md:text-[16px] font-[500] text-center">Conseils et recommandations d'experts</h1>
        </div>
        <div class="">
            <div class="w-[56px] h-[56px] rounded-full bg-white flex items-center mx-auto mb-4 justify-center text-[20px] circlebox ">
                <i class="fa-solid fa-coins text-[#1d6363]"></i>
            </div>
            <h1 class="break-words font-poppins sm:text-[13px] sm:max-w-[200px] mx-auto md:text-[16px] font-[500] text-center">Solutions de financement transparentes</h1>
        </div>
        
    </div>
</div>

<div class="mx-auto sm:w-[95%] lg:w-[85%] mt-[100px] grid md:grid-cols-2 gap-y-[20px]">
    <div class=>
        <div class="text-[#1d6363] bg-[#f0f8ef] font-poppins font-semibold w-fit text-[10px] rounded-lg px-[12px] py-[6px] mb-4">DRIVE</div>
        {{-- <h1 class="font-poppins text-[35px] w-[400px] font-[500] leading-[40px]">Nous sommes votre choix intelligent<div class="bg-[#97c680] ml-[4px] w-[6px] h-[6px] inline-block"></div></h1>
        <p class="text-[#686671] font-varelarounded text-[16px] w-[420px] mt-[10px]">Nous avons pour mission d'apporter de la transparence au monde automobile et de tout vous montrer dès le départ.</p> --}}
        <h1 class="font-poppins sm:text-[30px] md:text-[28px] lg:text-[35px] lg:w-[400px] font-[500] leading-[40px]">Nous sommes votre choix intelligent<div class="bg-[#97c680] ml-[4px] w-[6px] h-[6px] inline-block"></div></h1>
        <p class="text-[#686671] font-varelarounded sm:text-[16px] md:text-[14px] lg:text-[16px] lg:w-[420px] sm:mt-[10px] md:mt-[6px] lg:mt-[10px]">Nous avons pour mission d'apporter de la transparence au monde automobile et de tout vous montrer dès le départ.</p>
    </div>
    <div class="pr-4">
        <div class="bg-[#1d6363] z-[-1] sm:mx-auto md:mr-0 md:ml-auto sm:w-[250px] sm:h-[200px] lg:w-[350px] lg:h-[300px] gradius relative">
            <img class="block absolute w-full bottom-[20px] sm:left-[-40px] lg:left-[-120px]" src="{{url('/images/car.png')}}" alt="">
        </div>
    </div>
</div>

<div class="mt-[40px] pb-[100px]">
    <div class="w-full grid sm:grid-cols-1 md:grid-cols-2 mx-auto sm:w-[95%] lg:w-[85%] pt-[60px]">
        <div>
            <h1 class="sm:text-[30px] lg:text-[40px] font-poppins leading-[45px] max-w-[400px] text-[#1e1e2f]">
                Explore vos outils de voyage en voiture<div class="bg-[#97c680] ml-[2px] w-[6px] h-[6px] inline-block"></div>
            </h1>
        </div>
        <div>
            <p class="font-poppins sm:text-[15px] lg:text-[20px] text-[#1E1E2F] leading-[25px] font-[300] pt-[6px]">Le paysage automobile moderne fixe ses propres règles. Aujourd'hui, être un passionné averti exige plus que de simples connaissances automobiles.</p>
        </div>
    </div>
    <div class="mx-auto sm:w-[95%] lg:w-[85%] mt-[40px] flex sm:flex-col-reverse md:flex-row pb-[60px] gap-y-6">
        <div class="flex items-center">
            <div>
                <div class="flex">
                    <div>
                        <div class="w-[56px] h-[56px] rounded-full bg-white flex items-center justify-center text-[20px] circlebox ">
                            <i class="fa-solid fa-coins text-[#bf8d5c]"></i>
                        </div>
                        <div class="w-[1px] h-[53px] border-l border-[#1E1E2F] border-dashed mx-auto my-[18px]">

                        </div>
                    </div>
                    <div class="ml-[30px]">
                        <h1 class="font-poppins sm:text-[20px] md:text-[17px] lg:text-[20px] text-[#3d3c4a] font-[500] mb-2">Budgetaire</h1>
                        <p class="text-[#686671] font-varelarounded sm:text-[15px] md:text-[14px] lg:text-[16px] w-[200px]">Voitures adaptées à votre budget.</p>
                    </div>
                </div>
                <div class="flex">
                    <div>
                        <div class="w-[56px] h-[56px] rounded-full bg-white flex items-center justify-center text-[20px] circlebox ">
                            <i class="fa-solid fa-brain text-[#6c749d]"></i>
                        </div>
                        <div class="w-[1px] h-[53px] border-l border-[#1E1E2F] border-dashed mx-auto my-[18px]">

                        </div>
                    </div>
                    <div class="ml-[30px]">
                        <h1 class="font-poppins sm:text-[20px] md:text-[17px] lg:text-[20px] text-[#3d3c4a] font-[500] mb-2">Diagnostics</h1>
                        <p class="text-[#686671] font-varelarounded sm:text-[15px] md:text-[14px] lg:text-[16px] w-[200px]">Infos pour l'entretien précis.</p>
                    </div>
                </div>
                <div class="flex">
                    <div>
                        <div class="w-[56px] h-[56px] rounded-full bg-white flex items-center justify-center text-[20px] circlebox ">
                            <i class="fa-solid fa-bolt text-[#a969a9]"></i>
                        </div>
                    </div>
                    <div class="ml-[30px]">
                        <h1 class="font-poppins sm:text-[20px] md:text-[17px] lg:text-[20px] text-[#3d3c4a] font-[500] mb-2">Auto-Allié</h1>
                        <p class="text-[#686671] font-varelarounded sm:text-[15px] md:text-[14px] lg:text-[16px] w-[200px]">Expert en Confiance Automobile Total.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex items-center">
            {{-- <img class="w-[90%] h-[450px] ml-auto object-cover rounded-lg" src="{{url('/images/center.avif')}}" alt=""> --}}
            <img class="sm:w-full md:w-[90%] sm:h-[250px] md:h-[300px] lg:h-[450px] ml-auto object-cover rounded-lg" src="https://images.unsplash.com/photo-1526726538690-5cbf956ae2fd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="">
        </div>
    </div>
</div>
</div>
@endsection

@section('styles')
<style>
    .circlebox{
        box-shadow: 0 4px 40px 0 #0000000d;
    }

    .gradius{
        border-radius: 30% 70% 25% 75% / 64% 20% 80% 36% ;
    }
</style>
@endsection