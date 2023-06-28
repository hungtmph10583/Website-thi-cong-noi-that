@section('title', 'Danh sách Vật Liệu')
@extends('layouts.admin.main')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">Danh Sách Vật Liệu</h3>
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
						Danh Sách Vật Liệu
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
							<!-- <a href="{{route('material.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
								<span>
									<i class="la la-cart-plus"></i>
									<span>Thêm Vật Liệu Mới</span>
								</span>
							</a> -->
							<a href="{{route('material.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="la la-cart-plus"></i>
									<span>Thêm Vật Liệu Mới</span>
								</span>
							</a>
							<div class="m-separator m-separator--dashed d-xl-none"></div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="m-portlet__body">
			@include('layouts.admin.alert')
			<div class="m-form m-form--label-align-right m--margin-bottom-30">
				<form class="form-group m-form__group" method="GET">
					<div class="m--margin-bottom-10">
						<div class="row">
							<div class="col-lg-12">
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
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m--margin-top-15">
							<button type="submit" class="btn btn-brand">Tìm Kiếm</button>
							<a href="{{route('material.index')}}" class="btn btn-secondary">Reset</a>
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
								<span style="width: 110px;">Tên Vật Liệu</span>
							</th>
                            <th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 130px;">Số Lượng Sản Phẩm</span>
							</th>
							<th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">Hành Động</span>
							</th>
						</tr>
					</thead>
					<tbody class="m-datatable__body" style="">
						@foreach($model as $material)
						<tr class="m-datatable__row m-datatable__row--even" style="left: 0px;">
							<td data-field="OrderID" class="m-datatable__cell">
								<span style="width: 110px;">{{(($model->currentPage()-1)*5) + $loop->iteration}}</span>
							</td>
							<td data-field="ShipName" class="m-datatable__cell">
								<span style="width: 110px;">{{$material->name}}</span>
							</td>
                            <td data-field="ShipName" class="m-datatable__cell">
								<span style="width: 110px;" class="text-center">
									<span class="m-badge m-badge--brand m-badge--wide">{{count($material->products)}}</span>
								</span>
							</td>
							<td data-field="Actions" class="m-datatable__cell">
								<span style="overflow: visible; position: relative; width: 110px;">
									@if(count($material->products) > 0)
										<a class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" href="javascript:;">
											<i class="la la-trash" onclick="return confirm('Vật Liệu Này Đang Tồn Tại Sản Phẩm, Ko Thể Xóa!')"></i>
										</a>
									@else
										<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" href="{{route('material.remove', ['id' => $material->id])}}">
											<i class="la la-trash" onclick="return confirm('Bạn Có Chắc Muốn Xóa Vật Liệu Này?')"></i>
										</a>
									@endif
									<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" href="#">
										<i class="la la-eye"></i>
									</a>
									<a href="{{route('material.edit', ['id' => $material->id])}}" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="Sửa ">
										<i class="la la-edit"></i>
									</a>
								</span>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="m-datatable__pager m-datatable--paging-loaded clearfix">
					{{ $model->links('vendor.pagination.custom') }}
				</div>
			</div>

			<!--end: Datatable -->
		</div>
	</div>
</div>
@endsection