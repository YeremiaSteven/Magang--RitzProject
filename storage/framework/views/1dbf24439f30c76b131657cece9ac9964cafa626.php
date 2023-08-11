<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">


    <!-- Import font -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <!-- Import font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>Admin Homepage</title>
    <style>
        body{
        background-color: #78A3EB;
        font-family: 'Montserrat';
        }
    </style>
  </head>
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light p-3 border-bottom">
      <div class="container-fluid justify-content-start">
        <img src="<?php echo e(asset('assets/img/logo_tokobiru.png')); ?>" alt="Logo Tokobiru" class="img-fluid d-block mb-2">
        <a class="navbar-brand fw-bolder w-100" href="/home"><?php echo e($nama_web->vvalue); ?></a>
        <div class="">
            Halo, <?php echo e(Auth::user()->vname); ?>

        </div>
        <div class="dropdown dropstart justify-content-end">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-regular fa-user"></i>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Activity Log</a></li>
            <li><a class="dropdown-item" href="#">Setting</a></li>
            <li><a class="dropdown-item" href="<?php echo e(url('logout')); ?>">Logout</a></li>
            </ul>
        </div>
        
      </div>
    </nav>
  </section>


  <section id="accountManagement">
    <div class="navbar justify-content-end" style="padding-bottom: 0%; padding-top: 0%">
      <nav class="navbar-expand-lg sidebar navbar-light vh-100 p-4" style="width:15% ; background-color: #d7e3f9;">
        <ul class="nav navbar-nav nav-pills flex-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 fw-bold" id="nav_accordion">
          <li class="nav-item has-submenu">
            <a href="#" class="nav-link px-sm-0 px-2">
            <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Account</span></a>
            <ul class="submenu collapse">
              <li style="list-style-type: none"><a class="nav-link" href="/admin">Account Management </a></li>
              <li style="list-style-type: none"><a class="nav-link" href ="/master/toko">Toko Management</a></li>
              <li style="list-style-type: none"><a class="nav-link" href="/member">Member Request </a></li>
              <li style="list-style-type: none"><a class="nav-link" href="/member/list">Member List </a></li>
            </ul>
          </li>
          <li class="nav-item has-submenu">
            <a href="#" class="nav-link px-sm-0 px-2">
            <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Setting</span></a>
            <ul class="submenu collapse">
              <li style="list-style-type: none"><a class="nav-link" href="/web-setting">Website Setting</a></li>
              <li style="list-style-type: none"><a class="nav-link" href="/mail-setting">Mail Setting</a></li>
            </ul>
          </li>
          <li class="nav-item has-submenu">
            <a href="#" class="nav-link px-sm-0 px-2">
            <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Master</span></a>
            <ul class="submenu collapse">
              <li style="list-style-type: none"><a class="nav-link" href ="/master/header">Item </a></li> 
              <li style="list-style-type: none"><a class="nav-link" >Event</a></li>
              <li style="list-style-type: none"><a class="nav-link" >Discount</a></li>
            </ul>
          </li>
          <li class="nav-item has-submenu">
            <a href="#" class="nav-link px-sm-0 px-2">
            <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Transaction</span></a>
            <ul class="submenu collapse">
              <li style="list-style-type: none"><a class="nav-link" href="/transaction_hdr">Transaction Header</a></li>
              <li style="list-style-type: none"><a class="nav-link" href="/transaction_dtl">Transaction Detail</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="/categoryitem" class="nav-link px-sm-0 px-2">
              <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Category</span></a>
            </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link px-sm-0 px-2">
            <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Reports</span></a>
          </li class="nav-item dropdown">
        </ul>
      </nav>
      <nav class="navbar-expand-lg vh-100" style="width:85%; background-color: white; overflow: scroll;">
        <?php echo $__env->yieldContent('content'); ?>
      </nav>
    </div>
  </section>

  



    <footer>
    <!-- Copyright -->
    <div class="text-center p-3 bg-light">
      © 2023 Copyright:
      <a class="text-reset fw-bold" href="#"><img src="<?php echo e(asset('assets/img/logo_tokobiru.png')); ?>" alt="Logo Tokobiru" class="img-fluid"> Toko Biru</a>
    </div>
    <!-- Copyright -->
    </footer>
</body>
  <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
      $('#example').DataTable();
    });
  </script>
</html>
<?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/template.blade.php ENDPATH**/ ?>