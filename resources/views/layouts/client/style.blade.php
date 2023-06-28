    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
    <link href="{{ asset('client-theme/assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="{{ asset('client-theme/assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->
    <link href="{{ asset('client-theme/assets/demo/demo5/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-theme/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="{{ asset('client-theme/assets/demo/demo5/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->

    <!--begin::Page Vendors Styles -->

    <!--end::Page Vendors Styles -->
    <link rel="shortcut icon" href="{{ asset('client-theme/assets/demo/demo5/media/img/logo/favicon.ico')}}" />