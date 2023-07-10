@extends('template_users')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-info">
   <p>{{ $message }}</p>
</div>
@endif

    <br><br><br>
    <div style="background-color:white; border-radius:5%" class="container">
    <br><br>
    @if (empty($item))
    <div class="row mt-3 justify-content-center">
        <div class="col-md d-flex justify-content-center">
            <p class="fs-3">Keranjang kamu masih kosong!! <br></p>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-10">
              <div class="card w-100 shadow flex-md-row">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                      <h5 class="card-text fw-bold">Subtotal</h5>
                    </div>
                    <div class="col-md-2">
                      <p>Rp. 0</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <h5 class="card-text fw-bold text-danger">Discount</h5>
                    </div>
                    <div class="col-md-2">
                      <p class="text-danger">Rp. 0</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <h5 class="card-text fw-bold text-danger">
                        Member Discount
                      </h5>
                    </div>
                    <div class="col-md-2">

                      <p class="text-danger">Rp. 0</p>

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <h5 class="card-text fw-bold">Shipping & Handling</h5>
                    </div>
                    <div class="col-md-2">
                      <p>Rp. 0</p>
                    </div>
                  </div>
                  <div class="row border-top">
                    <div class="col-md-10 mt-3">
                      <h5 class="card-text fw-bold">Grand Total</h5>
                    </div>
                    <div class="col-md-2 mt-3">
                      <p class="fw-bold">Rp. 0</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-md-10 d-flex justify-content-center">
              <button class="btn btn-primary w-75 mb-3" disabled><a style="color:white"href="/checkout"> Check Out</a></button>
            </div>
        </div>
    </div>
    @endif
    @if (!empty($item))
    <div class="row mt-3 justify-content-center">
        @php
            $total_price = 0;
            $total_discount = 0;
        @endphp
        @foreach ($item as $count)
        <div class="row justify-content-center mt-3">
            <div class="col-md-10">
              <div class="card w-100 shadow flex-md-row">
                @if ($count['picture'] == null)
                <img src="{{asset('assets/picture/blank_profilepicture.png')}}" alt="..." style="width: 25%;"/>
                @endif
                @if ($count['picture'] != null)
                <img src="{{asset('assets/picture').'/'.($count['picture'])}}" alt="..." style="width: 25%;"/>
                @endif
                <div class="card-body">
                  <h5 class="card-title fw-bold">{{$count['vname_item']}}</h5>
                  <p class="text-muted card-text">{{$count['vcategory']}}</p>
                  <p class="fw-bold">Rp. {{number_format($count['iprice'] * $count['iquantity'])}}</p>
                  <div class="col-lg text-start">
                    <a href="/item_cart/increa/{{$count['id']}}"
                      ><i
                        class="fa-solid fa-circle-plus fa-xl"
                        style="color: #345ea8"
                      ></i
                    ></a>
                    {{$count['iquantity']}}
                    <a href="/item_cart/decrea/{{$count['id']}}"
                      ><i
                        class="fa-solid fa-circle-minus fa-xl"
                        style="color: #345ea8"
                      ></i
                    ></a>
                  </div>
                </div>
                <div
                  class="col-sm-2 d-flex justify-content-center align-items-center"
                >
                  <div class="form-check fs-1">
                    <a href="/item_cart/delete/{{$count['id']}}">
                    <button
                        type="button"
                        class="btn btn-outline-secondary d-bloxk w-100"
                    >
                        <i class="fa-solid fa-trash" style="color: #78a3eb"></i>
                    </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @php
            $total_price += $count['iprice']* $count['iquantity'];
            $total_discount += $count['iprice_after']* $count['iquantity'];
        @endphp
        @endforeach
        <form action="{{ url('/checkout')}}" method="post">
            @csrf
            <div class="row justify-content-center mt-3">
                <div class="col-md-10 d-flex justify-content-center">
                  <div class="card shadow flex-md-row p-4 w-75">
                    <div class="row justify-content-center ms-1">
                      <div
                        class="col-md-2 d-flex align-items-center justify-content-center"
                      >
                        <img src="assets/picture/Mobil.png" alt="..." />
                      </div>
                      <div class="col-md-8 align-items-center">
                        <h5 class="card-title fw-bold">Address</h5>
                        <p class="text-muted card-text">
                            <input
                                name="address"
                                type="text"
                                class="form-control"
                                value="{{$address->vaddress}}"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"
                                hidden
                            />
                          {{$address->vaddress}}
                        </p>
                      </div>
                      <div class="col-md-2 d-flex align-items-center">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#changeAddress" >Change</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3 justify-content-center">
                <div class="col-md-10">
                  <div class="mb-3">
                    <label
                      for="exampleFormControlTextarea1"
                      class="form-label fw-bold"
                      >Notes</label
                    >
                    <textarea
                      name="notes"
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="2"
                    ></textarea>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center mt-3">
                <div class="col-md-10">
                  <div class="card w-100 shadow flex-md-row">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-10">
                          <h5 class="card-text fw-bold">Subtotal</h5>
                        </div>
                        <div class="col-md-2">
                          <p>Rp. {{number_format($total_price)}}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10">
                          <h5 class="card-text fw-bold text-danger">Discount</h5>
                        </div>
                        <div class="col-md-2">
                          <p class="text-danger">Rp. {{number_format($total_price - $total_discount)}}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10">
                          <h5 class="card-text fw-bold text-danger">
                            Member Discount
                          </h5>
                        </div>
                        <div class="col-md-2">
                          @if (is_null($member))
                            <p class="text-danger">Rp. 0</p>
                          @endif
                          @if (!is_null($member))
                            @if ($member->istatus_member == 1)
                            <p class="text-danger">Rp. {{number_format($total_discount * $disc2)}}</p>
                            @endif
                            @if ($member->istatus_member == 0)
                            <p class="text-danger">Rp. 0</p>
                            @endif
                          @endif
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10">
                          <h5 class="card-text fw-bold">Shipping & Handling</h5>
                        </div>
                        <div class="col-md-2">
                          <p>Rp. 15,000</p>
                        </div>
                      </div>
                      <div class="row border-top">
                        <div class="col-md-10 mt-3">
                          <h5 class="card-text fw-bold">Grand Total</h5>
                        </div>
                        <div class="col-md-2 mt-3">
                          <p class="fw-bold">

                            @if (is_null($member))
                            <input
                                name="amount"
                                type="number"
                                class="form-control"
                                value="{{$total_discount + 15000}}"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"
                                hidden
                            />
                            Rp. {{number_format($total_discount + 15000)}}
                            @endif
                            @if (!is_null($member))
                                @if ($member->istatus_member == 1)
                                <input
                                name="amount"
                                type="number"
                                class="form-control"
                                value="{{$total_discount - ($total_discount * $disc2)+ 15000}}"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"
                                hidden
                                />
                                Rp. {{number_format($total_discount - ($total_discount * $disc2)+ 15000)}}
                                @endif
                                @if ($member->istatus_member == 0)
                                <input
                                name="amount"
                                type="number"
                                class="form-control"
                                value="{{$total_discount +15000}}"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"
                                hidden
                                 />
                                Rp. {{number_format($total_discount + 15000)}}
                                @endif
                            @endif

                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3 justify-content-center">
                <div class="col-md-10 d-flex form-group justify-content-center">
                    <button type="submit" class="btn btn-primary w-75 mb-3" data-confirm-delete="true">Check Out</button>
                </div>
              </div>
        </form>
      </div>
    @endif
    </div>
    <br><br><br>
    {{-- modal --}}
    <div class="modal fade" id="changeAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Change Address</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach ( $address2 as $i => $u)
                <div class="row justify-content-center my-3">
                <div class="col">
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
                                </div>
                                @if ($u->istatus_address == 0)
                                <div class="col-3">
                                    <form action="{{ url('cart/address/select')}}" method="POST">
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
        </div>
      </div>



@endsection
