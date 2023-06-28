@extends('layouts.admin.main')
@section('title', 'Thông Tin Danh Mục')
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">Thông Tin Danh Mục</h3>
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
                    <a href="{{route('category.index')}}" class="m-nav__link">
                        <span class="m-nav__link-text">Danh Sách Danh Mục</span>
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
                        Thông Tin Danh Mục
                    </h3>
                </div>
            </div>
        </div>

        
            <!-- <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <div class="col-lg-6">
                        <label>Tên Danh Mục:</label>
                        <input type="text" name="name" class="form-control" value="{{$model->name}}" placeholder="Tên Danh Mục">
                        @error('name')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label>Hình Ảnh Sản Phẩm</label>
                        <div class="custom-file">
                            <input type="file" name="uploadfile" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Chọn Ảnh</label>
                        </div>
                        @error('uploadfile')
                            <span class="m-form__help m--font-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-12 m--align-right">
                            <a class="btn btn-danger" href="{{route('category.index')}}">Quay Lại</a>
                        </div>
                    </div>
                </div>
            </div> -->

        <form class="m-form m-form--fit m-form--label-align-right">
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Tên Danh Mục</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" name="name" class="form-control" value="{{$model->name}}" disabled>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Số Lượng Sản Phẩm Của Danh Mục</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" name="name" class="form-control" value="{{count($model->products)}}" disabled>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Sản Phẩm Thuộc Danh Mục</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-group date">
                            <a href="{{route('product.edit', ['id' => $model->products->id])}}"></a>
                        </div>
                        <div class="m--space-10"></div>
                        <div class="input-group date">
                            <input type="text" class="form-control m-input" placeholder="Top right" id="m_datepicker_4_2">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-clock-o"></i>
                                </span>
                            </div>
                        </div>
                        <div class="m--space-10"></div>
                        <div class="input-group date">
                            <input type="text" class="form-control m-input" placeholder="Bottom left" id="m_datepicker_4_3">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-check"></i>
                                </span>
                            </div>
                        </div>
                        <div class="m--space-10"></div>
                        <div class="input-group date">
                            <input type="text" class="form-control m-input" placeholder="Bottom right" id="m_datepicker_4_4">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-check-circle-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Range Picker</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="input-daterange input-group" id="m_datepicker_5">
                            <input type="text" class="form-control m-input" name="start">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                            </div>
                            <input type="text" class="form-control" name="end">
                        </div>
                        <span class="m-form__help">Linked pickers for date range selection</span>
                    </div>
                </div>
                
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">Modal Demos</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <a href="" class="btn btn-success m-btn m-btn--pill" data-toggle="modal" data-target="#m_datepicker_modal">Launch modal datepickers</a>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <button type="reset" class="btn btn-brand">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection