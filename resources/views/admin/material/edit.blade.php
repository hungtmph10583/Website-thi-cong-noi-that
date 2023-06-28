@extends('layouts.admin.main')
@section('title', 'Sửa Vật Liệu')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Sửa Vật Liệu</h3>
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
                    <a href="{{route('material.index')}}" class="m-nav__link">
                        <span class="m-nav__link-text">Danh Sách Vật Liệu</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END: Subheader -->

<div class="m-content">
    
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Sửa Vật Liệu Mới
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form method="POST" action="" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
            @csrf
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Tên Sản Phẩm</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
						<input type="text" name="name" class="form-control" value="{{$model->name}}" placeholder="Tên Vật Liệu">
                        @error('name')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-12 m--align-right">
                            <a class="btn btn-danger" href="{{route('material.index')}}">Hủy</a>
                            <button type="submit" class="btn btn-brand">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>
</div>
@endsection