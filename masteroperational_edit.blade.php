<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')
<div class="card-body">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 ">
            <form action="{{ url('/master/operational/edit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Id Holiday</label>
                    <input type="text" name="id" value="{{$master->id_operational}}" disabled>
                    <input type="text" name="id" value="{{$master->id_operational}}" hidden>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Operational</span
                        >
                        <input
                          name="operational"
                          type="text"
                          class="form-control"
                          value="{{$master->id_operational}}"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          required
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >User</span
                        >
                        <select name="user" class="form-select" aria-label="Default select example">
                             @foreach ($store as $i => $master)
                                @if ($master->id_user== $master->id_user)
                                    <option value="{{$master->id_user}}" selected>{{$master->vname}}</option>
                                @endif
                                @if ($master->id_user != $master->id_user)
                                    <option value="{{$master->id_user}}">{{$master->vname}}</option>
                                @endif

                         @endforeach
                     </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Date</label>
                        <input name="tanggal" type="date" class="form-control" placeholder="Enter the Date" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Time Open</label>
                        <input name="waktubuka" type="time" class="form-control" placeholder="Enter the Time Open" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Time Close</label>
                        <input name="waktututup" type="time" class="form-control" placeholder="Enter the Time Close" required>
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