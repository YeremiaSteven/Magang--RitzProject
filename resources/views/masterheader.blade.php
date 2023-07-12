<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<main class="row overflow-auto flex-column">
		<h1 class="text-center mt-3 fw-bold">Item Management</h1>
		<div class="col-md-4 mt-3 ps-5">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#admin_store">Tambah Data</button>
		</div>
		<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-bordered">
			<thead>
			  <tr class="text-center">
				<th scope="col">Id</th>
				<th scope="col">Item Name</th>
				<th scope="col">Item Category</th>
				<th scope="col">Description</th>
				<th scope="col">Stock</th>
				<th scope="col">Price</th>
				<th scope="col">Barcode</th>
				<th scope="col">Expired</th>
				<th scope="col">Active</th>
                <th scope="col">Flash sale</th>
				<th scope="col">Last Update</th>
				<th scope="col">Action</th>
			  </tr>
			</thead>
			<tbody>
				@foreach($master as $i => $u)
				<tr>
					<td>{{++$i}}</td>
					<td>{{$u->vname_item}}</td>
					<td>{{$u->vcategory}}</td>
					<td>{{$u->vdescription}}</td>
					<td>{{$u->istock}}</td>
					<td>{{$u->iprice}}</td>
					<td>{{$u->vbarcode}}</td>
					<td>{{$u->dexpired}}</td>
					<td>{{$u->iactive}}</td>
                    <td>{{$u->iflashsale}}</td>
					<td>{{$u->dmodi}}</td>
					<td class="text-center"><a href="/master/header/edit/{{$u->id_item}}"><i class="fa-regular fa-pen-to-square me-2"></i></a><a href="/master/header/delete/{{$u->id_item}}"><i class="fa-solid fa-trash me-2"></i></a><a href="detail/{{$u->id_item}}"><i class="fa fa-info-circle me-2" aria-hidden="true"></i></a></td>
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
		  <h5 class="modal-title" id="exampleModalLabel">Insert Item</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="{{ url('master/header/store')}}" method="POST">
                @csrf
                <div class="form-group row mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Item name</label>
                        <input name="nama" type="text" class="form-control" placeholder="Enter the Item Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Item Category</label>
                        <select name="category" class="form-select form-select-sm" aria-label=".form-select-lg example"required>
							@foreach ($category as $i => $item)
                                <option value="{{$item->id_category}}">{{$item->vcategory}}</option>
                            @endforeach
						</select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                        <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Optional"></textarea>
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Stock</label>
                        <input name="stock" type="number" class="form-control" placeholder="Enter the Stock" min="0" oninput="this.value =
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Price</label>
                        <input name="price" type="number" class="form-control" placeholder="Enter the Price" min="0" oninput="this.value =
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Expired</label>
                        <input name="expired" type="date" class="form-control" placeholder="Optional">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Barcode</label>
                        <input name="barcode" type="number" class="form-control" placeholder="Optional" maxlength="20" size="20" >
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
