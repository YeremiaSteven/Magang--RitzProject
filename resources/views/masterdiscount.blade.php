<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<h1 class="text-center mt-3 fw-bold">Master Discount</h1>
	<div class="col-md-4 mt-3 ps-5">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_discount">Tambah Data</button>
	</div>
	<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
				<th scope="col">id Discount</th>
				<th scope="col">Discount Percentage</th>
				<th scope="col">Description</th>
				<th scope="col">Price</th>
				<th scope="col">Created by</th>
				<th scope="col">Created At</th>
				<th scope="col">Modified by</th>
				<th scope="col">Last Update</th>
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($master as $i => $u)
				<tr>
                    <td>{{++$i}}</td>
					<td>{{$u->percentage}}</td>
					<td>{{$u->vdesc}}</td>
					<td>{{$u->value}}</td>
					<td>{{$u->vcrea}}</td>
					<td>{{$u->dcrea}}</td>
					<td>{{$u->vmodi}}</td>
					<td>{{$u->dmodi}}</td>
					<td class="text-center">
                     <a href="/master/discount/edit/{{$u->id_discount}}"><i class="fa-regular fa-pen-to-square me-2"></i></a>
                     <a href="/master/discount/delete/{{$u->id_discount}}"><i class="fa-solid fa-trash me-2"></i></a>
            </tr>
				@endforeach
			</tbody>
		  </table>
		</div>
        <div id="tableDetail"></div>
	</main>
</div>

<!-- Modal -->
<div class="modal fade" id="add_discount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Discount</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form method="POST" action="{{ url('master/discount/store')}}">
                @csrf
                <div class="form-group row mt-3">
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Discount Percentage</label>
                        <input name="percentage" type="number" class="form-control" placeholder="Enter the Discount Percentage" required>
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                        <input name="description" type="text" class="form-control" placeholder="Enter your Description" required>
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">value</label>
                        <input name="value" type="number" class="form-control" placeholder="Enter the value" min="0" oninput="this.value =
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