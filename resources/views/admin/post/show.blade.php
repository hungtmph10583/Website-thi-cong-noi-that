@extends('layouts.admin.main')
@section('title', 'Xem Bài Viết')
@section('page-style')
    <style>
        @media only screen and (min-width: 320px) and (max-width: 860px) {
            p > img{
            max-width: 100%;
            height: 100%; 
            object-fit: contain;
            }
        }
    </style>
@endsection
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Bài Viết</h3>
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
                    <a href="{{route('post.index')}}" class="m-nav__link">
                        <span class="m-nav__link-text">Danh Sách Bài Viết</span>
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
                        Chi Tiết Bài Viết
                    </h3>
                    <!-- <p>Ngày Đăng: {{$post->created_at->diffForHumans()}}</p> -->
                    <!-- <p>Ngày Đăng: {{date('d/m/y', strtotime($post->created_at))}}</p> -->
                </div>
            </div>
        </div>
        <div class="m-portlet__body" data-select2-id="82">
            <h1 class="text-center">{{$post->title}}</h1>
            <h5>{{$post->description}}</h5>
            <!-- <p>Ngày Đăng: {{date('d/m/y', strtotime($post->created_at))}}</p> -->
            {!!$post->content!!}
        </div>
    </div>
</div>
@endsection
@section('pagejs')
<!-- <script src="{{ asset('admin-theme/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script type="texT/javascript">
    CKEDITOR.replace('ckeditor');
</script> -->
@endsection