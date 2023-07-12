<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<main class="row overflow-auto flex-column">
		<h1 class="text-center mt-3 fw-bold">Payment Detail</h1>

		<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-bordered">
			<thead>
			  <tr class="text-center">
                <th scope="col">Number</th>
				<th scope="col">Id Payment</th>
				<th scope="col">Secret Code</th>
				<th scope="col">Status Payment</th>
				<th scope="col">Amount</th>
                <th scope="col">Created by</th>
				<th scope="col">Created at</th>
                <th scope="col">Modified at</th>
                <th scope="col">Link Payment</th>
			  </tr>
			</thead>
			<tbody>
				@foreach($payment as $i => $u)
				<tr>
					<td>{{++$i}}</td>
					<td>{{$u->id_payment}}</td>
					<td>{{$u->vsecret_code}}</td>
					<td>{{$u->ipayment_status}}</td>
					<td>{{$u->iamount}}</td>
					<td>{{$u->vcrea}}</td>
					<td>{{$u->dcrea}}</td>
					<td>{{$u->dmodi}}</td>
                    <td><a href="{{$u->vpayment_link}}">{{$u->vpayment_link}}</a></td>
					{{-- <td>{{$u->dmodi}}</td> --}}
					{{-- <td class="text-center"><a href=""><i class="fa-regular fa-pen-to-square me-2"></i></a><a href=""><i class="fa-solid fa-trash me-2"></i></a><a href="detail/{{$u->id_item}}"><i class="fa fa-info-circle me-2" aria-hidden="true"></i></a></td> --}}
				</tr>
				@endforeach
			</tbody>
		  </table>
		</div>
        <div id="tableDetail"></div>
	</main>
</div>
@endsection
