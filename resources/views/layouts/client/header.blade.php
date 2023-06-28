        <header id="m_header" class="m-grid__item		m-header " m-minimize="minimize" m-minimize-offset="200" m-minimize-mobile-offset="200">
            <div class="m-header__top">
                <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                    <div class="m-stack m-stack--ver m-stack--desktop">

                        <!-- begin::Brand -->
                        <div class="m-stack__item m-brand">
                            <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                                <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                    <a href="index.html" class="m-brand__logo-wrapper">
                                        <img alt="" src="{{ asset('client-theme/assets/demo/demo5/media/img/logo/logo.png')}}" />
                                    </a>
                                </div>
                                <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                    @yield('toggle_left')
                                    <!-- begin::Responsive Header Menu Toggler-->
                                    <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>

                                    <!-- end::Responsive Header Menu Toggler-->

                                    <!-- begin::Topbar Toggler-->
                                    <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                        <i class="flaticon-more"></i>
                                    </a>

                                    <!--end::Topbar Toggler-->
                                </div>
                            </div>
                        </div>

                        <!-- end::Brand -->

                        <!-- begin::Topbar -->
                        <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                            <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-topbar__nav-wrapper">
                                    <ul class="m-topbar__nav m-nav m-nav--inline">
                                        <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                            @if(Auth::check())
                                            <a href="#" class="m-nav__link m-dropdown__toggle">
                                                <span class="m-topbar__welcome">Hello,&nbsp;</span>
                                                <span class="m-topbar__username">{{Auth::user()->name}}</span>
                                                @if(!empty(Auth::user()->avatar))
                                                <span class="m-topbar__userpic">
                                                    <img src="{{asset( 'storage/' . Auth::user()->avatar)}}" class="m--img-rounded m--marginless m--img-centered" alt="Avatar" />
                                                </span>
                                                @else
                                                <span class="m-topbar__userpic">
                                                    <img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt="Avatar" />
                                                </span>
                                                @endif
                                            </a>
                                            <div class="m-dropdown__wrapper">
                                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                <div class="m-dropdown__inner">
                                                    <div class="m-dropdown__header m--align-center" style="background: url({{ asset('client-theme/assets/app/media/img/misc/user_profile_bg.jpg')}}); background-size: cover;">
                                                        <div class="m-card-user m-card-user--skin-dark">
                                                            <div class="m-card-user__pic">
                                                                <img src="{{asset( 'storage/' . Auth::user()->avatar)}}" class="m--img-rounded m--marginless" alt="avatar" />
                                                            </div>
                                                            <div class="m-card-user__details">
                                                                <span class="m-card-user__name m--font-weight-500">{{Auth::user()->name}}</span>
                                                                <a href="javascript:;" class="m-card-user__email m--font-weight-300 m-link">{{Auth::user()->email}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-dropdown__body">
                                                        <div class="m-dropdown__content">
                                                            <ul class="m-nav m-nav--skin-light">
                                                                <li class="m-nav__section m--hide">
                                                                    <span class="m-nav__section-text">Section</span>
                                                                </li>
                                                                <li class="m-nav__item">
                                                                    <a href="{{route('dashboard.index')}}" class="m-nav__link">
                                                                        <i class="m-nav__link-icon flaticon-share m--font-success"></i>
                                                                        <span class="m-nav__link-text">Trang Quản Trị</span>
                                                                    </a>
                                                                </li>
                                                                <li class="m-nav__separator m-nav__separator--fit">
                                                                </li>
                                                                <li class="m-nav__item">
                                                                    <a href="{{route('logout')}}" class="btn m-btn--pill btn-outline-danger m-btn m-btn--custom">Logout</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <a href="{{route('login')}}" class="m-nav__link">
                                                <span class="m-topbar__username">Đăng Nhập</span>
                                            </a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- end::Topbar -->
                    </div>
                </div>
            </div>
            <div class="m-header__bottom">
                <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                    <div class="m-stack m-stack--ver m-stack--desktop">

                        <!-- begin::Horizontal Menu -->
                        <div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
                            @include('layouts.client.aside')
                        </div>

                        <!-- end::Horizontal Menu -->

                        <!--begin::Search-->
                        <!-- <div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable m-header-search--skin-" id="m_quicksearch"
                            m-quicksearch-mode="default"> -->

                            <!--begin::Search Form -->
                            <!-- <form class="m-header-search__form">
                                <div class="m-header-search__wrapper">
                                    <span class="m-header-search__icon-search" id="m_quicksearch_search">
                                        <i class="la la-search"></i>
                                    </span>
                                    <span class="m-header-search__input-wrapper">
                                        <input autocomplete="off" type="text" name="q" class="m-header-search__input" value="" placeholder="Search..." id="m_quicksearch_input">
                                    </span>
                                    <span class="m-header-search__icon-close" id="m_quicksearch_close">
                                        <i class="la la-remove"></i>
                                    </span>
                                    <span class="m-header-search__icon-cancel" id="m_quicksearch_cancel">
                                        <i class="la la-remove"></i>
                                    </span>
                                </div>
                            </form> -->

                            <!--end::Search Form -->

                            <!--begin::Search Results -->
                            <!-- <div class="m-dropdown__wrapper">
                                <div class="m-dropdown__arrow m-dropdown__arrow--center"></div>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-height="300" data-mobile-height="200">
                                            <div class="m-dropdown__content m-list-search m-list-search--skin-light">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!--end::Search Results -->
                        <!-- </div> -->

                        <!--end::Search-->
                    </div>
                </div>
            </div>
        </header>