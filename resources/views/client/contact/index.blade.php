@extends('layouts.client.main')
@section('content')
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <div class="m-content">
                    <div class="row mb-4">
                        <div class="col-xl-12">
                            {!!$information->map!!}
                        </div>
                    </div>
                    <div class="m-portlet">
                    </div>
                    <div class="m-portlet">
                        <div class="m-portlet__body m-portlet__body--no-padding">
                            <div class="m-pricing-table-2">
                                <div class="m-pricing-table-2__head" style="background-image: url(assets/app/media/img//bg/bg-4.jpg)">
                                    <div class="m-pricing-table-2__title m--font-light">
                                        <h1>Liên Hệ Với Chúng Tôi</h1>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="m-pricing-table_content1" aria-expanded="true">
                                        <div class="m-pricing-table-2__content">
                                            <div class="m-pricing-table-2__container">
                                                <div class="m-pricing-table-2__items row">
                                                    <div class="m-pricing-table-2__item col-lg-4">
                                                        <div class="m-pricing-table-2__visual">
                                                            <div class="m-pricing-table-2__hexagon"></div>
                                                            <span class="m-pricing-table-2__icon m--font-danger"><i class="flaticon-placeholder-3"></i></span>
                                                        </div>
                                                        <h2 class="m-pricing-table-2__subtitle">{{$information->address}}</h2>
                                                    </div>
                                                    <div class="m-pricing-table-2__item col-lg-4">
                                                        <div class="m-pricing-table-2__visual">
                                                            <div class="m-pricing-table-2__hexagon"></div>
                                                            <span class="m-pricing-table-2__icon m--font-success"><i class="la la-phone"></i></span>
                                                        </div>
                                                        <h2 class="m-pricing-table-2__subtitle">{{$information->phone}}</h2>
                                                        <div class="m-pricing-table-2__btn">
                                                            <a href="tel:{{$information->phone}}" class="btn m-btn--pill  btn-success m-btn--wide m-btn--uppercase m-btn--bolder m-btn--lg">Gọi Ngay</a>
                                                        </div>
                                                    </div>
                                                    <div class="m-pricing-table-2__item col-lg-4">
                                                        <div class="m-pricing-table-2__visual">
                                                            <div class="m-pricing-table-2__hexagon"></div>
                                                            <span class="m-pricing-table-2__icon m--font-info"><i class="flaticon-facebook-letter-logo"></i></span>
                                                        </div>
                                                        <h2 class="m-pricing-table-2__subtitle">Facebook</h2>
                                                        <div class="m-pricing-table-2__btn">
                                                            <a href="https://www.facebook.com/" target="_blank" class="btn m-btn--pill  btn-info m-btn--wide m-btn--uppercase m-btn--bolder m-btn--lg">Facebook</a>
                                                        </div>
                                                    </div>
                                                </div>
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
@section('page-script')
<script>
    var element = document.getElementById("contact");
    element.classList.add("m-menu__item--active");
</script>
@endsection