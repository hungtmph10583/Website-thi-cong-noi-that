@if ($paginator->hasPages())
<ul class="m-datatable__pager-nav">
    @if ($paginator->onFirstPage())
    <li>
        <a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled" disabled="disabled">
            <i class="la la-angle-left"></i>
        </a>
    </li>
    @else
    <li>
        <a href="{{ $paginator->previousPageUrl() }}" title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev">
            <i class="la la-angle-left"></i>
        </a>
    </li>
    @endif

    <li style="display: none;">
        <input type="text" class="m-pager-input form-control" title="Page number">
    </li>


    @foreach ($elements as $element)
            
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li>
                        <a class="m-datatable__pager-link m-datatable__pager-link-number m-datatable__pager-link--active">{{ $page }}</a>
                    </li>
                @else
                    <li>
                        <a href="{{ $url }}" class="m-datatable__pager-link m-datatable__pager-link-number">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" title="Next" class="m-datatable__pager-link m-datatable__pager-link--next">
                <i class="la la-angle-right"></i>
            </a>
        </li>
    @else
        <li>
            <a title="Next" class="m-datatable__pager-link m-datatable__pager-link--next m-datatable__pager-link--disabled" disabled="disabled">
                <i class="la la-angle-right"></i>
            </a>
        </li>
    @endif
</ul>
<div class="m-datatable__pager-info">
    <span class="m-datatable__pager-detail">Hiển thị 1 - 10 trong số {{ $paginator->total() }} bản ghi</span>
</div>
@endif

