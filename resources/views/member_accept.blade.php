<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')
<div class="card-body">
    <form action="{{url('/member/accept')}}" method="post">
        @csrf
        <div class="form-group">
            <label class="me-3" for="">Are you sure accept this request?</label>
            <input type="text" name="email" value="{{$table->email}}" hidden>
            <input type="text" value="{{$table->email}}" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Yes</button>
        <a href="/member"><button type="button" class="btn btn-secondary">Close</button></a>
    </form>
</div>
@endsection
