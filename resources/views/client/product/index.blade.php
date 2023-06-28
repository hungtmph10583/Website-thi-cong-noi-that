@extends('layouts.client.main')
@section('title', 'Sản Phẩm')
@section('toggle_left')
<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
    <span></span>
</a>
@endsection
@section('content')
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close m-aside-left-close--skin-light" id="m_aside_left_close_btn"><i class="la la-close"></i></button>
    <div id="m_aside_left" class="m-grid__item m-aside-left ">

        <!-- BEGIN: Aside Menu -->
        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " data-menu-vertical="true" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                @foreach($parentCategory as $parentCate)
                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">{{$parentCate->name}}</h4>
                        <i class="m-menu__section-icon flaticon-more-v2"></i>
                    </li>
                    @foreach($categories as $category)
                    @if($parentCate->id == $category->parent_id)
                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
                        <a href="{{route('client.product.index', ['category_id' => $category->id])}}" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{$category->name}}</span>
                        </a>
                    </li>
                    @endif
                    @endforeach
                @endforeach
            </ul>
        </div>

        <!-- END: Aside Menu -->
    </div>

    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">Danh Mục</h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                            <a href="{{route('home.index')}}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                                <span class="m-nav__link-text">Trang Chủ</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">-</li>
                        <li class="m-nav__item">
                            <a href="javascript:;" class="m-nav__link">
                                <span class="m-nav__link-text">Sản Phẩm</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- END: Subheader -->
        <div class="m-content">
            <div class="m-portlet">
                <form class="form-group m-form__group" method="GET">
                    <div class="m-portlet__body row">
                        <div class="col-xl-5  m--margin-bottom-10">
                            <div class="m-form__group">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input m-input--solid" placeholder="Tìm kiếm ..." name="keyword" @isset($searchData['keyword']) value="{{$searchData['keyword']}} @endisset">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span><i class="la la-search"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5  m--margin-bottom-10">
                            <div class="m-form__group">
                                <div class="m-form__control">
                                    <select class="form-control" name="category_id">
                                        <option value="">-- Tất Cả Sản Phẩm --</option>
                                        @foreach($parentCategory as $parentCate)
                                        <optgroup label="{{$parentCate->name}}">
                                            @foreach($categories as $category)
                                            @if($parentCate->id == $category->parent_id)
                                            <option @if(isset($searchData['category_id']) && $category->id == $searchData['category_id']) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="m-form__control">
                                <button type="submit" class="btn btn-brand">Tìm Kiếm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @if(count($products) == 0)
            <div class="align-items-center">
                <div class="m-portlet__body">
                    <div class="m-widget7">
                        <h2 class="m-widget7__heading m--font-danger">
                            Danh Mục Này Chưa Có Sản Phẩm Nào!
                        </h2>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                @foreach($products as $product)
                    <div class="col-xl-4">
                        <div class="m-stack m-stack--hor m-stack--general m-stack--demo mb-4" style="height: 400px">
                            <div class="m-stack__item">
                                <a href="{{route('client.product.detail', ['slug' => $product->slug])}}">
                                    <img src="{{asset('storage/' . $product->image)}}" width="100%" style="min-height: 390px; object-fit: cover;" alt="">
                                </a>
                            </div>
                            <h3 class="p-2 text-center m--font-brand font-weight-bold">
                                <a href="{{route('client.product.detail', ['slug' => $product->slug])}}" class="m-link m--font-boldest">{{$product->name}}</a>
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
            {{ $products->links('vendor.pagination.customClient') }}
        </div>
    </div>
@endsection
@section('page-script')
<script>
    var element = document.getElementById("product");
    element.classList.add("m-menu__item--active");
</script>
@endsection