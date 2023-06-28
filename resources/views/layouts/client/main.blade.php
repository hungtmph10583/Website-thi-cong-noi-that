<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title>@yield('title', "FPT Polytechnic")</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    @include('layouts.client.style')
    @yield('page-style')
    <input type="hidden" id="ajax_token" value="{{csrf_token()}}">

</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default">

    <div class="m-grid m-grid--hor m-grid--root m-page">

        <!-- BEGIN: Header -->
        @include('layouts.client.header')
        <!-- END: Header -->

        <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
            <!-- <div class="m-grid__item m-grid__item--fluid m-wrapper"> -->
                @yield('content')
            <!-- </div> -->
        </div>
    </div>

    <!-- end::Body -->

    <!-- begin::Footer -->
    <footer class="m-grid__item m-footer ">
        <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
            <div class="m-footer__wrapper">
                <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                    <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                        <span class="m-footer__copyright">
									2017 &copy; Metronic theme by <a href="https://keenthemes.com" class="m-link">Keenthemes</a>
								</span>
                    </div>
                    <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                        <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <span class="m-nav__link-text">About</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <span class="m-nav__link-text">Privacy</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <span class="m-nav__link-text">T&C</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <span class="m-nav__link-text">Purchase</span>
                                </a>
                            </li>
                            <li class="m-nav__item m-nav__item--last">
                                <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
                                    <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- end::Footer -->
    </div>

    <!-- end:: Page -->

    <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>

    <!-- end::Scroll Top -->

    @include('layouts.client.script')
    @yield('page-script')
</body>

<!-- end::Body -->

</html>