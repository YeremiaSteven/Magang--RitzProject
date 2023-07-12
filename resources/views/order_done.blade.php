@extends('template_user')
@section('content')
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
                    <a class="nav-link" href="#">Ongoing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"
                      >Done</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <button type="button" class="btn btn-primary rounded-pill">
            <i class="fa-solid fa-filter me-2"></i>Filter
          </button>
          <button type="button" class="btn btn-primary rounded-pill">
            All
          </button>
          <!-- <button type="button" class="btn btn-outline-primary rounded-pill">
            Packing
          </button>
          <button type="button" class="btn btn-outline-primary rounded-pill">
            Sending
          </button> -->
          <button type="button" class="btn btn-outline-primary rounded-pill">
            Arrived
          </button>
          <button type="button" class="btn btn-outline-primary rounded-pill">
            Failed
          </button>
        </div>
      </div>
      <div class="row justify-content-center mt-3">
        <div class="col-md-10">
          <div class="card w-100 shadow flex-md-row">
            <div class="card-body">
              <div class="row border-bottom">
                <div class="col-md-10 d-flex align-self-center">
                  <p class="card-text fw-bold">5 Februari 2023</p>
                </div>
                <div class="col-md-2 mb-3">
                  <button type="button" class="btn btn-success fw-bold w-75">
                    Arrived
                  </button>
                </div>
              </div>
              <div class="row justify-content-center mt-3">
                <div class="col-md-12">
                  <div class="card shadow flex-md-row">
                    <img src="Pic/Product_Baju-Anak.png" alt="..." />
                    <div class="card-body">
                      <h5 class="card-title fw-bold">
                        Baju Tidur Anak Casual, Lampu Tidur
                      </h5>
                      <p class="text-muted card-text">
                        Size M - Child’s product
                      </p>
                      <p class="fw-bold">Rp. 20.000</p>
                      <p class="text-muted">2 Items</p>
                      <div
                        class="col-md-2 w-50 align-items-center justify-content-center"
                      >
                        <img
                          src="Pic/Product_Lampu-Tidur.png"
                          class="img-fluid w-25"
                          alt="..."
                        />
                        <img
                          src="Pic/Product_Lampu-Tidur.png"
                          class="img-fluid w-25"
                          alt="..."
                        />
                        <img
                          src="Pic/Product_Lampu-Tidur.png"
                          class="img-fluid w-25"
                          alt="..."
                        />
                      </div>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                      <button class="btn btn-primary w-75 fw-bold">See</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center mt-3">
        <div class="col-md-10">
          <div class="card w-100 shadow flex-md-row">
            <div class="card-body">
              <div class="row border-bottom">
                <div class="col-md-10 d-flex align-self-center">
                  <p class="card-text fw-bold">10 Maret 2023</p>
                </div>
                <div class="col-md-2 mb-3">
                  <button type="button" class="btn btn-danger fw-bold w-75">
                    Failed
                  </button>
                </div>
              </div>
              <div class="row justify-content-center mt-3">
                <div class="col-md-12">
                  <div class="card shadow w-100 flex-md-row">
                    <img
                      src="Pic/Product_Botol-Minum-Serbaguna-01.png"
                      alt="..."
                    />
                    <div class="card-body">
                      <h5 class="card-title fw-bold">Botol Minum Serbaguna</h5>
                      <p class="text-muted card-text">All Size - Home</p>
                      <p class="fw-bold">Rp. 15.000</p>
                      <p class="text-muted">1 Items</p>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                      <button class="btn btn-primary w-75 fw-bold">See</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



@endsection