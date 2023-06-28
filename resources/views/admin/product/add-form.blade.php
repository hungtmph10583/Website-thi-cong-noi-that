@extends('layouts.admin.main')
@section('title', 'Thêm sản phẩm')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Thêm Sản Phẩm</h3>
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
                    <a href="{{route('product.index')}}" class="m-nav__link">
                        <span class="m-nav__link-text">Danh Sách Sản Phẩm</span>
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
                        Thêm Sản Phẩm Mới
                    </h3>
                </div>
            </div>
        </div>

        <!--begin::Form-->
        <form method="POST" action="" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
            @csrf
			<div class="m-portlet__body" data-select2-id="82">
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Tên Sản Phẩm</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Tên Sản Phẩm">
                        @error('name')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Ảnh Sản Phẩm</label>
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
					<label class="col-form-label col-lg-3 col-sm-12">Danh Mục Sản Phẩm</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
						<select class="form-control m-input" id="category_id" name="category_id">
                            <option value="">Chọn loại danh mục</option>
                            @foreach($parentCategory as $parentCate)
                                <optgroup label="{{$parentCate->name}}">
                                    @foreach($categories as $category)
                                    @if($parentCate->id == $category->parent_id)
                                    <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif>{{$category->name}}</option>
                                    @endif
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Chất Liệu</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
						<select class="form-control m-input" id="material_id" name="material_id">
						<option value="">Chọn loại nguyên liệu</option>
						@foreach($material as $material)
							<option value="{{$material->id}}" @if($material->id == old('material_id')) selected @endif>{{$material->name}}</option>
						@endforeach
                        </select>
                        @error('material_id')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Chiều Dài</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
						<div class="input-group">
							<input type="text" name="length" value="{{old('length')}}" class="form-control" placeholder="Chiều Dài">
                            <div class="input-group-append"><span class="input-group-text">m</span></div>
                        </div>
                        @error('length')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Chiều Rộng</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
						<div class="input-group">
							<input type="text" name="weight" value="{{old('weight')}}" class="form-control" placeholder="Chiều Rộng">
                            <div class="input-group-append"><span class="input-group-text">m</span></div>
                        </div>
                        @error('weight')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Chiều Cao</label>
					<div class="col-lg-4 col-md-9 col-sm-12">
						<div class="input-group">
							<input type="text" name="height" value="{{old('height')}}" class="form-control" placeholder="Chiều Cao">
                            <div class="input-group-append"><span class="input-group-text">m</span></div>
                        </div>
                        @error('height')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Thêm Ảnh Phụ</label>
					<div class="col-lg-6 col-md-9 col-sm-12">
						<table class="table table-stripped">
                            <thead>
                                <th>File</th>
                                <th>Ảnh Hiển Thị</th>
                                <th>
                                    <button type="button" class="btn btn btn-sm btn-success m-btn m-btn--icon m-btn--wide add-img float-right">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>Thêm ảnh</span>
                                        </span>
                                    </button>
                                </th>
                            </thead>
                            <tbody id="gallery">

                            </tbody>
                        </table>
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">Mô Tả Sản Phẩm</label>
					<div class="col-lg-9 col-md-9 col-sm-12">
						<textarea class="form-control m-input m-input--square" name="description" id="ckeditor" rows="8">{{old('description')}}</textarea>
                        @error('description')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
					</div>
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions">
					<div class="row">
						<div class="col-lg-9 ml-lg-auto">
							<a class="btn btn-danger" href="{{route('product.index')}}">Hủy</a>
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
    $(document).ready(function() {
        $('.add-img').click(function() {
            var rowId = Date.now();
            $('#gallery').append(`
                <tr id="${rowId}">
                    <td>
                        <div class="form-group">
                            <input row_id="${rowId}" type="file" name="galleries[]" class="form-control" onchange="loadFiles(event, ${rowId})">
                        </div>
                    </td>
                    <td>
                        <img row_id="${rowId}" src=""  width="80">
                    </td>
                    <td>
                        <button class="btn btn-danger float-right" onclick="removeImg(this)">Xóa</button>
                    </td>
                </tr>
            `);
        })
        
    });
    function loadFiles(event, el_rowId) {
        var reader = new FileReader();
        var output = document.querySelector(`img[row_id="${el_rowId}"]`);
        reader.onload = function() {
            output.src = reader.result;
        };
        if (event.target.files[0] === undefined) {
            output.src = "";
            return false;
        } else {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
    function removeImg(el){
        $(el).parent().parent().remove();
    }
</script>
@endsection