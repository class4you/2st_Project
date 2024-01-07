
@if ($paginator->hasPages())
    <ul class="class_board_view_all_pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="class_board_view_all_pagination_li">
                <span aria-hidden="true">&laquo;</span>
            </li>
        @else
            <li class="class_board_view_all_pagination_li">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="class_board_view_all_pagination_li">
                    <span>{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="class_board_view_all_pagination_page" aria-current="page">
                            <span>{{ $page }}</span>
                        </li>
                    @else
                        <li class="class_board_view_all_pagination_page">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="class_board_view_all_pagination_li">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
            </li>
        @else
            <li class="class_board_view_all_pagination_li">
                <span aria-hidden="true">&raquo;</span>
            </li>
        @endif
    </ul>
@endif
