@extends('template_user')
@section('content')

<section style="background-color:white;"id="banner">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
            <ul class="navbar-nav m-auto">
            <li class="nav-item me-2">
                <div class="dropdown">
                <button
                    class="btn btn-outline-secondary dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton1"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    All Categories
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">SALE!</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">|</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Your Order</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <section id="productDetail">
        <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-md mt-5">
            @if ($picture == null)
                <img
                class="img-fluid w-50"
                src="{{asset('assets/picture/blank_profilepicture.png')}}"
                alt=""
            />
            @endif
            @if ($picture != null)
            <img
                class="img-fluid w-50"
                src="{{asset('assets/picture').'/'.($picture->picture)}}"
                alt=""
            />
            @endif
            <div class="d-flex justify-content-center mt-2">
                <img
                class="me-2"
                src="Pic/product-detail-carousel01.png"
                alt=""
                />
                <img
                class="me-2"
                src="Pic/product-detail-carousel02.png"
                alt=""
                />
                <img src="Pic/product-detail-carousel03.png" alt="" />
            </div>
            </div>
            <div class="col-md mt-5 text-start">
            <p class="h5 fw-bold">{{$detail_item->vname_item}}</p>
            <p class="d-flex justify-content-start">{{$detail_item->vname}}</p>
            <div class="text-muted small">Stock : {{$detail_item->istock}}</div>
            <div class="d-flex justify-content-start">
                @if ($detail_item->iflashsale == 1)
                    <p class="text-danger me-3"><s>Rp. {{number_format($detail_item->iprice)}}</s></p>
                @endif
                @if ($detail_item->iflashsale == 0)
                    <p class="fw-bold me-3">Rp. {{number_format($detail_item->iprice)}}</p>
                @endif
                @if ($detail_item->iflashsale == 1)
                    <p class="fw-bold">Rp. {{number_format($detail_item->iprice - ($detail_item->iprice * $disc->dvalue))}}</p>
                @endif
            </div>
            <div class="d-flex justify-content-start align-items-center mb-3">
                @if (is_null($wishlist))
                <div class="text-muted small">
                    <a href="/wishlist/add/{{$detail_item->id_item}}">
                        <button
                            type="button"
                            class="btn btn-outline-secondary d-bloxk w-100">
                            <i class="fa-solid fa-heart" style="color: #6b9bd0"></i> Wishlist
                        </button>
                    </a>
                </div>
                @endif
                @if (!is_null($wishlist))
                <div class="text-muted small">
                    <a href="/wishlist/add/{{$detail_item->id_item}}">
                        <button
                            type="button"
                            class="btn btn-outline-secondary d-bloxk w-100">
                            <i class="fa-solid fa-heart" style="color: red"></i> Wishlist
                        </button>
                    </a>
                </div>
                @endif
            </div>
            <p class="h6 fw-bold">Description</p>
            <p class="me-3">
                {{$detail_item->vdescription}}
            </p>
            <div class="text-center">
                @if ($detail_item->istock > 0)
                    <a href="{{url('add_cart').'/'.$detail_item->id_item}}">
                        <button
                        type="button"
                        class="btn btn-outline-primary w-75 text-white fw-bold mt-3"
                        style="background-color: #6b9bd0"
                        >
                        + Cart
                        </button>
                    </a>
                @endif
                @if ($detail_item->istock <= 0)

                        <button
                        type="button"
                        class="btn btn-outline-primary w-75 text-white fw-bold mt-3"
                        style="background-color: #6b9bd0"
                        disabled
                        >
                        + Cart
                        </button>

                @endif
            </div>
            </div>
        </div>
        </div>
    </section>
    <br>
    <br>
</section>
@endsection
