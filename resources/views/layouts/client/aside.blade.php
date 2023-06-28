
<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light ">
    <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
        <!-- <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" id="home" aria-haspopup="true"> -->
        <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" id="home" aria-haspopup="true">
            <a href="{{route('home.index')}}" class="m-menu__link ">
                <span class="m-menu__item-here"></span>
                <span class="m-menu__link-text">Trang Chủ</span>
            </a>
        </li>
        <li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
            <a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><span class="m-menu__item-here"></span><span class="m-menu__link-text">Danh Mục Sản Phẩm</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu  m-menu__submenu--fixed-xl m-menu__submenu--center"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
                <div class="m-menu__subnav">
                    <ul class="m-menu__content">
                        @foreach($parentCategory as $parentCate)
                        <li class="m-menu__item">
                            <h3 class="m-menu__heading m-menu__toggle"><span class="m-menu__link-text">{{$parentCate->name}}</span><i class="m-menu__ver-arrow la la-angle-right"></i></h3>
                            <ul class="m-menu__inner">
                                @foreach($categories as $category)
                                @if($category->parent_id == $parentCate->id)
                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                    <a href="{{route('client.product.index', ['category_id' => $category->id])}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i>
                                        <span class="m-menu__link-text">{{$category->name}}</span>
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </li>
        <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" id="product" aria-haspopup="true">
            <a href="{{route('client.product.index')}}" class="m-menu__link" title="Sản Phẩm">
                <span class="m-menu__item-here"></span><span class="m-menu__link-text">Sản Phẩm</span>
            </a>
        </li>
        <!-- <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" id="mauThietKe" aria-haspopup="true">
            <a href="javascript:;" class="m-menu__link" title="Mẫu Thiết Kế">
                <span class="m-menu__item-here"></span><span class="m-menu__link-text">Mẫu Thiết Kế</span>
            </a>
        </li> -->
        <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" id="gallery" aria-haspopup="true">
            <a href="{{route('client.gallery.index')}}" class="m-menu__link" title="Thư Viện">
                <span class="m-menu__item-here"></span><span class="m-menu__link-text">Thư Viện</span>
            </a>
        </li>
        <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" id="blog" aria-haspopup="true">
            <a href="{{route('client.blog.index')}}" class="m-menu__link" title="Bài Viết">
                <span class="m-menu__item-here"></span><span class="m-menu__link-text">Bài Viết</span>
            </a>
        </li>
        <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" id="contact" aria-haspopup="true">
            <a href="{{route('contact.index')}}" class="m-menu__link" title="Liên Hệ">
                <span class="m-menu__item-here"></span><span class="m-menu__link-text">Liên Hệ</span>
            </a>
        </li>
    </ul>
</div>