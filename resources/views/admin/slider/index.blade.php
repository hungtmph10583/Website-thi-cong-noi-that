@section('title', 'Danh sách Slider')
@extends('layouts.admin.main')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title">Danh Sách Slider</h3>
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
						Danh Sách Slider
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
							<a href="{{route('slider.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="la la-user-plus"></i>
									<span>Tạo Slider Mới</span>
								</span>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="m-portlet__body">
			@include('layouts.admin.alert')

			<!--begin: Datatable -->
			<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" id="local_data" style="">
				<table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
					<thead class="m-datatable__head">
						<tr class="m-datatable__row">
							<th data-field="ShipAddress" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">Ảnh Hiển Thị</span>
							</th>
							<th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">Tiêu Đề Slider</span>
							</th>
							<th data-field="Currency" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">Trạng Thái</span>
							</th>
							<th data-field="Type" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;">Link Liên Kết</span>
							</th>
							<th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort">
								<span style="width: 110px;" class="text-center">Hành Động</span>
							</th>
						</tr>
					</thead>
					<tbody class="m-datatable__body" style="">
						@foreach($sliders as $slider)
						<tr class="m-datatable__row m-datatable__row--even" style="left: 0px;">
							<td data-field="ShipAddress" class="m-datatable__cell">
								<span style="width: 110px;">
									<img style="width: 100%;" src="{{asset( 'storage/' . $slider->image)}}" alt="{{$slider->alt}}"/>
								</span>
							</td>
							<td data-field="ShipName" class="m-datatable__cell">
								<span style="width: 110px;">{{$slider->title}}</span>
							</td>
							<td data-field="Currency" class="m-datatable__cell">
                                <span style="width: 110px;">
                                    @if($slider->status == 1)
                                        <span class="m-badge m-badge--success m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-success">Hiển Thị</span>
                                    @else
                                        <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Không Hiển Thị</span>
                                    @endif
                                </span>
							</td>
							<td data-field="Type" class="m-datatable__cell">
								<span style="width: 110px;">
									{{$slider->url_link}}
								</span>
							</td>
							<td data-field="Actions" class="m-datatable__cell">
								<span style="overflow: visible; position: relative; width: 110px;" class="text-center">
									<a href="{{route('slider.remove', ['id' => $slider->id])}}" onclick="return confirm('Bạn Có Chắc Muốn Xóa Slider Này?')" class="m-portlet__nav-link btn btn-sm m-btn btn-danger m-btn--icon">
										Xóa
									</a>
									<a href="{{route('slider.edit', ['id' => $slider->id])}}" class="m-portlet__nav-link btn btn-sm m-btn btn-brand m-btn--icon" title="Sửa ">
                                        Sửa
									</a>
								</span>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="m-datatable__pager m-datatable--paging-loaded clearfix">
					{{ $sliders->links('vendor.pagination.custom') }}
				</div>
			</div>

			<!--end: Datatable -->
		</div>
	</div>
</div>
@endsection