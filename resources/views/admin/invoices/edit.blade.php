
@extends('layouts.admin')

@section('header')
    User
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->

		<!-- END: Subheader -->

        <div class="m-content">
            @foreach($expenses as $expense)
                <div class="row">


                    <div class="col-xl-12 col-lg-12">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Edit Expense
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                    @if(Auth::user()->hasRole('admin'))
                                        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-car-expense/{{ $expense->id }}" enctype="multipart/form-data" autocomplete="off">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                        Expense Information
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Car</label>
                                                <div class="col-lg-7">
                                                    <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="car_registration" required >
                                                        <option value="" disabled hidden>
                                                            Select vehicle
                                                        </option>
                                                        <option value="{{ $expense->car_registration }}" selected>{{ $expense->car_registration }}</option>
                                                        @foreach ($vehicles as $vehicle)

                                                            <option value="{{ $vehicle->registration_no }}">
                                                                {{ $vehicle->registration_no }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Expense</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="expense"  type="text" value="{{ $expense->expense }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Amount</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="amount"  type="text" value="{{ $expense->amount }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Receipts</label>
                                                <div class="col-lg-7">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="receipts" value="/uploads/vehicles/documents/expense_receipts/{{ $expense->receipts }}">
                                                        <label class="custom-file-label" for="customFile">
                                                            {{ $expense->receipts }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
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
                                    @elseif(Auth::user()->hasRole('administrator'))
                                        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-car-expense/{{ $expense->id }}" enctype="multipart/form-data" autocomplete="off">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                        Expense Information
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Car</label>
                                                <div class="col-lg-7">
                                                    <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="car_registration" required >
                                                        <option value="" disabled hidden>
                                                            Select vehicle
                                                        </option>
                                                        <option value="{{ $expense->car_registration }}" selected>{{ $expense->car_registration }}</option>
                                                        @foreach ($vehicles as $vehicle)
                                                            <option value="{{ $vehicle->registration_no }}">
                                                                {{ $vehicle->registration_no }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Expense</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="expense"  type="text" value="{{ $expense->expense }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Amount</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="amount"  type="text" value="{{ $expense->amount }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Receipts</label>
                                                <div class="col-lg-7">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="receipts" value="/uploads/vehicles/documents/expense_receipts/{{ $expense->receipts }}">
                                                        <label class="custom-file-label" for="customFile">
                                                            {{ $expense->receipts }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-lg-2"></div>
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

































