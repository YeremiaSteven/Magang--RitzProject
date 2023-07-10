<!-- Menghubungkan dengan view template master -->
@extends('template')
@section('content')
<div class="card-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-4 text-center">
            <form action="{{ url('web/edit')}}" method="post">
                @csrf
                <div class="form-group">
                    <div class="fs-1">Website Setting</div>
                    @foreach ($setting as $u)
                    <div class="input-group mb-3 mt-5">
                        <span class="input-group-text w-30" id="inputGroup-sizing-default"
                          >
                          @if ($u->id_global == 1)
                            Discount Flashsale
                          @endif
                          @if ($u->id_global == 2)
                            Discount Member
                          @endif
                          @if ($u->id_global == 3)
                            Name Store
                          @endif
                          </span
                        >
                        @if ($u->id_global != 3)
                            <input
                            name="dvalue{{$u->id_global}}"
                            type="number"
                            class="form-control"
                            value="{{$u->dvalue * 100}}"
                            aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            required
                            />
                            <input
                            name="ivalue{{$u->id_global}}"
                            type="number"
                            class="form-control"
                            value="{{$u->ivalue}}"
                            aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            required
                            />
                        @endif
                        @if ($u->id_global == 3)
                        <input
                          name="name"
                          type="text"
                          class="form-control"
                          value="{{$u->vvalue}}"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          required
                        />
                        @endif
                      </div>
                    @endforeach
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
