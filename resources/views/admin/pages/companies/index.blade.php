@extends('admin.layouts.app')

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
            ['text'=>  TranslationHelper::translate('companies' , 'admin') ,'link'=>route('admin.company.index')],
            ['text'=>  TranslationHelper::translate('list' , 'admin')]
            ]" :button="['text'=> TranslationHelper::translate('add_company' , 'admin'),'link'=>route('admin.company.create')]"
            :permission="auth('admin')->user()->can('guides.create')">
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
                <div class="px-5 pt-5">

                    <a target="_blank" href="{{ route('admin.companies.export') }}">
                        <div class="btn btn-success p-2"> <i class="far fa-file-excel"></i>
                            {{ TranslationHelper::translate('excel' , 'admin') }} </div>
                    </a>
                    
                    <div class="btn btn-secondary p-2"> <i class="far fa-file-excel"></i>
                        {{ TranslationHelper::translate('csv' , 'admin') }} </div>
                    <div class="btn btn-primary p-2"> <i class="fas fa-print"></i>
                        {{ TranslationHelper::translate('print' , 'admin') }} </div>
                </div>
                <!--begin::Card header-->
                <div class="p-3">
                    <form action="#" id="datatable_form_filter" method="GET" class="mt-3">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-sm-12">
                                <label for=""> {{ TranslationHelper::translate('search_name' , 'admin') }} </label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="search name">
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <label for=""> {{  TranslationHelper::translate('search_createdAt' , 'admin') }} </label>
                                <input type="date" id="date" name="created_at" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    {{ $dataTable->table(['class' => 'table align-middle table-row-dashed fs-6 gy-5']) }}
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
    let formId = '.btn_delete';
    sendRequest();

</script>
{{ $dataTable->scripts() }}

<script>
    $('#date').on('change', function(e) {
        e.preventDefault();
        reloadDatatable();
    });

    $('#title').on('keyup', function(e) {
        e.preventDefault();
        reloadDatatable();
    });

    function reloadDatatable() {
        let formData = {}
            , dt = $('.table').DataTable()
            , formSerialize = $('#datatable_form_filter').serializeArray();
        dt.on('preXhr.dt', function(e, settings, data) {
            formSerialize.forEach(item => {
                data[item.name] = item.value;
            });
        })
        dt.ajax.reload();
    }

</script>

@endpush
