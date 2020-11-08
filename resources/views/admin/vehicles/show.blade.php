
@extends('layouts.admin')

@section('header')
    User
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->

		<!-- END: Subheader -->

        <div class="m-content">
            @foreach($vehicles as $vehicle)
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="m-portlet  ">
                            <div class="m-portlet__body">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide"><i class="la la-gear"></i></span>
                                            <span class="text-center"><br>
                                                <div class="col-md-12 ">
                                                    <script src="../js/sweetalert2.all.js"></script>
                                                    <!-- Include this after the sweet alert js file -->
                                                    @if (Session::has('sweet_alert.alert'))
                                                        <script>
                                                            swal({!! Session::get('sweet_alert.alert') !!});
                                                        </script>
                                                    @endif
                                                </div>
                                            </span>
                                        </div>
                                    </div>
					            </div>
                                <div class="m-card-profile">
                                    <div class="m-card-profile__title m--hide">
                                        Your Profile
                                    </div>
                                    <div class="m-card-profile__pic">
                                        <div class="m-card-profile__pic-wrapper">
                                            <img src="/uploads/vehicles/documents/vehicle_images/{{ $vehicle->vehicle_image }}" alt=""/ width="80" height="70">
                                        </div>
                                    </div>
                                    <div class="m-card-profile__details">
                                        <span class="m-card-profile__name">
                                            {{ $vehicle->make }} {{ $vehicle->model }}
                                        </span>
                                    </div>
                                </div>
                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                    <li class="m-nav__section m--hide">
                                        <span class="m-nav__section-text">
                                            Section
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-8">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-tools">
                                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                                <i class="flaticon-share m--hide"></i>
                                                 Vehicle Information
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div>
                                    @if(Auth::user()->hasRole('admin'))
                                        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-vehicle/{{ $vehicle->id }}">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-md-10 ml-auto">
                                                    <h5 class="m-form__section">Vehicle Information</h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Vehicle Image</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/vehicle_images/{{ $vehicle->vehicle_image }}" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/vehicle_images/{{ $vehicle->vehicle_image }}">view image</a>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Registration No</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->registration_no }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Owner</label>
                                                <div class="col-md-7">
                                                    @foreach ($users as $user)
                                                        @if ($user->id == $vehicle->owner_id)
                                                            <h5>{{ $user->name }}  {{ $user->middlename }}  {{ $user->lastname }}</h5>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Driver</label>
                                                <div class="col-md-7">
                                                    @foreach ($users as $user)
                                                        @if ($user->id == $vehicle->driver_id)
                                                            <h5>{{ $user->name }}  {{ $user->middlename }}  {{ $user->lastname }}</h5>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Make</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->make }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Model</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->model }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Year of Manufacture</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->yom }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Color</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->color }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Fuel Type</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->fuel_type }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Status</label>
                                                <div class="col-md-7">
                                                    @if($vehicle->status == 2)
                                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">{{ "Active" }}</span></span></td>
                                                    @elseif($vehicle->status == 1)
                                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--secondary m-badge--wide">{{ "In Garage" }}</span></span></td>
                                                    @elseif($vehicle->status == 0)
                                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ "Out of Service" }}</span></span></td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Logbook</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/logbooks/{{ $vehicle->logbook }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/logbooks/{{ $vehicle->logbook }}" >view logbook</a>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Insurance Sticker</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/insurance_stickers/{{ $vehicle->insurance_sticker }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/insurance_stickers/{{ $vehicle->insurance_sticker }}">view insurance</a>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Uber Inspection</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/uber_inspection/{{ $vehicle->uber_inspection }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/uber_inspection/{{ $vehicle->uber_inspection }}">view document</a>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">PSV</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/psv/{{ $vehicle->psv }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/psv/{{ $vehicle->psv }}" >view PSV</a>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">NTSA Inspection</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/ntsa_inspection/{{ $vehicle->ntsa_inspection }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/ntsa_inspection/{{ $vehicle->ntsa_inspection }}" >view document</a>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Added On</label>
                                                <div class="col-md-7">
                                                    <h5> {{ Carbon\Carbon::parse($vehicle->created_at)->format('d-m-Y - h:i:s') }} </h5>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    @elseif(Auth::user()->hasRole('owner'))
                                         <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-vehicle/{{ $vehicle->id }}">
                                            {{ csrf_field() }}
                                            <div class="m-portlet__body">
                                                <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                    <div class="alert m-alert m-alert--default" role="alert">
                                                    </div>
                                                </div>

                                            <div class="form-group m-form__group row">
                                                <div class="col-md-10 ml-auto">
                                                    <h5 class="m-form__section">Vehicle Information</h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Vehicle Image</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/vehicle_images/{{ $vehicle->vehicle_image }}" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/vehicle_images/{{ $vehicle->vehicle_image }}">view image</a>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Registration No</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->registration_no }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Owner</label>
                                                <div class="col-md-7">
                                                    @foreach ($users as $user)
                                                        @if ($user->id == $vehicle->owner_id)
                                                            <h5>{{ $user->name }}  {{ $user->middlename }}  {{ $user->lastname }}</h5>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Driver</label>
                                                <div class="col-md-7">
                                                    @foreach ($users as $user)
                                                        @if ($user->id == $vehicle->driver_id)
                                                            <h5>{{ $user->name }}  {{ $user->middlename }}  {{ $user->lastname }}</h5>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Make</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->make }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Model</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->model }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Year of Manufacture</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->yom }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Color</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->color }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Fuel Type</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->fuel_type }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Status</label>
                                                <div class="col-md-7">
                                                    @if($vehicle->status == 2)
                                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">{{ "Active" }}</span></span></td>
                                                    @elseif($vehicle->status == 1)
                                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--secondary m-badge--wide">{{ "In Garage" }}</span></span></td>
                                                    @elseif($vehicle->status == 0)
                                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ "Out of Service" }}</span></span></td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Logbook</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/logbooks/{{ $vehicle->logbook }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/logbooks/{{ $vehicle->logbook }}" >view logbook</a>
                                                </div>
                                            </div>


                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Insurance Sticker</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/insurance_stickers/{{ $vehicle->insurance_sticker }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/insurance_stickers/{{ $vehicle->insurance_sticker }}" >view sticker</a>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Uber Inspection</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/uber_inspection/{{ $vehicle->uber_inspection }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/uber_inspection/{{ $vehicle->uber_inspection }}" >view document</a>
                                                </div>
                                            </div>


                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">PSV</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/psv/{{ $vehicle->psv }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/psv/{{ $vehicle->psv }}">view PSV</a>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">NTSA Inspection</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/ntsa_inspection/{{ $vehicle->ntsa_inspection }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/ntsa_inspection/{{ $vehicle->ntsa_inspection }}">view document</a>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Added On</label>
                                                <div class="col-md-7">
                                                    <h5> {{ Carbon\Carbon::parse($vehicle->created_at)->format('d-m-Y - h:i:s') }} </h5>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    @elseif(Auth::user()->hasRole('administrator'))
                                         <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-vehicle/{{ $vehicle->id }}">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <div class="col-md-10 ml-auto">
                                                    <h5 class="m-form__section">Vehicle Information</h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Vehicle Image</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/vehicle_images/{{ $vehicle->vehicle_image }}" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/vehicle_images/{{ $vehicle->vehicle_image }}">view image</a>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Registration No</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->registration_no }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Owner</label>
                                                <div class="col-md-7">
                                                    @foreach ($users as $user)
                                                        @if ($user->id == $vehicle->owner_id)
                                                            <h5>{{ $user->name }}  {{ $user->middlename }}  {{ $user->lastname }}</h5>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Driver</label>
                                                <div class="col-md-7">
                                                    @foreach ($users as $user)
                                                        @if ($user->id == $vehicle->driver_id)
                                                            <h5>{{ $user->name }}  {{ $user->middlename }}  {{ $user->lastname }}</h5>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Make</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->make }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Model</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->model }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Year of Manufacture</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->yom }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Color</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->color }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Fuel Type</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $vehicle->fuel_type }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Status</label>
                                                <div class="col-md-7">
                                                    @if($vehicle->status == 2)
                                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">{{ "Active" }}</span></span></td>
                                                    @elseif($vehicle->status == 1)
                                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--secondary m-badge--wide">{{ "In Garage" }}</span></span></td>
                                                    @elseif($vehicle->status == 0)
                                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ "Out of Service" }}</span></span></td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Logbook</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/logbooks/{{ $vehicle->logbook }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/logbooks/{{ $vehicle->logbook }}">view logbook</a>
                                                </div>
                                            </div>


                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Insurance Sticker</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/insurance_stickers/{{ $vehicle->insurance_sticker }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/insurance_stickers/{{ $vehicle->insurance_sticker }}">view sticker</a>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Uber Inspection</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/uber_inspection/{{ $vehicle->uber_inspection }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/uber_inspection/{{ $vehicle->uber_inspection }}">view document</a>
                                                </div>
                                            </div>


                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">PSV</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/psv/{{ $vehicle->psv }}" alt=""s width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/psv/{{ $vehicle->psv }}" alt="">view PSV</a>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">NTSA Inspection</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/vehicles/documents/ntsa_inspection/{{ $vehicle->ntsa_inspection }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/vehicles/documents/ntsa_inspection/{{ $vehicle->ntsa_inspection }}">view document</a>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Added On</label>
                                                <div class="col-md-7">
                                                    <h5> {{ Carbon\Carbon::parse($vehicle->created_at)->format('d-m-Y - h:i:s') }} </h5>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    @else

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!--End::Section-->
                    </div>
                </div>
            </div>
            <!-- end:: Body -->

@endsection

































