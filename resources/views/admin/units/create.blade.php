
@extends('layouts.admin')

@section('header')
    Add Tenant
@stop

@section('content')
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
		<!-- END: Subheader -->
			<div class="m-content">
				<!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Create Unit
                                </h3>
                            </div>
                        </div>
                    </div>
                <!--begin::Form-->
                @if(Auth::user()->hasRole('admin'))
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{ url('/new-unit') }}" autocomplete="off">
						{{ csrf_field() }}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>Unit No:</label>
                                    <input type="text" name="unit_no" class="form-control m-input" value="{{ old('unit_no') }}" required>

                                </div>
                                <div class="col-lg-4">
                                        <label class="">Unit Type:</label>
                                        <select class="form-control m-input" name="unit_type" required>
                                            <option hidden>
                                                Select Unit Type
                                            </option>
                                            <option value="studio">
                                                studio
                                            </option>
                                            <option value="1 bedroom">
                                                1 bedroom
                                            </option>
                                            <option value="2 bedroom">
                                                2 bedroom
                                            </option>
                                            <option value="3 bedroom">
                                                3 bedroom
                                            </option>
                                            <option value="4 bedroom">
                                                4 bedroom
                                            </option>
                                        </select>
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Block:</label>
                                    <input type="text" name="block" class="form-control m-input" value="{{ old('block') }}" required>

                                </div>
                            </div>
                            <div class="form-group m-form__group row">

                                <div class="col-lg-4">
                                    <label class="">Floor:</label>
                                    <input type="text" name="floor" class="form-control m-input"  value="{{ old('floor') }}" required>
                                </div>
                                <div class="col-lg-4">
                                    <label class="">Rent:</label>
                                    <input type="text" name="rent" class="form-control m-input" value="{{ old('rent') }}" required>
                                </div>


                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-8">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
                <!--End::Section-->
            </div>
        </div>
    </div>
					@else

					@endif

					<!--End::Section-->
                    </div>
                </div>
            </div>
            <!-- end:: Body -->

@endsection
