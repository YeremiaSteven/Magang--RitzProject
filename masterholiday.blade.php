<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<h1 class="text-center mt-3 fw-bold">Master Holiday</h1>
	<div class="col-md-4 mt-3 ps-5">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_holiday">Tambah Data</button>
	</div>
	<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
				<th scope="col">id Holiday</th>
				<th scope="col">Name Holiday</th>
				<th scope="col">Date Holiday</th>
				<th scope="col">Last Update</th>
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($master as $i => $u)
				<tr>
                    <td>{{++$i}}</td>
					<td>{{$u->vname_holiday}}</td>
					<td>{{$u->dholiday}}</td>
					<td>{{$u->vmodi}}</td>
					<td class="text-center">
                     <a href="/master/holiday/edit/{{$u->id_holiday}}"><i class="fa-regular fa-pen-to-square me-2"></i></a>
                     <a href="/master/holiday/delete/{{$u->id_holiday}}"><i class="fa-solid fa-trash me-2"></i></a>
            </tr>
				@endforeach
			</tbody>
		  </table>
		</div>
        <div id="tableDetail"></div>
	</main>
</div>

<!-- Modal -->
<div class="modal fade" id="add_holiday" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Holiday</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form method="POST" action="{{ url('master/holiday/store')}}">
                @csrf
                <div class="form-group row mt-3">
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name Holiday</label>
                        <input name="nameholiday" type="text" class="form-control" placeholder="Enter the Name" required> 
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Date Holiday</label>
                        <input name="dateholiday" type="date" class="form-control" placeholder="Enter the Date" required>
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