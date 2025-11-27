@if ($paginator->hasPages())
    <nav class="glass-pagination" role="navigation" aria-label="Pagination">
        <ul class="glass-pagination__list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="glass-pagination__item disabled" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <span class="glass-pagination__link" aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li class="glass-pagination__item">
                    <a class="glass-pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="glass-pagination__item disabled" aria-disabled="true"><span class="glass-pagination__link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="glass-pagination__item active" aria-current="page"><span class="glass-pagination__link">{{ $page }}</span></li>
                        @else
                            <li class="glass-pagination__item"><a class="glass-pagination__link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="glass-pagination__item">
                    <a class="glass-pagination__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next') }}">&raquo;</a>
                </li>
            @else
                <li class="glass-pagination__item disabled" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span class="glass-pagination__link" aria-hidden="true">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
