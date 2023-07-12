
@extends('template_users')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-info">
   <p>{{ $message }}</p>
</div>
@endif
    <div class="container-fluid">
      <div class="row mt-3 justify-content-center">
        <div class="col-md-10">
          <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <div class="container-fluid">
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav nav-tabs mx-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="/transaction_user/ongoing"
                      >Ongoing</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/transaction_user/done"
                    >Done</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card w-100 shadow flex-md-row p-3 justify-content-center align-items-center mb-3">
            <div class="col-md-1 text-center">
            <i class="fa fa-credit-card"   style="color: #78a3eb"></i>
            </div>
            <div class="col-md-10">
              <p class="h5">Waiting for payment</p>
            </div>
            <a href="/transaction_user/payment">
                <div class="col-md-1">
                    <i class="fa-solid fa-angle-right fa-lg"></i>
                </div>
            </a>
          </div>
        </div>
      </div>

      @foreach ($transaction as $item =>$u)
      @if ($u->ipayment_status != "PENDING" && $u->itracking_status == 0 || $u->itracking_status == 1)
      <div class="row justify-content-center my-5">
        <div class="col-md-10">
          <div class="card w-100 shadow flex-md-row">
            <div class="card-body">
              <div class="row border-bottom">
                <div class="col-md-10 d-flex align-self-center">
                    @php
                        $date = new DateTimeImmutable($u->dcrea);
                    @endphp
                  <p class="card-text fw-bold">{{date_format($date, 'd F Y')}}</p>
                </div>
                <div class="col-md-2 mb-3">
                  <button type="button" class="btn btn-warning fw-bold w-75" disabled>
                    @if ($u->itracking_status == 0)
                        Packing
                    @endif
                    @if ($u->itracking_status == 1)
                        Sending
                    @endif
                  </button>
                </div>
              </div>
              <div class="row justify-content-center my-5">
                <div class="col-md-12">
                  <div class="card shadow flex-md-row">
                    <div class="card-body">
                      <h5 class="card-title fw-bold">

                      </h5>
                      <p class="text-muted card-text fs-5 fw-bolder">

                        @foreach ( $item_detail as $detail )
                            @if ($detail->id_transaction ==$u->id_transaction)
                            {{$detail->vname_item}},
                            @endif
                        @endforeach
                      </p>
                      <p class="fw-bold">Rp. {{number_format($u->itotal_price)}}</p>
                      <p class="text-muted">{{$u->itotal_quantity}} Items</p>
                    </div>
                    <div class="col-md-2 d-flex align-items-center justify-content-center me-3">
                        <a href="/transaction_user/detail/{{$u->id_transaction}}" style="width: inherit;">
                            <button class="btn btn-primary w-100 fw-bold">See</button>
                        </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
      @if (empty($item))
      <div class="row mt-3 mb-5 justify-content-center rounded-3">
        <div class="col-md-10">
            <div class="card w-100 shadow flex-md-row p-3 justify-content-center align-items-center mb-3">
            <p class="fs-5 text-center fw-bolder my-5">
                Transaction Kamu Kosong
            </p>
            </div>
        </div>
      </div>
      @endif
      @endforeach
    </div>
@endsection
