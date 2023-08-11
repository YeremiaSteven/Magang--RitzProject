<?php $__env->startSection('content'); ?>
    <!-- Banner -->
    <section style="background-color:white;"id="banner">
    <br>
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-6 mt-3">
            <div
              id="carouselExampleControls"
              class="carousel slide"
              data-bs-ride="carousel"
            >
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="Assets/img/Banner.png" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                  <img src="Assets/img/Banner.png" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                  <img src="Assets/img/Banner.png" class="d-block w-100" alt="..." />
                </div>
              </div>
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleControls"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleControls"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>

        <br>
        <div class="row shadow bg-body rounded m-2">
          <div class="col-md p-3 d-flex justify-content-around">
            <img
              src="Assets/img/Feature-1.png"
              class="rounded float-start"
              alt="Discount"
            />
            <img
              src="Assets/img/Feature-2.png"
              class="rounded float-start"
              alt="Free Delivery"
            />
            <img
              src="Assets/img/Feature-3.png"
              class="rounded float-start"
              alt="Great Support"
            />
            <img
              src="Assets/img/Feature-4.png"
              class="rounded float-start"
              alt="Secure Payment"
            />
            <a href="#"
              ><img
                src="Assets/img/Arrow.png"
                class="rounded float-start"
                alt="Next Buttpn"
            /></a>
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row ms-5 me-5">
          <div class="col-md mt-5 d-flex justify-content-start">
            <p class="h3 fw-bold">FLASH SALE!!!</p>
          </div>
          <div class="col-md mt-5 d-flex justify-content-end">

            <a
                  href="/flash_sale"
                  class="text-decoration-none text-light p-2 rounded"
                  style="background-color: #6b9bd0"
                  >More <i class="fa-solid fa-arrow-right"></i
                ></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md">
            <div
            id="carouselItem"
            class="carousel slide"
            data-bs-ride="carousel"
            >
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row mt-3">
                            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="col-md">
                                    <div class="card w-100 shadow" style="width: 18rem; height: 100%;">
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
                                            <img src="Assets/img/Review Flash Sale-01.png" alt="" />
                                            <div class="row">
                                                <div class="col-md">
                                                <p class="text-danger"><s>Rp.<?php echo e(number_format($u['iprice'])); ?></s></p>
                                                </div>
                                                <div class="col-md text-end me-5">
                                                <p class="fw-bold">Rp.<?php echo e(number_format($u['iprice_after'])); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <?php if($u['istock'] > 0): ?>
                                                    <a href="<?php echo e(url('add_cart').'/'.$u['id_item']); ?>">
                                                        <button
                                                            type="button"
                                                            class="btn btn-outline-primary d-block w-100 text-white"
                                                            style="background-color: #6b9bd0"
                                                        >
                                                            Buy
                                                        </button>
                                                    </a>
                                                    <?php endif; ?>
                                                    <?php if($u['istock'] <= 0): ?>
                                                        <button
                                                            type="button"
                                                            class="btn btn-outline-primary d-block w-100 text-white"
                                                            style="background-color: #6b9bd0"
                                                            <?php if(true): echo 'disabled'; endif; ?>
                                                        >
                                                            Buy
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md text-end">
                                                <?php if(is_null($wishlist)): ?>
                                                <div class="text-muted small">
                                                    <a href="/wishlist/add/<?php echo e($u['id_item']); ?>">
                                                        <button
                                                            type="button"
                                                            class="btn btn-outline-secondary d-bloxk w-100">
                                                            <i class="fa-solid fa-heart" style="color: #6b9bd0"></i>
                                                             Wishlist
                                                        </button>
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                                <?php if(!is_null($wishlist)): ?>
                                                <div class="text-muted small">
                                                    <a href="/wishlist/add/<?php echo e($u['id_item']); ?>">
                                                        <button
                                                            type="button"
                                                            class="btn btn-outline-secondary d-bloxk w-100">
                                                            <i class="fa-solid fa-heart" style="color: red"></i>
                                                            Wishlist
                                                        </button>
                                                    </a>
                                                </div>
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
          </div>
        </div>
      </div>
    <!-- </section> -->

    <!-- Products
    <section style="background-color:white;" id="products"> -->
      <div class="container-fluid">
        <div class="row mt-5 text-center">
          <p class="fw-bold h3">Our Products</p>
          <div class="col-md mt-5 d-flex justify-content-end">
            <a
                  href="/product/more"
                  class="text-decoration-none text-light p-2 rounded"
                  style="background-color: #6b9bd0; margin-right: 3.5rem;"
                  >More <i class="fa-solid fa-arrow-right"></i
            ></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md">
            <div class="row mt-3">
                <?php $__currentLoopData = $item2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <img src="Assets/img/Review Flash Sale-01.png" alt="" />
                            <div class="row">
                                <div class="col-md">
                                <p class="fw-bold">Rp.<?php echo e(number_format($u['iprice'])); ?></p>
                                </div>
                                <div class="col-md text-end me-5">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <a href="<?php echo e(url('add_cart').'/'.$u['id_item']); ?>">
                                        <?php if($u['istock'] > 0): ?>
                                        <a href="<?php echo e(url('add_cart').'/'.$u['id_item']); ?>">
                                            <button
                                                type="button"
                                                class="btn btn-outline-primary d-block w-100 text-white"
                                                style="background-color: #6b9bd0"
                                            >
                                                Buy
                                            </button>
                                        </a>
                                        <?php endif; ?>
                                        <?php if($u['istock'] <= 0): ?>
                                            <button
                                                type="button"
                                                class="btn btn-outline-primary d-block w-100 text-white"
                                                style="background-color: #6b9bd0"
                                                <?php if(true): echo 'disabled'; endif; ?>
                                            >
                                                Buy
                                            </button>
                                        <?php endif; ?>
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


<?php echo $__env->make('template_users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/home.blade.php ENDPATH**/ ?>