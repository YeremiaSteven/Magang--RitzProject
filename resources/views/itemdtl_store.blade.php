<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')
<div class="card-body">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <form action="{{ url('detail/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Id Item</label>
                    <input type="text" name="id" value="{{$id}}">
                    <div class="mb-3 mt-5">
                        <label for="exampleFormControlInput1" class="form-label">Image Product</label>
                        <input name="image" type="file" class="form-control" placeholder="Enter the product picture" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
