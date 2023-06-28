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
							<a href="{{route('post.create')}}" class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-info">
								<span>
									<i class="la la-plus"></i>
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
							<button type="submit" class="btn m-btn m-btn--gradient-from-focus m-btn--gradient-to-danger">Tìm Kiếm</button>
							<a href="{{route('post.index')}}" class="btn btn-secondary">Reset</a>
						</div>
					</div>
				</form>
			</div>
			<!--end: Search Form -->
		</div>
	</div>
    <div class="row">
        @foreach($posts as $post)
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
                                <img src="{{asset('storage/' . $post->thumbnail)}}" style="max-height: 303px; object-fit: cover;" alt="">
                                <h3 class="m-widget19__title m--font-light">
                                    {{$post->title}}
                                </h3>
                                <div class="m-widget19__shadow"></div>
                            </div>
                            <div class="m-widget19__content">
                                <div class="m-widget19__header">
                                    <div class="m-widget19__user-img">
                                        <img class="m-widget19__img" style="max-height: 303px;" src="{{ asset('assets/app/media/img//users/user5.jpg')}}" alt="">
                                    </div>
                                    <div class="m-widget19__info">
                                        <span class="m-widget19__username">
                                            {{$post->user->name}}
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
                                            Views
                                        </span>
                                    </div>
                                </div>
                                <div class="m-widget19__body">
                                    {{$post->description}}
                                </div>
                            </div>
                            <div class="m-widget19__action">
                                <a href="{{route('post.show', ['id' => $post->id])}}" onclick="return confirm('Bạn Có Chắc Muốn Xóa Bài Viết Này?')" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-danger m-btn--custom">
                                    <span>
                                        <i class="la la-trash"></i>
                                        <span>Xóa</span>
                                    </span>
                                </a>
                                <a href="{{route('post.show', ['id' => $post->id])}}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">
                                    <span>
                                        <i class="la la-eye"></i>
                                        <span>Xem</span>
                                    </span>
                                </a>
                                <a href="{{route('post.edit', ['id' => $post->id])}}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-warning m-btn--custom">
                                    <span>
                                        <i class="la la-edit"></i>
                                        <span>Sửa</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Blog-->
            </div>
        @endforeach
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