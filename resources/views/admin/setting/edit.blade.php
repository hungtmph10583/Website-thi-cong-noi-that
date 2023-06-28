@section('title', 'Cài đặt website')
@extends('layouts.admin.main')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">Sửa Thông Tin Website</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="{{route('dashboard.index')}}" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">Thông Tin Website</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="javascript:;" class="m-nav__link">
                        <span class="m-nav__link-text">Sửa Thông Tin Website</span>
                    </a>
                </li>
            </ul>
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
                        Sửa Thông Tin Website
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
                            <input type="text" class="form-control m-input" name="name" placeholder="Nhập vào số điện thoại" value="{{$model->name}}">
                            <div class="input-group-append"><span class="input-group-text"><i class="la la-link"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Logo Website</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="custom-file">
                            <input type="file" name="uploadfile" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Chọn Ảnh Logo</label>
                        </div>
                        @error('uploadfile')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Số Điện Thoại</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control" id="m_maxlength_3" maxlength="10" name="phone" placeholder="Nhập vào số điện thoại" value="{{$model->phone}}">
                            <div class="input-group-append"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Email</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control m-input" name="email" placeholder="Nhập vào Email" value="{{$model->email}}">
                            <div class="input-group-append"><span class="input-group-text"><i class="flaticon-email"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Địa Chỉ</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control m-input" name="address" placeholder="Nhập vào địa chỉ" value="{{$model->address}}">
                            <div class="input-group-append"><span class="input-group-text"><i class="flaticon-placeholder-2"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Bản Đồ</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control m-input" name="map" placeholder="Nhập vào liên kết Maps" value="{{$model->map}}">
                            <div class="input-group-append"><span class="input-group-text"><i class="flaticon-map-location"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="m-form__seperator m-form__seperator--dashed"></div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Thời Gian Mở Cửa</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group timepicker">
                            <input class="form-control m-input" id="m_timepicker_2_validate" readonly="" name="open_time" placeholder="Thời Gian Mở Cửa" type="text" value="{{$model->open_time}}">
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
                            <input class="form-control m-input" id="m_timepicker_2_validate" readonly="" name="close_time" placeholder="Thời Gian Đóng Cửa" type="text" value="{{$model->close_time}}">
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
                            <input type="text" class="form-control m-input" name="facebook" placeholder="Nhập vào url Facebook" value="{{$model->facebook}}">
                            <div class="input-group-append"><span class="input-group-text"><i class="flaticon-facebook-letter-logo"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">URL Youtube</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control m-input" name="youtube" placeholder="Nhập vào url Youtube" value="{{$model->youtube}}">
                            <div class="input-group-append"><span class="input-group-text"><i class="fab fa-youtube"></i></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <a href="{{route('setting.index')}}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Lưu thông tin</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>

    <!--end::Portlet-->
</div>
@endsection
@section('pagejs')
    <script src="{{ asset('assets/app/js/bootstrap-timepicker.js')}}" type="text/javascript"></script>
@endsection