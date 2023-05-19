@if ($paginator->hasPages())
    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination job-pagination mb-0 justify-content-center">
            
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" >
                        <i class="mdi mdi-chevron-double-left fs-15"></i>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}{{ isset($queryString) ? '&'. $queryString : ''}}" tabindex="-1">
                        <i class="mdi mdi-chevron-double-left fs-15"></i>
                    </a>
                </li>
            @endif
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if (($page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() - 2) || ($page == 1 && $page != $paginator->currentPage()))
                            <li class="page-item"><a class="page-link" href="{{ $url }}{{ isset($queryString) ? '&'. $queryString : ''}}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <li class="page-item"><a class="page-link" href="{{ $url }}{{ isset($queryString) ? '&'. $queryString : ''}}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                        <i class="mdi mdi-chevron-double-right fs-15"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link">
                        <i class="mdi mdi-chevron-double-right fs-15"></i>
                    </a>
                </li>
            @endif
            
        </ul>
    </nav>

@endif