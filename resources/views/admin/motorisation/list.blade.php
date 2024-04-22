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

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6>Liste des motorisations</h6>
        </div>
        <input type="hidden" id="success-message" value="{{ Session::has('success') ? Session::get('success') : '' }}">
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">#</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Motorisation</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Type</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Modèle</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Actions</th>
                </tr>
              </thead>
              <tbody>
                @php 
                  $i = 1;
                @endphp
                @foreach($motorisations as $key => $item)
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
                    <div class="flex px-2 py-1">
                        <div>
                          <img src="https://img.freepik.com/vecteurs-libre/logo-concessionnaire-automobile-design-plat_23-2149337943.jpg?w=740&t=st=1696113372~exp=1696113972~hmac=f42afba95eb2bd1689f944948b2134621ec9b1027aed97319c9fdcb00bdada68" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user1" />
                        </div>
                        <div class="flex flex-col justify-center">
                          <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->name }}</p>
                        </div>
                      </div>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->type }}</p>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->modele->name }}</p>
                  </td>
                  <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <form action="{{ route('motorisations.delete', $item->id) }}" method="post" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer cette motorisation ?')">
                      @csrf
                      @method('DELETE')
                      <a href="/motorisations/edit/{{$item->id}}" class="text-xs font-semibold leading-tight text-slate-400 mx-2">Modifier</a>
                      <button type="submit" class="text-xs font-semibold leading-tight text-slate-400">Supprimer</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $motorisations->links('vendor.pagination.default') }}
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
@endsection