<div class="pagination float-right">
    @if ($paginator->hasPages())
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <a href="#" class="btn btn-secondary btn-sm disabled" tabindex="-1" role="button" aria-disabled="true">Previous</a>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary btn-sm active" rel="previous" aria-pressed="true">Previous</a>
        @endif

        {{-- Current Page Number --}}
        <span class="mx-3">{{ $paginator->currentPage() }}</span>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-primary btn-sm active" rel="next" aria-pressed="true">Next</a>
        @else
            <a href="#" class="btn btn-secondary btn-sm disabled" tabindex="-1" role="button" aria-disabled="true">Next</a>
        @endif
    @endif
</div>