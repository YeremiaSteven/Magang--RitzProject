@extends('template')
@section('content')
<div class="card-body">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 ">
            <form action="{{ url('master/event/edit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Id Event</label>
                    <input type="text" name ="id" value="{{$master->id_event}}" disabled>
                    <input type="text" name="id" value="{{$master->id_event}}" hidden>

                    
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Event</label>
                      <input name="desc" type="text" class="form-control" placeholder="Enter Event" required>
                  </div>
        <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">discount</label>
                      <input name="discount" type="text" class="form-control" placeholder="Enter discount count" required>
                  </div>

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                      <input name="waktumulai" type="date" class="form-control" placeholder="Enter Start Date" required>
                  </div>
        <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">End Date</label>
                      <input name="waktuselesai" type="date" class="form-control" placeholder="Enter End Date" required>
                  </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">Update Event</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
