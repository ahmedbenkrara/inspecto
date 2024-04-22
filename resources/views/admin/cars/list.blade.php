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

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6>Liste des voitures</h6>
        </div>
        <input type="hidden" id="success-message" value="{{ Session::has('success') ? Session::get('success') : '' }}">
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
              <thead class="align-bottom">
                <tr>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">#</th>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Image</th>
                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Marque</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Modèle</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Motorisation</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Génération</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Actions</th>
                </tr>
              </thead>
              <tbody>
                @php 
                  $i = 1;
                @endphp
                @foreach($cars as $key => $item)
                <tr>
                  <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight">{{ ($key+1) }}</p>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <img class="image rounded-md object-cover" src="{{ $item->image }}" alt="">
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->motorisation->modele->mark->name }}</p>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->motorisation->modele->name }}</p>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->motorisation->name }}</p>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->generation ? $item->generation->name : '-' }}</p>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <form action="{{ route('cars.delete', $item->id) }}" method="post" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer cette voiture ?')">
                      @csrf
                      @method('DELETE')
                      <a href="/cars/edit/{{$item->id}}" class="text-xs font-semibold leading-tight text-slate-400 mx-2">Modifier</a>
                      <button type="submit" class="text-xs font-semibold leading-tight text-slate-400">Supprimer</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $cars->links('vendor.pagination.default') }}
          </div>
        </div>
      </div>
    </div>
</div>

<script>
    var successMessage = document.getElementById('success-message').value;

    if (successMessage !== '') {
        alert(successMessage);
    }
</script>

<style>
    .image{
        width: 120px;
        height: 60px;
    }
</style>
@endsection