@extends('admin.layouts.app')

@section('crumb')
<x-bread-crumb :breadcrumbs="[
        ['text'=> TranslationHelper::translate('setting' , 'admin') ],
        ['text'=> TranslationHelper::translate('home' , 'admin')],
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
                        <form action="{{ route('admin.setting.update.home') }}" method="POST" id="home_form" enctype="multipart/form-data">
                            @csrf

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <div class="row">
                                    @include('admin.layouts.form-seprate-sections', ['section' => TranslationHelper::translate('main_information' , 'admin') ])

                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-6 mt-4">
                                            <label class="fs-5 fw-bold form-label mb-5"> {{ TranslationHelper::translate('address' , 'admin') }} {{ $lang}}:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea name="address[{{ $key}}]" class="form-control form-control-solid"> {{ old('address.'.$key) ?? setting('address',$key)}} </textarea>
                                            @error('address.'.$key)
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    @endforeach

                                    <div class="col-6 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5"> {{ TranslationHelper::translate('phone' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="phone[en]" class="form-control form-control-solid" value="{{ old('phone.en') ?? setting('phone','en')}} " />
                                        @error('phone.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5"> {{ TranslationHelper::translate('email' , 'admin') }}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="email[en]" class="form-control form-control-solid" value="{{ old('email.en') ?? setting('email','en')}} " />
                                        @error('email.en')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <!--begin::Label-->
                            </div>
                            <!--end::Input group-->


                            <hr>
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <div class="row">
                                    @include('admin.layouts.form-seprate-sections', ['section' => TranslationHelper::translate('about_section_information' , 'admin') ])

                                    @foreach (Config('language') as $key => $lang)
                                    <div class="col-6 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5"> {{ TranslationHelper::translate('about_section_content' , 'admin') }} {{ $lang}}:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea name="show_section_content[{{ $key}}]" class="form-control form-control-solid"> {{ old('show_section_content.'.$key) ?? setting('show_section_content',$key)}} </textarea>
                                        @error('show_section_content.'.$key)
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    @endforeach

                                    {{-- <div class="col-6 mt-4">
                                        <label class="fs-5 fw-bold form-label mb-5">Show Section Video Link:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input name="show_section_video[en]" class="form-control form-control-solid" value="{{ old('show_section_video.en') ?? setting('show_section_video','en')}} " />
                                    @error('show_section_video.en')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}

                                <div class="col-6 mt-4">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-5 d-block">{{ TranslationHelper::translate('about_section_image' , 'admin') }}: </label>
                                    <!--end::Label-->

                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true" style="background: url('{{ setting('show_section_img','en') }}') no-repeat center center;background-size:100% 100%">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-500px h-200px"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="show_section_img" accept=".png, .jpg, .jpeg ,.svg ,.webp" />

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
                                </div>

                            </div>
                            <!--begin::Label-->
                    </div>
                    <!--end::Input group-->
                    <hr>
                    <!--begin::Row-->

                    @include('admin.layouts.form-seprate-sections', ['section' => TranslationHelper::translate('section_logo' , 'admin')])

                    <div class="row">
                        <div class="col-6 mt-4">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-5 d-block">{{ TranslationHelper::translate('white_logo' , 'admin') }}: <span class="text-danger">{{ TranslationHelper::translate('recommend_size_230_x_80' , 'admin') }} </span></label>
                            <!--end::Label-->
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true" style="background: url('{{ setting('site_logo','en') }}') no-repeat center center;background-size:100% 100%">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-500px h-200px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="site_logo" accept=".png, .jpg, .jpeg ,.svg ,.webp" />

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
                        </div>

                        <div class="col-6 mt-4">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-5 d-block">{{ TranslationHelper::translate('dark_logo' , 'admin') }}: <span class="text-danger"> {{ TranslationHelper::translate('recommend_size_230_x_80' , 'admin') }}</span></label>
                            <!--end::Label-->
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true" style="background: url('{{ setting('site_logo_sticky','en') }}')  no-repeat center center;background-size:100% 100%">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-500px h-200px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="site_logo_sticky" accept=".png, .jpg, .jpeg ,.svg ,.webp" />

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
                        </div>
                    </div>

                    <!--begin::Actions-->
                    <div class="text-center mt-3">
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
    let formId = '#home_form';
    sendRequest();
</script>
@endpush