@extends('admin.layouts.app')

@section('crumb')
<x-bread-crumb :breadcrumbs="[
        ['text'=> TranslationHelper::translate('setting' , 'admin') ],
        ['text'=> TranslationHelper::translate( Str::replace(' ' , '_', Str::lower(request()->page)) , 'admin')  ],
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
                                <div class="row justify-content-center align-items-center mt-3">
                                    <div class="col-6 my-3">
                                        <h3> {{ TranslationHelper::translate('image' , 'admin') }} </h3>
                                        <!--end::Image input placeholder-->

                                        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true" style="background: url('{{ setting(request()->page.'_page_image') }}')  no-repeat center center;background-size:100% 100%">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-500px h-200px"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="{{request()->page}}_page_image" accept=".png, .jpg, .jpeg ,.svg ,.webp" />

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
                                </div>
                                <div class="row">
                                    @foreach (Config('language') as $key => $lang)
                                    <div class="col-{{ count(Config('language')) > 1  ? 6 : 12 ;}} mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5"> {{ TranslationHelper::translate("page_".Str::lower(request()->page)."_title" , 'admin') }}   {{ $lang}}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea name="{{request()->page}}_page_title[{{ $key}}]" rows="5" class="form-control form-control-solid"> {{ old(request()->page.'_page_title.'.$key) ?? setting(request()->page.'_page_title',$key)}} </textarea>
                                        @error(request()->page.'_page_title.'.$key)
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    @endforeach
                                </div>
                                <!--begin::Label-->
                            </div>
                            <!--end::Input group-->
                            <hr>
                            <!--begin::Row-->

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
        let formId = '#page_form';
        sendRequest();

    </script>
    @endpush
