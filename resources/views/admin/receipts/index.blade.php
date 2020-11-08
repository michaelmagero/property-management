
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
                            Receipts
                        </h3>
                    </div>
                </div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						@if(Auth::user()->hasRole('admin'))
							<li class="m-portlet__nav-item">
								<a href="{{ url('new-expenditure') }}" class="btn btn-primary m-btn  m-btn--custom m-btn--icon m-btn--air">
									<span>
										<i class="la la-user"></i>
										<span>
											New Receipt
										</span>
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
								<th>Paid To</th>
								<th>Expenditure</th>
								<th>Amount</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						@else

						@endif
					</thead>
					<tbody>
                            @if(Auth::user()->hasRole('admin'))
								@foreach($receipts as $receipt)
									<tr>
										<td>{{ $receipt->paid_to }}</td>
										<td>{{ $receipt->receipt }}</td>
										<td>{{ $receipt->amount }}</td>
										<td>{{ Carbon\Carbon::parse($receipt->created_at)->format('d-m-Y') }}</td>
										<td>
											<a href="{{ url('show-receipt/'.$receipt->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">
												<i class="fa fa-eye"></i>
											</a>
											<a href="{{ url('edit-receipt/'.$receipt->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
												<i class="fa fa-edit"></i>
											</a>
											<a href="{{ url('delete-receipt/'.$receipt->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit ">
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

































