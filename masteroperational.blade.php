<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<h1 class="text-center mt-3 fw-bold">Master Operational Hour</h1>
	<div class="col-md-4 mt-3 ps-5">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_operational">Tambah Data</button>
	</div>
	<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
				<th scope="col">Id Operational</th>
				<th scope="col">Nama User</th>
				<th scope="col">Date</th>
                <th scope="col">Time Open</th>
                <th scope="col">Time Close</th>
				<th scope="col">Last Update</th>
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($master as $i => $u)
				<tr>
					<td>{{++$i}}</td>
					<td>{{$u->vname}}</td>
                    <td>{{$u->doperational}}</td>
                    <td>{{$u->time_open}}</td>
                    <td>{{$u->time_close}}</td>
					<td>{{$u->vmodi}}</td>
					<td class="text-center">
                     <a href="/master/operational/edit/{{$u->id_operational}}"><i class="fa-regular fa-pen-to-square me-2"></i></a>
                     <a href="/master/operational/delete/{{$u->id_operational}}"><i class="fa-solid fa-trash me-2"></i></a>
            </tr>
				@endforeach
			</tbody>
		  </table>
		</div>
        <div id="tableDetail"></div>
	</main>
</div>

<!-- Modal -->
<div class="modal fade" id="add_operational" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Operational</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form method="POST" action="{{ url('master/operational/store')}}">
                @csrf
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama User</label>
                        @foreach ($store as $i => $master)
                            <input type = "hidden" id="id_user" name= "user" value="{{$master->id_user}}"></input> <br/>{{$master->vname}}
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Date</label>
                        <input name="tanggal" type="date" class="form-control" placeholder="Enter the Date" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Time Open</label>
                        <input name="waktubuka" type="time" class="form-control" placeholder="Enter the Time Open" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Time Close</label>
                        <input name="waktututup" type="time" class="form-control" placeholder="Enter the Time Close" required>
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