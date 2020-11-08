
@extends('layouts.admin')

@section('header')
    User
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->

		<!-- END: Subheader -->

        <div class="m-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Edit Service
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                    @if(Auth::user()->hasRole('admin'))
                                        @foreach($services as $service)
                                            <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-service/{{ $service->id }}" enctype="multipart/form-data" autocomplete="off">
                                                {{ csrf_field() }}
                                                <div class="m-portlet__body">
                                                    <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                        <div class="alert m-alert m-alert--default" role="alert">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <div class="col-10 ml-auto">
                                                            <h3 class="m-form__section">Service Information</h3>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Vehicle Registration</label>
                                                        <div class="col-lg-7">
                                                            <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="vehicle_registration" required value="{{ old('vehicle_registration') }}">
                                                                <option value="{{ $service->vehicle_registration }}" selected>{{ $service->vehicle_registration }}</option>
                                                                <option>
                                                                    Select vehicle
                                                                </option>
                                                                @foreach ($vehicles as $vehicle)
                                                                    <option value="{{ $vehicle->registration_no }}">
                                                                        {{ $vehicle->registration_no }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Service Date</label>
                                                        <div class="col-lg-7">
                                                            <input type="text" name="service_date" value="{{ $service->service_date }}" class="form-control" id="m_datepicker_1" readonly placeholder="Select date"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Battery Service</label>
                                                        <div class="col-lg-7">
                                                            <div class="m-checkbox-list">
                                                                @if ($service->battery_status = 1)
                                                                    <label class="m-checkbox">
                                                                            <input class="form-control" type="checkbox" name="battery_status" value="1" checked="checked">
                                                                            Changed
                                                                            <span></span>
                                                                    </label>
                                                                    @elseif ($service->battery_status = 0)
                                                                        <label class="m-checkbox">
                                                                                <input class="form-control" type="checkbox" name="battery_status" value="1">
                                                                                Changed
                                                                                <span></span>
                                                                        </label>
                                                                    @else

                                                                    @endif
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Current Odometer Reading</label>
                                                        <div class="col-lg-7">
                                                            <input class="form-control m-input"  name="current_odometer_reading" value="{{ $service->current_odometer_reading }}" type="text" value="{{ $service->current_odometer_reading }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Kilometres Serviced</label>
                                                        <div class="col-lg-7">
                                                            <input class="form-control m-input"  name="kms_serviced" value="{{ $service->kms_serviced }}" type="text" value="{{ $service->kms_serviced }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Next KMS Service</label>
                                                        <div class="col-lg-7">
                                                            <input class="form-control m-input"  name="next_kms_service" value="{{ $service->next_kms_service }}" type="text" value="{{ $service->next_kms_service }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Reminder Date</label>
                                                        <div class="col-lg-7">
                                                        <input type="text" name="reminder_date" value="{{ $service->reminder_date }}" class="form-control" id="m_datepicker_1" readonly placeholder="Select date"/>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="m-portlet__foot m-portlet__foot--fit">
                                                    <div class="m-form__actions">
                                                        <div class="row">
                                                            <div class="col-2"></div>
                                                            <div class="col-lg-7">
                                                                <button type="submit" class="btn btn-primary m-btn m-btn--air m-btn--custom">
                                                                    Save Changes
                                                                </button>
                                                                &nbsp;&nbsp;
                                                                <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endforeach
                                    @elseif(Auth::user()->hasRole('administrator'))
                                        @foreach($services as $service)
                                            <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-service/{{ $service->id }}" enctype="multipart/form-data" autocomplete="off">
                                                {{ csrf_field() }}
                                                <div class="m-portlet__body">
                                                    <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                        <div class="alert m-alert m-alert--default" role="alert">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <div class="col-10 ml-auto">
                                                            <h3 class="m-form__section">Service Information</h3>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Vehicle Registration</label>
                                                        <div class="col-lg-7">
                                                            <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="vehicle_registration" required value="{{ old('vehicle_registration') }}">
                                                                <option value="{{ $service->vehicle_registration }}" selected>{{ $service->vehicle_registration }}</option>
                                                                <option>
                                                                    Select vehicle
                                                                </option>
                                                                @foreach ($vehicles as $vehicle)
                                                                    <option value="{{ $vehicle->registration_no }}">
                                                                        {{ $vehicle->registration_no }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Service Date</label>
                                                        <div class="col-lg-7">
                                                            <input type="text" name="service_date" value="{{ $service->service_date }}" class="form-control" id="m_datepicker_1" readonly placeholder="Select date"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Battery Service</label>
                                                        <div class="col-lg-7">
                                                            <div class="m-checkbox-list">
                                                                @if ($service->battery_status = 1)
                                                                    <label class="m-checkbox">
                                                                            <input class="form-control" type="checkbox" name="battery_status" value="1" checked="checked">
                                                                            Changed
                                                                            <span></span>
                                                                    </label>
                                                                    @elseif ($service->battery_status = 0)
                                                                        <label class="m-checkbox">
                                                                                <input class="form-control" type="checkbox" name="battery_status" value="1">
                                                                                Changed
                                                                                <span></span>
                                                                        </label>
                                                                    @else

                                                                    @endif
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Current Odometer Reading</label>
                                                        <div class="col-lg-7">
                                                            <input class="form-control m-input"  name="current_odometer_reading" value="{{ $service->current_odometer_reading }}" type="text" value="{{ $service->current_odometer_reading }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Kilometres Serviced</label>
                                                        <div class="col-lg-7">
                                                            <input class="form-control m-input"  name="kms_serviced" value="{{ $service->kms_serviced }}" type="text" value="{{ $service->kms_serviced }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Next KMS Service</label>
                                                        <div class="col-lg-7">
                                                            <input class="form-control m-input"  name="next_kms_service" value="{{ $service->next_kms_service }}" type="text" value="{{ $service->next_kms_service }}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Reminder Date</label>
                                                        <div class="col-lg-7">
                                                        <input type="text" name="reminder_date" value="{{ $service->reminder_date }}" class="form-control" id="m_datepicker_1" readonly placeholder="Select date"/>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="m-portlet__foot m-portlet__foot--fit">
                                                    <div class="m-form__actions">
                                                        <div class="row">
                                                            <div class="col-2"></div>
                                                            <div class="col-lg-7">
                                                                <button type="submit" class="btn btn-primary m-btn m-btn--air m-btn--custom">
                                                                    Save Changes
                                                                </button>
                                                                &nbsp;&nbsp;
                                                                <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endforeach
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!--End::Section-->
                    </div>
                </div>
            </div>
            <!-- end:: Body -->

@endsection

































