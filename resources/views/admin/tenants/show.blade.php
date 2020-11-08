
@extends('layouts.admin')

@section('header')
    User
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        User Information
                    </h3>
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
            @foreach($users as $user)
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

                                            <!-- <button type="button" class="btn btn-success m-btn m-btn--custom" id="m_sweetalert_demo_6">
                                                Show me
                                            </button> -->

                                            <span class="text-center">
                                                <br>
                                                <div class="col-md-12 ">
                                                </div>
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
                                            <img src="/uploads/users/documents/profile_picture/{{ $user->profile_picture }}" alt=""/ width="60" height="60">
                                        </div>
                                    </div>
                                    <div class="m-card-profile__details">
                                        <span class="m-card-profile__name">
                                            {{ $user->name }} {{ $user->lastname }}
                                        </span>
                                        <a href="" class="m-card-profile__email m-link">
                                            {{ $user->email }}
                                        </a>
                                    </div>
                                </div>
                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                    <li class="m-nav__section m--hide">
                                        <span class="m-nav__section-text">
                                            Section
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-8">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-tools">
                                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                                <i class="flaticon-share m--hide"></i>
                                                 User Information
                                            </a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            {{-- <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                                Change Password
                                            </a> --}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div>
                                    @if(Auth::user()->hasRole('admin'))
                                        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-user/{{ $user->id }}">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h5 class="m-form__section">
                                                        User Information
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Email
                                                </label>
                                                <div class="col-md-7">
                                                    <h5> {{ $user->email }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Role
                                                </label>
                                                <div class="col-md-7">
                                                    <h5> {{ $user->role }} </h5>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 text-muted">
                                                    Created On
                                                </label>
                                                <div class="col-md-7">
                                                    <h5>  {{ $user->created_at }}  </h5>
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

































