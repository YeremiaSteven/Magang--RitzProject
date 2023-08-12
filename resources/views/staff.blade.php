<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<h1 class="text-center mt-3 fw-bold">Account Management</h1>
	<div class="col-md-4 mt-3 ps-5">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#admin_store">Tambah Data</button>
	</div>
	<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
				<th scope="col">Id</th>
				<th scope="col">Fullname</th>
				<th scope="col">Email</th>
				<th scope="col">Telp No.</th>
				<th scope="col">Active</th>
				<th scope="col">Role</th>
				<th scope="col">Created by</th>
				<th scope="col">Modified by</th>
				<th scope="col">Last Update</th>
				<th scope="col">Action</th>
			  </tr>
		</thead>
		<tbody>
			@foreach($user as $i => $u)
				<tr>
				<td>{{++$i}}</td>
				<td>{{$u->vname}}</td>
				<td>{{$u->email}}</td>
				<td>{{$u->vno_telp}}</td>
				<td>{{$u->istatus_user}}</td>
				<td>{{$u->vrole_name}}</td>
				<td>{{$u->vcrea}}</td>
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
					<a href="admin/edit/{{$u->id_user}}"><i class="fa-regular fa-pen-to-square me-2"></i></a>
					<a href="admin/delete/{{$u->id_user}}"><i class="fa-solid fa-trash me-2"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	  </table>
	</div>
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
			<form action="{{ url('admin/store')}}" method="POST">
                @csrf
                <div class="form-group row mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" >Fullname</label>
                        <input name="nama" type="text" class="form-control" placeholder="Enter your fullname" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                        <input name="notelp" type="number" class="form-control" placeholder="Enter your phone number" required>
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
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
						<input name="password" type="password" class="form-control" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
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
