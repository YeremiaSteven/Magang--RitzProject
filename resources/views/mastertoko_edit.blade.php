<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')
<div class="card-body">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 ">
            <form action="{{ url('master/toko/edit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Id Toko</label>
                    <input type="text" name="id" value="{{$master->id_toko}}" disabled>
                    <input type="text" name="id" value="{{$master->id_toko}}" hidden>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Name Toko</span
                        >
                        <input
                          name="name"
                          type="text"
                          class="form-control"
                          value="{{$master->vname_toko}}"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          required
                        />
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Rate Toko</span
                        >
                        <input
                          name="stock"
                          type="number"
                          class="form-control"
                          value="{{$master->istock}}"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          min="0" 
                          oninput="this.value = 
                          !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                          required
                        />
                    </div>
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
