
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
                            Invoice
                        </h3>
                    </div>
                </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">

						    @if(Auth::user()->hasRole('admin'))
                                <li class="m-portlet__nav-item">
                                    <a href="{{ url('new-invoice') }}" class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
                                        <span>
                                            <i class="la la-user"></i>
                                            <span>New Invoice</span>
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
                                <th>Invoice No</th>
                                <th>Unit</th>
                                <th>Invoice Details</th>
                                <th>Action</th>
                            </tr>
						@else

						@endif
					</thead>
					<tbody>
						@if(Auth::user()->hasRole('admin'))
                            @foreach($invoices as $invoice)
                                <tr>

                                    <td>{{ $invoice->invoice_no }}</td>
                                    <td>
                                        @foreach ($units as $unit)
                                            @if ($invoice->unit_id == $unit->id)
                                              {{ $unit->unit_no }}
                                            @endif
                                        @endforeach
                                    </td>

                                    @foreach ($invoice->invoice_details as $id)
                                        <td>

                                            <strong> Month:- </strong> {{ $id['month'] }}<br>
                                            <strong> Rent:- </strong> {{ $id['rent'] }}<br>
                                            <strong> Garbage:- </strong> {{ $id['garbage'] }}<br>
                                            <strong> Previous readings:- </strong> {{ $id['previous_readings'] }}<br>
                                            <strong> Current readings:- </strong> {{ $id['current_readings'] }}<br>
                                            <strong> Consumed Units:- </strong> {{ $id['consumed_units'] }}<br>
                                            <strong> Total water bill:- </strong> {{ $id['total_water_bill'] }}<br>
                                            <strong> Garbage:- </strong> {{ $id['garbage'] }}<br>
                                            <strong> Total Bill Due:- </strong> {{ $id['total'] }}<br>
                                            <strong> Balance:- </strong> {{ $id['balance'] }}<br>
                                            <strong> Total Due:- </strong> {{ $id['amount_due'] }}<br>
                                        </td>
                                    @endforeach
                                    <td>
                                        {{-- <a href="{{ url('show-invoice/'.$invoice->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
                                            <i class="fa fa-eye"></i>
                                        </a> --}}
                                        <a href="{{ url('edit-invoice/'.$invoice->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('delete-invoice/'.$invoice->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
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

































