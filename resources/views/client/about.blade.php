@extends('layouts.master')
@section('title')
    À propos de nous | Inspecto
@endsection
@section('body')
<div class="w-full h-fit bg-white pb-[60px]">
    <div class="sm:hidden md:block pt-4 mb-[40px] sm:w-[95%] md:w-[90%] lg:w-[80%] mx-auto">
        <p class="text-[25px] font-varelarounded w-fit mx-auto">Vous pouvez toujours <b>compter sur</b></p>
        <p class="text-[25px] font-varelarounded w-fit mx-auto"><b>nous</b> pendant votre voyage</p>
    </div>
    <div class="sm:w-[95%] md:w-[90%] lg:w-[80%] h-fit mx-auto grid grid-cols-2 sm:gap-x-[10px] md:gap-x-4">
        <div>
            <img class="rounded-lg sm:h-[300px] md:h-[400px] lg:h-[500px] w-full" src="https://images.pexels.com/photos/4623506/pexels-photo-4623506.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
        </div>
        <div class="sm:h-[300px] md:h-[400px] lg:h-[500px]">
            <div class="sm:mb-[10px] md:mb-4">
                <img class="rounded-lg sm:h-[145px] md:h-[192px] lg:h-[242px] w-full object-cover" src="https://images.unsplash.com/photo-1591278169757-deac26e49555?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80" alt="">
            </div>
            <div>
                <img class="rounded-lg sm:h-[145px] md:h-[192px] lg:h-[242px] w-full object-cover" src="https://images.unsplash.com/photo-1526726538690-5cbf956ae2fd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="">
            </div>
        </div>
    </div>
    {{-- <div class="w-[60%] mx-auto font-poppins">
        <h1 class="text-[20px] mt-[40px] font-[600] text-center">Qui sommes nous ?</h1>
        <p class="text-[16px]">
            Bienvenue chez inspecto, votre destination unique pour tout ce qui concerne l'automobile !
            Nous ne sommes pas qu'un site web; nous sommes vos compagnons de confiance dans le monde de l'automobile.
            Dédié à rendre votre voyage automobile plus fluide, plus intelligent et plus satisfaisant.
        </p>
    </div> --}}

    <div class="sm:w-[95%] md:w-[90%] lg:w-[80%] mx-auto mt-[40px]">
        <h1 class="font-poppins font-[700] sm:text-[18px] md:text-[20px] text-center">Apprenez à nous connaître davantage</h1>
            
        <div class="grid grid-cols-2 sm:gap-x-[10px] md:gap-x-[20px] mt-5">
            @if($jsonData == null)
                
                <div>
                    <div>
                        <h2 class="font-poppins font-[700] sm:text-[14px] md:sm:text-[14px] md:text-[15px]">Qui sommes nous</h2>
                        <p class="text-[#686671] font-varelarounded sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            Chez inspecto, nous sommes votre référence pour tout ce qui concerne l'automobile ! Nous ne sommes pas seulement un site Web ; nous sommes vos compagnons automobiles de confiance, là pour rationaliser et améliorer votre voyage en voiture.
                        </p>
                    </div>
                    <div class="mt-[20px]">
                        <h2 class="font-poppins font-[700] sm:text-[14px] md:text-[15px]">Notre mission</h2>
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            Notre mission chez inspecto est claire : offrir aux passionnés de voitures, aux acheteurs et aux propriétaires des solutions innovantes qui simplifient leurs expériences automobiles. Notre objectif est de vous aider à trouver la voiture adaptée à vos besoins et à votre budget tout en vous assurant d'avoir accès à des diagnostics et à des informations d'entretien de premier ordre.
                        </p>
                    </div>
                    <div class="mt-[20px]">
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            Chez inspecto, nous ne nous occupons pas seulement des voitures ; nous parlons de vous et de votre parcours automobile. Que vous soyez à la recherche de la voiture de vos rêves ou que vous ayez besoin d'aide avec votre véhicule actuel, nous sommes là pour rendre votre expérience fluide, sans tracas et agréable. Rejoignez notre communauté de passionnés d'automobile dès aujourd'hui et découvrez comment nous pouvons améliorer vos aventures liées à l'automobile !
                        </p>
                    </div>
                </div>

                <div>
                    <div>
                        <h2 class="font-poppins font-[700] sm:text-[14px] md:text-[15px]">Nos services</h2>
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            Débordé par les choix de voitures ? Notre système de recommandation intelligent utilise des algorithmes de pointe pour faire correspondre votre budget avec le véhicule parfait. Qu'il s'agisse d'une berline élégante, d'un SUV robuste ou d'un hybride écologique, nous sommes là pour vous.
                        </p>
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            Les ennuis de voiture vous stressent ? Nos services de diagnostic et de maintenance fournissent des conseils d'experts, des didacticiels étape par étape et des guides de dépannage. Que vous soyez un réducteur chevronné ou un bricoleur novice, nous avons ce qu'il vous faut.
                        </p>
                    </div>
                    <div class="mt-[20px]">
                        <h2 class="font-poppins font-[700] sm:text-[14px] md:text-[15px]">Pourquoi nous choisir</h2>
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            <b>Expertise :</b> Notre équipe est composée d’experts passionnés de l’automobile fournissant des informations précises et à jour.
                        </p>
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            <b>Centré sur l'utilisateur :</b> nous priorisons vos besoins, en adaptant les recommandations et les solutions juste pour vous.
                        </p>
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            <b>Innovation :</b> nous nous engageons à rester à l'avant-garde en matière de technologie, en nous améliorant continuellement pour répondre à l'évolution de vos besoins automobiles.
                        </p>
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            <b>Fiabilité :</b> des informations et des recommandations fiables sont notre promesse.
                        </p>
                    </div>
                </div>
            @else                
                <div>
                    <div>
                        <h2 class="font-poppins font-[700] sm:text-[14px] md:sm:text-[14px] md:text-[15px]">Qui sommes nous</h2>
                        <p class="text-[#686671] font-varelarounded sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            {{ $jsonData['who'] != null ? $jsonData['who'] : "Chez inspecto, nous sommes votre référence pour tout ce qui concerne l'automobile ! Nous ne sommes pas seulement un site Web ; nous sommes vos compagnons automobiles de confiance, là pour rationaliser et améliorer votre voyage en voiture." }}
                        </p>
                    </div>
                    <div class="mt-[20px]">
                        <h2 class="font-poppins font-[700] sm:text-[14px] md:text-[15px]">Notre mission</h2>
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            {{ $jsonData['mission'] != null ? $jsonData['mission'] : "Notre mission chez inspecto est claire : offrir aux passionnés de voitures, aux acheteurs et aux propriétaires des solutions innovantes qui simplifient leurs expériences automobiles. Notre objectif est de vous aider à trouver la voiture adaptée à vos besoins et à votre budget tout en vous assurant d'avoir accès à des diagnostics et à des informations d'entretien de premier ordre." }}
                        </p>
                    </div>
                    <div class="mt-[20px]">
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            {{ $jsonData['why1'] != null ? $jsonData['why1'] : "Chez inspecto, nous ne nous occupons pas seulement des voitures ; nous parlons de vous et de votre parcours automobile. Que vous soyez à la recherche de la voiture de vos rêves ou que vous ayez besoin d'aide avec votre véhicule actuel, nous sommes là pour rendre votre expérience fluide, sans tracas et agréable. Rejoignez notre communauté de passionnés d'automobile dès aujourd'hui et découvrez comment nous pouvons améliorer vos aventures liées à l'automobile !" }}
                        </p>
                    </div>
                </div>

                <div>
                    <div>
                        <h2 class="font-poppins font-[700] sm:text-[14px] md:text-[15px]">Nos services</h2>
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            {{ $jsonData['services'] != null ? $jsonData['services'] : "Débordé par les choix de voitures ? Notre système de recommandation intelligent utilise des algorithmes de pointe pour faire correspondre votre budget avec le véhicule parfait. Qu'il s'agisse d'une berline élégante, d'un SUV robuste ou d'un hybride écologique, nous sommes là pour vous." }}
                        </p>
                        {{-- <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            Les ennuis de voiture vous stressent ? Nos services de diagnostic et de maintenance fournissent des conseils d'experts, des didacticiels étape par étape et des guides de dépannage. Que vous soyez un réducteur chevronné ou un bricoleur novice, nous avons ce qu'il vous faut.
                        </p> --}}
                    </div>
                    <div class="mt-[20px]">
                        <h2 class="font-poppins font-[700] sm:text-[14px] md:text-[15px]">Pourquoi nous choisir</h2>
                        @if($jsonData['why'])
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            {{ $jsonData['why'] }}
                        </p>
                        @else
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            <b>Expertise :</b> Notre équipe est composée d’experts passionnés de l’automobile fournissant des informations précises et à jour.
                        </p>
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            <b>Centré sur l'utilisateur :</b> nous priorisons vos besoins, en adaptant les recommandations et les solutions juste pour vous.
                        </p>
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            <b>Innovation :</b> nous nous engageons à rester à l'avant-garde en matière de technologie, en nous améliorant continuellement pour répondre à l'évolution de vos besoins automobiles.
                        </p>
                        <p class="text-[#686671] font-poppins sm:text-[12px] md:text-[14px] sm:mt-[6px] md:mt-2">                    
                            <b>Fiabilité :</b> des informations et des recommandations fiables sont notre promesse.
                        </p>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
    
</div>
@endsection