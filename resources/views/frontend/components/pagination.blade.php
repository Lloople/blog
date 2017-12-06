@if ($paginator->hasPages())
    <ul class="pagination list-reset text-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="inline-block">
                <span class="p-4 text-center">&laquo;</span>
            </li>
        @else
            <li class="inline-block">
                <a class="p-4 text-center no-underline" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
            </li>
        @endif
        
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="inline-block">
                    <span class="p-4 text-center">{{ $element }}</span>
                </li>
            @endif
            
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="inline-block">
                            <span class="p-4 text-center shadow rounded bg-{{ app('theme')->menu_item_active_background }} text-{{ app('theme')->menu_item_active_text }}">{{ $page }}</span>
                        </li>
                    @else
                        <li class="inline-block">
                            <a class="no-underline p-4 text-center" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="inline-block">
                <a class="no-underline p-4 text-center rounded" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
            </li>
        @else
            <li class="inline-block">
                <span class="p-4 text-center">&raquo;</span>
            </li>
        @endif
    </ul>
@endif
