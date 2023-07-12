@extends('template_user')
@section('content')


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
                  <button type="button" class="btn btn-success fw-bold w-75">
                    Arrived
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-10">
                  <h5 class="card-text">5 February 2023, 20:14 WIB</h5>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-3">
          <div class="col-md-10">
            <div class="card w-100 shadow flex-md-row">
              <img src="Pic/Product_Botol-Minum-Serbaguna-01.png" alt="..." />
              <div class="card-body">
                <h5 class="card-title fw-bold">Botol Minum Serbaguna</h5>
                <p class="text-muted card-text">All Size - Home</p>
                <p class="fw-bold">Rp. 15.000</p>
                <div class="col-lg text-start">
                <p> 1 pcs</p>
                </div>
              </div>
              <div class="col-md-2 d-flex align-items-center">
                <button class="btn btn-primary fw-bold" style="width: 80%;">Buy Again</button>
              </div>
            </div>
          </div>
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
                    <p class="card-text">Total Items (1 Items)</p>
                  </div>
                  <div class="col-md-2">
                    <p class="card-text">Rp. 15.000</p>
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
                    <p class="card-text">Rp. 0</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <p class="card-text">Members Discounts</p>
                  </div>
                  <div class="col-md-2">
                    <p class="card-text">Rp. 0</p>
                  </div>
                </div>
                <div class="row border-top">
                  <div class="col-md-10 mt-3">
                    <h5 class="card-text fw-bold">Total Spend</h5>
                  </div>
                  <div class="col-md-2 mt-3">
                    <p class="fw-bold">Rp. 30.000</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <p class="card-text">Payment Method</p>
                  </div>
                  <div class="col-md-2">
                    <p>BCA Virtual Account</p>
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
                    <p class="fw-bold">Julian Nardita</p>
                    <p class="card-text">+6281682912928 Jalan Kemenangan No 78 Kota, Jakarta Pusat DKI Jakarta 11203</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3 justify-content-center">
          <div class="col-md-5 d-flex justify-content-center">
            <button class="btn btn-success w-100 mb-3">Order Received </button>
          </div>
          <div class="col-md-5 d-flex justify-content-center">
            <button class="btn btn-danger w-100 mb-3">Cancel</button>
          </div>
        </div>
      </div>
    </div>
@endsection