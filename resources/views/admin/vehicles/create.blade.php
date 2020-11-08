
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
                                    Create Vehicle
                                </h3>
                            </div>
                        </div>
                    </div>
                <!--begin::Form-->
                @if(Auth::user()->hasRole('admin'))
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{ url('/new-vehicle') }}" autocomplete="off">
						{{ csrf_field() }}
                        <div class="m-portlet__body">

                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                        <label class="">Unit No:</label>
                                        <select class="form-control m-input" name="unit_id" required>
                                            @foreach ($units as $unit)
                                                <option hidden>
                                                    Select Unit
                                                </option>
                                                <option value="{{ $unit->id }}">
                                                    {{ $unit->unit_no }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="col-lg-4">
                                    <label class="">Vehicle Registration:</label>
                                    <input type="text" name="registration" class="form-control m-input"  value="{{ old('registration') }}" required>
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
