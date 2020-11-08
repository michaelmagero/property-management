
@extends('layouts.admin')

@section('header')
    Add Users
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
                                        Register Driver
                                    </h3>
                                </div>
                            </div>
						</div>
				<!--begin::Form-->

				@if(Auth::user()->hasRole('admin'))
						<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{ url('new-driver') }}" autocomplete="off"  enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="m-portlet__body">
								<div class="form-group m-form__group row">
									<div class="col-lg-4">
										<label>First Name:</label>
										<input type="text" name="name" class="form-control m-input" value="{{ old('name') }}" required>
									</div>
									<div class="col-lg-4">
										<label class="">Middle Name:</label>
										<input type="text" name="middlename" class="form-control m-input" value="{{ old('middlename') }}" required>
									</div>
									<div class="col-lg-4">
										<label class="">Last Name:</label>
										<input type="text" name="lastname" class="form-control m-input" value="{{ old('lastname') }}" required>
									</div>
								</div>
								<div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <label>Passport Photo:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="profile_picture">
                                            <label class="custom-file-label" for="customFile">
                                                Choose file
                                            </label>
                                        </div>
                                    </div>
									<div class="col-lg-4">
										<label class="">National ID:</label>
										<input type="text" name="national_id" class="form-control m-input" value="{{ old('national_id') }}" required>
									</div>

									<div class="col-lg-4">
										<label class="">Phone:</label>
										<input type="text" name="phone" class="form-control m-input" value="{{ old('phone') }}" required>
									</div>
								</div>

								<div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <label class="">Email:</label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control m-input">
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="">Password:</label>
                                        <input type="password" name="password" value="{{ old('password') }}" class="form-control m-input">
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="">Status:</label>
                                        <select class="form-control m-input " name="status" required>
                                            <option hidden>
                                                Select Status
                                            </option>
                                            <option value="1">
                                                Active
                                            </option>
                                            <option value="0">
                                                In-Active
                                            </option>
                                        </select>
                                    </div>


								</div>

								<div class="form-group m-form__group row">
                                    <div class="col-lg-4">
										<label>Drivers License:</label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="customFile" name="driver_license">
											<label class="custom-file-label" for="customFile">
												Choose file
											</label>
										</div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Good Conduct Cert:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="good_conduct">
                                            <label class="custom-file-label" for="customFile">
                                                Choose file
                                            </label>
                                        </div>
                                    </div>
									<div class="col-lg-4">
										<label>PSV:</label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="customFile" name="psv">
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
						<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{ url('new-driver') }}" autocomplete="off"  enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="m-portlet__body">
								<div class="form-group m-form__group row">
									<div class="col-lg-4">
										<label>First Name:</label>
										<input type="text" name="name" class="form-control m-input" value="{{ old('name') }}" required>
									</div>
									<div class="col-lg-4">
										<label class="">Middle Name:</label>
										<input type="text" name="middlename" class="form-control m-input" value="{{ old('middlename') }}" required>
									</div>
									<div class="col-lg-4">
										<label class="">Last Name:</label>
										<input type="text" name="lastname" class="form-control m-input" value="{{ old('lastname') }}" required>
									</div>
								</div>
								<div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <label>Passport Photo:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="profile_picture">
                                            <label class="custom-file-label" for="customFile">
                                                Choose file
                                            </label>
                                        </div>
                                    </div>
									<div class="col-lg-4">
										<label class="">National ID:</label>
										<input type="text" name="national_id" class="form-control m-input" value="{{ old('national_id') }}" required>
									</div>

									<div class="col-lg-4">
										<label class="">Phone:</label>
										<input type="text" name="phone" class="form-control m-input" value="{{ old('phone') }}" required>
									</div>
								</div>

								<div class="form-group m-form__group row">
                                    <div class="col-lg-4">
                                        <label class="">Email:</label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control m-input">
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="">Password:</label>
                                        <input type="password" name="password" value="{{ old('password') }}" class="form-control m-input">
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="">Status:</label>
                                        <select class="form-control m-input " name="status" required>
                                            <option hidden>
                                                Select Status
                                            </option>
                                            <option value="1">
                                                Active
                                            </option>
                                            <option value="0">
                                                In-Active
                                            </option>
                                        </select>
                                    </div>


								</div>

								<div class="form-group m-form__group row">
                                    <div class="col-lg-4">
										<label>Drivers License:</label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="customFile" name="driver_license">
											<label class="custom-file-label" for="customFile">
												Choose file
											</label>
										</div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Good Conduct Cert:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="good_conduct">
                                            <label class="custom-file-label" for="customFile">
                                                Choose file
                                            </label>
                                        </div>
                                    </div>
									<div class="col-lg-4">
										<label>PSV:</label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="customFile" name="psv">
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
