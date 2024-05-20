@extends('admin.layouts.app')

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text'=> TranslationHelper::translate('admins' , 'admin')],
        ['text'=> TranslationHelper::translate( Str::replace(' ' , '_', Str::lower(getLastKeyRoute(request()->route()->getName()))) , 'admin')]
        ]" :button="[]" :permission="auth('admin')->user()->can('admin_country.read')">
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
                        <form action="{{ $action }}" method="POST" enctype="multipart/form-data" id="admin_form">
                            @csrf
                            @if($method == 'PUT')
                            @method('PUT')
                            @endif
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <div class="row">
                                    <div class="col-lg-3 col-12 my-3">
                                        <h3> {{ TranslationHelper::translate('image' , 'admin') }} </h3>
                                        <!--end::Image input placeholder-->

                                        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true" style="background: url('{{ $admin->getAvatar() }}');background-size:100% 100%">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-200px h-200px"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="image" accept=".png, .jpg, .jpeg ,.svg ,.webp" />

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

                                    <div class="col-lg-9 col-12 mt-5">
                                        <div class="row">
                                            <div class="col-lg-6 col-12 mt-5">
                                                <label class="fs-5 fw-bold form-label mb-2"> {{ TranslationHelper::translate('name' , 'admin') }} :</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid" autocomplete="off" value="{{ old('name') ?? $admin->name}}" placeholder="{{ TranslationHelper::translate('name' , 'admin') }}" name="name" />
                                                @error('name')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 col-12 mt-5">
                                                <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('email' , 'admin') }} :</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" class="form-control form-control-solid" autocomplete="off" value="{{ old('email') ?? $admin->email}}" placeholder="{{ TranslationHelper::translate('email' , 'admin') }}" name="email" />
                                                @error('email')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 col-12 mt-5">
                                                <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('password' , 'admin') }} :</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="password" class="form-control form-control-solid" autocomplete="off" placeholder="************" name="password" />
                                                @error('password')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <input type="hidden" name="role" value="admin" />
                                            <div class="col-lg-6 col-12 mt-5">
                                                <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('country' , 'admin') }} :</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="country_id" class="form-control form-control-solid" id="" style="width: 100%" data-placeholder="{{ TranslationHelper::translate('role' , 'admin') }}" >
                                                    <option value="">---</option>
                                                    <option value="1">
                                                        مصر
                                                        {{-- <img src="{{ asset('dashboard/assets/media/flags/egypt.svg') }}" style="width: 30px;height:30px ;margin: auto 5px" alt="">   --}}
                                                    </option>
                                                    <option value="2">
                                                        السعودية
                                                        {{-- <img src="{{ asset('dashboard/assets/media/flags/saudi-arabia.svg') }}" style="width: 30px;height:30px ;margin: auto 5px" alt="">   --}}
                                                    </option>
                                                    <option value="3">
                                                        الامارات
                                                        {{-- <img src="{{ asset('dashboard/assets/media/flags/united-arab-emirates.svg') }}" style="width: 30px;height:30px ;margin: auto 5px" alt="">   --}}
                                                    </option> 
                                                </select>
                                                @error('type')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
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
            $('#role').select2();
            let formId = '#admin_form';
            sendRequest();
        </script>
    @endpush
