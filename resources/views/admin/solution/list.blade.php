@extends('layouts.admin')
@section('title')
    Solutions
@endsection

@section('sidebar')
    <x-side-nav />
@endsection

@section('topnav')
    <x-admin-top-nav title="Solutions" />
@endsection

@section('body')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="bg-white border border-gray-200 rounded-lg shadow-xl">
            <div class="p-6 border-b border-gray-200">
                <h6 class="text-lg font-semibold">Liste des solutions</h6>
            </div>
            <input type="hidden" id="success-message" value="{{ Session::has('success') ? Session::get('success') : '' }}">
            <div class="p-4">
                <div class="table-container overflow-x-scroll max-w-screen-md">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">#</th>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Problème</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Date de création</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($solutions as $key => $item)
                                <tr>
                                    <td class="px-6 py-3 text-xs text-center">{{ $key + 1 }}</td>
                                    <td class="px-6 py-3 text-xs">{{ $item->problem->name }}</td>
                                    <td class="px-6 py-3 text-xs max-w-xs">
                                        <p class="break-all">{{ strlen($item->description) > 200 ? substr($item->description, 0, 200) . '...' : $item->description }}</p>
                                    </td>
                                    <td class="px-6 py-3 text-xs text-center">
                                        <form action="{{ route('solutions.delete', $item->id) }}" method="post"
                                            onsubmit="return confirm('Etes-vous sûr de vouloir supprimer cette solution ?')">
                                            @csrf
                                            @method('DELETE')
                                            <a href="/solutions/edit/{{ $item->id }}" class="text-xs text-slate-400 mx-2">Modifier</a>
                                            <button type="submit" class="text-xs text-slate-400">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $solutions->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>

<style>
/* Add any custom styles here if needed */
.table-container {
    max-width: 100%;
    overflow-x: auto;
}
</style>

<script>
    var successMessage = document.getElementById('success-message').value;

    if (successMessage !== '') {
        alert(successMessage);
    }
</script>
@endsection
