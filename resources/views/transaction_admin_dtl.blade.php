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

<!-- Modal -->
<div class="modal fade" id="admin_store" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="{{ url('')}}" method="POST">
                @csrf
                <div class="form-group row mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Fullname</label>
                        <input name="nama" type="text" class="form-control" placeholder="Enter your fullname">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input name="username" type="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                        <input name="notelp" type="number" class="form-control" placeholder="Enter your phone number">
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Role</label>
                        <select name="role" class="form-select form-select-sm" aria-label=".form-select-lg example">
							<option selected>Open this select menu</option>
							<option value="44441">Admin</option>
							<option value="44442">Staff</option>
							<option value="44443">User</option>
						</select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                        <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter your address"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Enter your password">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Confirm Your Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password confirmation">
                    </div> --}}
                </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	  </div>
	</div>
  </div>
@endsection
