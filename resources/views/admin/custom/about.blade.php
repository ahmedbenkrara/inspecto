@extends('layouts.admin')
@section('title')
    Personnalisation
@endsection

@section('sidebar')
    <x-side-nav />
@endsection

@section('topnav')
  <x-admin-top-nav title="Personnalisation" />
@endsection

@section('body')

<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 mx-auto flex-0 lg:w-9/12">
            <div class="relative flex flex-col flex-auto min-w-0 p-4 px-8 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <h6 class="mb-0 dark:text-white">Page À propos de nous</h6>
                <p class="mb-0 leading-normal text-sm">Modifier à propos de nous</p>
                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent">
                @if(Session::has('success'))
                    <p class="text-sm w-full px-4 py-3" style="background:#cce5ff; border-radius:6px; color:#004085; border:1px solid #b8daff;">{{ Session::get('success') }}</p>
                @endif
                @if(Session::has('error'))
                    <p class="text-sm w-full px-4 py-3" style="background:#f8d7da; border-radius:6px; color:#721c24; border:1px solid #f5c6cb;">{{ Session::get('error') }}</p>
                @endif
                <form action="{{ route('custom.update') }}" method="post">
                    @csrf
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="who">Qui sommes nous</label>
                    <textarea id="who" name="who" class="textarea focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">{{ $jsonData['who'] }}</textarea>
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="mission">Notre mission</label>
                    <textarea id="mission" name="mission" class="textarea focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">{{ $jsonData['mission'] }}</textarea>
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="service">Nos services</label>
                    <textarea id="service" name="services" class="textarea focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">{{ $jsonData['services'] }}</textarea>
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="why">Pourquoi nous choisir</label>
                    <textarea id="why" name="why" class="textarea focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">{{ $jsonData['why'] }}</textarea>
                    <textarea name="why1" class="textarea focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">{{ $jsonData['why1'] }}</textarea>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="inline-block px-6 py-3 m-0 ml-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 mx-auto flex-0 lg:w-9/12">
            <div class="relative flex flex-col flex-auto min-w-0 p-4 px-8 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <h6 class="mb-0 dark:text-white">Réseaux sociaux</h6>
                <p class="mb-0 leading-normal text-sm">Modifier les liens des réseaux sociaux</p>
                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent">
                <form action="{{ route('custom.social') }}" method="post">
                    @csrf
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="facebook">Facebook</label>
                    <input type="text" id="facebook" value="{{ $jsonData['facebook'] }}" name="facebook" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="facebook">Instagram</label>
                    <input type="text" id="instagram" value="{{ $jsonData['instagram'] }}" name="instagram" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="facebook">Linkedin</label>
                    <input type="text" id="linkedin" value="{{ $jsonData['linkedin'] }}" name="linkedin" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="facebook">Whatsapp</label>
                    <input type="text" id="whatsapp" value="{{ $jsonData['whatsapp'] }}" name="whatsapp" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="inline-block px-6 py-3 m-0 ml-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .textarea{
        height: 200px;
        resize: none;
        margin-bottom: 10px;
    }
</style>
@endsection