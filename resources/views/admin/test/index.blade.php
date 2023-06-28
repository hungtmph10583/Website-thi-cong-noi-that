@section('title', 'Danh sách Bài Viết')
@extends('layouts.admin.main')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">Danh Sách Bài Viết</h3>
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
						Danh Sách Bài Viết
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<ul class="m-portlet__nav">
					<li class="m-portlet__nav-item">
						<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
							<a href="{{route('post.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
								<span>
									<i class="la la-cart-plus"></i>
									<span>Tạo Bài Viết Mới</span>
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
			<form class="m-form m-form--fit m--margin-bottom-20">
				<div class="row m--margin-bottom-20">
					<div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
						<label>RecordID:</label>
						<input type="text" class="form-control m-input" placeholder="E.g: 4590" data-col-index="0">
					</div>
					<div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
						<label>OrderID:</label>
						<input type="text" class="form-control m-input" placeholder="E.g: 37000-300" data-col-index="1">
					</div>
					<div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
						<label>Country:</label>
						<select class="form-control m-input" data-col-index="2">
							<option value="">Select</option>
						</select>
					</div>
					<div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
						<label>Agent:</label>
						<input type="text" class="form-control m-input" placeholder="Agent ID or name" data-col-index="4">
					</div>
				</div>
				<div class="row m--margin-bottom-20">
					<div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
						<label>Ship Date:</label>
						<div class="input-daterange input-group" id="m_datepicker">
							<input type="text" class="form-control m-input" name="start" placeholder="From" data-col-index="5">
							<div class="input-group-append">
								<span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
							</div>
							<input type="text" class="form-control m-input" name="end" placeholder="To" data-col-index="5">
						</div>
					</div>
					<div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
						<label>Trạng Thái:</label>
						<select class="form-control m-input" data-col-index="6">
							<option value="">Chọn</option>
							<option value="1">Hoạt Động</option>
							<option value="2">Không Hoạt Động</option>
						</select>
					</div>
					<div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
						<label>Nguyên Liệu:</label>
						<select class="form-control m-input" data-col-index="7">
							<option value="">Chọn</option>
							<option value="1">Inox</option>
							<option value="2">Đồng</option>
							<option value="3">Nhôm</option>
							<option value="4">Sắt</option>
							<option value="5">Nhựa</option>
						</select>
					</div>
				</div>
				<div class="m-separator m-separator--md m-separator--dashed"></div>
				<div class="row">
					<div class="col-lg-12">
						<button class="btn btn-brand m-btn m-btn--icon" id="m_search">
							<span>
								<i class="la la-search"></i>
								<span>Search</span>
							</span>
						</button>
						&nbsp;&nbsp;
						<button class="btn btn-secondary m-btn m-btn--icon" id="">
							<span>
								<i class="la la-close"></i>
								<span>Reset</span>
							</span>
						</button>
					</div>
				</div>
			</form>
			<!--end: Search Form -->

		</div>
	</div>
    <div class="row">
        <div class="col-xl-4">

            <!--begin:: Widgets/Top Products-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                <div class="m-portlet__head m-portlet__head--fit">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-action">
                            <button type="button" class="btn btn-sm m-btn--pill  btn-brand">Bài Viết</button>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget19">
                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                            <img src="{{ asset('assets/app/media/img//blog/blog1.jpg')}}" alt="">
                            <h3 class="m-widget19__title m--font-light">
                                Introducing New Feature
                            </h3>
                            <div class="m-widget19__shadow"></div>
                        </div>
                        <div class="m-widget19__content">
                            <div class="m-widget19__header">
                                <div class="m-widget19__user-img">
                                    <img class="m-widget19__img" src="{{ asset('assets/app/media/img//users/user1.jpg')}}" alt="">
                                </div>
                                <div class="m-widget19__info">
                                    <span class="m-widget19__username">
                                        Anna Krox
                                    </span><br>
                                    <span class="m-widget19__time">
                                        UX/UI Designer, Google
                                    </span>
                                </div>
                                <div class="m-widget19__stats">
                                    <span class="m-widget19__number m--font-brand">
                                        18
                                    </span>
                                    <span class="m-widget19__comment">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <div class="m-widget19__body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                industry scrambled dummy text of the printing.
                            </div>
                        </div>
                        <div class="m-widget19__action">
                            <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Top Products-->
        </div>
        <div class="col-xl-4">

            <!--begin:: Widgets/Activity-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                <div class="m-portlet__head m-portlet__head--fit">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-action">
                            <button type="button" class="btn btn-sm m-btn--pill  btn-brand">Bài Viết</button>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget19">
                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                            <img src="{{ asset('assets/app/media/img//blog/blog2.jpg')}}" alt="">
                            <h3 class="m-widget19__title m--font-light">
                                Introducing New Feature
                            </h3>
                            <div class="m-widget19__shadow"></div>
                        </div>
                        <div class="m-widget19__content">
                            <div class="m-widget19__header">
                                <div class="m-widget19__user-img">
									<img class="m-widget19__img" src="{{ asset('assets/app/media/img//users/user2.jpg')}}" alt="">
                                </div>
                                <div class="m-widget19__info">
                                    <span class="m-widget19__username">
                                        Anna Krox
                                    </span><br>
                                    <span class="m-widget19__time">
                                        UX/UI Designer, Google
                                    </span>
                                </div>
                                <div class="m-widget19__stats">
                                    <span class="m-widget19__number m--font-brand">
                                        18
                                    </span>
                                    <span class="m-widget19__comment">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <div class="m-widget19__body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                industry scrambled dummy text of the printing.
                            </div>
                        </div>
                        <div class="m-widget19__action">
                            <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Activity-->
        </div>
        <div class="col-xl-4">

            <!--begin:: Widgets/Blog-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                <div class="m-portlet__head m-portlet__head--fit">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-action">
                            <button type="button" class="btn btn-sm m-btn--pill  btn-brand">Bài Viết</button>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget19">
                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                            <img src="{{ asset('assets/app/media/img//blog/blog3.jpg')}}" alt="">
                            <h3 class="m-widget19__title m--font-light">
                                Introducing New Feature
                            </h3>
                            <div class="m-widget19__shadow"></div>
                        </div>
                        <div class="m-widget19__content">
                            <div class="m-widget19__header">
                                <div class="m-widget19__user-img">
									<img class="m-widget19__img" src="{{ asset('assets/app/media/img//users/user3.jpg')}}" alt="">
                                </div>
                                <div class="m-widget19__info">
                                    <span class="m-widget19__username">
                                        Anna Krox
                                    </span><br>
                                    <span class="m-widget19__time">
                                        UX/UI Designer, Google
                                    </span>
                                </div>
                                <div class="m-widget19__stats">
                                    <span class="m-widget19__number m--font-brand">
                                        18
                                    </span>
                                    <span class="m-widget19__comment">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <div class="m-widget19__body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                industry scrambled dummy text of the printing.
                            </div>
                        </div>
                        <div class="m-widget19__action">
                            <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Blog-->
        </div>
        <div class="col-xl-4">

            <!--begin:: Widgets/Blog-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                <div class="m-portlet__head m-portlet__head--fit">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-action">
                            <button type="button" class="btn btn-sm m-btn--pill  btn-brand">Bài Viết</button>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget19">
                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                            <img src="{{ asset('assets/app/media/img//blog/blog4.jpg')}}" alt="">
                            <h3 class="m-widget19__title m--font-light">
                                Introducing New Feature AI In America
                            </h3>
                            <div class="m-widget19__shadow"></div>
                        </div>
                        <div class="m-widget19__content">
                            <div class="m-widget19__header">
                                <div class="m-widget19__user-img">
									<img class="m-widget19__img" src="{{ asset('assets/app/media/img//users/user4.jpg')}}" alt="">
                                </div>
                                <div class="m-widget19__info">
                                    <span class="m-widget19__username">
                                        Anna Krox
                                    </span><br>
                                    <span class="m-widget19__time">
                                        UX/UI Designer, Google
                                    </span>
                                </div>
                                <div class="m-widget19__stats">
                                    <span class="m-widget19__number m--font-brand">
                                        18
                                    </span>
                                    <span class="m-widget19__comment">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <div class="m-widget19__body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                industry scrambled dummy text of the printing.
                            </div>
                        </div>
                        <div class="m-widget19__action">
                            <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Blog-->
        </div>
        <div class="col-xl-4">

            <!--begin:: Widgets/Blog-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                <div class="m-portlet__head m-portlet__head--fit">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-action">
                            <button type="button" class="btn btn-sm m-btn--pill  btn-brand">Bài Viết</button>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget19">
                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                            <img src="{{ asset('assets/app/media/img//blog/blog5.jpg')}}" alt="">
                            <h3 class="m-widget19__title m--font-light">
                                Introducing New Feature AI In America
                            </h3>
                            <div class="m-widget19__shadow"></div>
                        </div>
                        <div class="m-widget19__content">
                            <div class="m-widget19__header">
                                <div class="m-widget19__user-img">
									<img class="m-widget19__img" src="{{ asset('assets/app/media/img//users/user5.jpg')}}" alt="">
                                </div>
                                <div class="m-widget19__info">
                                    <span class="m-widget19__username">
                                        Anna Krox
                                    </span><br>
                                    <span class="m-widget19__time">
                                        UX/UI Designer, Google
                                    </span>
                                </div>
                                <div class="m-widget19__stats">
                                    <span class="m-widget19__number m--font-brand">
                                        18
                                    </span>
                                    <span class="m-widget19__comment">
                                        Comments
                                    </span>
                                </div>
                            </div>
                            <div class="m-widget19__body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry scrambled it to make text of the printing and typesetting industry scrambled a type specimen book text of the dummy text of the printing printing and typesetting
                                industry scrambled dummy text of the printing.
                            </div>
                        </div>
                        <div class="m-widget19__action">
                            <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Blog-->
        </div>
    </div>
</div>
@endsection
@section('pagejs')
<script src="{{ asset('admin-theme/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin-theme/demo/default/custom/crud/datatables/search-options/advanced-search.js')}}" type="text/javascript"></script>
@endsection