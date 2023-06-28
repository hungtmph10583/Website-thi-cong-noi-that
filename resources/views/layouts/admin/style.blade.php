<meta name="description" content="Latest updates and statistic charts">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

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
<link href="{{ asset('admin-theme/vendors/base/vendors.bundle.css')}} " rel="stylesheet" type="text/css" />

<!--RTL version:<link href="{{ asset('admin-theme/vendors/base/vendors.bundle.rtl.css')}} " rel="stylesheet" type="text/css" />-->
<!-- <link href="{{ asset('admin-theme/demo/default/base/style.bundle.css')}} " rel="stylesheet" type="text/css" /> -->

<!--RTL version:<link href="{{ asset('admin-theme/demo/default/base/style.bundle.rtl.css')}} " rel="stylesheet" type="text/css" />-->

<!--end::Global Theme Styles -->

<!--begin::Page Vendors Styles -->

<link href="{{ asset('admin-theme/vendors/custom/fullcalendar/fullcalendar.bundle.css')}} " rel="stylesheet"
    type="text/css" />
<link href="{{ asset('admin-theme/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
    type="text/css" />

<!--RTL version:<link href="{{ asset('admin-theme/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css')}} " rel="stylesheet" type="text/css" />-->

<!--end::Page Vendors Styles -->
<link rel="shortcut icon" href="{{ asset('admin-theme/demo/default/media/img/logo/favicon.ico')}}" />
{{--<link href="{{ asset('admin-theme/DataTables/css/dataTables.bootstrap.min.css')}} " rel="stylesheet" type="text/css"
/>--}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="{{asset('customize/admin/css/main.css')}}" rel="stylesheet"> -->


<link href="{{ asset('assets/demo/demo11/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="{{ asset('assets/demo/demo11/media/img/logo/favicon.ico')}}" />