<!DOCTYPE html>

<html lang="{{app()->getLocale()}}" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}">

<!--begin::Head-->
<head>
    <base href="/">
    <title> @yield('title' , env('APP_NAME')) </title>

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('dashboard/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    {{-- <link href="{{ asset('dashboard/assets/css/select2.css') }}" rel="stylesheet" type="text/css" /> --}}
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/main_ar.css') }}" rel="stylesheet" type="text/css" />
    @else
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Sedan:ital@0;1&display=swap" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endif
    <!--end::Global Stylesheets Bundle-->

    <link href="{{ asset('dashboard/assets/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/dropFile.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

    @stack('admin_css')
</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <!--begin::Brand-->
                <div class="aside-logo flex-column-auto" id="kt_aside_logo">

                    <!--begin::Logo-->
                    <a href="{{ route('admin.index') }}">
                        <img alt="Logo" src="{{ setting('site_logo','en') }}" class="h-30px logo" />
                    </a>
                    <!--end::Logo-->

                    <!--begin::Aside toggler-->
                    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
                        <span class="svg-icon svg-icon-1 rotate-180">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <defs id="defs3051">
                                    <style type="text/css" id="current-color-scheme">
                                        .ColorScheme-Text {
                                            color: #232629
                                        }
                                    </style>
                                </defs>
                                <path style="fill:#1f6a01;" d="M 6.9882812 2 C 7.2954638 2.1311015 7.5524294 2.3668906 7.7441406 2.7070312 L 9.1132812 5.1445312 L 8.2558594 5.6425781 L 11.03125 5.6816406 L 12.388672 3.1914062 L 11.544922 3.703125 L 10.763672 2.3417969 C 10.635254 2.1188308 10.41827 2 10.136719 2 L 6.9882812 2 z M 6.2597656 2.1171875 C 5.7739488 2.1171875 5.3776086 2.3543005 5.1347656 2.7871094 L 3.9707031 4.84375 L 6.4140625 6.296875 L 7.9238281 3.625 L 7.4882812 2.8769531 C 7.1943065 2.3666083 6.7841599 2.1171875 6.2597656 2.1171875 z M 12.65625 5.7070312 L 10.212891 7.1347656 L 11.722656 9.8085938 L 12.566406 9.8085938 C 12.834357 9.8085936 13.104641 9.7421086 13.296875 9.6367188 C 13.705797 9.4011645 14 8.9034183 14 8.4316406 C 14 8.1956848 13.935783 7.9733806 13.820312 7.7636719 L 12.65625 5.7070312 z M 4.7890625 6.3105469 L 2 6.3632812 L 2.8574219 6.8613281 L 2.0898438 8.2363281 C 2.0387126 8.327925 2 8.4735512 2 8.5917969 C 2 8.7099088 2.038581 8.8403116 2.0898438 8.9316406 L 3.6894531 11.748047 C 3.6768991 11.656718 3.6757813 11.590894 3.6757812 11.539062 C 3.6757812 11.315964 3.7783553 10.961849 3.90625 10.726562 L 5.2753906 8.3027344 L 6.1445312 8.8125 L 4.7890625 6.3105469 z M 9.8535156 9.0996094 L 8.421875 11.550781 L 9.8535156 14 L 9.8535156 12.992188 L 11.351562 12.992188 C 11.620169 12.992188 11.850622 12.861237 11.978516 12.638672 L 13.564453 9.8085938 C 13.295979 10.017766 12.97522 10.123047 12.591797 10.123047 L 9.8535156 10.123047 L 9.8535156 9.0996094 z M 4.609375 10.097656 L 4.2011719 10.84375 C 4.0732771 11.066315 3.9824219 11.419198 3.9824219 11.628906 C 3.9824219 12.375609 4.5833172 12.992187 5.3125 12.992188 L 7.6425781 12.992188 L 7.6425781 10.097656 L 4.609375 10.097656 z "></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Aside toggler-->

                </div>
                <!--end::Brand-->
                @include('admin.layouts.aside')
            </div>
            <!--end::Aside-->

            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('admin.layouts.header')
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    @yield('crumb')
                    @yield('content')
                </div>
                @include('admin.layouts.footer')
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->

        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Drawers-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->

    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('dashboard/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('dashboard/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->

    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('dashboard/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/modals/create-app.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/modals/upgrade-plan.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script src="{{ asset('dashboard/assets/js/addMultiFile.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/send_ajax_request.js') }}"></script>
    @include('admin.layouts.toastr')
    @include('admin.vendor.ck_editor')
    @stack('admin_js')
    @vite('resources/js/app.js')
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->
</html>
