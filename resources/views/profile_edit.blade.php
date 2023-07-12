<!-- Menghubungkan dengan view template master -->
@extends('template_users')
@section('content')

    <div style="background-color:#ffffff"class="container-fluid">
      <br><br><div class="row justify-content-center">
        <div class="col-md-6 text-center">
          <div class="container">
            <div
              class="row p-2 mb-2 fw-bold rounded"
              style="background-color: #6b9bd0"
            >
              <div style="color:white;"class="col text-start">Edit Profile</div>
            </div>
            <form action="{{url('editprofile_edit')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row p-2">
                <div class="col text-start mb-2">
                  <div class="input-group mb-2 mt-3">
                    <span class="input-group-text" id="inputGroup-sizing-default" style="width: 19%"
                      >Full Name</span
                    >
                    <input
                      name="name"
                      type="text"
                      class="form-control"
                      value="{{Auth::user()->vname}}"
                      aria-label="Sizing example input"
                      aria-describedby="inputGroup-sizing-default"
                      required
                    />
                  </div>
                </div>
              </div>
              <div class="row p-2">
                <div class="col text-start mb-2">
                  Profile Picture
                </div>
                <div class="input-group mb-3">
                  <input name="image" type="file" class="form-control" accept="image/*" required>
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
