@if ($paginator->hasPages())
    <p class="m-0 text-muted">Showing <span>{{ $paginator->firstItem() }}</span> to <span>{{ $paginator->lastItem() }}</span> of <span>{{ $paginator->total() }}</span> entries</p>
    <ul class="pagination m-0 ms-auto">
        {{-- First Page Link --}}
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <a href="{{ $paginator->url(1) }}" class="page-link" wire:click.prevent="gotoPage(1)"><< First</a>
        </li>

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">< Previous</span>
            </li>
        @else
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link" wire:click.prevent="previousPage">< Previous</a>
            </li>
        @endif

        {{-- Display up to 5 pages before the current page --}}
        @for ($i = max(1, $paginator->currentPage() - 5); $i < $paginator->currentPage(); $i++)
            <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}" wire:click.prevent="gotoPage({{ $i }})">{{ $i }}</a></li>
        @endfor

        {{-- Current Page --}}
        <li class="page-item active"><a class="page-link" href="#">{{ $paginator->currentPage() }}</a></li>

        {{-- Display up to 5 pages after the current page --}}
        @for ($i = $paginator->currentPage() + 1; $i <= min($paginator->currentPage() + 5, $paginator->lastPage()); $i++)
            <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}" wire:click.prevent="gotoPage({{ $i }})">{{ $i }}</a></li>
        @endfor

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" wire:click.prevent="nextPage">Next ></a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">Next ></span>
            </li>
        @endif

        {{-- Last Page --}}
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" wire:click.prevent="gotoPage({{ $paginator->lastPage() }})">Last >></a>
        </li>
    </ul>
@endif
