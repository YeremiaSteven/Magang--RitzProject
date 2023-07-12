<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<main class="row overflow-auto flex-column">
		<h1 class="text-center mt-3 fw-bold">Transaction Detail</h1>
		<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-bordered">
			<thead>
			  <tr class="text-center">
                <th scope="col">Number</th>
				<th scope="col">Id Transaction</th>
				<th scope="col">Item Name</th>
				<th scope="col">Total Quantity</th>
				<th scope="col">Date Packing</th>
				<th scope="col">Date Sending</th>
				<th scope="col">Date Arriving</th>
                <th scope="col">Date Failed</th>

			  </tr>
			</thead>
			<tbody>
				@foreach($transaction as $i => $u)
				<tr>
					<td>{{++$i}}</td>
					<td>{{$u->id_transaction}}</td>
					<td>{{$u->vname_item}}</td>
					<td>{{$u->iquantity}}</td>
					<td>{{$u->dspack}}</td>
					<td>{{$u->dssend}}</td>
					<td>{{$u->dsarriv}}</td>
					<td>{{$u->dsfail}}</td>
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
