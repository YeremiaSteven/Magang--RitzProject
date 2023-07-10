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
      <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <div class="text-center mb-3">
                <button
                class="btn text-white fw-bold"
                type="button"
                style="background-color: #6b9bd0"
                data-bs-toggle="modal" data-bs-target="#addAddress">
                Add Address
                </button>
            </div>
        </div>
      </div>
      <div class="row justify-content-center">
        @foreach ( $address as $i => $u)
        <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if ($u->istatus_address == 1)
                        <div class="badge bg-secondary mx-3 mb-3 fs-6">Default</div>
                    @endif
                    <div class="row">
                        <div class="col-9">
                            <div class="row">
                                <h5 class="card-title fw-bolder mx-3">{{$u->vreceiver_name}}</h5>
                                <label for="" class="mx-3">{{$u->vaddress}}</label>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a href="/address/edit/{{$u->id_table}}" class="btn btn-link mx-1">Change Address</a>
                                </div>
                                @if (count($address) > 1)
                                <div class="col">
                                    <form action="{{ url('address/delete')}}" method="POST">
                                        @csrf
                                            <input type="text" name="id" value="{{$u->id_table}}" hidden>
                                            @if ($u->istatus_address == 0)
                                                <button type="submit" class="btn btn-link">Delete</button>
                                            @endif

                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                        @if ($u->istatus_address == 0)
                        <div class="col-3">
                            <form action="{{ url('address/select')}}" method="POST">
                                @csrf
                                    <input type="text" name="id" value="{{$u->id_table}}" hidden>
                                    <button type="submit" class="btn btn-primary mt-3">Select</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
        @endforeach
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Address</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('address/add')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Recipient's Name</label>
                        <div class="col-sm-8">
                          <input type="text" name="name" class="form-control" required>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Address</label>
                        <div class="col-sm-8">
                          <textarea name="address" class="form-control" required></textarea>
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
