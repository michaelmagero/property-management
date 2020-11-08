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
                            Vehicles
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        @if(Auth::user()->hasRole('admin'))
                        <li class="m-portlet__nav-item">
                            <a href="{{ url('new-vehicle') }}"
                                class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
                                <span>
                                    <i class="fa fa-car"></i>
                                    <span>New Vehicle</span>
                                </span>
                            </a>
                        </li>
                        @elseif(Auth::user()->hasRole('administrator'))
                        <li class="m-portlet__nav-item">
                            <a href="{{ url('new-vehicle') }}"
                                class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
                                <span>
                                    <i class="fa fa-car"></i>
                                    <span>New Vehicle</span>
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
                                <th>Unit No</th>
                                <th>Registration</th>
                                <th>Action</th>
                            </tr>
                        @else

                        @endif
                    </thead>
                    <tbody>
                        @if(Auth::user()->hasRole('admin'))
                            @foreach($vehicles as $vehicle)
                                <tr>

                                    <td>
                                        @foreach ($units as $unit)
                                            @if ($vehicle->unit_id == $unit->id)
                                                {{ $unit->unit_no }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $vehicle->registration }}</td>



                                        <td>
                                            <a href="{{ url('show-vehicle/'.$vehicle->id) }}"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="View ">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ url('edit-vehicle/'.$vehicle->id) }}"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="Edit ">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ url('delete-vehicle/'.$vehicle->id) }}"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="Edit ">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                </tr>
                            @endforeach
                        @elseif(Auth::user()->hasRole('owner'))
                            @foreach($vehicles as $vehicle)
                                @if ($vehicle->owner_id == Auth::user()->id)
                                    <tr>
                                        <td class="" tabindex="0">
                                            <div class="m-card-user m-card-user--sm">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="m-card-user__pic">
                                                            <div class="img-circle img-responsive"><img alt="" src="/uploads/vehicles/documents/vehicle_images/{{ $vehicle->vehicle_image }}" width="40" height="40"><br>  </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="m-card-user__details">
                                                            <span class="m-card-user__name">{{$vehicle->make}}
                                                                {{$vehicle->model}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>{{ $vehicle->registration_no }}</td>


                                        @if($vehicle->status == 2)
                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span
                                                    class="m-badge m-badge--success m-badge--wide">{{ "Active" }}</span></span></td>
                                        @elseif($vehicle->status == 1)
                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span
                                                    class="m-badge  m-badge--warning m-badge--wide">{{ "In Garage" }}</span></span></td>
                                        @elseif($vehicle->status == 0)
                                        <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span
                                                    class="m-badge  m-badge--danger m-badge--wide">{{ "Out of Service" }}</span></span></td>
                                        @else
                                        <td></td>
                                        @endif


                                        <td>
                                            <a href="{{ url('show-vehicle/'.$vehicle->id) }}"
                                                class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                title="View ">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                    @elseif(Auth::user()->hasRole('administrator'))
                        @foreach($vehicles as $vehicle)
                            <tr>
                                <td class="" tabindex="0">
                                    <div class="m-card-user m-card-user--sm">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name">{{$vehicle->make}} {{$vehicle->model}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>{{ $vehicle->registration_no }}</td>

                                @foreach ($users as $user)
                                    @if ($user->id == $vehicle->owner_id)
                                        <td>{{ $user->name }} {{ $user->middlename }} {{ $user->lastname }}</td>
                                    @endif
                                @endforeach

                                <td>
                                    @foreach ($users as $user)
                                        @if($vehicle->driver_id == "")

                                        @elseif ($user->id == $vehicle->driver_id)
                                            {{ $user->name }} {{ $user->middlename }} {{ $user->lastname }}
                                        @endif
                                    @endforeach
                                </td>

                                @if($vehicle->status == 2)
                                <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span
                                            class="m-badge m-badge--success m-badge--wide">{{ "Active" }}</span></span></td>
                                @elseif($vehicle->status == 1)
                                <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span
                                            class="m-badge  m-badge--warning m-badge--wide">{{ "In Garage" }}</span></span></td>
                                @elseif($vehicle->status == 0)
                                <td data-field="Status" class="m-datatable__cell"><span style="width: 110px;"><span
                                            class="m-badge  m-badge--danger m-badge--wide">{{ "Out of Service" }}</span></span></td>
                                @else
                                <td></td>
                                @endif


                                <td>
                                    <a href="{{ url('show-vehicle/'.$vehicle->id) }}"
                                        class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                        title="View ">
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
