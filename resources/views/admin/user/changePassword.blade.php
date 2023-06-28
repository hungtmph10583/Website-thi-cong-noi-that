@extends('layouts.admin.main')
@section('title', 'Đổi Mật Khẩu')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Cập Nhật Thông Tin Tài Khoản</h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="#" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="{{route('dashboard.index')}}" class="m-nav__link">
                        <span class="m-nav__link-text">Trang Chủ</span>
                    </a>
                </li>
                <li class="m-nav__separator">-</li>
                <li class="m-nav__item">
                    <a href="{{route('user.index')}}" class="m-nav__link">
                        <span class="m-nav__link-text">Danh Sách Tài Khoản</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END: Subheader -->

<div class="m-content">
    
<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="m-portlet m-portlet--full-height  ">
            <div class="m-portlet__body">
                <div class="m-card-profile">
                    <div class="m-card-profile__title m--hide">
                        Your Profile
                    </div>
                    <div class="m-card-profile__pic">
                        <div class="m-card-profile__pic-wrapper">
                            <img src="{{asset( 'storage/' . $user->avatar)}}" alt="Avatar">
                        </div>
                    </div>
                    <div class="m-card-profile__details">
                        <span class="m-card-profile__name">{{$user->name}}</span>
                        <a href="" class="m-card-profile__email m-link">{{$user->email}}</a>
                    </div>
                </div>
                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                    <li class="m-nav__separator m-nav__separator--fit"></li>
                    <li class="m-nav__section m--hide">
                        <span class="m-nav__section-text">Section</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" href="{{route('user.edit', ['id' => $user->id])}}" aria-selected="true">
                                <i class="flaticon-share m--hide"></i>
                                Cập Nhật Thông Tin Cá Nhân
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_user_profile_tab_2" role="tab" aria-selected="false">
                                Đổi Mật Khẩu
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active show" id="m_user_profile_tab_1">
                    
                </div>
                <div class="tab-pane active show" id="m_user_profile_tab_2">
                    <form method="POST" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
                    @csrf   
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group m--margin-top-10">
                                @include('layouts.admin.alert')
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">2. Đổi Mật Khẩu</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-3 col-form-label">Mật Khẩu Hiện Tại</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="password" name="currentpassword" value="{{old('currentpassword')}}">
                                    @error('currentpassword')
                                        <span class="m-form__help m--font-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-3 col-form-label">Mật Khẩu Mới</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="password" name="newpassword" value="{{old('newpassword')}}">
                                    @error('newpassword')
                                        <span class="m-form__help m--font-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed"></div>
                            <div class="form-group m-form__group row">
                                <label class="col-3 col-form-label">Nhập Lại Mật Khẩu</label>
                                <div class="col-7">
                                    <input class="form-control m-input" type="password" name="cfpassword" value="{{old('cfpassword')}}">
                                    @error('cfpassword')
                                        <span class="m-form__help m--font-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-2">
                                    </div>
                                    <div class="col-7">
                                        <a class="btn btn-secondary" href="{{route('user.index')}}">Quay Lại</a>
                                        <button type="submit" class="btn btn-brand">Lưu Mật Khẩu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection