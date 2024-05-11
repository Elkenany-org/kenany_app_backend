@extends('admin.layouts.app')

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text'=> TranslationHelper::translate('setting' , 'admin') ],
        ['text'=> TranslationHelper::translate( 'application', 'admin')  ],
        ]" :button="[] ">
    </x-bread-crumb>
@endsection

@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">

                    <!--begin::Card body-->

                    <div class="card-body pt-0">
                        <!--begin::Form-->
                        <form action="{{ route('admin.setting.update.home') }}" method="POST" id="page_form" enctype="multipart/form-data">
                            @csrf

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">

                                <div class="row">
                                    <div class="col-lg-6 col-12 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5"> {{ TranslationHelper::translate('revenue_guide_limit_per_company' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="revenue_guide_limit[en]" class="form-control form-control-solid" value="{{ old('revenue_guide_limit.en') ?? setting('revenue_guide_limit','en')}} " />
                                        @error('revenue_guide_limit.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-12 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5"> {{ TranslationHelper::translate('revenue_guide_fee' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="revenue_guide_fee[en]" class="form-control form-control-solid" value="{{ old('revenue_guide_fee.en') ?? setting('revenue_guide_fee','en')}} " />
                                        @error('revenue_guide_fee.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-12 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5"> {{ TranslationHelper::translate('revenue_ships_limit_per_day' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="revenue_ships_limit[en]" class="form-control form-control-solid" value="{{ old('revenue_ships_limit.en') ?? setting('revenue_ships_limit','en')}} " />
                                        @error('revenue_ships_limit.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-12 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5"> {{ TranslationHelper::translate('revenue_ships_fee' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="revenue_ships_fee[en]" class="form-control form-control-solid" value="{{ old('revenue_ships_fee.en') ?? setting('revenue_ships_fee','en')}} " />
                                        @error('revenue_ships_fee.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-12 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5"> {{ TranslationHelper::translate('revenue_products_limit_per_day' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="revenue_products_limit[en]" class="form-control form-control-solid" value="{{ old('revenue_products_limit.en') ?? setting('revenue_products_limit','en')}} " />
                                        @error('revenue_products_limit.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-12 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5"> {{ TranslationHelper::translate('revenue_products_fee' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="revenue_products_fee[en]" class="form-control form-control-solid" value="{{ old('revenue_products_fee.en') ?? setting('revenue_products_fee','en')}} " />
                                        @error('revenue_products_fee.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary submit">
                                    <span class="indicator-label">{{ TranslationHelper::translate('save' , 'admin') }}</span>
                                </button>
                            </div>
                            <!--end::Actions-->

                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
</div>
@endsection

@push('admin_js')
    <script>
        let formId = '#page_form';
        sendRequest();
    </script>
@endpush
