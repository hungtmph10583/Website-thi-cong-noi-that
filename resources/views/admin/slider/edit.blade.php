@extends('layouts.admin.main')
@section('title', 'Sửa Slider')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Sửa Slider</h3>
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
                    <a href="{{route('slider.index')}}" class="m-nav__link">
                        <span class="m-nav__link-text">Danh Sách Slider</span>
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
                        Sửa Slider Mới
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form method="POST" action="" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
            @csrf
			<div class="m-portlet__body" data-select2-id="82">
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Tiêu Đề Slider</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group m-input-group">
                            <input type="text" name="title" class="form-control" value="{{$slider->title}}" placeholder="Tiêu Đề Slider">
                        </div>
                        @error('title')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Ảnh Slider</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
						<div class="custom-file" id="cc">
                            <input type="file" name="uploadfile" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Chọn Ảnh Slider</label>
                        </div>
                        @error('uploadfile')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Liên Kết Slider</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group m-input-group">
                            <input type="text" name="url_link" class="form-control" value="{{$slider->url_link}}" placeholder="Liên Kết Slider">
                            <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="la la-link"></i></span></div>
                        </div>
                        @error('url_link')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
                <!-- <div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12"></label>
					<div class="col-lg-4 col-md-9 col-sm-12">
						<img src="{{asset( 'storage/' . $slider->image)}}" alt="{{$slider->alt}}" width="100%" id="img-main">
					</div>
				</div> -->
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Trạng Thái</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="m-radio-inline">
                            <label class="m-radio m-radio--solid">
                                <input type="radio" name="status" value="1" {{ ($slider->status == 1 ? 'checked' : '') }}> Hiển Thị
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--solid">
                                <input type="radio" name="status" value="2" {{ ($slider->status == 2 ? 'checked' : '') }}> Không Hiển Thị
                                <span></span>
                            </label>
                        </div>
					</div>
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions">
					<div class="row">
						<div class="col-lg-9 ml-lg-auto">
							<a class="btn btn-danger" href="{{route('slider.index')}}">Hủy</a>
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
<!-- @section('pagejs')
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        document.getElementById("cc").style.display = 'block';
        reader.onload = function(e) {
            $('#main-img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#customFile").change(function() {
    readURL(this);
});
</script>
@endsection -->