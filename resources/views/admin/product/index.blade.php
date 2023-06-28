@section('title', 'Danh sách sản phẩm')
@extends('layouts.admin.main')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title">Danh Sách Sản Phẩm</h3>
		</div>
	</div>
</div>
<!-- END: Subheader -->
<div class="m-content">
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Danh Sách Sản Phẩm
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
							<a href="{{route('product.add')}}" class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-info">
								<span>
									<i class="la la-plus"></i>
									<span>Tạo Sản Phẩm Mới</span>
								</span>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="m-portlet__body">
			@include('layouts.admin.alert')
			<!--begin: Search Form -->
			<div class="m-form m-form--label-align-right m--margin-bottom-30">
				<form class="form-group m-form__group" method="GET">
					<div class="m--margin-bottom-10">
						<div class="row">
							<div class="col-lg-4">
								<div class="m-form__group">
									<div class="m-form__label">
										<label class="m-label m-label--single">Tìm kiếm:</label>
									</div>
									<div class="m-input-icon m-input-icon--left">
										<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." name="keyword" @isset($searchData['keyword']) value="{{$searchData['keyword']}} @endisset">
										<span class="m-input-icon__icon m-input-icon__icon--left">
											<span><i class="la la-search"></i></span>
										</span>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="m-form__group">
									<div class="m-form__label">
										<label>Danh Mục:</label>
									</div>
									<div class="m-form__control">
										<select class="form-control m-input m-input--square" name="category_id">
											<option value="">Tất cả</option>
											@foreach($parentCategory as $parentCate)
											<optgroup label="{{$parentCate->name}}">
												@foreach($categories as $category)
												@if($parentCate->id == $category->parent_id)
												<option @if(isset($searchData['category_id']) && $category->id == $searchData['category_id']) selected @endif value="{{$category->id}}">{{$category->name}}</option>
												@endif
												@endforeach
											</optgroup>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="m-form__group">
									<div class="m-form__label">
										<label class="m-label m-label--single">Nguyên Liệu:</label>
									</div>
									<div class="m-form__control">
										<select class="form-control m-input m-input--square" name="material_id">
											<option value="">Tất cả</option>
											@foreach($materials as $material)
												<option @if(isset($searchData['material_id']) && $material->id == $searchData['material_id']) selected @endif) value="{{$material->id}}">{{$material->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m--margin-top-15">
							<button type="submit" class="btn m-btn m-btn--gradient-from-focus m-btn--gradient-to-danger">Tìm Kiếm</button>
							<a href="{{route('product.index')}}" class="btn btn-secondary">Reset</a>
						</div>
					</div>
				</form>
			</div>

			<!--end: Search Form -->

			<!--begin: Datatable -->
			<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="">
				<table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
					<thead class="m-datatable__head">
						<tr class="m-datatable__row">
							<th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">ID</span></th>
							<th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">Tên Sản Phẩm</span>
							</th>
							<th data-field="Currency" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 100px;">Ảnh Sản Phẩm</span>
							</th>
							<th data-field="ShipAddress" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">Danh Mục</span>
							</th>
							<th data-field="Type" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">Nguyên Liệu</span>
							</th>
							<th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">Hành Động</span>
							</th>
						</tr>
					</thead>
					<tbody class="m-datatable__body" style="">
						@foreach($products as $product)
						<tr class="m-datatable__row m-datatable__row--even" style="left: 0px;">
							<td data-field="OrderID" class="m-datatable__cell">
								<span style="width: 110px;">{{(($products->currentPage()-1)*5) + $loop->iteration}}</span>
							</td>
							<td data-field="ShipName" class="m-datatable__cell">
								<span style="width: 110px;">{{$product->name}}</span>
							</td>
							<td data-field="Currency" class="m-datatable__cell">
								<img style="width: 110px;" src="{{asset( 'storage/' . $product->image)}}" width="70" />
							</td>
							<td data-field="ShipAddress" class="m-datatable__cell">
								<span style="width: 110px;">{{$product->category->name}}</span>
							</td>
							<td data-field="Type" class="m-datatable__cell">
								<span style="width: 110px;">
									<span class="m-badge m-badge--brand m-badge--wide">{{$product->material->name}}</span>
								</span>
							</td>
							<td data-field="Actions" class="m-datatable__cell">
								<span style="overflow: visible; position: relative; width: 110px;">
									<a class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" href="javascript:;">
										<i class="la la-trash" onclick="return confirm('Bạn Có Chắc Muốn Xóa Sản Phẩm Này?')"></i>
									</a>
									<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" href="#">
										<i class="la la-eye"></i>
									</a>
									<a href="{{route('product.edit', ['id' => $product->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Sửa ">
										<i class="la la-edit"></i>
									</a>
								</span>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="m-datatable__pager m-datatable--paging-loaded clearfix">
					{{ $products->links('vendor.pagination.custom') }}
				</div>
			</div>

			<!--end: Datatable -->
		</div>
	</div>
</div>
@endsection