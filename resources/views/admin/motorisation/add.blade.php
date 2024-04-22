@extends('layouts.admin')
@section('title')
    Motorisations
@endsection

@section('sidebar')
    <x-side-nav />
@endsection

@section('topnav')
  <x-admin-top-nav title="Motorisations" />
@endsection

@section('body')

<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 mx-auto flex-0 lg:w-9/12">
            <div class="relative flex flex-col flex-auto min-w-0 p-4 px-8 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <h6 class="mb-0 dark:text-white">Nouvelle motorisation</h6>
                <p class="mb-0 leading-normal text-sm">Créer une nouvelle motorisation</p>
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
                <form action="/motorisations/create" method="post">
                    @csrf
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="name">Nom de la motorisation</label>
                    <input type="text" id="name" value="{{old('name')}}" name="name" placeholder="" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    <label class="mt-4 inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="type">Type de motorisation</label>
                    <select id="type" name="type" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                        <option selected disabled>Sélectionner un type</option>
                        <option value="essence">Essence</option>
                        <option value="diesel">Diesel</option>
                        <option value="electrique">Electrique</option>
                        <option value="hybrid">Hybrid</option>
                    </select>
                    <label class="mt-4 inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="modele_id">Nom du modèle</label>
                    <select id="modele_id" name="modele_id" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                        <option selected disabled>Sélectionner un modèle</option>
                        @foreach($modeles as $item)
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
@endsection