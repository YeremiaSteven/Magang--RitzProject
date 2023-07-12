@extends('template_user')
@section('content')

<section style="background-color:white;"id="productDetail">
      <div class="container-fluid">
        <div class="row justify-content-center text-center">
          <div class="col-md mt-5">
            <img
              class="img-fluid w-50"
              src="assets/picture/product-detail-banner.png"
              alt=""
            />
            <div class="d-flex justify-content-center mt-2">
              <img
                class="me-2"
                src="assets/picture/product-detail-carousel01.png"
                alt=""
              />
              <img
                class="me-2"
                src="assets/picture/product-detail-carousel02.png"
                alt=""
              />
              <img src="assets/picture/product-detail-carousel03.png" alt="" />
            </div>
          </div>
          <div class="col-md mt-5 text-start">
            <p class="h5 fw-bold">Lampu Tidur</p>
            <div class="text-muted small">Small Size - Home</div>
            <div class="text-muted small">Stock: 13</div>
            <div class="d-flex justify-content-start">
              <p class="text-danger me-3"><s>Rp 28.000</s></p>
              <p class="fw-bold">Rp. 25.000</p>
            </div>
            <div class="d-flex justify-content-start align-items-center mb-3">
              <div class="text-muted small">
                <a href="">
                    <button
                        type="button"
                        class="btn btn-outline-secondary d-bloxk w-100"
                    >
                        <i class="fa-solid fa-heart" style="color: red"></i>
                    </button>
                </a>
              </div>
            </div>
            <p class="h6 fw-bold">Deskripsi</p>
            <p class="me-3">
              Lampu tidur yang indah siap menemani kamu tidur nyenyak. Lampu
              tidur yang indah siap menemani kamu tidur nyenyak.. Lampu tidur
              yang indah siap menemani kamu tidur nyenyak.. Lampu tidur yang
              indah siap menemani kamu tidur nyenyak.. Lampu tidur yang indah
              siap menemani kamu tidur nyenyak..Lampu tidur yang indah siap
              menemani kamu tidur nyenyak. Lampu tidur yang indah siap menemani
              kamu tidur nyenyak..
            </p>
            <div class="text-center">
              <button
                type="button"
                class="btn btn-outline-primary w-75 mt-3 text-white fw-bold"
                style="background-color: #6b9bd0"
              >
                Check Out
              </button>
              <button
                type="button"
                class="btn btn-outline-primary w-75 text-white fw-bold mt-3"
                style="background-color: #6b9bd0"
              >
                + Cart
              </button>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
