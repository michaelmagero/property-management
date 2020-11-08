
@extends('layouts.admin')

@section('header')

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
                            Units
                        </h3>
                    </div>
                </div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						@if(Auth::user()->hasRole('admin'))
							<li class="m-portlet__nav-item">
								<a href="{{ url('new-unit') }}" class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="fa fa-wrench"></i>
										<span>New Unit</span>
									</span>
								</a>
							</li>
						@elseif(Auth::user()->hasRole('administrator'))
							<li class="m-portlet__nav-item">
								<a href="{{ url('new-service') }}" class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="la la-user"></i>
										<span>New Service</span>
									</span>
								</a>
							</li>
						@elseif(Auth::user()->hasRole('owner'))
							<li class="m-portlet__nav-item">
								<a href="{{ url('new-service') }}" class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="la la-user"></i>
										<span>New Service</span>
									</span>
								</a>
							</li>
						@else

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
								<th>Tenant</th>
								<th>Unit No</th>
                                <th>Unit Type</th>
                                <th>Rent</th>
								<th>Block</th>
								<th>Floor</th>
								<th>Action</th>
							</tr>


						@else

						@endif
					</thead>
					<tbody>
						    @if(Auth::user()->hasRole('admin'))
								@foreach($units as $unit)
									<tr>
										<td>
                                            @foreach ($tenants as $tenant)
                                                {{ $tenant->name }} {{ $tenant->lastname }}
                                            @endforeach
                                        </td>
										<td>{{ $unit->unit_no }}</td>
										<td>{{ $unit->unit_type }}</td>
                                        <td>{{ $unit->rent }}</td>
                                        <td>{{ $unit->block }}</td>
										<td>{{ $unit->floor }}</td>

										<td>
											<a href="{{ url('edit-unit/'.$unit->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
												<i class="fa fa-edit"></i>
											</a>
											<a href="{{ url('delete-unit/'.$unit->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>

								@endforeach
						    @elseif(Auth::user()->hasRole('administrator'))
								@foreach($services as $service)
									<tr>
                                        <td>{{ $service->vehicle_registration }}</td>
                                        <td>{{ Carbon\Carbon::parse($service->service_date)->format('d-m-Y') }}</td>

                                        @if($service->status == 0)
											<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">{{ "Active" }}</span></span></td>
										@elseif($service->status == 1)
											<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--warning m-badge--wide">{{ "Service Due" }}</span></span></td>
										@elseif($service->status == 2)
											<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ "Out of Service" }}</span></span></td>
										@else
											<td></td>
                                        @endif
                                        <td>{{ $service->current_odometer_reading }}</td>
                                        <td>{{ $service->kms_serviced }}</td>
										<td>{{ $service->next_kms_service }}</td>

                                        @if($service->battery_status == 0)
											<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--secondary m-badge--wide">{{ "Not Changed" }}</span></span></td>
										@elseif($service->battery_status == 1)
											<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">{{ "Changed" }}</span></span></td>
                                        @else
											<td></td>
										@endif

										<td>{{ Carbon\Carbon::parse($service->reminder_date)->format('d-m-Y') }}</td>
										<td>
											<a href="{{ url('edit-service/'.$service->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
												<i class="fa fa-edit"></i>
											</a>
										</td>
									</tr>
								@endforeach
						    @elseif(Auth::user()->hasRole('driver'))
                                @foreach($services as $service)
                                    @if($service->vehicle_registration == $vehicles)
                                        <tr>
                                            <td>{{ $service->vehicle_registration }}</td>
                                            <td>{{ Carbon\Carbon::parse($service->service_date)->format('d-m-Y') }}</td>

                                            @if($service->status == 0)
                                                <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">{{ "Active" }}</span></span></td>
                                            @elseif($service->status == 1)
                                                <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--warning m-badge--wide">{{ "Service Due" }}</span></span></td>
                                            @elseif($service->status == 2)
                                                <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ "Out of Service" }}</span></span></td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{ $service->current_odometer_reading }}</td>
                                            <td>{{ $service->kms_serviced }}</td>
                                            <td>{{ $service->next_kms_service }}</td>

                                            @if($service->battery_status == 0)
                                                <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--secondary m-badge--wide">{{ "Not Changed" }}</span></span></td>
                                            @elseif($service->battery_status == 1)
                                                <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">{{ "Changed" }}</span></span></td>
                                            @else
                                                <td></td>
                                            @endif

                                            <td>{{ Carbon\Carbon::parse($service->reminder_date)->format('d-m-Y') }}</td>
                                        </tr>
                                    @endif
								@endforeach
						    @elseif(Auth::user()->hasRole('owner'))
								@foreach($services as $service)
									<tr>
                                        <td>{{ $service->vehicle_registration }}</td>
                                        <td>{{ Carbon\Carbon::parse($service->service_date)->format('d-m-Y') }}</td>

                                        @if($service->status == 0)
											<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">{{ "Active" }}</span></span></td>
										@elseif($service->status == 1)
											<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--warning m-badge--wide">{{ "Service Due" }}</span></span></td>
										@elseif($service->status == 2)
											<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--danger m-badge--wide">{{ "Out of Service" }}</span></span></td>
										@else
											<td></td>
                                        @endif
                                        <td>{{ $service->current_odometer_reading }}</td>
                                        <td>{{ $service->kms_serviced }}</td>
										<td>{{ $service->next_kms_service }}</td>

                                        @if($service->battery_status == 0)
											<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge m-badge--secondary m-badge--wide">{{ "Not Changed" }}</span></span></td>
										@elseif($service->battery_status == 1)
											<td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span class="m-badge  m-badge--success m-badge--wide">{{ "Changed" }}</span></span></td>
                                        @else
											<td></td>
										@endif

										<td>{{ Carbon\Carbon::parse($service->reminder_date)->format('d-m-Y') }}</td>
										<td>
											<a href="{{ url('edit-service/'.$service->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
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

































