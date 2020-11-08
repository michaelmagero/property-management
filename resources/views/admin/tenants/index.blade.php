
@extends('layouts.admin')

@section('header')
     Tenants
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
                            Tenant
                        </h3>
                    </div>
                </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">

						    @if(Auth::user()->hasRole('admin'))
                                <li class="m-portlet__nav-item">
                                    <a href="{{ url('new-tenant') }}" class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
                                        <span>
                                            <i class="la la-user"></i>
                                            <span>New Tenant</span>
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
                                <th>Names</th>
                                <th>Unit No</th>
                                <th>Phone</th>
                                <th>Vehicle</th>
                                <th>Action</th>
                            </tr>
						@else

						@endif
					</thead>
					<tbody>
						@if(Auth::user()->hasRole('admin'))
                            @foreach($tenants as $tenant)
                                <tr>
                                    <td class="" tabindex="0">
                                        <div class="m-card-user m-card-user--sm">
                                            <div class="row">
                                                {{-- <div class="col-md-3">
                                                    <div class="m-card-user__pic">
                                                        <div class=""><img alt="" src="/images/avatar.png" width="40" height="40"><br>  </div>
                                                    </div>
                                                </div>  --}}
                                                <div class="col-md-12">
                                                    <div class="m-card-user__details">
                                                        <span class="m-card-user__name">{{$tenant->name}}  {{$tenant->lastname}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $tenant->unit_no }}</td>
                                    <td>{{ $tenant->phone }}</td>
                                    <td>
                                        @foreach ($units as $unit)
                                            @if ($unit->unit_no == $tenant->unit_no)
                                                @foreach ($vehicles as $vehicle)
                                                    @if ($vehicle->unit_id == $unit->id)
                                                        {{ $vehicle->registration }}
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        {{-- <a href="{{ url('show-tenant/'.$tenant->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                            <i class="fa fa-eye"></i>
                                        </a> --}}
                                        <a href="{{ url('edit-tenant/'.$tenant->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('delete-tenant/'.$tenant->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                            <i class="fa fa-trash"></i>
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

































