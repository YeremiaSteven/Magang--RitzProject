<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="card-body">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <form action="/category/delete" method="post">
                @csrf
                <div class="form-group">
                    <label class="me-3" for="">Are you sure delete this data?</label>
                    <br>
                    <input fetype="text" value="{{$category->id_category}}" disabled>
                    <br>
                    <input style="margin-bottom: 10dp" type="text" name="id" value="{{$category->id_category}}" hidden>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
