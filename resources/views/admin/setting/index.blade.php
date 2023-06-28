@section('title', 'Cài đặt website')
@extends('layouts.admin.main')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">Cài Đặt Website</h3>
        </div>
    </div>
</div>
<!-- END: Subheader -->

<div class="m-content">
    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Thông Tin Website
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form method="POST" action="" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right" id="m_form_1" novalidate="novalidate">
        @csrf
            <div class="m-portlet__body">
                @include('layouts.admin.alert')
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Tên Website</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control m-input" name="name" placeholder="Nhập vào số điện thoại" value="{{$model->name}}" disabled>
                            <div class="input-group-append"><span class="input-group-text"><i class="la la-link"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Logo Website</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <span style="width: 110px;">
                                <img style="width: 100%;" src="{{asset( 'storage/' . $model->logo)}}" alt="Logo Website"/>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Số Điện Thoại</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control m-input" name="phone" placeholder="Nhập vào số điện thoại" value="{{$model->phone}}" disabled>
                            <div class="input-group-append"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Email</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control m-input" name="email" placeholder="Nhập vào Email" value="{{$model->email}}" disabled>
                            <div class="input-group-append"><span class="input-group-text"><i class="flaticon-email"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Địa Chỉ</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control m-input" name="address" placeholder="Nhập vào địa chỉ" value="{{$model->address}}" disabled>
                            <div class="input-group-append"><span class="input-group-text"><i class="flaticon-placeholder-2"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Bản Đồ</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control m-input" name="map" placeholder="Nhập vào liên kết Maps" value="{{$model->map}}" disabled>
                            <div class="input-group-append"><span class="input-group-text"><i class="flaticon-map-location"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="m-form__seperator m-form__seperator--dashed"></div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Thời Gian Mở Cửa</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group timepicker">
                            <input class="form-control m-input" id="m_timepicker_2_validate" readonly="" name="open_time" placeholder="Thời Gian Mở Cửa" type="text" value="{{$model->open_time}}" disabled>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="la la-clock-o"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Thời Gian Đóng Cửa</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group timepicker">
                            <input class="form-control m-input" id="m_timepicker_2_validate" readonly="" name="close_time" placeholder="Thời Gian Đóng Cửa" type="text" value="{{$model->close_time}}" disabled>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="la la-clock-o"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-form__seperator m-form__seperator--dashed"></div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">URL Facebook</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control m-input" name="facebook" placeholder="Nhập vào url Facebook" value="{{$model->facebook}}" disabled>
                            <div class="input-group-append"><span class="input-group-text"><i class="flaticon-facebook-letter-logo"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">URL Youtube</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control m-input" name="youtube" placeholder="Nhập vào url Youtube" value="{{$model->youtube}}" disabled>
                            <div class="input-group-append"><span class="input-group-text"><i class="fab fa-youtube"></i></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <a href="{{route('setting.edit', ['id' => $model->id])}}" class="btn btn-brand">Sửa thông tin</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Bản Đồ Hiển Thị
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="form-group m-form__group row has-success">
                {!!$model->map!!}
            </div>
        </div>
    </div>

    <!--end::Portlet-->
</div>
@endsection
@section('pagejs')
    <script src="{{ asset('assets/app/js/bootstrap-timepicker.js')}}" type="text/javascript"></script>
@endsection