
@extends('template_users')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-info">
   <p>{{ $message }}</p>
</div>
@endif
    <div class="container-fluid">
      <div class="row mt-3 mb-5 justify-content-center">
        <div class="col-md-10">
          <div
            class="card w-100 shadow flex-md-row p-3 justify-content-center align-items-center mb-3"
          >
            <div class="col-md-1 text-center">
              <i
                class="fa-regular fa-money-bills fa-lg"
                style="color: #78a3eb"
              ></i>
            </div>
            <div class="col-md-10">
              <p class="h5">Back to Transaction Display</p>
            </div>
            <a href="/transaction_user/ongoing">
                <div class="col-md-1">
                    <i class="fa-solid fa-angle-right fa-lg"></i>
                </div>
            </a>
          </div>
        </div>
      </div>

      @foreach ($transaction as $item =>$u)
      @if ($u->ipayment_status == "PENDING")
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
                    {{$u->ipayment_status}}
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
                        <a href="{{$u->vpayment_link}}" target="_blank" style="width: inherit;">
                            <button class="btn btn-primary w-100 fw-bold">Pay</button>
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
      @endforeach
    </div>
@endsection
