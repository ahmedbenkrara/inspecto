@extends('layouts.admin')
@section('title')
    Voitures
@endsection

@section('sidebar')
    <x-side-nav />
@endsection

@section('topnav')
  <x-admin-top-nav title="Voitures" />
@endsection

@section('body')

<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 mx-auto flex-0 lg:w-9/12">
            <div class="relative flex flex-col flex-auto min-w-0 p-4 px-8 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <h6 class="mb-0 dark:text-white">Nouvelle voiture</h6>
                <p class="mb-0 leading-normal text-sm">Créer une nouvelle voiture</p>
                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent">
                @if(Session::has('success'))
                    <p class="text-sm w-full px-4 py-3" style="background:#cce5ff; border-radius:6px; color:#004085; border:1px solid #b8daff;">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                    <p class="text-sm w-full px-4 py-3" style="background:#f8d7da; border-radius:6px; color:#721c24; border:1px solid #f5c6cb;">{{ Session::get('error') }}</p>
                @endif
                @if($errors->any())
                    <div class="text-sm w-full px-4 py-3 mb-2" style="background:#f8d7da; border-radius:6px; color:#721c24; border:1px solid #f5c6cb;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <form action="/cars/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="name">Image</label>
                    <div id="imageselector">
                    </div>
                    <input type="file" name="image" id="file" class="hidden">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="mark_id">Marque</label>
                    <select id="mark_id" name="mark_id" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                        <option selected disabled>Sélectionnez une marque</option>
                        @foreach($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="modele_id">Modèle</label>
                    <select id="modele_id" name="modele_id" disabled class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                        <option selected disabled>Sélectionner un modèle</option>
                        @foreach($modeles as $item)
                            <option value="{{ $item->id }}" data-brand="{{ $item->mark->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="motorisation_id">Motorisation</label>
                    <select id="motorisation_id" name="motorisation_id" disabled class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                        <option selected disabled>Sélectionner la motorisation</option>
                        @foreach($motos as $item)
                            <option value="{{ $item->id }}" data-model="{{ $item->modele_id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="generation_id">Génération</label>
                    <select id="generation_id" name="generation_id" disabled class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                        <option selected disabled>Sélectionner une génération</option>
                        @foreach($generations as $item)
                            <option value="{{ $item->id }}" data-model="{{ $item->modele_id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="pricerange_id">Prix</label>
                    <select multiple id="pricerange_id" name="prices[]" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                        <option selected disabled>Sélectionner un prix</option>
                        @foreach($prices as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="inline-block px-6 py-3 m-0 ml-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
#imageselector {
    width: 100px;
    height: 100px;
    border-radius: 10px;
    border: 2px solid #d2d6da;
    position: relative;
    background-size: cover;
    object-fit: cover;
    cursor: pointer;
}

#imageselector::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 20px;
    height: 2px;
    background-color: #d2d6da;
}

#imageselector::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 2px;
    height: 20px;
    background-color: #d2d6da;
}
</style>

<script>
    let selector = document.getElementById('imageselector')
    let file = document.getElementById('file')
    let mark = document.getElementById('mark_id')
    let model = document.getElementById('modele_id')
    let generation = document.getElementById('generation_id')
    let motorisation = document.getElementById('motorisation_id')

    selector.addEventListener('click', () => {
        file.click()
    })

    file.addEventListener('change', (e) => {
        let selectedFile = e.target.files[0]

        if (selectedFile) {
            if (selectedFile.type.match('image.*')) {
                var maxSize = 2 * 1024 * 1024
                if (selectedFile.size <= maxSize) {
                    let image = URL.createObjectURL(selectedFile)
                    selector.style.background = `url(${image})`
                    selector.style.backgroundSize = 'cover'
                } else {
                    alert('La taille du fichier dépasse la limite autorisée (2 Mo)')
                }
            } else {
                alert('Veuillez sélectionner un fichier image valide (JPEG, PNG, JPG ou GIF)')
            }
        }
    })

    mark.addEventListener('change', () => {
        model.disabled = false

        for (var i = 1; i < model.options.length; i++) {
            var modelOption = model.options[i]
            var modelBrand = modelOption.getAttribute("data-brand")

            if (modelBrand === mark.value || mark.value === "") {
                modelOption.style.display = ""
            } else {
                modelOption.style.display = "none"
            }
        }
    })

    model.addEventListener('change', () => {
        generation.disabled = false
        motorisation.disabled = false

        for (var i = 1; i < generation.options.length; i++) {
            var generationOption = generation.options[i];
            var generationModel = generationOption.getAttribute("data-model");

            if (generationModel === model.value || model.value === "") {
                generationOption.style.display = "";
            } else {
                generationOption.style.display = "none";
            }
        }

        for (var j = 1; j < motorisation.options.length; j++) {
            var motorizationOption = motorisation.options[j];
            var motorizationModel = motorizationOption.getAttribute("data-model");

            if (motorizationModel === model.value || model.value === "") {
                motorizationOption.style.display = "";
            } else {
                motorizationOption.style.display = "none";
            }
        }
    })
</script>

@endsection