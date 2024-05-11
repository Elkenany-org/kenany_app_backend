@extends('admin.layouts.app')

@section('crumb')
<x-bread-crumb :breadcrumbs="[
        ['text'=> TranslationHelper::translate('roles' , 'admin') ,'link'=>route('admin.role.index')],
        ['text'=> TranslationHelper::translate( Str::replace(' ' , '_', Str::lower(getLastKeyRoute(request()->route()->getName()))) , 'admin')  ]
        ]" :button="['text'=> TranslationHelper::translate('go_to_roles' , 'admin') ,'link'=>route('admin.role.index')]" :permission="auth('admin')->user()->can('roles.read')">
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
                        <form action="{{ $action }}" method="POST" id="role_form" enctype="multipart/form-data">
                            @csrf
                            @if($method == 'PUT')
                            @method('PUT')
                            @endif

                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <div class="row">

                                    <div class="col-6 mb-5">
                                        <label class="fs-5 fw-bold form-label mb-2">
                                            {{ TranslationHelper::translate('role_name' , 'admin') }} :</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" value="{{ old('name') ?? $role->name}}" placeholder="{{ TranslationHelper::translate('role_name' , 'admin') }}" name="name" />
                                        @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-6 my-auto mx-auto text-center">
                                        <input type="checkbox" id="all_checked" class="form-check-input" onclick="checkAllPermission()">
                                        {{ TranslationHelper::translate('all_permission' , 'admin') }}
                                    </div>

                                    <div class="row">
                                        @foreach($permissions as $key => $permission)
                                  
                                        @if( $key != 'Admin_country')
                                        <div class="col-lg-4 col-12 mt-3">
                                            <div style="background:#1f6a01;color:white;margin:10px 0;padding:10px;border-radius: 5px; ">

                                                <h4 class="d-inline-block text-light"> {{ TranslationHelper::translate( Str::replace(' ' , '_', Str::lower($key)) , 'admin')  }} </h4>
                                            </div>

                                            @foreach ($permission as $item)
                                            <div>
                                                <input type="checkbox" class="form-check-input {{ $key }} all_checked" name="permissions[{{ $item['id'] }}]" value="{{ $item['full_name'] }}" @if(is_array(old('permissions')) && in_array($item['full_name'] , old('permissions'))) checked @endif {{ in_array($item['id']  , $selectedPermissions)  ? 'checked' : ''}} />
                                                <label class="fs-5 fw-bold form-label mb-2">
                                                    {{ TranslationHelper::translate( Str::replace(' ' , '_', Str::lower($item['name'])) , 'admin')  }} </label>
                                            </div>
                                            @endforeach
                                            <hr>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary submit">
                                    <span class="indicator-label">
                                        {{ TranslationHelper::translate('save' , 'admin') }} </span>
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
</div>

@endsection

@push('admin_js')

<script>
    function checkAllPermission() {
        $('#all_checked').change(function() {
            if ($(this).is(":checked")) {
                $('.all_checked').prop('checked', true);
            } else {
                $('.all_checked').prop('checked', false);
            }
        });
    }

    $(".all_checked").change(function() {
        if ($('.all_checked:checked').length == $('.all_checked').length) {
            $('#all_checked').prop('checked', true);
        } else if ($('.all_checked:checked').length == $('.all_checked').length - 1) {
            $('#all_checked').prop('checked', true);
        } else {
            $('#all_checked').prop('checked', false);
        }
    });

</script>

<script>
    let formId = '#role_form';
    sendRequest();

</script>

@endpush
