
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

    <title>Forgot Password</title>
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
    <!-- Navbar -->
    <section id="navbar">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <div class="col justify-content-center text-center">
              <a class="text-decoration-none small text-light me-3" href="#"><i class="fa-solid fa-check me-1"></i>FLASH SALE IS ONGOING</a>
              <div class="btn-group">
                <button class="btn btn-sm dropdown-toggle text-light small" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Eng
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item small" href="#">Ind</a></li>
                </ul>
                <a class="nav-link small text-light">Faqs</a>
                <a class="nav-link small text-light">Need Help<i class="fa-solid fa-exclamation ms-1"></i></a>
          </div>
        </div>
      </nav>

      <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
        <div class="container-fluid">
          <img src="assets/img/logo_tokobiru.png" alt="Logo Tokobiru" class="img-fluid mx-auto d-block mb-2">
          <a class="navbar-brand ms-1 fw-bolder" href="<?php echo e(route ('login')); ?>">TOKO BIRU</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item ms-2 mb-2">
                <div class="input-group rounded">
                  <input type="search" class="form-control rounded" placeholder="Search here..." aria-label="Search" aria-describedby="search-addon" />
                  <span class="input-group-text border-0" id="search-addon">
                    <i class="fa fa-search"></i>
                  </span>
                </div>
              </li>
              <li class="nav-item text-center mb-2">
                <button type="button" class="btn btn-secondary ms-2"><i class="fas fa-shopping-cart me-2"></i>Cart</button>
              </li>
              <li class="nav-item text-center mb-2">
                <button type="button" class="btn btn-outline-secondary ms-2"><i class="fa-regular fa-heart"></i></button>
              </li>
              <li class="nav-item text-center">
                <a class="navbar-brand ms-1 fw-bolder" href="<?php echo e(route ('login')); ?>">
                <button type="button" class="btn btn-outline-secondary ms-2"><i class="fa-regular fa-user"></i></button>
                </a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>

    <!-- Forgot Pasword Form -->
    <section id="ForgotForm">
      <div class="container text-light">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="row">
                <p class="h2 fw-bold mt-5 mb-5">Forgot Password</p>
            </div>
            <form method="POST" action="<?php echo e(route('forgot.password.link')); ?>" class="mb-5">
              <?php if(Session::get('fail')): ?>
                <div class="alert alert-danger">
                  <?php echo e(Session::get('fail')); ?>

                </div>
              <?php endif; ?>

              <?php if(Session::get('success')): ?>
                <div class="alert alert-success">
                  <?php echo e(Session::get('success')); ?>

                </div>
              <?php endif; ?>

              <?php echo csrf_field(); ?>
              <div class="mb-3">
                <p class="fw-bold">
                  Enter your email address and we'll send you an email with instructions to reset your password.
                </p>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Enter email address"
                value="<?php echo e(old('email')); ?>">
                <span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
              </div>
              <br>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Send Reset Password Link</button>
              </div>
            </form>
            <div class="row mt-3">
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
          <a class="text-reset fw-bold" href="#"><img src="assets/img/logo_tokobiru.png" alt="Logo Tokobiru" class="img-fluid"> Toko Biru</a>
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
<?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/forgot_password.blade.php ENDPATH**/ ?>