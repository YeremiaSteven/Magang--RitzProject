<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<h1 class="text-center mt-3 fw-bold">Member List</h1>

	<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		<table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
                <th scope="col">Id</th>
				<th scope="col">Full Name</th>
				<th scope="col">Status</th>
                <th scope="col">Member Type</th>
				<th scope="col">Created by</th>
                <th scope="col">Member Since</th>
				{{-- <th scope="col">Action</th> --}}
			  </tr>
		    </thead>
            <tbody>
			@foreach($member as $i => $u)
			<tr>
				<td>{{++$i}}</td>
				<td>{{$u->vname}}</td>
                @if ($u->istatus_member == 1)
                <td>Active</td>
                @endif
                @if ($u->istatus_member == 0)
                <td>Inactive</td>
                @endif

			
				@if ($u->vtipemem == 0)
                <td>Basic</td>
                @endif
				@if ($u->vtipemem == 1)
                <td>Premium</td>
                @endif

				
                <td>{{$u->vcrea}}</td>
                <td>{{$u->dcrea}}</td>
				{{-- <td class="text-center"><a href="member_list/edit/{{$u->id_user}}"><i class="fa-regular fa-pen-to-square me-2"></i></a>
                <a href="member_list/delete/{{$u->id_user}}"><i class="fa-solid fa-trash me-2"></i></a>
                </td> --}}
			</tr>
			@endforeach
		    </tbody>
        </table>
	</div>
</div>



@endsection
