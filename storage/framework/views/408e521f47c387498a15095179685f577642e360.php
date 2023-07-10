<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Import font -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <!-- Import font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>Register</title>
    <style>
      body{
        background-color: #78A3EB;
        font-family: 'Montserrat';
      }

      .text-reset{
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Navbar -->
    <section id="navbar">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <div class="col justify-content-center text-center">
              <a class="text-decoration-none small text-light me-3" href="#"><i class="fa-solid fa-check me-1"></i>FLASH SALE IS ONGOING</a>
              <div class="btn-group">
                <button class="btn btn-sm dropdown-toggle text-light small" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Login As
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item small" href="loginadmin">Admin</a></li>
                  <li><a class="dropdown-item small" href="login">User</a></li>
                </ul>
                <a class="nav-link small text-light">Faqs</a>
                <a class="nav-link small text-light">Need Help<i class="fa-solid fa-exclamation ms-1"></i></a>
          </div>
        </div>
      </nav>

      <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
          <div class="container-fluid">
          <img src="assets/img/logo_tokobiru.png" alt="Logo Tokobiru" class="img-fluid mx-auto d-block mb-2">
            <a class="navbar-brand ms-1 fw-bolder" href="#">RITZ APPS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item ms-2 mb-2">
                  <div class="input-group rounded">
                    </span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </section>


 <!-- Login Form -->
 <section id="LoginForm">
        <div class="container text-light">
          <div class="row align-items-center pt-5 pb-5">
            <div class="col-md-6 mt-5">
            <img src="assets/img/Register-1.png" alt="Background Register" class="img-fluid mx-auto d-block mb-3" style="max-width: 30%;">
              <p class="h1 fw-bolder">SELAMAT DATANG DAN BERBELANJA!</p>
            </div>
            <div class="col-md-6">
              <div class="row">
                <p class="h2 fw-bold mt-3">Login</p>
              </div>
              <div class="row mt-3">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
              </div>
              <div class="row">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter your password">
                </div>
              </div>
              <div class="row">
                <div class="col text-center">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalComponent"><b>LOGIN</b></button>
                  <!-- Modal -->
                  <div class="modal fade" id="modalComponent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-body">
                          <p class="text-dark">Please fill all data requirements</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <p class="small text-center">Don't have an account yet? <a href="register" class="text-light fw-bold">Register</a></p>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- footer -->
    <section id="footer">
      <!-- Footer -->
      <footer class="text-center text-lg-start text-muted pt-1" style="background-color: #d7e3f9;">
        <!-- Section: Links  -->
          <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h6 class="text-uppercase fw-bold mb-4">
                  <img src="assets/img/logo_tokobiru.png" alt="Logo Tokobiru" style="width: 12%;"> Tokobiru
                </h6>
                <p>
                Transform your lifestyle and elevate your shopping experience with our exclusive collection of lifestyle products, available now on our e-commerce platform. 
                </p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  CATEGORY
                </h6>
                <p>
                  <a href="#" class="text-reset">Child’s Product</a>
                </p>
                <p>
                  <a href="#" class="text-reset">Clothes</a>
                </p>
                <p>
                  <a href="#" class="text-reset">Home</a>
                </p>
                <p>
                  <a href="#" class="text-reset">Stationery</a>
                </p>
                <p>
                  <a href="#" class="text-reset">Electronics</a>
                </p>
                <p>
                  <a href="#" class="text-reset">Face & Body Care</a>
                </p>
              </div>

              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  SUPPORT
                </h6>
                <p>
                  <a href="#" class="text-reset">Help & Support</a>
                </p>
                <p>
                  <a href="#" class="text-reset">Tearms & Conditions</a>
                </p>
                <p>
                  <a href="#" class="text-reset">Privacy Policy</a>
                </p>
                <p>
                  <a href="#" class="text-reset">Help</a>
                </p>
              </div>

              <!-- Grid column -->
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">NEWSLETTER</h6>
                <form class="d-flex">
                  <input class="form-control me-2" type="email" placeholder="Your email" aria-label="Email">
                  <button class="btn btn-outline-primary text-light fw-bold" type="submit" style="background-color: #78A3EB;">Subscribe</button>
                </form>
                <p class="mt-3 text-reset">We value your feedback and are always here to assist you. Connect with us today and let us know how we can help you achieve your goals.</p>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-3 bg-light">
          © 2022 Copyright:
          <a class="text-reset fw-bold" href="#"><img src="assets/img/logo_tokobiru.png" alt="Logo Tokobiru"class="img-fluid"> RITZ APPS</a>
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
<?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/login.blade.php ENDPATH**/ ?>