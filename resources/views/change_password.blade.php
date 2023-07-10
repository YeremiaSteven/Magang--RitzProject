<!-- Menghubungkan dengan view template master -->
@extends('template_user')
@section('content')

    <div style="background-color:#ffffff"class="container-fluid">
      <br><br><div class="row justify-content-center">
        <div class="col-md-6 text-center">
          <div class="container">
            <div
              class="row p-2 mb-2 fw-bold rounded"
              style="background-color: #6b9bd0"
            >
              <div style="color:white;"class="col text-start">Change Password</div>
            </div>
            <form action="{{url('password_change')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row p-2">
                <div class="col text-start mb-2">
                    <div class="form-group">
                        <div class="input-group mb-2 mt-3">
                            <span class="input-group-text" id="inputGroup-sizing-default" style="width: 25%"
                            >Password</span
                            >
                            <input
                            name="password"
                            type="password"
                            class="form-control"
                            aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            />
                        </div>
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>
                </div>
              </div>
              <div class="row p-2">
                <div class="col text-start mb-2">
                    <div class="form-group">
                        <div class="input-group mb-2 mt-3">
                            <span class="input-group-text" id="inputGroup-sizing-default" style="width: 25%"
                            >Confirm Password</span
                            >
                            <input
                            name="password_confirmation"
                            type="password"
                            class="form-control"
                            aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            />
                        </div>
                        <span class="text-danger">@error('password_confirmation') {{ $message }} @enderror</span>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-warning">Change</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
