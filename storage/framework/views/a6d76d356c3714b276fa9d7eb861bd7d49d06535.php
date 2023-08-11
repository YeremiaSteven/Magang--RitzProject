<?php $__env->startSection('content'); ?>

    <!-- Products -->
    <section id="products" style="background-color:white; padding-top: 2rem;
    ">
      <div class="container-fluid">
        <div class="row mt-5">
          <div class="col-md d-flex justify-content-center">
            <p class="h3 fw-bold me-3">Wishlist <i class="fa-solid fa-heart" style="color: #ff0000;"></i></p>

          </div>

        </div>
        <div class="row">
          <div class="col-md">
            <div
              id="carouselExampleSlidesOnly"
              class="carousel slide"
              data-bs-ride="carousel"
            >
              <div class="carousel-inner">
                <div class="carousel-item active">
                    <?php if(empty($item)): ?>
                    <div class="row mt-3 mb-5 justify-content-center bg-light rounded-3">
                        <p class="fs-5 text-center fw-bolder my-5">Wishlist Kamu Kosong</p>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($item)): ?>
                    <div class="row mt-3 mb-5 bg-light rounded-3">
                        <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 my-3">
                            <div class="card w-100 shadow" style="width: 18rem">
                              <a href="">
                                <?php if($u['picture'] != null): ?>
                                <img
                                    src="<?php echo e(asset('assets/picture').'/'.($u['picture'])); ?>"
                                    class="card-img-top"
                                    alt="..."
                                    style="width:100%; height:250px"
                                />
                                <?php endif; ?>
                                <?php if($u['picture'] == null): ?>
                                <img
                                    src="<?php echo e(asset('assets/picture/blank_profilepicture.png')); ?>"
                                    class="card-img-top"
                                    alt="..."
                                    style="width:100%; height:250px"
                                />
                                <?php endif; ?>
                              </a>
                              <div class="card-body">
                                <h5 class="card-title fw-bold">
                                  <?php echo e($u['vname_item']); ?>

                                </h5>
                                <h6 class="text-muted card-text">
                                  <?php echo e($u['vname']); ?>

                                </h6>
                                <p class="text-muted card-text">
                                    <?php echo e($u['vdescription']); ?>

                                </p>
                                <img src="assets/img/Review Flash Sale-01.png" alt="" />
                                <div class="row">
                                    <?php if($u['iflashsale'] == 0): ?>
                                    <div class="col-md">
                                        <p class="fw-bold">Rp.<?php echo e(number_format($u['iprice'])); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($u['iflashsale'] == 1): ?>
                                    <div class="col-md">
                                        <p class="text-danger"><s>Rp.<?php echo e(number_format($u['iprice'])); ?></s></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($u['iflashsale'] == 1): ?>
                                    <div class="col-md me-5">
                                        <p class="fw-bold">Rp.<?php echo e(number_format($u['iprice_after'])); ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="row">
                                  <div class="col text-center">
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
                                                disabled
                                            >
                                                Buy
                                            </button>

                                        <?php endif; ?>
                                  </div>
                                  <div class="col-md-2 text-end">
                                      <a href="/wishlist/add/<?php echo e($u['id_item']); ?>">
                                          <button
                                              type="button"
                                              class="btn btn-outline-secondary d-bloxk w-100"
                                          >
                                              <i class="fa-solid fa-trash" style="color: #78a3eb"></i>
                                          </button>
                                      </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('template_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/wishlist.blade.php ENDPATH**/ ?>