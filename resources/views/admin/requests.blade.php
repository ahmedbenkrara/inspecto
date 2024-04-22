@extends('layouts.admin')
@section('title')
    Demandes
@endsection

@section('sidebar')
    <x-side-nav />
@endsection

@section('topnav')
  <x-admin-top-nav title="Demandes" />
@endsection

@section('body')
<div class="w-full mx-auto mb-4">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 mx-auto flex-0 lg:w-9/12">
            <div class="relative flex flex-col flex-auto min-w-0 p-4 px-8 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <h6 class="mb-0 dark:text-white">Recherche</h6>
                <p class="mb-0 leading-normal text-sm">Recherche par téléphone</p>
                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent">
                <form action="/requests" method="GET">
                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="phone">Téléphone</label>
                    <input type="text" id="phone" value="{{old('phone')}}" name="phone" placeholder="" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="inline-block px-6 py-3 m-0 ml-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex justify-between p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6>Liste des demandes</h6>
          <div class="flex-none my-auto text-right lg:w-1/2 lg:flex-none">
            <div class="relative pr-6 lg:float-right">
              <a dropdown-trigger class="cursor-pointer" aria-expanded="false">
                <i class="fa fa-ellipsis-v text-slate-400"></i>
              </a>
              <p class="hidden transform-dropdown-show"></p>
              <ul dropdown-menu class="z-100 text-sm transform-dropdown shadow-soft-3xl duration-250 before:duration-350 before:font-awesome before:ease-soft min-w-44 -ml-34 before:text-5.5 pointer-events-none absolute top-0 m-0 mt-2 list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:top-0 before:right-7 before:left-auto before:z-40 before:text-white before:transition-all before:content-['\f0d8']">
                <li class="relative">
                  <form action="/requests/export" method="get">
                    @csrf
                    <button type="submit" class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 lg:transition-colors lg:duration-300">exporter Excel</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">#</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Prénom</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Phone</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Problème</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Marque</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Modèle</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Motorisation</th>
                  <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Génération</th>
                </tr>
              </thead>
              <tbody>
                @php 
                  $i = 1;
                @endphp
                @foreach($requests as $key => $item)
                  @if($i == 5)
                    @php 
                      $i = 1;
                    @endphp
                  @endif
                <tr>
                    <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight">{{ ($key+1) }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight text-center">{{ $item->fname }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 text-xs font-semibold leading-tight text-center">{{ $item->phone }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                      <a href="/problems/edit/{{$item->problem->id}}" class="text-xs font-semibold leading-tight text-slate-400 mx-2">Problème</a>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->car->motorisation->modele->mark->name ?? '' }}</p>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->car->motorisation->modele->name ?? ''}}</p>
                    </td>
                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->car->motorisation->name ?? ''}}</p>
                    </td>
                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->car->generation->name ?? '-' }}</p>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $requests->links('vendor.pagination.default') }}
          </div>
        </div>
      </div>
    </div>
</div>
@endsection