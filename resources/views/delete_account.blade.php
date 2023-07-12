<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')
<div class="card-body">
    <form action="{{url('account_delete')}}" method="post">
        @csrf
        <div class="form-group">
            <label class="me-3" for="">Are you sure delete this account?</label>
            <input type="text" name="id" value="{{$admin->id_user}}">
        </div>
        <button type="submit" class="btn btn-primary">Yes</button>
        <a href="/admin"><button type="button" class="btn btn-secondary">Close</button></a>
    </form>
</div>
@endsection