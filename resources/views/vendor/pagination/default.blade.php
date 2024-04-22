@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center">
        <ul class="pagination flex">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled px-3 py-2 font-bold text-sm text-gray-400" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>
                </li>
            @else
                <li class="px-3 py-2 font-bold text-sm text-black">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa-solid fa-angle-left"></i></a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="px-3 py-2 font-bold text-sm text-black">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa-solid fa-angle-right"></i></a>
                </li>
            @else
                <li class="disabled px-3 py-2 font-bold text-sm text-gray-400" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>
                </li>
            @endif
        </ul>
        <span class="h-fit text-sm ml-2">Montrant  <span class="font-bold">{{ $paginator->currentPage() }} - {{ $paginator->lastPage() }}</span> sur <span class="font-bold">{{ $paginator->total() }}</span></span>
    </nav>
@endif
