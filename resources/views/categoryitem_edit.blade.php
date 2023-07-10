<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')

<div class="card-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-4 text-center">
            <form action="{{url('category/update')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Id Category</label>
                    <input type="text" value="{{$category->id_category}}" disabled>
                    <input type="text" name="id" value="{{$category->id_category}}" hidden>
                    <div class="input-group mb-3 mt-5">
                      <span class="input-group-text w-25" id="inputGroup-sizing-default"  style="white-space: break-spaces"
                        >Category Name</span>

                      <input
                        name="vcategory"
                        type="text"
                        class="form-control"
                        value="{{$category->vcategory}}"
                        aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default"required
                      />
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
