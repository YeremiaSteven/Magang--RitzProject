<?php $__env->startSection('content'); ?>
    <!-- Banner -->
    <section style="background-color:white;"id="banner">
    <br>
    <!-- </section> -->

    <!-- Products
    <section style="background-color:white;" id="products"> -->
      <div class="container-fluid">
        <div class="row mt-5 text-center">
          <p class="fw-bold h3">All Product</p>
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
        </div>
        <section id="bNavbar">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom">
              <div class="container-fluid">
                <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                      <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        All Categories
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                      </ul>
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
          </section>
        <div class="row">
          <div class="col-md">
            <div class="row mt-3">
                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 mb-3">
                    <div class="card w-100 shadow" style="width: 18rem; height: 100%">
                    <?php if($u['picture'] != null): ?>
                        <a href="<?php echo e(url('product-info').'/'.$u['id_item']); ?>">
                        <img
                            src="<?php echo e(asset('assets/picture').'/'.($u['picture'])); ?>"
                            class="card-img-top"
                            alt="..."
                            style="width:100%; height:250px"
                        />
                        </a>
                        <?php endif; ?>
                        <?php if($u['picture'] == null): ?>
                        <a href="<?php echo e(url('product-info').'/'.$u['id_item']); ?>">
                        <img
                            src="<?php echo e(asset('assets/picture/blank_profilepicture.png')); ?>"
                            class="card-img-top"
                            alt="..."
                            style="width:100%; height:250px"
                        />
                        </a>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><a href="<?php echo e(url('product-info').'/'.$u['id_item']); ?>"><?php echo e($u['vname_item']); ?></a></h5>
                            <p class="text-muted card-text " style="font-size: 1rem">
                                <?php echo e($u['vdescription']); ?>

                            </p>
                            <p class="text-muted card-text " style="font-size: 1rem">
                                <?php echo e($u['vname']); ?>

                            </p>
                            <img src="<?php echo e(asset('assets/img/Review Flash Sale-01.png')); ?>" alt="" />
                            <div class="row">
                                <div class="col-md">
                                    <p class="fw-bold">Rp.<?php echo e(number_format($u['iprice'])); ?></p>
                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <a href="<?php echo e(url('add_cart').'/'.$u['id_item']); ?>">
                                        <button
                                            type="button"
                                            class="btn btn-outline-primary d-block w-100 text-white"
                                            style="background-color: #6b9bd0"
                                        >
                                            Buy
                                        </button>
                                    </a>
                                </div>
                                <div class="col-md text-end">
                                <?php if(is_null($wishlist)): ?>
                                  <a href="/wishlist/add/<?php echo e($u['id_item']); ?>">
                                    <button
                                    type="button"
                                    class="btn btn-outline-secondary d-bloxk w-100">
                                    <i class="fa-solid fa-heart" style="color: #6b9bd0"></i>
                                      Wishlist
                                    </button>
                                  </a>
                                  <?php endif; ?>   
                                </div>
                                <div class="text-muted small">
                                  <?php if(!is_null($wishlist)): ?>
                                    <a href="/wishlist/add/<?php echo e($u['id_item']); ?>">
                                      <button
                                      type="button"
                                      class="btn btn-outline-secondary d-bloxk w-100">
                                        <i class="fa-solid fa-heart" style="color: red"></i> 
                                        Wishlist
                                      </button>
                                    </a>
                                  <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
    </section>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('template_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/product_more.blade.php ENDPATH**/ ?>