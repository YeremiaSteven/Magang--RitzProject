<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<h1 class="text-center mt-3 fw-bold">Category Management</h1>
	<div class="col-md-4 mt-3 ps-5">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_category">Tambah Data</button>
	</div>
	<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
			  <th scope="col">No</th>
				<th scope="col">Id</th>
				<th scope="col">Category</th>
				<th scope="col">Created By</th>
				<th scope="col">Created At</th>
				<th scope="col">Modified By</th>
				<th scope="col">Modified At</th>
				<th scope="col">Action</th>
			  </tr>
		</thead>
		<tbody>
			@foreach($category as $i => $u)
				<tr>
				<td>{{++$i}}</td>
				<td>{{$u->id_category}}</td>
				<td>{{$u->vcategory}}</td>
				<td>{{$u->vcrea}}</td>
                <td>{{$u->dcrea}}</td>
				<td>{{$u->vmodi}}</td>
				<td>{{$u->dmodi}}</td>
				<!-- category/edit/{{$u->id_category}} -->
				<td class="text-center"><a href="category/edit/{{$u->id_category}}"><i class="fa-regular fa-pen-to-square me-2"></i></a>
				<a href="category/delete/{{$u->id_category}}"><i class="fa-solid fa-trash me-2"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	  </table>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="add_category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form method="POST" action="{{ url('/category/store')}}">
                @csrf
                <div class="input-group mb-3">
                  <span class="input-group-text w-25" id="inputGroup-sizing-default" style="white-space: break-spaces"
                    >Category Name</span>
                  <input
                    name="categoryname"
                    type="text"
                    class="form-control"
                    aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default"required
                  />
                </div>
                <div class="text-center mb-3">
                    <button
                      class="btn text-white fw-bold"
                      type="submit"
                      style="background-color: #167eee"
                    >
                      Add Category
                    </button>
                  </div>
            </form>
		</div>
	  </div>
	</div>
</div>

@endsection
