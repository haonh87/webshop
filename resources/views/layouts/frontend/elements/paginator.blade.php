<div class="cmsmasters_wrap_pagination">
    <ul class="page-numbers">
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <li class="disabled"></li>
        @else
            <li>
                <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}"><span class="cmsmasters_theme_icon_slide_prev"></span></a>
            </li>
        @endif

    <!-- Pagination Elements -->
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li>
            @if ($paginator->currentPage() == $i)
                <span aria-current="page" class="page-numbers current">{{ $i }}</span>
            @else
                <a class="page-numbers" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            @endif
            </li>
        @endfor
    <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li><a class="next page-numbers" href="$paginator->nextPageUrl()"><span class="cmsmasters_theme_icon_slide_next"></span></a></li>
        @else
            <li class="disabled"></li>
        @endif
    </ul>
</div>