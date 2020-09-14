@if ($paginator->hasPages())
    <div class="pagination">
        <div class="center">
            <ul>
                @if ($paginator->onFirstPage())
                  <li><a href="jsavascript:void(0)" class="button small grey disabled"><i class="fa fa-angle-left"></i></a></li>
                @else
                 <li><a href="{{ $paginator->previousPageUrl() }}" class="button small grey"><i class="fa fa-angle-left"></i></a></li>
                @endif
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item" aria-disabled="true"><a class="page-link disabled">{{ $element }}</a></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="current"><a href="javascript:void(0)" class="button small grey">{{ $page }}</a></li>
                            @else
                                <li><a href="{{ $url }}" class="button small grey">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- Next Page Link --}}
                @if($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}" class="button small grey"><i class="fa fa-angle-right"></i></a></li>
                @else
                    <li><a href="javascript:void(0)" class="button small grey"><i class="fa fa-angle-right"></i></a></li>
                @endif
            </ul>
        </div>
        <div class="clear"></div>
    </div>
@endif

<nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
