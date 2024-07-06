@extends('admin.layouts.app')

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text'=> TranslationHelper::translate('company' , 'admin') ,'link'=>route('admin.company.index')],
        ['text'=> TranslationHelper::translate( Str::replace(' ' , '_', Str::lower(getLastKeyRoute(request()->route()->getName()))) , 'admin')]
        ]" :button="['text'=> TranslationHelper::translate('go_to_companies' , 'admin') ,'link'=>route('admin.company.index')]" :permission="auth('admin')->user()->can('guides.read')">
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
                        <form action="{{ $action }}" method="POST" enctype="multipart/form-data" id="category_form">
                            @csrf
                            @if($method == 'PUT')
                            @method('PUT')
                            @endif

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <div class="row justify-content-center  mt-3">
                                    <div class="col-3 my-3">
                                        <h3> {{ TranslationHelper::translate('image' , 'admin') }} </h3>
                                        <!--end::Image input placeholder-->

                                        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true" style="background: url('{{ $company->getAvatar() }}');background-size:100% 100%">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-200px h-200px"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="image" accept=".png, .jpg, .jpeg ,.svg ,.webp" @if($method !='PUT' ) required @endif />

                                                {{-- <input type="hidden" name="avatar_remove" /> --}}
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            @include('admin.layouts.form-seprate-sections', ['section' => TranslationHelper::translate('main_information' , 'admin') ])
                                            @foreach (Config('language') as $key => $lang)
                                                <div class="col-{{ count(Config('language')) > 1  ? 6 : 12 ;}}">
                                                    <label class="fs-5 fw-bold form-label mb-5">{{ TranslationHelper::translate('name' , 'admin') }} {{ $lang}}:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid" required value="{{ old('name.'.$key) ?? $company->getTranslation('name',$key)}}" placeholder="{{ $lang }}" name="name[{{ $key}}]" />
                                                    @error('name.'.$key)
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            @endforeach
                                            <div class="col-md-6 col-12 mt-2">
                                                <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('phone' , 'admin') }} :</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" required class="form-control form-control-solid" required value="{{ old('phone') ?? $company->manager_phone }}" placeholder="{{ TranslationHelper::translate('phone' , 'admin') }}" name="phone" />
                                                @error('phone')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-12 mt-2">
                                                <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('email' , 'admin') }} :</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" required class="form-control form-control-solid" required value="{{ old('email') ?? $company->manager_email }}" placeholder="{{ TranslationHelper::translate('email' , 'admin') }}" name="email" />
                                                @error('email')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            @include('admin.layouts.form-seprate-sections', ['section' => TranslationHelper::translate('section_information' , 'admin') ])
                                            <div class="col-md-6 col-12 mt-2">
                                                <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('sections' , 'admin') }} :</label>
                                                <!--begin::Input-->
                                                <select name="city_id" required class="form-control form-control-solid" id="section" style="width: 100%" data-placeholder="{{ TranslationHelper::translate('section' , 'admin') }}">
                                                    <option value="">{{ TranslationHelper::translate('choose' , 'admin') }}</option>
                                                    @foreach (app('guideSections') as $section)
                                                        <option value="{{ $section->id }}" {{ $section->id == $company->city_id  ? 'selected' : ''}}>{{ $section->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('city_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-12 mt-2">
                                                <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('sub_sections' , 'admin') }} :</label>
                                                <!--begin::Input-->
                                                <select name="city_id" required class="form-control form-control-solid" id="sub_section" style="width: 100%" data-placeholder="{{ TranslationHelper::translate('sub_section' , 'admin') }}">
                                                    <option value="">{{ TranslationHelper::translate('choose' , 'admin') }}</option>
                                                    {{-- @foreach (app('cities') as $city) --}}
                                                    {{-- <option value="{{ $city->id }}" {{ $city->id == $company->city_id  ? 'selected' : ''}}>{{ $city->name }}</option> --}}
                                                    {{-- @endforeach --}}
                                                </select>
                                                @error('city_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            @include('admin.layouts.form-seprate-sections', ['section' => TranslationHelper::translate('address_information' , 'admin') ])
                                            <div class="col-md-6 col-12 mt-2">
                                                <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('governorates' , 'admin') }} :</label>
                                                <!--begin::Input-->
                                                <select name="city_id" required class="form-control form-control-solid" id="governorate" style="width: 100%" data-placeholder="{{ TranslationHelper::translate('governorate' , 'admin') }}">
                                                    <option value="">{{ TranslationHelper::translate('choose' , 'admin') }}</option>
                                                    @foreach (app('cities') as $city)
                                                    <option value="{{ $city->id }}" {{ $city->id == $company->city_id  ? 'selected' : ''}}>{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('city_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-12 mt-2">
                                                <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('address' , 'admin') }} :</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" required class="form-control form-control-solid" required value="{{ old('address') ?? $company->address }}" placeholder="{{ TranslationHelper::translate('address' , 'admin') }}" name="address" />
                                                @error('address')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-12 mt-2">
                                                <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('lat' , 'admin') }} :</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" required class="form-control form-control-solid" required value="{{ old('latitude') ?? $company->latitude }}" placeholder="{{ TranslationHelper::translate('latitude' , 'admin') }}" name="latitude" />
                                                @error('latitude')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-12 mt-2">
                                                <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('long' , 'admin') }} :</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" required class="form-control form-control-solid" required value="{{ old('longitude') ?? $company->longitude }}" placeholder="{{ TranslationHelper::translate('longitude' , 'admin') }}" name="longitude" />
                                                @error('longitude')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
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
        let formId = '#category_form';
        sendRequest();
        $('#governorate').select2();
        $('#section').select2();
        $('#sub_section').select2();
    </script>
    @endpush
