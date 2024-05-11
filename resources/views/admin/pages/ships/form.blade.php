@extends('admin.layouts.app')

@section('crumb')
<x-bread-crumb :breadcrumbs="[
        ['text'=> TranslationHelper::translate('ship_movements' , 'admin') ,'link'=>route('admin.ship.index')],
        ['text'=> TranslationHelper::translate( Str::replace(' ' , '_', Str::lower(getLastKeyRoute(request()->route()->getName()))) , 'admin')]
        ]" :button="['text'=> TranslationHelper::translate('go_to_ship_movements' , 'admin') ,'link'=>route('admin.ship.index')]" :permission="auth('admin')->user()->can('ship_movements.read')">
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
                                <div class="row">
                                    @foreach (Config('language') as $key => $lang)
                                        <div class="col-{{ count(Config('language')) > 1  ? 6 : 12 ;}}">
                                            <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('name' , 'admin') }} {{ $lang}}:</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" required value="{{ old('name.'.$key) ?? $ship->getTranslation('name',$key)}}" placeholder="{{ $lang }}" name="name[{{ $key}}]" />
                                            @error('name.'.$key)
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('ship_tonnage' , 'admin') }} :</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" required class="form-control form-control-solid" required value="{{ old('load') ?? $ship->load }}" placeholder="{{ TranslationHelper::translate('ship_tonnage' , 'admin') }}" name="load" />
                                        @error('load')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('shipping_agent' , 'admin') }} :</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" required class="form-control form-control-solid" required value="{{ old('agent') ?? $ship->agent }}" placeholder="{{ TranslationHelper::translate('agent' , 'admin') }}" name="agent" />
                                        @error('agent')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('country' , 'admin') }} :</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" required class="form-control form-control-solid" required value="{{ old('country') ?? $ship->country }}" placeholder="{{ TranslationHelper::translate('country' , 'admin') }}" name="country" />
                                        @error('country')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('ports' , 'admin') }} :</label>

                                        <!--begin::Input-->
                                        <select name="port_id" required class="form-control form-control-solid" id="port" style="width: 100%" data-placeholder="{{ TranslationHelper::translate('port' , 'admin') }}">
                                            <option value="">{{ TranslationHelper::translate('choose' , 'admin') }}</option>
                                            @foreach ($ports as $port)
                                            <option value="{{ $port->id }}" {{ $port->id == $ship->port_id  ? 'selected' : ''}}>{{ $port->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('port_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('product' , 'admin') }} :</label>

                                        <!--begin::Input-->
                                        <select name="product_id" required class="form-control form-control-solid" id="product" style="width: 100%" data-placeholder="{{ TranslationHelper::translate('product' , 'admin') }}">
                                            <option value="">{{ TranslationHelper::translate('choose' , 'admin') }}</option>
                                            @foreach ($products as $product)
                                            <option value="{{ $product->id }}" {{ $product->id == $ship->product_id  ? 'selected' : ''}}>{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('product_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('company' , 'admin') }} :</label>

                                        <!--begin::Input-->
                                        <select name="company_id" required class="form-control form-control-solid" id="company" style="width: 100%" data-placeholder="{{ TranslationHelper::translate('company' , 'admin') }}">
                                            <option value="">{{ TranslationHelper::translate('choose' , 'admin') }}</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}" {{ $company->id == $ship->company_id  ? 'selected' : ''}}>{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('date' , 'admin') }} :</label>
                                        <input type="date" class="form-control" value="{{ old('date') ?? $ship->date }}" required name="date" />
                                        @error('date')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="fs-5 fw-bold form-label mb-2">{{ TranslationHelper::translate('orientation_date' , 'admin') }} :</label>
                                        <input type="date" class="form-control" value="{{ old('dir_date') ?? $ship->dir_date }}" required name="dir_date" />
                                        @error('dir_date')
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
            let formId = '#category_form';
            sendRequest();
            $('#port').select2();
            $('#product').select2();
            $('#company').select2();
        </script>
    @endpush
