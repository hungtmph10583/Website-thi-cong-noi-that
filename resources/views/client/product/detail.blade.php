@extends('layouts.client.main')
@section('title', 'Chi Tiết Sản Phẩm')
@section('page-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }
        
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .swiper {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .swiper-slide {
            background-size: cover;
            background-position: center;
        }
        
        .mySwiper2 {
            height: 80%;
            width: 100%;
        }
        
        .mySwiper {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }
        
        .mySwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }
        
        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }
        
        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-button-next,.swiper-button-prev{
            color: var(--primary);
        }
        @media only screen and (min-width: 320px) and (max-width: 860px) {
            p > img{
                width: 100%;
                height: 100%; 
                object-fit: contain;
            }

            p > input{
                width: 100%;
                height: 100%; 
                object-fit: contain;
            }
        }
    </style>
@endsection
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">Thông Tin Sản Phẩm</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{route('home.index')}}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                                <span class="m-nav__link-text">Trang Chủ</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="{{route('client.product.index')}}" class="m-nav__link">
                                <span class="m-nav__link-text">Sản Phẩm</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="javascript:;" class="m-nav__link">
                                <span class="m-nav__link-text">{{$product->name}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="row">
                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-xl-6">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{asset('storage/' . $product->image)}}" />
                                    </div>
                                    @foreach ($product->galleries as $gallery)
                                    <div class="swiper-slide">
                                        <img src="{{asset('storage/' . $gallery->image_url)}}" />
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{asset('storage/' . $product->image)}}" />
                                    </div>
                                    @foreach ($product->galleries as $gallery)
                                    <div class="swiper-slide">
                                        <img src="{{asset('storage/' . $gallery->image_url)}}" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <h1 class="m-widget19__title m--font-brand font-weight-bold border-bottom pb-2 mb-3">
                                {{$product->name}}
                            </h1>
                            <p class="lead">
                                <span class="font-weight-bold m--font-danger">5.000.000đ</span>
                            </p>
                            <p class="lead">
                                <span class="font-weight-bold pr-2">Chất Liệu:</span>
                                <span>
                                    {{$product->category->name}}
                                </span>
                            </p>
                            <p class="lead">
                                <span class="font-weight-bold pr-2">Chiều Dài:</span>
                                <span>{{$product->length}} mm</span>
                            </p>
                            <p class="lead">
                                <span class="font-weight-bold pr-2">Chiều Rộng:</span>
                                <span>{{$product->weight}} mm</span>
                            </p>
                            <p class="lead">
                                <span class="font-weight-bold pr-2">Chiều Cao:</span>
                                <span>{{$product->height}} mm</span>
                            </p>
                            <p class="lead">
                                <span class="font-weight-bold pr-2 m--font-danger">* Chú ý:</span>
                                <span>Nhận đặt hàng kích thước và màu sắc theo yêu cầu</span>
                            </p>
                            <p class="lead">
                                <span class="font-weight-bold pr-2">* Liên Hệ Ngay:</span>
                                <span>Tư vấn lựa chọn sản phẩm theo yêu cầu của khách hàng và chi tiết hơn sản phẩm</span>
                            </p>
                            <a href="#" class="btn btn-success m-btn m-btn--icon">
                                <span>
                                    <i class="la la-phone"></i>
                                    <span>Liên Hệ Ngay</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="m-portlet m-portlet--full-height ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Sản Phẩm Liên Quan
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <div class="m-widget5">
                                        @foreach($product_suggestions as $product_suggest)
                                        <div class="m-widget5__item">
                                            <div class="m-widget5__content">
                                                <div class="m-widget5__pic">
                                                    <img class="m-widget7__img" src="{{asset('storage/' . $product_suggest->image)}}" alt="">
                                                </div>
                                                <div class="m-widget5__section">
                                                    <h4 class="m-widget5__title">
                                                        <a href="{{route('client.product.detail', ['slug' => $product_suggest->slug])}}" class="m-link m--font-bolder">
                                                            {{$product_suggest->name}}
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="m-portlet__body">
                        <div class="m-widget19">
                            <div class="m-widget19__content mt-3">
                                <div class="font-detail-custom">
                                    {!!$product->description!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>  
        var element = document.getElementById("product");
        element.classList.add("m-menu__item--active");

        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
@endsection