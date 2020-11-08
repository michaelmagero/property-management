
@extends('layouts.admin')

@section('header')
     Users
@endsection

@section('content')

  <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->

		<!-- END: Subheader -->

		<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Drivers
                        </h3>
                    </div>
                </div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						@if(Auth::user()->hasRole('dev'))
							<li class="m-portlet__nav-item">
								<a href="{{ url('new-driver') }}" class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="la la-user"></i>
										<span>New Driver</span>
									</span>
								</a>
							</li>
						@elseif(Auth::user()->hasRole('admin'))
							<li class="m-portlet__nav-item">
								<a href="{{ url('new-driver') }}" class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="la la-user"></i>
										<span>New Driver</span>
									</span>
								</a>
							</li>
						@elseif(Auth::user()->hasRole('administrator'))
							<li class="m-portlet__nav-item">
								<a href="{{ url('new-driver') }}" class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="la la-user"></i>
										<span>New Driver</span>
									</span>
								</a>
							</li>

						@endif
						<li class="m-portlet__nav-item"></li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<table class="table table-bordered table-striped " id="table">
					<thead class>
						@if(Auth::user()->hasRole('admin'))
                            <tr>
                                <th>Names</th>
                                <th>Status</th>
                                <th>Phone</th>
                                <th>Car</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
						@elseif(Auth::user()->hasRole('administrator'))
                            <tr>
                                <th>Names</th>
                                <th>Status</th>
                                <th>Phone</th>
                                <th>Car</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
						@else

						@endif
					</thead>
					<tbody>
						@if(Auth::user()->hasRole('admin'))
                            @foreach($users as $user)
                            <tr>
                                <td class="" tabindex="0">
                                    <div class="m-card-user m-card-user--sm">
                                        <div class="row">
                                             <div class="col-md-3">
                                                <div class="m-card-user__pic">
                                                    <div class="img-circle img-responsive"><img alt="" src="/uploads/users/documents/profile_picture/{{ $user->profile_picture }}" width="40" height="40"><br>  </div>
												</div>
											</div>
                                            <div class="col-md-9">
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">{{$user->name}} {{$user->middlename}} {{$user->lastname}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                @if($user->status == 1)
                                    <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">{{ "Active" }}</span></span></td>
                                @elseif($user->status == 0)
                                    <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ "In Active" }}</span></span></td>
                                @else
                                    <td></td>
                                @endif

                                <td>{{ $user->phone }}</td>

                                <td>
                                @foreach ($vehicles as $vehicle)
                                    @if ($vehicle->driver_id == "")

                                    @elseif($vehicle->driver_id == $user->id)
                                        {{ $vehicle->registration_no }}
                                    @endif
                                @endforeach
                                </td>

                                <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-M-Y') }}</td>
                                <td>
                                    <a href="{{ url('show-driver/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ url('edit-driver/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('delete-driver/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </button>
                                </td>
                            </tr>

                            @endforeach
						@elseif(Auth::user()->hasRole('administrator'))
                            @foreach($users as $user)
                            <tr>
                                <td class="" tabindex="0">
                                    <div class="m-card-user m-card-user--sm">
                                        <div class="row">
                                             <div class="col-md-3">
                                                <div class="m-card-user__pic">
                                                    <div class="img-circle img-responsive"><img alt="" src="/uploads/users/documents/profile_picture/{{ $user->profile_picture }}" width="40" height="40"><br>  </div>
												</div>
											</div>
                                            <div class="col-md-9">
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">{{$user->name}} {{$user->middlename}} {{$user->lastname}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                @if($user->status == 1)
                                    <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">{{ "Active" }}</span></span></td>
                                @elseif($user->status == 0)
                                    <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ "In Active" }}</span></span></td>
                                @else
                                    <td></td>
                                @endif

                                <td>{{ $user->phone }}</td>

                                <td>
                                @foreach ($vehicles as $vehicle)
                                    @if ($vehicle->driver_id == "")

                                    @elseif($vehicle->driver_id == $user->id)
                                        {{ $vehicle->registration_no }}
                                    @endif
                                @endforeach
                                </td>

                                <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-M-Y') }}</td>
                                <td>
                                    <a href="{{ url('show-driver/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
						@else

						@endif
						</tbody>
				</table>
			</div>
		</div>
	</div>

		</div>
	</div>
<!-- end:: Body -->
@endsection

































