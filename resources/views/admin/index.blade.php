@extends('layouts.admin')

@section('header')
Admin Dashboard
@endsection

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader">
		<div class="d-flex align-items-center ">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">Dashboard</h3>
			</div>

			{{-- <div>
				<span class="m-subheader__daterange" >
					<span class="m-subheader__daterange-label">
						<strong> {{ date('D,   M d Y h:i a') }} </strong>
						<span class="m-subheader__daterange-title"></span>
						<span class="m-subheader__daterange-date  m--font-brand"></span>
					</span>
				</span>
			</div> --}}
		</div>
	</div>
	<!-- END: Subheader -->

	<div class="m-content">
        @if(Auth::user()->hasRole('admin'))
            <!--begin:: Widgets/Stats-->
            <div class="m-portlet ">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::Total Profit-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Tenants
                                    </h4>
                                    <br>
                                    <span class="m-widget24__stats m--font-brand">
                                        {{ $tenants->count() }}
                                    </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                        <div class="progress-bar m--bg-brand" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="m--space-20"></div>
                                    <div>
                                        <span class="m-widget24__change">

                                        </span>
                                        <span class="m-widget24__number">
                                            {{-- {{ $active_vehicles }} --}}
                                        </span><br>
                                    </div>
                                </div>
                            </div>
                            <!--end::Total Profit-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Feedbacks-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Units
                                    </h4>
                                    <br>
                                    <span class="m-widget24__stats m--font-info">
                                        {{ $units->count() }}
                                    </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                        <div class="progress-bar m--bg-info" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="m--space-20"></div>
                                    <div>
                                        <span class="m-widget24__change">
                                            Active
                                        </span>
                                        <span class="m-widget24__number">
                                            {{-- {{ $active_drivers }} --}}
                                        </span><br>
                                    </div>
                                </div>
                            </div>
                            <!--end::New Feedbacks-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <!--begin::New Orders-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Vehicles
                                    </h4>
                                    <br>
                                    <span class="m-widget24__stats m--font-danger">
                                        {{ $vehicles->count() }}
                                    </span>
                                    <div class="m--space-10"></div>
                                    <div class="progress m-progress--sm">
                                        <div class="progress-bar m--bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="m--space-20"></div>
                                </div>
                            </div>
                            <!--end::New Orders-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Stats-->
            <!--Begin::Section-->


            <!--End::Section-->
        @endif

	</div>
</div>
</div>
@endsection
