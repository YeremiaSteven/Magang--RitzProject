@extends('template')
@section('content')
<div class="card-body">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 ">
            <form action="{{ url('master/event/delete')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="me-3" for="">Are you sure delete this Event?</label>

                    <input type="text" name="id" value="{{$id}}" disabled>
                    <input type="text" name="id" value="{{$id}}" hidden>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
