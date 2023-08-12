<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<main class="row overflow-auto flex-column">
		<h1 class="text-center mt-3 fw-bold">Item Management</h1>
		<div class="col-md-4 mt-3 ps-5">
			<a href="/detail/store/{{$id}}"><button type="button" class="btn btn-primary">Tambah Data</button></a>
		</div>
		<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
				<th scope="col">Id</th>
                <th scope="col">Id Item</th>
				<th scope="col">Item Name</th>
				<th scope="col">Picture</th>
                <th scope="col">Created by</th>
                <th scope="col">Created at</th>
                <th scope="col">Modified by</th>
				<th scope="col">Last Update</th>
				<th scope="col">Action</th>
			  </tr>
			</thead>
			<tbody>
				@foreach($detail as $i => $u)
				<tr>
					<td>{{++$i}}</td>
                    <td>{{$u->id_item}}</td>
					<td>{{$u->vname_item}}</td>
					<td><img src="{{asset('assets/picture').'/'.($u->picture)}}" alt="" class="img-thumbnail" style="width:100px"></td>
					<td>{{$u->vcrea}}</td>
                    <td>{{$u->dcrea}}</td>
                    <td>{{$u->vmodi}}</td>
                    <td>{{$u->dmodi}}</td>
					<td class="text-center"><a href="/detail/edit/{{$u->id_itemdtl}}"><i class="fa-regular fa-pen-to-square me-2"></i></a>
					<a href="/detail/delete/{{$u->id_itemdtl}}"><i class="fa-solid fa-trash me-2"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		  </table>
		</div>
        <div id="tableDetail"></div>
	</main>
</div>
@endsection
