@extends('template_user')
@section('content')
    <!-- Banner -->
    <section style="background-color:white;"id="banner">
    <br>
    <!-- </section> -->

    <!-- Products
    <section style="background-color:white;" id="products"> -->
      <div class="container-fluid">
        <div class="row mt-5 text-center">
          <p class="fw-bold h3">Flash Sale!!</p>
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
        </div>
        <div class="row">
          <div class="col-md">
            <div class="row mt-3">
                @foreach ($item as $i => $u)
                <div class="col-md-3 mb-3">
                    <div class="card w-100 shadow" style="width: 18rem; height: 100%">
                    @if ($u['picture'] != null)
                        <a href="{{url('product-info').'/'.$u['id_item']}}">
                        <img
                            src="{{asset('assets/picture').'/'.($u['picture'])}}"
                            class="card-img-top"
                            alt="..."
                            style="width:100%; height:250px"
                        />
                        </a>
                        @endif
                        @if ($u['picture'] == null)
                        <a href="{{url('product-info').'/'.$u['id_item']}}">
                        <img
                            src="{{asset('assets/picture/blank_profilepicture.png')}}"
                            class="card-img-top"
                            alt="..."
                            style="width:100%; height:250px"
                        />
                        </a>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><a href="{{url('product-info').'/'.$u['id_item']}}">{{$u['vname_item']}}</a></h5>
                            <p class="text-muted card-text " style="font-size: 1rem">
                                {{$u['vdescription']}}
                            </p>
                            <p class="text-muted card-text " style="font-size: 1rem">
                                {{$u['vname']}}
                            </p>
                            <img src="Assets/img/Review Flash Sale-01.png" alt="" />
                            <div class="row">
                                <div class="col-md">
                                <p class="text-danger"><s>Rp.{{number_format($u['iprice'])}}</s></p>
                                </div>
                                <div class="col-md text-end me-5">
                                <p class="fw-bold">Rp.{{number_format($u['iprice_after'])}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <a href="{{url('add_cart').'/'.$u['id_item']}}">
                                        <button
                                            type="button"
                                            class="btn btn-outline-primary d-block w-100 text-white"
                                            style="background-color: #6b9bd0"
                                        >
                                            Buy
                                        </button>
                                    </a>
                                </div>
                                <div class="col-md text-end">
                                @if (is_null($wishlist))
                                  <a href="/wishlist/add/{{$u['id_item']}}">
                                    <button
                                    type="button"
                                    class="btn btn-outline-secondary d-bloxk w-100">
                                    <i class="fa-solid fa-heart" style="color: #6b9bd0"></i>
                                      Wishlist
                                    </button>
                                  </a>
                                  @endif   
                                </div>
                                <div class="text-muted small">
                                  @if (!is_null($wishlist))
                                    <a href="/wishlist/add/{{$u['id_item']}}">
                                      <button
                                      type="button"
                                      class="btn btn-outline-secondary d-bloxk w-100">
                                        <i class="fa-solid fa-heart" style="color: red"></i> Wishlist
                                      </button>
                                    </a>
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
      <br>
      <br>
      <br>
    </section>
    @endsection

