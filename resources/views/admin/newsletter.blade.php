@extends('layouts.admin')
@section('title')
    NewsLetter
@endsection

@section('sidebar')
    <x-side-nav />
@endsection

@section('topnav')
  <x-admin-top-nav title="NewsLetter" />
@endsection

@section('body')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6>Liste des NewsLetters</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
          <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
              <thead class="align-bottom">
                <tr>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">#</th>
                  <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Email</th>
                  <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Date de création</th>
                </tr>
              </thead>
              <tbody>
                @php 
                  $i = 1;
                @endphp
                @foreach($emails as $key => $item)
                  @if($i == 5)
                    @php 
                      $i = 1;
                    @endphp
                  @endif
                <tr>
                    <td class="p-4 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight">{{ ($key+1) }}</p>
                    </td>
                    <td class="p-4 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->email }}</p>
                    </td>
                    <td class="p-4 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <p class="mb-0 text-xs font-semibold leading-tight">{{ $item->created_at->format('Y-m-d') }}</p>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $emails->links('vendor.pagination.default') }}
          </div>
        </div>
      </div>
    </div>
</div>
@endsection