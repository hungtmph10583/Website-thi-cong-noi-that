@if(session('success') || session('danger'))
<div class="m-form__content">
    <div class="m-alert m-alert--icon alert @if(session('success')) alert-success @else alert-danger @endif" role="alert" id="m_form_1_msg">
        <div class="m-alert__icon">
            @if(session('success'))
                <i class="flaticon-alert-2"></i>
            @else
                <i class="la la-warning"></i>
            @endif
        </div>
        <div class="m-alert__text">
            <strong>
                @if(session('success'))
                    Hoàn Tất.
                @else
                    Lỗi.
                @endif
            </strong> {{ session()->get('success') }}{{ session()->get('danger') }}.
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-close="alert" aria-label="Close">
            </button>
        </div>
    </div>
</div>
@endif