@if ($paginator->hasPages())
<div class="dataTables_wrapper">
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info mb-3" id="m_table_1_info" role="status" aria-live="polite">Hiển thị 1 - 6 trong số {{ $paginator->total() }} bản ghi</div>
        </div>
        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="m_table_1_paginate">
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                    <li class="paginate_button page-item previous disabled" id="m_table_1_previous">
                        <a href="javascript:;" aria-controls="m_table_1" data-dt-idx="0" tabindex="0" class="page-link"><i class="la la-angle-left"></i></a>
                    </li>
                    @else
                    <li class="paginate_button page-item previous" id="m_table_1_previous">
                        <a href="{{ $paginator->previousPageUrl() }}" aria-controls="m_table_1" data-dt-idx="0" tabindex="0" class="page-link"><i class="la la-angle-left"></i></a>
                    </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="disabled"><span>{{ $element }}</span></li>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="paginate_button page-item active">
                                        <a href="javascript:;" aria-controls="m_table_1" data-dt-idx="1" tabindex="0" class="page-link">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="paginate_button page-item ">
                                        <a href="{{ $url }}" aria-controls="m_table_1" data-dt-idx="5" tabindex="0" class="page-link">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                    <li class="paginate_button page-item next" id="m_table_1_next">
                        <a href="{{ $paginator->nextPageUrl() }}" aria-controls="m_table_1" data-dt-idx="6" tabindex="0" class="page-link"><i class="la la-angle-right"></i></a>
                    </li>
                    @else
                    <li class="paginate_button page-item next disabled" id="m_table_1_next">
                        <a href="javascript:;" aria-controls="m_table_1" data-dt-idx="6" tabindex="0" class="page-link"><i class="la la-angle-right"></i></a>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
@endif