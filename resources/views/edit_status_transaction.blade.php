<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')
<div class="card-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-4 text-center">
            <form action="{{ url('status_transaction/edit')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Id Transaction</label>
                    <input type="text" name="id" value="{{$status->id_transaction}}" disabled>
                    <input type="text" name="id" value="{{$status->id_transaction}}" hidden>
                    <div class="input-group mb-3 mt-5">
                      <span class="input-group-text w-50" id="inputGroup-sizing-default"
                        >Customer Name</span
                      >
                      <input
                        name="name"
                        type="text"
                        class="form-control"
                        value="{{$status->vname}}"
                        aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default"
                        disabled
                      />
                    </div>
                    <div class="input-group mb-5">
                      <span class="input-group-text w-50" id="inputGroup-sizing-default"
                        >Tracking Status</span
                      >
                      <select name="status" class="form-select" aria-label="Default select example">
                        <option value="{{$status->itracking_status}}"selected>
                            @if ($status->itracking_status == 0)
                                Packing
                            @endif
                            @if ($status->itracking_status == 1)
                                Sending
                            @endif
                            @if ($status->itracking_status == 2)
                                Arrived
                            @endif
                            @if ($status->itracking_status == 3)
                                Failed
                            @endif
                        </option>
                        @if ($status->itracking_status == 0)
                            <option value="1">Sending</option>
                            <option value="2">Arrived</option>
                            <option value="3">Failed</option>
                        @endif
                        @if ($status->itracking_status == 1)
                            <option value="2">Arrived</option>
                            <option value="3">Failed</option>
                        @endif
                      </select>
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
