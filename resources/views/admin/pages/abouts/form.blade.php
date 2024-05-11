@extends('admin.layouts.app')

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text'=> TranslationHelper::translate('abouts' , 'admin') ,'link'=>route('admin.about.index')],
        ['text'=> TranslationHelper::translate( Str::replace(' ' , '_', Str::lower(getLastKeyRoute(request()->route()->getName()))) , 'admin')]
        ]" :button="['text'=> TranslationHelper::translate('go_to_abouts' , 'admin') ,'link'=>route('admin.about.index')]"
        :permission="auth('admin')->user()->can('abouts.read')">
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
                                <div class="row justify-content-center align-items-center mt-3">
                                    <div class="col-3 my-3">
                                        <h3> {{ TranslationHelper::translate('image' , 'admin') }} </h3>
                                        <!--end::Image input placeholder-->

                                        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true" style="background: url('{{ $about->getAvatar() }}');background-size:100% 100%">
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
                                </div>
                                <div class="row">
                                    @foreach (Config('language') as $key => $lang)
                                    <div class="col-{{ count(Config('language')) > 1  ? 6 : 12 ;}}">
                                        <label class="fs-5 fw-bold form-label mb-5"> {{ TranslationHelper::translate('title' , 'admin') }} {{ $lang}}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" value="{{ old('title.'.$key) ?? $about->getTranslation('title',$key)}}" placeholder="{{ $lang }}" name="title[{{ $key}}]" />
                                        @error('title.'.$key)
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    @endforeach

                                    @foreach (Config('language') as $key => $lang)
                                    <div class="col-{{ count(Config('language')) > 1  ? 6 : 12 ;}} mt-5">
                                        <label class="fs-5 fw-bold form-label mb-5">{{ TranslationHelper::translate('content' , 'admin') }}  {{ $lang}}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea name="content[{{ $key}}]" class="form-control form-control-solid">{{ old('content.'.$key) ?? $about->getTranslation('content',$key)}}</textarea>
                                        @error('content.'.$key)
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
        let formId = '#about_form';
        sendRequest();
    </script>
    @endpush
