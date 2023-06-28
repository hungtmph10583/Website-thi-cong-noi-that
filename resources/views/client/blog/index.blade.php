@extends('layouts.client.main')
@section('title', 'Bài Viết')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="row mb-5">
            <div class="col-xl-6 pt-xl-3 pl-xl-5 pr-xl-5">
                <div class="m-portlet--bordered-semi m-portlet--full-height m-portlet--rounded-force m-0 custom-box-img">
                    <a href="{{route('client.blog.detail', ['slug' => $blog_suggestions->slug])}}">
                        <img src="{{asset('storage/' . $blog_suggestions->thumbnail)}}" alt="" style="width: 100%; object-fit: cover;">
                    </a>
                </div>
            </div>
            <div class="col-xl-6 mt-3 pt-xl-3 m-section d-flex align-items-center">
                <div class="m-portlet__body">
                    <h2 class="section__heading m--font-brand">
                        <a href="{{route('client.blog.detail', ['slug' => $blog_suggestions->slug])}}" class="m-link m--font-bolder">{{$blog_suggestions->title}}</a>
                    </h2>
                    <span class="m--font-metal">{{$blog_suggestions->created_at->diffForHumans()}}</span>
                    <div class="section__content">
                        <p class="font-detail-custom">
                            {{$blog_suggestions->description}}
                        </p>
                    </div>
                    <a href="{{route('client.blog.detail', ['slug' => $blog_suggestions->slug])}}" class="btn m-btn--pill btn-outline-brand m-btn m-btn--custom">Chi Tiết</a>
                </div>
            </div>
        </div>

        <!--Begin::Section-->
        <div class="row">
            @foreach($blogs as $blog)
            @if($blog->id != $blog_suggestions->id)
            <div class="col-xl-6 col-lg-12">
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
                            <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="max-height: 390px">
                                <a href="{{route('client.blog.detail', ['slug' => $blog->slug])}}">
                                    <img src="{{asset('storage/' . $blog->thumbnail)}}" style="max-height: 390px; width: 100%; object-fit: cover;" alt="">
                                    <h3 class="m-widget19__title m--font-light">
                                        {{$blog->title}}
                                    </h3>
                                    <div class="m-widget19__shadow"></div>
                                </a>
                            </div>
                            <div class="m-widget19__content">
                                <div class="m-widget19__header">
                                    <div class="m-widget19__user-img">
                                        <img class="m-widget19__img" style="max-height: 303px;" src="{{ asset('assets/app/media/img//users/user5.jpg')}}" alt="">
                                    </div>
                                    <div class="m-widget19__info">
                                        <span class="m-widget19__username">
                                            {{$blog->user->name}}
                                        </span><br>
                                        <span class="m-widget19__time">
                                            {{$blog->created_at->diffForHumans()}}
                                        </span>
                                    </div>
                                    <!-- <div class="m-widget19__stats">
                                        <span class="m-widget19__number m--font-brand">
                                            18
                                        </span>
                                        <span class="m-widget19__comment">
                                            Comments
                                        </span>
                                    </div> -->
                                </div>
                                <div class="m-widget19__body">
                                    {{$blog->description}}
                                </div>
                            </div>
                            <div class="m-widget19__action">
                                <a href="{{route('client.blog.detail', ['slug' => $blog->slug])}}" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">Chi Tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        {{ $blogs->links('vendor.pagination.customClient') }}
        <!--End::Section-->
    </div>
</div>
@endsection
@section('page-script')
<script>
    var element = document.getElementById("blog");
    element.classList.add("m-menu__item--active");
</script>
@endsection