@extends('layouts.client.main')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">

        @include('layouts.client.slide')

        <div class="row">
            <div class="col-xl-12 mb-5 mt-4 text-center">
                <h1 class="m-portlet__head-text font-weight-bold m--font-brand">
                    GIỚI THIỆU VỀ CHÚNG TÔI
                </h1>
                <div class="lead">
                    <p>Nội Thất Nhựa Mạnh Tuấn là một cửa hàng cung cấp nhũng sản phẩm Đồ Nội Thất Với Giá Cả Phân Khúc Tầm Chung Với Tất Cả Mọi Người.</p>
                    <p>Là một trong những người đi tiên phong trong việc cung cấp những sản phẩm nội thất với chất lượng hàng đầu hiện nay.</p>
                    <p>Chúng tôi nhận làm những sản phẩm nội thất theo yêu cầu, phù hợp với thiết kế và diện tích căn nhà bạn.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="m-portlet m-portlet--head-overlay m-portlet--full-height  m-portlet--rounded-force">
                    <div class="m-portlet__head m-portlet__head--fit-">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text m--font-light">
                                    Nội Thất Phòng Khách
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget27 m-portlet-fit--sides">
                            <div class="m-widget27__pic">
                                <img src="assets/app/media/img//blog/blog4.jpg" class="custom" alt="">
                                <div class="m-widget27__btn">
                                    <a href="javascript:;" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--bolder">Xem Chi Tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="m-portlet m-portlet--head-overlay m-portlet--full-height   m-portlet--rounded-force">
                    <div class="m-portlet__head m-portlet__head--fit">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text m--font-light">
                                    Nội Thất Phòng Ngủ
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget27 m-portlet-fit--sides">
                            <div class="m-widget27__pic">
                                <img src="assets/app/media/img//blog/blog5.jpg" class="custom" alt="">
                                <div class="m-widget27__btn">
                                    <a href="javascript:;" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--bolder">Xem Chi Tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="m-portlet m-portlet--head-overlay m-portlet--full-height   m-portlet--rounded-force">
                    <div class="m-portlet__head m-portlet__head--fit">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text m--font-light">
                                    Nội Thất Phòng Bếp
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget27 m-portlet-fit--sides">
                            <div class="m-widget27__pic">
                                <img src="assets/app/media/img//blog/blog3.jpg" class="custom" alt="">
                                <div class="m-widget27__btn">
                                    <a href="javascript:;" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--bolder">Xem Chi Tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="col-xl-12 text-center">
                    <div class="m-portlet__body" style="padding: 60px;">
                        <h1 class="m--font-brand font-weight-bold">Sản Phẩm Mới Nhất</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($product_suggestions as $product_suggest)
            <div class="col-xl-4">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                    <div class="m-portlet__head m-portlet__head--fit">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-action">
                                <button type="button" class="btn btn-sm m-btn--pill  btn-danger">New</button>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget19">
                            <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 386px">
                                <img src="{{asset('storage/' . $product_suggest->image)}}" />
                            </div>
                            <div class="m-widget19__content">
                                <div class="m-widget19__header">
                                    <div class="m-widget19__info">
                                        <h3 class="m-widget19__title m--font-dank">
                                            <a href="{{route('client.product.detail', ['slug' => $product_suggest->slug])}}" class=" m-link">
                                                {{$product_suggest->name}}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget19__action">
                                <a href="{{route('client.product.detail', ['slug' => $product_suggest->slug])}}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">Xem Sản Phẩm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row mt-4 mb-4">
            <div class="col-xl-5 d-flex align-items-center">
                <div class="m-portlet__body">
                    <div class="m-widget7">
                        <h2 class="m-widget7__heading">
                            <a href="{{route('client.blog.detail', ['slug' => $blog->slug])}}" class="m-link m--font-boldest">{{$blog->title}}</a>
                        </h2>
                        <p class="p-2 lead">
                            {{$blog->description}}
                        </p>
                        <div class="m-widget7__button mt-3">
                            <a class="m-btn btn btn-brand" href="{{route('client.blog.detail', ['slug' => $blog->slug])}}" role="button">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <a href="{{route('client.blog.detail', ['slug' => $blog->slug])}}">
                    <img src="{{asset('storage/' . $blog->thumbnail)}}" width="100%" height="auto" style="object-fit: cover;" alt="{{$blog->slug}}">
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 text-center">
                <div class="m-portlet__body" style="padding: 60px;">
                    <h1>Nhận Báo Giá Và Tư Vấn</h1>
                    <p class="p-2 lead">Gọi điện trực tiếp sẽ giúp cho tôi có thể giải đáp thắc mắc, tư vấn và nhận báo giá hợp lý.</p>
                    <button class="btn btn-accent">GỌI NGAY</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8">
                <!--begin:: Widgets/Application Sales-->
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Vị Trí Của Chúng Tôi
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        {!!$information->map!!}
                    </div>
                </div>

                <!--end:: Widgets/Application Sales-->
            </div>
            <div class="col-xl-4">
                <div class="m-portlet m-portlet--full-height m-portlet--fit">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Thông Tin Liên Hệ
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget4">
                            <div class="m-widget4__item">
                                <div class="m-widget4__img m-widget4__img--logo">
                                    <i class="la la-map-marker"></i>
                                </div>
                                <div class="m-widget4__info">
                                    <span class="m-widget4__title">
                                        {{$information->address}}
                                    </span>
                                </div>
                            </div>
                            <div class="m-widget4__item">
                                <div class="m-widget4__img m-widget4__img--logo">
                                    <i class="la la-phone"></i>
                                </div>
                                <div class="m-widget4__info">
                                    <span class="m-widget4__title">
                                        {{$information->phone}}
                                    </span>
                                </div>
                            </div>
                            <div class="m-widget4__item">
                                <a href="javascript:;" class="btn btn-primary">
                                    <span><i class="flaticon-facebook-letter-logo"></i></span>
                                    <span>Facebook</span>
                                </a>
                            </div>
                            <div class="m-widget4__item">
                                <a href="tel:{{$information->phone}}" class="btn btn-danger">
                                    <span><i class="la la-phone"></i></span>
                                    <span>Gọi Ngay</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Latest Updates-->
            </div>
        </div>
    </div>
</div>
@endsection