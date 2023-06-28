@extends('layouts.admin.main')
@section('title', 'Thêm Bài Viết')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Thêm Bài Viết</h3>
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
                    <a href="{{route('post.index')}}" class="m-nav__link">
                        <span class="m-nav__link-text">Danh Sách Bài Viết</span>
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
                        Thêm Bài Viết Mới
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form method="POST" action="" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
            @csrf
			<div class="m-portlet__body" data-select2-id="82">
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Tiêu Đề Bài Viết</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="Tên Bài Viết">
                        @error('title')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Ảnh Bìa Bài Viết</label>
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
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Trạng Thái</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="m-radio-inline">
                            <label class="m-radio m-radio--solid">
                                <input type="radio" name="status" value="1" checked> Hiển Thị
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--solid">
                                <input type="radio" name="status" value="2"> Không HIển Thị
                                <span></span>
                            </label>
                        </div>
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Danh Mục Bài Viết</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
						<select class="form-control m-input" id="category_id" name="category_id">
                            <option value="">Chọn loại danh mục</option>
                            @foreach($category as $category)
								<option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Mô Tả Ngắn Về Bài Viết</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
						<textarea class="form-control m-input m-input--square" name="description" rows="4">{{old('description')}}</textarea>
                        @error('description')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="form-group m-form__group">
					<label class="">Nội Dung Bài Viết</label>
						<textarea class="form-control m-input m-input--square" name="content" id="ckeditor" rows="8">{{old('content')}}</textarea>
                        @error('content')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions">
					<div class="row">
						<div class="col-lg-9 ml-lg-auto">
							<a class="btn btn-danger" href="{{route('post.index')}}">Hủy</a>
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
@section('pagejs')
<script src="{{ asset('admin-theme/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script type="texT/javascript">
    CKEDITOR.replace('ckeditor');
</script>
@endsection