
@extends('layouts.admin')

@section('header')
    User
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->

        <!-- END: Subheader -->

        <div class="m-content">
            @foreach($expenditures as $expenditure)
                <div class="row">

                    <div class="col-xl-12 col-lg-12">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Expenditure Details
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-content">
                                <div>
                                    @if(Auth::user()->hasRole('admin'))

                                        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-md-10 ml-auto">
                                                    <h5 class="m-form__section">

                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Paid To</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $expenditure->paid_to }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">expenditure</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $expenditure->expenditure }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Amount</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $expenditure->amount }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Receipts</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/expenditures/{{ $expenditure->receipts }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/expenditures/{{ $expenditure->receipts }}">view receipt</a>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Created On</label>
                                                <div class="col-md-7">
                                                    <h5> {{ Carbon\Carbon::parse($expenditure->created_at)->format('d-m-Y - h:i:s') }} </h5>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    @elseif(Auth::user()->hasRole('administrator'))

                                        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-md-10 ml-auto">
                                                    <h5 class="m-form__section">

                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Paid To</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $expenditure->paid_to }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">expenditure</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $expenditure->expenditure }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Amount</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $expenditure->amount }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Receipts</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/expenditures/{{ $expenditure->receipts }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/expenditures/{{ $expenditure->receipts }}">view receipt</a>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Created On</label>
                                                <div class="col-md-7">
                                                    <h5> {{ Carbon\Carbon::parse($expenditure->created_at)->format('d-m-Y - h:i:s') }} </h5>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    @elseif(Auth::user()->hasRole('accountant'))

                                        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-md-10 ml-auto">
                                                    <h5 class="m-form__section">

                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Paid To</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $expenditure->paid_to }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">expenditure</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $expenditure->expenditure }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Amount</label>
                                                <div class="col-md-7">
                                                    <h5> {{ $expenditure->amount }} </h5>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Receipts</label>
                                                <div class="col-md-7">
                                                    <img src="/uploads/expenditures/{{ $expenditure->receipts }}" alt="" width="150" height="150"><br><br>
                                                    <a href="/uploads/expenditures/{{ $expenditure->receipts }}">view receipt</a>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">Created On</label>
                                                <div class="col-md-7">
                                                    <h5> {{ Carbon\Carbon::parse($expenditure->created_at)->format('d-m-Y - h:i:s') }} </h5>
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

































