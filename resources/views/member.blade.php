<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="col d-flex flex-column h-sm-100">
	<h1 class="text-center mt-3 fw-bold">Member Request</h1>

	<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		<table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
                <th scope="col">Id</th>
				<th scope="col">Email</th>
				<th scope="col">Status</th>
				<th scope="col">Created by</th>
				<th scope="col">Action</th>
			  </tr>
		    </thead>
            <tbody>
			@foreach($table as $i => $u)
			<tr>
				<td>{{++$i}}</td>
				<td>{{$u->email}}</td>
				@if ($u->istatus_request == 2)
                <td>Ditolak</td>
				@endif
				@if ($u->istatus_request == 1)
                <td>Disetujui</td>
                @endif
                @if ($u->istatus_request == 0)
                <td>Belum diproses</td>
                @endif

				<td>{{$u->created_at}}</td>
				<td class="text-center"><a href="member/accept/{{$u->email}}"><i class="fa fa-check-circle me-2"></i></a>
				<a href="member/delete/{{$u->email}}"><i class="fa fa-times-circle me-2"></i></a>
		
				</td>
			</tr>
			@endforeach
		    </tbody>
        </table>
	</div>
</div>



@endsection
