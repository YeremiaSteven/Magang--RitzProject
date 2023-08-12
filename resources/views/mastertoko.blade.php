<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<main class="row overflow-auto flex-column">
		<h1 class="text-center mt-3 fw-bold">Toko Management</h1>
		<div class="col-md-4 mt-3 ps-5">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#admin_store">Tambah Data</button>
		</div>
		<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
				<th scope="col">Id</th>
				<th scope="col">Name Toko</th>
				<th scope="col">Role</th>
				<th scope="col">Active</th>
				<th scope="col">Alamat Toko</th>
				<th scope="col">No Handphone Toko</th>
				<th scope="col">Email</th>
				<th scope="col">Modified by</th>
				<th scope="col">Last Update</th>
				<th scope="col">Action</th>
			  </tr>
			</thead>
			<tbody>
				@foreach($master as $i => $u)
				<tr>
					<td>{{++$i}}</td>
					<td>{{$u->vname}}</td>
					<td>{{$u->vrole_name}}</td>
					<td>{{$u->istatus_user}}</td>
					<td>{{$u->vaddress}}</td>
					<td>{{$u->vno_telp}}</td>
					<td>{{$u->email}}</td>
					<td>{{$u->vmodi}}</td>
					{{-- @if ($u->vmodi == null)
					<td>-</td>
					@endif
					@if ($u->vmodi == 44441)
					<td>Admin</td>
					@endif
					@if ($u->vmodi == 44442)
					<td>Staff</td>
					@endif
					@if ($u->vmodi == 44443)
					<td>User</td>
					@endif

					@if ($u->dmodi == null)
					<td>-</td>
					@endif
					@if ($u->dmodi) --}}
					<td>{{$u->dmodi}}</td>
					{{-- @endif --}}
						<td class="text-center">
							<a href="/master/toko/edit/{{$u->id_user}}"><i class="fa-regular fa-pen-to-square me-2"></i></a>
							<a href="/master/toko/delete/{{$u->id_user}}"><i class="fa-solid fa-trash me-2"></i></a>
						</td>
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
		  <h5 class="modal-title" id="exampleModalLabel">Insert Store</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="{{ url('master/toko/store')}}" method="POST">
                @csrf
                <div class="form-group row mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name Toko</label>
                        <input name="nama" type="text" class="form-control" placeholder="Enter the Name Toko" required>
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Address Toko</label>
                        <input name="address" type="text" class="form-control" placeholder="Enter the Address Toko" required>
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                        <input name="notelp" type="number" class="form-control" placeholder="Enter your phone number" required>
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Rate Toko</label>
                        <input name="stock" type="number" class="form-control" placeholder="Enter the Stock" min="0" oninput="this.value =
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required >
                    </div>
					
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
