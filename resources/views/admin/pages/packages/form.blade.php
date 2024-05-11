@extends('admin.layouts.app')

@section('crumb')
<x-bread-crumb :breadcrumbs="[
            ['text'=> TranslationHelper::translate('packages' , 'admin') ,'link'=>route('admin.package.index')],
            ['text'=> TranslationHelper::translate( Str::replace(' ' , '_', Str::lower(getLastKeyRoute(request()->route()->getName()))) , 'admin')]
            ]" :button="['text'=> TranslationHelper::translate('go_to_packages' , 'admin') ,'link'=>route('admin.package.index')]" :permission="auth('admin')->user()->can('packages.read')">
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
                        <form action="{{ $action }}" method="POST" id="about_form" enctype="multipart/form-data">
                            @csrf
                            @if($method == 'PUT')
                            @method('PUT')
                            @endif

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">

                                <div class="row">
                                    @include('admin.layouts.form-seprate-sections', ['section' => TranslationHelper::translate('facility_main_information' , 'admin') ])
                                    @foreach (Config('language') as $key => $lang)
                                    <div class="col-lg-{{ count(Config('language')) > 1  ? 6 : 12 ;}}  col-12 mt-5">
                                        <label class="fs-5 fw-bold form-label mb-2"> {{ TranslationHelper::translate('name' , 'admin') }} {{ $lang}}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" value="{{ old('name.'.$key) ?? $package->getTranslation('name',$key)}}" placeholder="{{ $lang }}" name="name[{{ $key}}]" />
                                        @error('name.'.$key)
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    @endforeach

                                    <div class="col-lg-6 col-12  mt-3">
                                        <label class="fs-5 fw-bold form-label mb-2"> {{ TranslationHelper::translate('period' , 'admin') }} :</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" value="{{ old('period') ?? $package->period }}" placeholder="{{ TranslationHelper::translate('period' , 'admin') }}" name="period" />
                                        @error('period')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-12 mt-3">
                                        <label class="fs-5 fw-bold form-label mb-2"> {{ TranslationHelper::translate('price' , 'admin') }} :</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" value="{{ old('price') ?? $package->price }}" placeholder="{{ TranslationHelper::translate('price' , 'admin') }}" name="price" />
                                        @error('price')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12 col-12 mt-3">
                                        <label class="fs-5 fw-bold form-label mb-2"> {{ TranslationHelper::translate('description' , 'admin') }} :</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea name="description" class="form-control form-control-solid" id="" cols="4" rows="4">{{ old('description') ?? $package->description }}</textarea>
                                        @error('description')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="text-center mt-5">
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
        let formId = '#about_form';
        sendRequest();

    </script>
    @endpush
