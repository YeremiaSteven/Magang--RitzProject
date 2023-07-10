<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<main class="row overflow-auto flex-column">
		<h1 class="text-center mt-3 fw-bold">Transaction Header</h1>
		<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-bordered">
			<thead>
			  <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Id Transaction</th>
                <th scope="col">Id Payment</th>
				<th scope="col">User</th>
				<th scope="col">Total Quantity</th>
				<th scope="col">Tracking Status</th>
				<th scope="col">Total Price</th>
				<th scope="col">Notes</th>
				<th scope="col">Address</th>
				<th scope="col">Action</th>
			   </tr>
			</thead>
			<tbody>
				@foreach($transaction as $i => $u)
				<tr>
					<td>{{++$i}}</td>
                    <td>{{$u->id_transaction}}</td>
					<td>{{$u->id_payment}}</td>
					<td>{{$u->vname}}</td>
					<td>{{$u->itotal_quantity}}</td>
                    @if ($u->itracking_status == 0)
                        <td>Packing</td>
                    @endif
                    @if ($u->itracking_status == 1)
                        <td>Sending</td>
                    @endif
                    @if ($u->itracking_status == 2)
                        <td>Arrived</td>
                    @endif
                    @if ($u->itracking_status == 3)
                        <td>Failed</td>
                    @endif
					<td>Rp.{{number_format($u->itotal_price)}}</td>
					<td>{{$u->vnote}}</td>
					<td>{{$u->vaddress}}</td>
					<td class="text-center"><a href="/transaction_edit_status/{{$u->id_transaction}}"><i class="fa fa-pen-to-square me-2" aria-hidden="true"></i></a><a href="/transaction_detail/{{$u->id_transaction}}"><i class="fa fa-info-circle me-2" aria-hidden="true"></i></a><a href="/payment_detail/{{$u->id_payment}}"><i class="fa fa-usd me-2" aria-hidden="true"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		  </table>
		</div>
        <div id="tableDetail"></div>
	</main>
</div>

@endsection
