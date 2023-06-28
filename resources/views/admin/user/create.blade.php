@extends('layouts.admin.main')
@section('title', 'Tạo Tài Khoản')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Tạo Tài Khoản</h3>
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
    
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Tạo Tài Khoản Mới
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form method="POST" action="" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
            @csrf
			<div class="m-portlet__body" data-select2-id="82">
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Tên Tài Khoản</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group m-input-group">
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Tên Tài Khoản">
                            <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="la la-user"></i></span></div>
                        </div>
                        @error('name')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
                <div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Email Đăng Nhập</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group m-input-group">
                            <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Email Đăng Nhập">
                            <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                        </div>
                        @error('email')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Avatar</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
						<div class="custom-file">
                            <input type="file" name="uploadfile" value="{{old('uploadfile')}}" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Chọn Ảnh</label>
                        </div>
                        @error('uploadfile')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
                <div class="m-form__seperator m-form__seperator--dashed"></div>
                <div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Mật Khẩu</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group m-input-group">
                            <input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Mật Khẩu">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-lock"></i></span></div>
                        </div>
                        @error('password')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
                <div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Nhập Lại Mật Khẩu</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group m-input-group">
                            <input type="password" name="cfpassword" class="form-control" value="{{old('cfpassword')}}" placeholder="Nhập Lại Mật Khẩu">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-lock"></i></span></div>
                        </div>
                        @error('cfpassword')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
                <div class="m-form__seperator m-form__seperator--dashed"></div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Trạng Thái</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="m-radio-inline">
                            <label class="m-radio m-radio--solid">
                                <input type="radio" name="status" value="1" checked> Hoạt Động
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--solid">
                                <input type="radio" name="status" value="2"> Khóa Hoạt Động
                                <span></span>
                            </label>
                        </div>
					</div>
				</div>
                <div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Số Điện Thoai</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group m-input-group">
                            <input type="text" name="phone" maxlength="10" class="form-control" value="{{old('phone')}}" placeholder="Số Điện Thoai">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                        </div>
                        @error('phone')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions">
					<div class="row">
						<div class="col-lg-9 ml-lg-auto">
							<a class="btn btn-danger" href="{{route('user.index')}}">Hủy</a>
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