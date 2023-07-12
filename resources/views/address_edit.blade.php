@extends('template_users')
@section('content')
    <div style="background-color:#ffffff"class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-4 text-center">
          <img
            src="{{asset('assets/picture').'/'.(Auth::user()->profile_picture)}}"
            alt="Foto Profil"
            style="border-radius: 50%; width:150px; height:150px;"
            class="img-fluid mt-3 "/>
          <br><br>
          <p class="fw-bold">{{ Auth::user()->vname }}</p>
          <p class="pb-4">{{ Auth::user()->email }}</p>
          <div class="container">
            <div class="row text-start fw-bold">
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center border">
        <div class="row justify-content-center my-3">
            <div class="col-md-4">
                <form action="{{ url('address/edit')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="input-group mb-3 mt-5">
                          <input
                            name="id"
                            type="text"
                            class="form-control"
                            value="{{$address->id_table}}"
                            aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            hidden
                          />
                          <span class="input-group-text w-40" id="inputGroup-sizing-default"
                            >Recipient's Name</span
                          >
                          <input
                            name="name"
                            type="text"
                            class="form-control"
                            value="{{$address->vreceiver_name}}"
                            aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                          />
                        </div>
                        <div class="input-group mb-3">
                          <span class="input-group-text w-40" id="inputGroup-sizing-default"
                            >Address</span
                          >
                          <textarea
                            name="address"
                            type="text"
                            class="form-control"
                            aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                          >{{$address->vaddress}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning" style="margin-left: 42%; margin-right: 42%;">Update</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
    @endsection
