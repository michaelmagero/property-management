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
                                    <span class="m-portlet__head-icon m--hide">
                                        <i class="la la-gear"></i>
                                    </span>
                                    <span class="text-center">
                                        <br>
                                        <div class="col-md-12 "></div>
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
                                    <img src="/uploads/vehicles/documents/vehicle_images/{{ $vehicle->vehicle_image }}" alt="" / width="60" height="60">
                                </div>
                            </div>
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name">
                                    {{ $vehicle->make }} {{ $vehicle->model }}
                                </span>
                                <a href="" class="m-card-profile__email m-link">
                                    {{ $vehicle->registration_no }}
                                </a>
                            </div>
                        </div>
                        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                            <li class="m-nav__separator m-nav__separator--fit"></li>
                            <li class="m-nav__section m--hide">
                                <span class="m-nav__section-text">Section</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Edit Vehicle
                                </h3>
                            </div>
                        </div>

                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_user_profile_tab_1">
                            @if(Auth::user()->hasRole('admin'))
                                <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-vehicle/{{ $vehicle->id }}" enctype="multipart/form-data" autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group m--margin-top-10 m--hide">
                                            <div class="alert m-alert m-alert--default" role="alert">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">Vehicle Information</h3>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Registration No
                                            </label>
                                            <div class="col-lg-7">
                                                <input class="form-control m-input" name="registration_no" type="text"
                                                    value="{{ $vehicle->registration_no }}">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Vehicle Owner
                                            </label>
                                            <div class="col-lg-7">
                                                <select class="form-control m-bootstrap-select m_selectpicker"
                                                    data-live-search="true" name="owner_id">
                                                    <option value="{{ $vehicle->owner_id }}" selected>
                                                        @foreach ($owners as $owner)
                                                            @if($owner->id == $vehicle->owner_id)
                                                                {{ $owner->name }} {{ $owner->middlename }} {{ $owner->lastname }}
                                                            @endif
                                                        @endforeach
                                                    </option>
                                                    <option value="" disabled hidden>
                                                        Select Owner
                                                    </option>
                                                    @foreach ($owners as $owner)
                                                        <option value="{{ $owner->id }}">
                                                            {{ $owner->name }} {{ $owner->middlename }} {{ $owner->lastname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Vehicle Driver
                                            </label>
                                            <div class="col-lg-7">
                                                <select class="form-control m-bootstrap-select m_selectpicker"
                                                    data-live-search="true" name="driver_id">
                                                    <option value="{{ $vehicle->driver_id }}" selected>
                                                        @foreach ($drivers as $driver)
                                                            @if($driver->id == $vehicle->driver_id)
                                                                {{ $driver->name }} {{ $driver->middlename }}
                                                                {{ $driver->lastname }}
                                                            @endif
                                                        @endforeach
                                                    </option>
                                                    <option value="" disabled hidden>
                                                        Select Owner
                                                    </option>
                                                    @foreach ($drivers as $driver)
                                                        <option value="{{ $driver->id }}">
                                                            {{ $driver->name }} {{ $driver->middlename }}
                                                            {{ $driver->lastname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Make
                                            </label>
                                            <div class="col-lg-7">
                                                <input class="form-control m-input" name="make" type="text"
                                                    value="{{ $vehicle->make }}">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Model
                                            </label>
                                            <div class="col-lg-7">
                                                <input class="form-control m-input" name="model" type="text"
                                                    value="{{ $vehicle->model }}">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                YOM <small>(Year of Manufacture)</small>
                                            </label>
                                            <div class="col-lg-7">
                                                <select id="" name="yom" class="form-control m-input">
                                                    <option value="{{ $vehicle->yom }}" selected>{{ $vehicle->yom }}
                                                    </option>
                                                    <option value="2020">2020</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2005">2005</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Color
                                            </label>
                                            <div class="col-lg-7">
                                                <select id="" name="color" class="form-control m-input"
                                                    value="{{ old('color') }}">
                                                    <option value="{{ $vehicle->color }}" selected>{{ $vehicle->color }}
                                                    </option>
                                                    <option value="black">Black</option>
                                                    <option value="white">White</option>
                                                    <option value="silver">Silver</option>
                                                    <option value="grey">Grey</option>
                                                    <option value="red">Red</option>
                                                    <option value="blue">Blue</option>
                                                    <option value="maroon">Maroon</option>
                                                    <option value="purple">Purple</option>
                                                    <option value="pink">Pink</option>
                                                    <option value="green">Green</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Fuel Type
                                            </label>
                                            <div class="col-lg-7">
                                                <select id="" name="fuel_type" class="form-control m-input"
                                                    value="{{ old('fuel_type') }}">
                                                        <option value="{{ $vehicle->fuel_type }}" selected>
                                                            {{ $vehicle->fuel_type }}
                                                        </option>
                                                        <option value="petrol">Petrol</option>
                                                        <option value="diesel">Diesel</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Status
                                            </label>
                                            <div class="col-lg-7">
                                                <select class="form-control m-input " name="status"
                                                    value="{{ old('status') }}">
                                                    <option value="{{ $vehicle->status }}" selected>
                                                        @if($vehicle->status == '2' )
                                                            Active
                                                        @elseif ($vehicle->status == '1')
                                                            In-garage
                                                        @elseif ($vehicle->status == '0')
                                                            Out of Service
                                                        @else

                                                        @endif
                                                    </option>
                                                    <option value="{{ $vehicle->status }}" hidden>
                                                        Select Status
                                                    </option>
                                                    <option value="2">
                                                        Active
                                                    </option>
                                                    <option value="1">
                                                        In-garage
                                                    </option>
                                                    <option value="0">
                                                        Out of Service
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Vehicle Image
                                            </label>
                                            <div class="col-lg-7">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="vehicle_image" value="{{ $vehicle->vehicle_image }}">
                                                    <label class="custom-file-label" for="customFile">
                                                        {{ $vehicle->vehicle_image }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Logbook
                                            </label>
                                            <div class="col-lg-7">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="logbook" value="{{ $vehicle->logbook }}">
                                                    <label class="custom-file-label" for="customFile">
                                                        {{ $vehicle->logbook }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Insurance Sticker
                                            </label>
                                            <div class="col-lg-7">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="insurance_sticker" value="{{ $vehicle->insurance_sticker }}">
                                                    <label class="custom-file-label" for="customFile">
                                                        {{ $vehicle->insurance_sticker }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Uber Inspection
                                            </label>
                                            <div class="col-lg-7">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="uber_inspection" value="{{ $vehicle->uber_inspection }}">
                                                    <label class="custom-file-label" for="customFile">
                                                        {{ $vehicle->uber_inspection }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-lg-2 col-form-label">
                                            NTSA Inspection
                                        </label>
                                        <div class="col-lg-7">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="ntsa_inspection" value="{{ $vehicle->ntsa_inspection }}">
                                                <label class="custom-file-label" for="customFile">
                                                    {{ $vehicle->ntsa_inspection }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions">
                                            <div class="row">
                                                <div class="col-lg-2"></div>
                                                <div class="col-lg-7">
                                                    <button type="submit"
                                                        class="btn btn-primary m-btn m-btn--air m-btn--custom">
                                                        Save Changes
                                                    </button>
                                                    &nbsp;&nbsp;
                                                    <button type="reset"
                                                        class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @elseif(Auth::user()->hasRole('administrator'))
                                <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-vehicle/{{ $vehicle->id }}" enctype="multipart/form-data" autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group m--margin-top-10 m--hide">
                                            <div class="alert m-alert m-alert--default" role="alert">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">Vehicle Information</h3>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Registration No
                                            </label>
                                            <div class="col-lg-7">
                                                <input class="form-control m-input" name="registration_no" type="text"
                                                    value="{{ $vehicle->registration_no }}">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Vehicle Owner
                                            </label>
                                            <div class="col-lg-7">
                                                <select class="form-control m-bootstrap-select m_selectpicker"
                                                    data-live-search="true" name="owner_id">
                                                    <option value="{{ $vehicle->owner_id }}" selected>
                                                        @foreach ($owners as $owner)
                                                            @if($owner->id == $vehicle->owner_id)
                                                                {{ $owner->name }} {{ $owner->middlename }} {{ $owner->lastname }}
                                                            @endif
                                                        @endforeach
                                                    </option>
                                                    <option value="" disabled hidden>
                                                        Select Owner
                                                    </option>
                                                    @foreach ($owners as $owner)
                                                        <option value="{{ $owner->id }}">
                                                            {{ $owner->name }} {{ $owner->middlename }} {{ $owner->lastname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Vehicle Driver
                                            </label>
                                            <div class="col-lg-7">
                                                <select class="form-control m-bootstrap-select m_selectpicker"
                                                    data-live-search="true" name="driver_id">
                                                    <option value="{{ $vehicle->driver_id }}" selected>
                                                        @foreach ($drivers as $driver)
                                                            @if($driver->id == $vehicle->driver_id)
                                                                {{ $driver->name }} {{ $driver->middlename }}
                                                                {{ $driver->lastname }}
                                                            @endif
                                                        @endforeach
                                                    </option>
                                                    <option value="" disabled hidden>
                                                        Select Owner
                                                    </option>
                                                    @foreach ($drivers as $driver)
                                                        <option value="{{ $driver->id }}">
                                                            {{ $driver->name }} {{ $driver->middlename }}
                                                            {{ $driver->lastname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Make
                                            </label>
                                            <div class="col-lg-7">
                                                <input class="form-control m-input" name="make" type="text"
                                                    value="{{ $vehicle->make }}">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Model
                                            </label>
                                            <div class="col-lg-7">
                                                <input class="form-control m-input" name="model" type="text"
                                                    value="{{ $vehicle->model }}">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                YOM <small>(Year of Manufacture)</small>
                                            </label>
                                            <div class="col-lg-7">
                                                <select id="" name="yom" class="form-control m-input">
                                                    <option value="{{ $vehicle->yom }}" selected>{{ $vehicle->yom }}
                                                    </option>
                                                    <option value="2020">2020</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2005">2005</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Color
                                            </label>
                                            <div class="col-lg-7">
                                                <select id="" name="color" class="form-control m-input"
                                                    value="{{ old('color') }}">
                                                    <option value="{{ $vehicle->color }}" selected>{{ $vehicle->color }}
                                                    </option>
                                                    <option value="black">Black</option>
                                                    <option value="white">White</option>
                                                    <option value="silver">Silver</option>
                                                    <option value="grey">Grey</option>
                                                    <option value="red">Red</option>
                                                    <option value="blue">Blue</option>
                                                    <option value="maroon">Maroon</option>
                                                    <option value="purple">Purple</option>
                                                    <option value="pink">Pink</option>
                                                    <option value="green">Green</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Fuel Type
                                            </label>
                                            <div class="col-lg-7">
                                                <select id="" name="fuel_type" class="form-control m-input"
                                                    value="{{ old('fuel_type') }}">
                                                        <option value="{{ $vehicle->fuel_type }}" selected>
                                                            {{ $vehicle->fuel_type }}
                                                        </option>
                                                        <option value="petrol">Petrol</option>
                                                        <option value="diesel">Diesel</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Status
                                            </label>
                                            <div class="col-lg-7">
                                                <select class="form-control m-input " name="status"
                                                    value="{{ old('status') }}">
                                                    <option value="{{ $vehicle->status }}" selected>
                                                        @if($vehicle->status == '2' )
                                                            Active
                                                        @elseif ($vehicle->status == '1')
                                                            In-garage
                                                        @elseif ($vehicle->status == '0')
                                                            Out of Service
                                                        @else

                                                        @endif
                                                    </option>
                                                    <option value="{{ $vehicle->status }}" hidden>
                                                        Select Status
                                                    </option>
                                                    <option value="2">
                                                        Active
                                                    </option>
                                                    <option value="1">
                                                        In-garage
                                                    </option>
                                                    <option value="0">
                                                        Out of Service
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Vehicle Image
                                            </label>
                                            <div class="col-lg-7">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="vehicle_image" value="{{ $vehicle->vehicle_image }}">
                                                    <label class="custom-file-label" for="customFile">
                                                        {{ $vehicle->vehicle_image }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Logbook
                                            </label>
                                            <div class="col-lg-7">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="logbook" value="{{ $vehicle->logbook }}">
                                                    <label class="custom-file-label" for="customFile">
                                                        {{ $vehicle->logbook }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Insurance Sticker
                                            </label>
                                            <div class="col-lg-7">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="insurance_sticker" value="{{ $vehicle->insurance_sticker }}">
                                                    <label class="custom-file-label" for="customFile">
                                                        {{ $vehicle->insurance_sticker }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">
                                                Uber Inspection
                                            </label>
                                            <div class="col-lg-7">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="uber_inspection" value="{{ $vehicle->uber_inspection }}">
                                                    <label class="custom-file-label" for="customFile">
                                                        {{ $vehicle->uber_inspection }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-lg-2 col-form-label">
                                            NTSA Inspection
                                        </label>
                                        <div class="col-lg-7">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="ntsa_inspection" value="{{ $vehicle->ntsa_inspection }}">
                                                <label class="custom-file-label" for="customFile">
                                                    {{ $vehicle->ntsa_inspection }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions">
                                            <div class="row">
                                                <div class="col-lg-2"></div>
                                                <div class="col-lg-7">
                                                    <button type="submit"
                                                        class="btn btn-primary m-btn m-btn--air m-btn--custom">
                                                        Save Changes
                                                    </button>
                                                    &nbsp;&nbsp;
                                                    <button type="reset"
                                                        class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                        Cancel
                                                    </button>
                                                </div>
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
