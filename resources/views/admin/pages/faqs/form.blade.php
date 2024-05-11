@extends('admin.layouts.app')

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text'=> TranslationHelper::translate('faq' , 'admin'),'link'=>route('admin.faq.index')],
        ['text'=> TranslationHelper::translate( Str::replace(' ' , '_', Str::lower(getLastKeyRoute(request()->route()->getName()))) , 'admin')]
        ]" :button="['text'=> TranslationHelper::translate('go_to_faqs' , 'admin') ,'link'=>route('admin.faq.index')]"
        :permission="auth('admin')->user()->can('faqs.read')">
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
                        <form action="{{ $action }}" method="POST" enctype="multipart/form-data" id="faq_form">
                            @csrf
                            @if($method == 'PUT')
                            @method('PUT')
                            @endif

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <div class="row">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-{{ count(Config('language')) > 1  ? 6 : 12 ;}}">
                                            <label class="fs-5 fw-bold form-label mb-5">{{  TranslationHelper::translate('question' , 'admin') }} {{ $lang}}:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" value="{{ old('question.'.$key) ?? $faq->getTranslation('question',$key)}}" placeholder="{{ $lang }}" name="question[{{ $key}}]" />
                                            @error('question.'.$key)
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    @endforeach

                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-{{ count(Config('language')) > 1  ? 6 : 12 ;}} mt-5">
                                            <label class="fs-5 fw-bold form-label mb-5">{{  TranslationHelper::translate('answer' , 'admin') }} {{ $lang}}:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea name="answer[{{ $key}}]" class="form-control form-control-solid">{{ old('answer.'.$key) ?? $faq->getTranslation('answer',$key)}}</textarea>
                                            @error('answer.'.$key)
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
                                    <span class="indicator-label">{{  TranslationHelper::translate('save' , 'admin') }}</span>
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
            let formId = '#faq_form';
            sendRequest();
        </script>
    @endpush
