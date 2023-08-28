<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')
<div class="card-body">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 ">
            <form action="{{ url('/master/holiday/edit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Id Holiday</label>
                    <input type="text" name="id" value="{{$master->id_holiday}}" disabled>
                    <input type="text" name="id" value="{{$master->id_holiday}}" hidden>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Id Holiday</span
                        >
                        <input
                          name="holiday"
                          type="text"
                          class="form-control"
                          value="{{$master->id_holiday}}"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          required
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Name Holiday</span
                        >
                        <input
                          name="nameholiday"
                          type="text"
                          class="form-control"
                          value="{{$master->vname_holiday}}"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          required
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Date Holiday</span
                        >
                        <input
                          name="dateholiday"
                          type="date"
                          class="form-control"
                          value="{{$master->dholiday}}"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
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