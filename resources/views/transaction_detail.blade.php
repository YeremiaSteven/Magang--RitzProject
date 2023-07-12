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
          <div class="card w-100 shadow flex-md-row">
            <div class="card-body">
              <div class="row">
                <div class="col-md-10">
                  <h5 class="card-text fw-bold">Purchase Date</h5>
                </div>
                <div class="col-md-2">

                    @if ($transaction->itracking_status == 0)
                    <button type="button" class="btn btn-warning fw-bold w-75">
                        Packing
                    </button>
                    @endif
                    @if ($transaction->itracking_status == 1)
                    <button type="button" class="btn btn-warning fw-bold w-75">
                        Sending
                    </button>
                    @endif
                    @if ($transaction->itracking_status == 2)
                    <button type="button" class="btn btn-success fw-bold w-75" disabled>
                        Arrived
                    </button>
                    @endif
                    @if ($transaction->itracking_status == 3)
                    <button type="button" class="btn btn-danger fw-bold w-75" disabled>
                        Failed
                    </button>
                    @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-10">
                    @php
                        $date = new DateTimeImmutable($transaction->dcrea);
                    @endphp
                  <h5 class="card-text">{{date_format($date, 'd F Y')}}</h5>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-3">
        @php
            $total_quantity = 0;
            $total_price = 0;
            $total_discount = 0;
        @endphp
        @foreach ($item as $count)
          <div class="col-md-10 my-3">
            <div class="card w-100 shadow flex-md-row">
                @if ($count['picture'] == null)
                <img src="{{asset('assets/picture/blank_profilepicture.png')}}" alt="..." style="width: 20%;"/>
                @endif
                @if ($count['picture'] != null)
                <img src="{{asset('assets/picture').'/'.($count['picture'])}}" alt="..." style="width: 20%;"/>
                @endif
              <div class="card-body">
                <h5 class="card-title fw-bold">{{$count['vname_item']}}</h5>
                <p class="text-muted card-text">{{$count['vdescription']}}</p>
                <p class="fw-bold">Rp. {{number_format($count['iprice'])}}</p>
                <div class="col-lg text-start">
                <p>{{$count['iquantity']}} pcs</p>
                </div>
              </div>
              <div class="col-md-2 d-flex align-items-center">
                @if ($transaction->itracking_status == 2)
                    <a href="{{url('product-info').'/'.$count['id_item']}}" class="btn btn-primary fw-bold">
                        Buy Again
                    </a>
                @endif
                @if ($transaction->itracking_status == 0 || $transaction->itracking_status == 1)
                    <a href="{{url('product-info').'/'.$count['id_item']}}" class="btn btn-primary fw-bold">
                        See Item
                    </a>
                @endif
              </div>
            </div>
          </div>
        @php
          $total_price += $count['iprice']* $count['iquantity'];
          $total_discount += $count['iprice_after']* $count['iquantity'];
          $total_quantity += $count['iquantity'];;
        @endphp
        @endforeach
        </div>
        <div class="row justify-content-center mt-3">
          <div class="col-md-10">
            <div class="card w-100 shadow flex-md-row">
              <div class="card-body">
                <div class="row">
                  <div class="col-md mb-3">
                    <h5 class="card-text fw-bold">Payment details</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <p class="card-text">Total Items ({{$total_quantity}})</p>
                  </div>
                  <div class="col-md-2">
                    <p class="card-text">Rp. {{number_format($total_price)}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <p class="card-text">
                      Total Shipping Cost
                    </p>
                  </div>
                  <div class="col-md-2">
                    <p class="card-text">Rp. 15.000</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <p class="card-text">Shop Discounts</p>
                  </div>
                  <div class="col-md-2">
                    <p class="card-text text-danger">Rp. {{number_format($total_price - $total_discount)}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <p class="card-text">Members Discounts</p>
                  </div>
                  <div class="col-md-2">
                    @if (!is_null($member))
                        @if ($member->istatus_member == 1)
                            <p class="card-text text-danger">Rp. {{number_format($total_discount * $disc2)}}</p>
                        @endif
                        @if ($member->istatus_member == 0)
                            <p class="card-text text-danger">Rp. 0</p>
                        @endif
                    @endif
                    @if (!is_null($member))
                        <p class="card-text text-danger">Rp. 0</p>
                    @endif
                  </div>
                </div>
                <div class="row border-top">
                  <div class="col-md-10 mt-3">
                    <h5 class="card-text fw-bold">Total Spend</h5>
                  </div>
                  <div class="col-md-2 mt-3">
                    <p class="fw-bold">Rp. {{number_format($transaction->itotal_price)}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-3">
          <div class="col-md-8">
            <div class="card w-100 shadow flex-md-row">
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-md-12">
                    <h5 class="card-text fw-bold">Delivery</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <p class="card-text">Courier</p>
                  </div>
                  <div class="col-md-2">
                    <p class="card-text fw-bold">J&T Express</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <p class="card-text">No receipt</p>
                  </div>
                  <div class="col-md-2">
                    <p class="card-text fw-bold">JPX676738920</p>
                  </div>
                </div>
                <div class="row border-top">
                  <div class="col-md-10">
                    <h5 class="card-text fw-bold mt-3 mb-3">Address</h5>
                  </div>
                  <div class="col-md-10">
                    <p class="fw-bold">{{$address->vreceiver_name}}</p>
                    <p class="card-text">{{$address->vaddress}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3 justify-content-center">
          @if ($transaction->itracking_status == 1)
            <div class="col-md-5 d-flex justify-content-center">
                <a href="/transaction_user/receive/{{$transaction->id_transaction}}" class="btn btn-success w-100 mb-3">
                    Order Received
                </a>
            </div>
          @endif
          @if ($transaction->itracking_status == 0)
            <div class="col-md-5 d-flex justify-content-center">
                <a href="/transaction_user/cancel/{{$transaction->id_transaction}}" class="btn btn-danger w-100 mb-3">
                    Cancel
                </a>
            </div>
          @endif
        </div>
      </div>
    </div>
@endsection
