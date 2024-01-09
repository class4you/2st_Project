<div>
@if ($paginator->hasPages())
    <div class="class_board_view_all_pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="class_board_view_all_pagination_li">
                <span aria-hidden="true">&laquo;이전</span>
            </div>
        @else
            <div class="class_board_view_all_pagination_li">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;이전</a>
            </div>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="class_board_view_all_pagination_li">
                    <span>{{ $element }}</span>
                </div>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="class_board_view_all_pagination_page" style="{{ $page == $paginator->currentPage() ? 'class_board_view_all_pagination_page_on' : 'class_board_view_all_pagination_page' }}" aria-current="page">
                            <span>{{ $page }}</span>
                        </div>
                    @else
                        <div class="class_board_view_all_pagination_page">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="class_board_view_all_pagination_li">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">다음&raquo;</a>
            </div>
        @else
            <div class="class_board_view_all_pagination_li">
                <span aria-hidden="true">다음&raquo;</span>
            </div>
        @endif
    </div>
@endif
</div>
