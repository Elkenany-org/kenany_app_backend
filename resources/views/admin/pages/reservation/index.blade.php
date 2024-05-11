@extends('admin.layouts.app')

@section('crumb')
    <x-bread-crumb :breadcrumbs="[
        ['text'=> {{ TranslationHelper::translate( 'reservation' , 'admin') }} ,'link'=>route('admin.reservation.index')],
        ['text'=> 'list']
        ]" :button="[]" :permission="">
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
                <form action="{{ route('admin.reservation.index') }}" class="border p-5">
                    <div class="row" style="padding: 1.5rem 2.25rem;">
                        <div class="col-3">
                            <label for=""> {{ TranslationHelper::translate( 'status' , 'admin') }}</label>
                            <select name="status" class="form-control form-control-solid  ">
                                <option value="">---</option>
                                <?php $statuses = ['pending','accepted','cancelled']  ?>
                                @foreach($statuses as $status)
                                <option value="{{ $status }}" {{ request()->status == $status ? 'selected' : ''}}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">{{ TranslationHelper::translate( 'user' , 'admin') }}</label>
                            <select name="user" class="form-control form-control-solid  ">
                                <option value="">---</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ request()->user == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="">{{ TranslationHelper::translate( 'tour' , 'admin') }}</label>
                            <select name="tour" class="form-control form-control-solid  ">
                                <option value="">---</option>
                                @foreach($tours as $tour)
                                <option value="{{ $tour->id }}" {{ request()->tour == $tour->id ? 'selected' : ''}}>{{ $tour->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for=""> {{ TranslationHelper::translate( 'date' , 'admin') }} </label>
                            <input type="date" class="form-control" name="date" value="{{request()->date}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                        <div class="col-4 text-end">
                            <button class="btn btn-primary"> {{ TranslationHelper::translate( 'search' , 'admin') }}</button>
                        </div>
                    </div>
                </form>

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">{{ TranslationHelper::translate( 'user' , 'admin') }}</th>
                                <th class="min-w-125px">{{ TranslationHelper::translate( 'tour' , 'admin') }}</th>
                                <th class="min-w-125px">{{ TranslationHelper::translate( 'date' , 'admin') }}</th>
                                <th class="min-w-125px">{{ TranslationHelper::translate( 'adults' , 'admin') }}</th>
                                <th class="min-w-125px">{{ TranslationHelper::translate( 'children' , 'admin') }}</th>
                                <th class="min-w-125px">{{ TranslationHelper::translate( 'price_per_person' , 'admin') }}</th>
                                <th class="min-w-125px">{{ TranslationHelper::translate( 'total_price' , 'admin') }}</th>
                                <th class="text-end min-w-70px">{{ TranslationHelper::translate( 'change_status' , 'admin') }}</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            @if(count($reservations))
                            @foreach ($reservations as $reservation)
                            <tr>
                                <!--begin::Email=-->
                                <td>
                                    <a href="{{ route('admin.user.index','search='.$reservation->name) }}">
                                         {{ $reservation->user->name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $reservation->tour->title }}
                                </td>
                                <td>
                                    {{ $reservation->day  }}
                                    <br />
                                    {{ $reservation->time }}
                                </td>
                                <td>
                                    {{ $reservation->adults }}
                                </td>
                                <td>
                                    {{ $reservation->childrens }}
                                </td>
                                <td>
                                    {{ $reservation->price }}
                                </td>
                                <td>
                                    {{ ($reservation->adults + $reservation->childrens)  * $reservation->price }}
                                </td>
                                <td>
                                    <form action="{{ route('end-user.reservation.update', $reservation->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <select name="status" class="form-control" onchange="this.form.submit()">
                                            <option value="pending" {{$reservation->status == 'pending'? 'selected' : '' }}>Pending</option>
                                            <option value="accepted" {{$reservation->status == 'accepted'? 'selected disabled' : '' }}>Accepted</option>
                                            <option value="cancelled" {{$reservation->status == 'cancelled'? 'selected disabled' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            @endforeach
                            @else
                            <tr class="text-danger">
                                <td></td>
                                <td> no data found</td>
                                <td></td>
                            </tr>
                            @endif
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                    <div>{{ $reservations->links() }}</div>
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
