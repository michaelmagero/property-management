
@extends('layouts.admin')

@section('header')
@stop

@section('content')
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<!-- BEGIN: Subheader -->
			<div class="m-subheader ">
				<div class="d-flex align-items-center">
					<div class="mr-auto">
						<h3 class="m-subheader__title ">Expenditure</h3>
					</div>
			<div>
				<span class="m-subheader__daterange" >
					<span class="m-subheader__daterange-label">
						<strong> {{ date('D,   M d Y h:i a') }} </strong>
						<span class="m-subheader__daterange-title"></span>
						<span class="m-subheader__daterange-date  m--font-brand"></span>
					</span>
				</span>
					</div>
				</div>
			</div>
		<!-- END: Subheader -->

			<div class="m-content">
				<!--begin::Portlet-->
					<div class="m-portlet">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption" style="margin: 0 0 0 300px !important;">
								<div class="col-lg-6 col-lg-offset-3">
									<span class="text-center"></span>
								</div>
							</div>
						</div>
				<!--begin::Form-->

				@if(Auth::user()->hasRole('admin'))

						<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{ url('new-expenditure') }}" autocomplete="off"  enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="m-portlet__body">
								<div class="form-group m-form__group row">

									<div class="col-lg-4">
										<label>Paid To:</label>
										<input type="text" name="paid_to" class="form-control m-input" value="{{ old('paid_to') }}" required>

									</div>
									<div class="col-lg-4">
										<label>Expenditure:</label>
										<input type="text" name="expenditure" class="form-control m-input" value="{{ old('expenditure') }}" required>

									</div>
									<div class="col-lg-4">
										<label class="">Amount:</label>
										<input type="text" name="amount" class="form-control m-input" value="{{ old('amount') }}" required>
									</div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <label>Receipts:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="receipts">
                                            <label class="custom-file-label" for="customFile">
                                                Choose file
                                            </label>
                                        </div>
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
				@elseif(Auth::user()->hasRole('administrator'))

						<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{ url('new-expenditure') }}" autocomplete="off"  enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="m-portlet__body">
								<div class="form-group m-form__group row">

									<div class="col-lg-4">
										<label>Paid To:</label>
										<input type="text" name="paid_to" class="form-control m-input" value="{{ old('paid_to') }}" required>

									</div>
									<div class="col-lg-4">
										<label>Expenditure:</label>
										<input type="text" name="expenditure" class="form-control m-input" value="{{ old('expenditure') }}" required>

									</div>
									<div class="col-lg-4">
										<label class="">Amount:</label>
										<input type="text" name="amount" class="form-control m-input" value="{{ old('amount') }}" required>
									</div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <label>Receipts:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="receipts">
                                            <label class="custom-file-label" for="customFile">
                                                Choose file
                                            </label>
                                        </div>
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
				@elseif(Auth::user()->hasRole('accountant'))

						<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{ url('new-expenditure') }}" autocomplete="off"  enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="m-portlet__body">
								<div class="form-group m-form__group row">

									<div class="col-lg-4">
										<label>Paid To:</label>
										<input type="text" name="paid_to" class="form-control m-input" value="{{ old('paid_to') }}" required>

									</div>
									<div class="col-lg-4">
										<label>Expenditure:</label>
										<input type="text" name="expenditure" class="form-control m-input" value="{{ old('expenditure') }}" required>

									</div>
									<div class="col-lg-4">
										<label class="">Amount:</label>
										<input type="text" name="amount" class="form-control m-input" value="{{ old('amount') }}" required>
									</div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <label>Receipts:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="receipts">
                                            <label class="custom-file-label" for="customFile">
                                                Choose file
                                            </label>
                                        </div>
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
