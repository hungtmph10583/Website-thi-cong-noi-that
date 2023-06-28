@extends('layouts.client.main')
@section('title', 'Nội Dung Bài Viết')
@section('page-style')
    <style>
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
                        <h3 class="m-subheader__title m-subheader__title--separator">Bài Viết</h3>
                        <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                            <li class="m-nav__item m-nav__item--home">
                                <a href="{{route('home.index')}}" class="m-nav__link m-nav__link--icon">
                                    <i class="m-nav__link-icon la la-home"></i>
                                    <span class="m-nav__link-text">Trang Chủ</span>
                                </a>
                            </li>
                            <li class="m-nav__separator">-</li>
                            <li class="m-nav__item">
                                <a href="{{route('client.blog.index')}}" class="m-nav__link">
                                    <span class="m-nav__link-text">Bài Viết</span>
                                </a>
                            </li>
                            <li class="m-nav__separator">-</li>
                            <li class="m-nav__item">
                                <a href="javascript:;" class="m-nav__link">
                                    <span class="m-nav__link-text">Nội Thất Phòng Khách</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content">
                <div class="row">
                    <div class="col-xl-8">
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
                                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides custom-box-img" style="min-height: 286px">
                                        <img src="{{asset('storage/' . $blog->thumbnail)}}" alt="">
                                    </div>
                                    <div class="m-widget19__content mt-3">
                                        <h1 class="m-widget19__title m--font-brand font-weight-bold" style="font-family: Roboto;">
                                            {{$blog->title}}
                                        </h1>
                                        <div class="m-widget19__header">
                                            <div class="m-widget19__user-img">
                                                <i class="fa fa-user-edit"></i>
                                            </div>
                                            <div class="m-widget19__info">
                                                <span class="m-widget19__username">
                                                    {{$blog->user->name}}
                                                </span><br>
                                                <span class="m-widget19__time">
                                                    {{$blog->created_at->diffForHumans()}}
                                                </span>
                                            </div>
                                            <div class="m-widget19__stats">
                                                <span class="m-widget19__number m--font-brand">
                                                    18
                                                </span>
                                                <span class="m-widget19__comment">
                                                    View
                                                </span>
                                            </div>
                                        </div>
                                        <div class="font-detail-custom">
                                            {!!$blog->content!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="m-divider">
                                    <span></span>
                                    <span>END</span>
                                    <span></span>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="m--font-danger text-center font-weight-bold">Mọi thông tin chi tiết xin liên hệ</h2>
                                        <h4 class="text-center font-weight-bold">
                                            Hotline:
                                            <small class="text-muted">0978 128 890</small>
                                        </h4>
                                        <h4 class="text-center font-weight-bold">
                                            Địa Chỉ:
                                            <small class="text-muted">Khu Chéo Vòng, Chi Nê - Lạc Thủy - Hòa Bình</small>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="m-portlet m-portlet--full-height ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Bài Viết Liên Quan
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <div class="tab-content">
                                    <div class="tab-pane active">
                                        <div class="m-widget5">
                                            @foreach($post_suggestions as $post_suggest)
                                            @if($post_suggest->id != $blog->id)
                                            <div class="m-widget5__item">
                                                <div class="m-widget5__content">
                                                    <a href="{{route('client.blog.detail', ['slug' => $post_suggest->slug])}}" class="m-widget5__pic">
                                                        <img class="m-widget7__img" src="{{asset('storage/' . $post_suggest->thumbnail)}}" height="75px" style="object-fit: cover;" alt="">
                                                    </a>
                                                    <div class="m-widget5__section">
                                                        <h4 class="m-widget5__title">
                                                            <a href="{{route('client.blog.detail', ['slug' => $post_suggest->slug])}}" class="m-link m--font-bolder">{{$post_suggest->title}}</a>
                                                        </h4>
                                                        <div class="m-widget5__info">
                                                            <span class="m-widget5__info-label">
                                                                Thời Gian:
                                                            </span>
                                                            <span class="m-widget5__info-date m--font-info">
                                                                {{$post_suggest->created_at->diffForHumans()}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection