<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(url('assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet')); ?>" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(url('assets/css/sb-admin-2.min.css')); ?>" rel="stylesheet">

    <!-- Import font -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <!-- Import font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title><?php echo e($nama_web->vvalue); ?></title>

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
            <img src="<?php echo e(asset('assets/img/logo_tokobiru.png')); ?>" alt="Logo Tokobiru" class="img-fluid mx-auto d-block mb-2">
            <a class="navbar-brand ms-1 fw-bolder" href="/home"><?php echo e($nama_web->vvalue); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item ms-2 mb-2">

                </li>
                <li class="nav-item text-center mb-2">
                <a href="/cart"> <button type="button" class="btn btn-secondary ms-2"><i class="fas fa-shopping-cart me-2"></i>Cart</button>
                </a></li>
                <li class="nav-item text-center mb-2">
                <a href="/wishlist"><button type="button" class="btn btn-outline-secondary ms-2"><i class="fa-regular fa-heart"></i></button>
                </a></li>
                <li class="nav-item text-center">
                <a href="/profile_settings"><button type="button" class="btn btn-outline-secondary ms-2"><i class="fa-regular fa-user"></i></button>
                </a>
              </li>
              </ul>
            </div>
        </div>
      </nav>
    </section>
    <?php echo $__env->yieldContent('content'); ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

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
                    <img src="<?php echo e(asset('assets/img/logo_tokobiru.png')); ?>" alt="Logo Tokobiru" style="width: 12%;"> <?php echo e($nama_web->vvalue); ?>

                  </h6>
                  <p>
                  Transform your lifestyle and elevate your shopping experience with our exclusive collection of lifestyle products, available now on our e-commerce platform.
                  From fashion and beauty to home decor and wellness, we offer a curated selection of high-quality products that cater to your unique style and needs.</p>
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
            © 2023 Copyright:
            <a class="text-reset fw-bold" href="#"><img src="<?php echo e(asset('assets/img/logo_tokobiru.png')); ?>" alt="Logo Tokobiru" class="img-fluid"> <?php echo e($nama_web->vvalue); ?></a>
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
      </section>
<!-- Modal Member Request -->

<div class="modal fade" id="member_request" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Member Request</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="<?php echo e(url('member_request')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group row mt-3">
                    <h3>Are you want to join the member?</h3>
                    
                </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Yes</button>
				</div>
			</form>
		</div>
	  </div>
	</div>
</div>
</body>
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>
<?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/template_users.blade.php ENDPATH**/ ?>