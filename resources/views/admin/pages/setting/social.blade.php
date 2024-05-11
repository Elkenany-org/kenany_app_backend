@extends('admin.layouts.app')

@section('crumb')
<x-bread-crumb :breadcrumbs="[
        ['text'=> TranslationHelper::translate('setting' , 'admin') ],
        ['text'=> TranslationHelper::translate('social' , 'admin') ],
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
                        <form action="{{ route('admin.setting.update.social') }}" method="POST" id="social_form" enctype="multipart/form-data">
                            @csrf

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <div class="row">
                                    @include('admin.layouts.form-seprate-sections', ['section' => TranslationHelper::translate('social_information' , 'admin')])

                                    <div class="col-6 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5">{{ TranslationHelper::translate('facebook' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="url" name="facebook[en]" class="form-control form-control-solid" value="{{ old('facebook.en') ?? setting('facebook','en')}} " />
                                        @error('facebook.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5">{{ TranslationHelper::translate('twitter' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="url" name="twitter[en]" class="form-control form-control-solid" value="{{ old('twitter.en') ?? setting('twitter','en')}}" />
                                        @error('twitter.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5">{{ TranslationHelper::translate('linkedIn' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="url" name="linkedin[en]" class="form-control form-control-solid" value="{{ old('linkedin.en') ?? setting('linkedin','en')}}" />
                                        @error('linkedin.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5">{{ TranslationHelper::translate('instagram' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="url" name="instagram[en]" class="form-control form-control-solid" value="{{ old('instagram.en') ?? setting('instagram','en')}} " />
                                        @error('instagram.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5">{{ TranslationHelper::translate('youtube' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="url" name="youtube[en]" class="form-control form-control-solid" value="{{ old('youtube.en') ?? setting('youtube','en')}} " />
                                        @error('youtube.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <!--begin::Label-->
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

    @endsection

    @push('admin_js')
    <script>
        let formId = '#social_form';
        sendRequest();
    </script>
    @endpush
