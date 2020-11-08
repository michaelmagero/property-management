
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
                            Readings
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
										<span>New User</span>
									</span>
								</a>
							</li>
						@elseif(Auth::user()->hasRole('admin'))
							<li class="m-portlet__nav-item">
								<a href="{{ url('new-owner') }}" class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="la la-user"></i>
										<span>New Owner</span>
									</span>
								</a>
							</li>
						@elseif(Auth::user()->hasRole('administrator'))
							<li class="m-portlet__nav-item">
								<a href="{{ url('new-owner') }}" class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="la la-user"></i>
										<span>New Owner</span>
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
                                <th>Unit No</th>
                                <th>Current Readings</th>
                                <th>Previous Readings</th>
                                <th>Rate</th>
                                <th>Amount</th>
                                <th>Month</th>
                                <th>Action</th>
                            </tr>

						@else

						@endif
					</thead>
					<tbody>
						@if(Auth::user()->hasRole('admin'))
                            @foreach($readings as $reading)
                            <tr>

                                <td>{{ $reading->unit_id }}</td>
                                <td>{{ $reading->current_readings }}</td>
                                <td>{{ $reading->previous_readings }}</td>
                                <td>{{ $reading->rate }}</td>
                                <td>{{ $reading->amount }}</td>
                                <td>{{ $reading->month }}</td>
                                <td>
                                    <a href="{{ url('show-owner/'.$reading->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ url('edit-owner/'.$reading->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('delete-owner/'.$reading->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
						@elseif(Auth::user()->hasRole('administrator'))
                            @foreach($users as $user)
                                <tr>
                                    <td class="" tabindex="0">
                                        <div class="m-card-user m-card-user--sm">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="m-card-user__details">
                                                        <span class="m-card-user__name">{{$user->name}}  {{$user->lastname}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ url('show-owner/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('edit-owner/'.$user->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                            <i class="fa fa-edit"></i>
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

































