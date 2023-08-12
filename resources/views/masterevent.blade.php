<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<main class="row overflow-auto flex-column">
		<h1 class="text-center mt-3 fw-bold">Event Management</h1>
		<div class="col-md-4 mt-3 ps-5">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#admin_store">Tambah Data</button>
		</div>
		<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
				<th scope="col">No</th>
				<th scope="col">Event</th>
				<th scope="col">Discount</th>
				<th scope="col">Waktu Mulai</th>
				<th scope="col">Waktu Berakhir</th>
				<th scope="col">Last Update</th>
				<th scope="col">Action</th>
			  </tr>
			</thead>
			<tbody>
				@foreach($master as $i => $u)
				<tr>
					<td>{{++$i}}</td>
					<td>{{$u->vdesc}}</td>
					<td>{{$u->discount}}</td>
					<td>{{$u->dstartevent}}</td>
					<td>{{$u->dsendevent}}</td>
                    <td>{{$u->vmodi}}</td>
					<td class="text-center"><a href="/master/event/edit/{{$u->id_event}}"><i class="fa-regular fa-pen-to-square me-2"></i></a>
					<a href="/master/event/delete/{{$u->id_event}}"><i class="fa-solid fa-trash me-2"></i></a></td>
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
		  <h5 class="modal-title" id="exampleModalLabel">Insert Data Event</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="{{ url('master/event/store')}}" method="POST">
                @csrf
                <div class="form-group row mt-3">
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Nama Toko</label>
						@foreach ($user as $i => $store)
							<input type = "hidden" id="id_user" name= "user" value="{{$store->id_user}}"></input> <br/>{{$store->vname}}
						@endforeach
				</div>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Role</label>
					@foreach ($user as $i => $store)
						<input type = "hidden" id="id_role" name= "role" value="{{$store->id_role}}"></input> <br/>{{$store->vrole_name}}
					@endforeach
			</div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Event</label>
                        <input name="desc" type="text" class="form-control" placeholder="Enter Event" required>
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">discount</label>
                        <input name="discount" type="text" class="form-control" placeholder="Enter discount count" required>
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                        <input name="waktumulai" type="date" class="form-control" placeholder="Enter Start Date" required>
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">End Date</label>
                        <input name="waktuselesai" type="date" class="form-control" placeholder="Enter End Date" required>
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

