@section('title', 'Danh sách Tài Khoản')
@extends('layouts.admin.main')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title">Danh Sách Tài Khoản</h3>
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
						Danh Sách Tài Khoản
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
							<a href="{{route('user.create')}}" class="btn m-btn m-btn--gradient-from-focus m-btn--gradient-to-danger">
								<span>
									<i class="la la-plus"></i>
									<span>Tạo Tài Khoản Mới</span>
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
			<!-- <div class="m-form m-form--label-align-right m--margin-bottom-30">
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
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m--margin-top-15">
							<button type="submit" class="btn btn btn-primary m-btn m-btn--icon">
                                <span>
                                    <i class="la la-search"></i>
                                    <span>Tìm Kiếm</span>
                                </span>
                            </button>
							<a href="{{route('user.index')}}" class="btn btn-secondary m-btn m-btn--icon">
                                <span>
                                    <i class="la la-close"></i>
                                    <span>Reset</span>
                                </span>
                            </a>
						</div>
					</div>
				</form>
			</div> -->

			<!--end: Search Form -->

			<!--begin: Datatable -->
			<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="">
				<table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
					<thead class="m-datatable__head">
						<tr class="m-datatable__row">
							<th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">Tên Tài Khoản</span>
							</th>
							<th data-field="ShipAddress" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 120px;">Email</span>
							</th>
							<th data-field="Currency" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">Trạng Thái</span>
							</th>
							<th data-field="Type" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">Quyền Hạn</span>
							</th>
							<th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 150px;" class="text-center">Hành Động</span>
							</th>
						</tr>
					</thead>
					<tbody class="m-datatable__body" style="">
						@foreach($users as $user)
						<tr class="m-datatable__row m-datatable__row--even" style="left: 0px;">
							<td data-field="ShipName" class="m-datatable__cell">
								<span style="width: 110px;">{{$user->name}}</span>
							</td>
							<td data-field="ShipAddress" class="m-datatable__cell">
								<span style="width: 120px;">{{$user->email}}</span>
							</td>
							<td data-field="Currency" class="m-datatable__cell">
                                <span style="width: 110px;">
                                    @if($user->status == 1)
                                        <span class="m-badge m-badge--success m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-success">Hoạt Động</span>
                                    @else
                                        <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Ngưng Hoạt Động</span>
                                    @endif
                                </span>
							</td>
							<td data-field="Type" class="m-datatable__cell">
								<span style="width: 110px;">
									<span class="m-badge m-badge--secondary m-badge--wide">Admin</span>
								</span>
							</td>
							<td data-field="Actions" class="m-datatable__cell">
								<span style="overflow: visible; position: relative; width: 150px;" class="text-center">
                                    <!-- <a class="m-portlet__nav-link btn btn-sm m-btn btn-danger" href="javascript:;" onclick="return confirm('Bạn Có Chắc Muốn Xóa Tài Khoản Này?')">
										Xóa
									</a> -->
									<a class="m-portlet__nav-link btn btn-sm m-btn btn-accent" href="{{route('user.show', ['id' => $user->id])}}">
										Xem
									</a>
									@if($user->id == strval(Auth::user()->id))
									<a href="{{route('user.edit', ['id' => $user->id])}}" class="m-portlet__nav-link btn btn-sm m-btn btn-brand" title="Sửa ">
                                        Sửa
									</a>
									@else
									<a class="m-portlet__nav-link btn btn-sm m-btn btn-secondary" href="javascript:;" onclick="return confirm('Bạn Chưa Được Cấp Quyền Sửa Tài Khoản Khác!')">
										Sửa
									</a>
									@endif
								</span>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="m-datatable__pager m-datatable--paging-loaded clearfix">
					{{ $users->links('vendor.pagination.custom') }}
				</div>
			</div>

			<!--end: Datatable -->
		</div>
	</div>
</div>
@endsection