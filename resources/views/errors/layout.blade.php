<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <title>@yield('code')</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('dashboard/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - 404 Page-->
        <div class="d-flex flex-column flex-center flex-column-fluid p-10">
            <!--begin::Illustration-->
            <img src="{{ asset('dashboard/assets/media/illustrations/sketchy-1/18.png') }}" alt="" class="mw-100 mb-10 h-lg-450px" />
            <!--end::Illustration-->
            <!--begin::Message-->
            <h1 class="fw-bold mb-10" style="color: #A3A3C7">@yield('code')</h1>
            <!--end::Message-->
            <!--begin::Link-->
            <a href="{{ route('admin.index') }}" class="btn btn-primary">Return Home</a>
            <!--end::Link-->
        </div>
        <!--end::Authentication - 404 Page-->
    </div>
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--end::Javascript-->
</body>
<!--end::Body-->
</html>
