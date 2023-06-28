@extends('layouts.client.main')
@section('title', 'Thư Viện')
@section('page-style')
    <style>
        .box_gallery{
            width: 100%;
            height: 400px;
            object-fit: cover;
            overflow: hidden;
        }
        .box_gallery img{
            width: 100%;
            height: 100%;
            transition: scale 400ms;
        }
        .box_gallery img:hover{
            scale: 118%;
        }
    </style>
@endsection
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">Thư Viện</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{route('home.index')}}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                                <span class="m-nav__link-text">Trang Chủ</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- END: Subheader -->
        <div class="m-content">
            <div class="row">
                @foreach($galleries as $gallery)
                    <div class="col-xl-3">
                        <div class="m-stack m-stack--hor m-stack--general m-stack--demo mb-5" style="height: 400px">
                            <div class="m-stack__item">
                                <a href="javascript:;" class="box_gallery">
                                    <img src="{{asset('storage/' . $gallery->image_url)}}" width="100%" style="min-height: 390px; object-fit: cover;" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('page-script')
<script>
    var element = document.getElementById("gallery");
    element.classList.add("m-menu__item--active");
</script>
@endsection