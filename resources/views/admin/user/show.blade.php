@extends('layouts.admin.main')
@section('title', 'Thông Tin Tài Khoản')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Thông Tin Tài Khoản</h3>
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
                            <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_user_profile_tab_1" role="tab" aria-selected="true">
                                <i class="flaticon-share m--hide"></i>
                                Thông Tin Tài Khoản
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active show" id="m_user_profile_tab_1">
                    <form method="POST" action="" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
                        @csrf
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group m--margin-top-10">
                                <div class="alert m-alert m-alert--default" role="alert">
                                    Nếu gặp lỗi trong quá trình sử dụng. Hãy liên hệ với người sáng lập!
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">1. Thông Tin Tài Khoản</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-2 col-form-label">Name</label>
                                <div class="col-10">
                                    <input class="form-control m-input" type="text" name="name" value="{{$user->name}}" disabled>
                                    @error('name')
                                        <span class="m-form__help m--font-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-2 col-form-label">Email</label>
                                <div class="col-10">
                                    <input class="form-control m-input" type="email" name="email" value="{{$user->email}}" disabled>
                                    @error('email')
                                        <span class="m-form__help m--font-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-2 col-form-label">Số Điện Thoại</label>
                                <div class="col-10">
                                    <input class="form-control m-input" type="text" name="phone" value="{{$user->phone}}" disabled>
                                    @error('phone')
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
                                        @if($user->id == strval(Auth::user()->id))
                                            <a class="btn btn-brand" href="{{route('user.edit', ['id'=>$user->id])}}">Sửa Thông Tin Tài Khoản</a>
                                        @else
                                        
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="m_user_profile_tab_2">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection