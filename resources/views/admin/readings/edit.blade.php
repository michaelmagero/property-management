
@extends('layouts.admin')

@section('header')
    User
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->

		<!-- END: Subheader -->

        <div class="m-content">
            @foreach($users as $user)
                <div class="row">


                    <div class="col-xl-12 col-lg-12">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Edit Owner
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                    @if(Auth::user()->hasRole('admin'))
                                        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-owner/{{ $user->id }}" autocomplete="off">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                        Owner Information
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Firstname</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input" name="name"  type="text" value="{{ $user->name }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Lastname</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="lastname"  type="text" value="{{ $user->lastname }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Phone</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="phone"  type="text" value="{{ $user->phone }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Email</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="email"  type="email" value="{{ $user->email }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                        Change Password
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Password</label>

                                                <div class="col-md-7">
                                                    <input id="password" type="password" value="{{ $user->password }}" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }} m-form__group row">
                                                <label for="password-confirm" class="col-lg-2 col-form-label">Confirm Password</label>
                                                <div class="col-md-7">
                                                    <input id="password-confirm" type="password" value="{{ $user->password }}" class="form-control" name="confirm_password" required>

                                                    @if ($errors->has('confirm_password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('confirm_password') }}</strong>
                                                        </span>
                                                    @endif
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
                                        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-owner/{{ $user->id }}" autocomplete="off">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                        Owner Information
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Firstname</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input" name="name"  type="text" value="{{ $user->name }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Lastname</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="lastname"  type="text" value="{{ $user->lastname }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Phone</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="phone"  type="text" value="{{ $user->phone }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label"> Email</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="email"  type="email" value="{{ $user->email }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                        Change Password
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} m-form__group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Password</label>

                                                <div class="col-md-7">
                                                    <input id="password" type="password" value="{{ $user->password }}" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }} m-form__group row">
                                                <label for="password-confirm" class="col-lg-2 col-form-label">Confirm Password</label>
                                                <div class="col-md-7">
                                                    <input id="password-confirm" type="password" value="{{ $user->password }}" class="form-control" name="confirm_password" required>

                                                    @if ($errors->has('confirm_password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('confirm_password') }}</strong>
                                                        </span>
                                                    @endif
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

































