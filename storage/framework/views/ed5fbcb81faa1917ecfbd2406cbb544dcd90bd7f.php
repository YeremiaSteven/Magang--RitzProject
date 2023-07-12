<?php $__env->startSection('content'); ?>

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
            <?php if($picture == null): ?>
                <img
                class="img-fluid w-50"
                src="<?php echo e(asset('assets/picture/blank_profilepicture.png')); ?>"
                alt=""
            />
            <?php endif; ?>
            <?php if($picture != null): ?>
            <img
                class="img-fluid w-50"
                src="<?php echo e(asset('assets/picture').'/'.($picture->picture)); ?>"
                alt=""
            />
            <?php endif; ?>
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
            <p class="h5 fw-bold"><?php echo e($detail_item->vname_item); ?></p>
            <div class="text-muted small">Stock : <?php echo e($detail_item->istock); ?></div>
            <div class="d-flex justify-content-start">
                <?php if($detail_item->iflashsale == 1): ?>
                    <p class="text-danger me-3"><s>Rp. <?php echo e(number_format($detail_item->iprice)); ?></s></p>
                <?php endif; ?>
                <?php if($detail_item->iflashsale == 0): ?>
                    <p class="fw-bold me-3">Rp. <?php echo e(number_format($detail_item->iprice)); ?></p>
                <?php endif; ?>
                <?php if($detail_item->iflashsale == 1): ?>
                    <p class="fw-bold">Rp. <?php echo e(number_format($detail_item->iprice - ($detail_item->iprice * $disc->dvalue))); ?></p>
                <?php endif; ?>
            </div>
            <div class="d-flex justify-content-start align-items-center mb-3">
                <?php if(is_null($wishlist)): ?>
                <div class="text-muted small">
                    <a href="/wishlist/add/<?php echo e($detail_item->id_item); ?>">
                        <button
                            type="button"
                            class="btn btn-outline-secondary d-bloxk w-100"
                        >
                            <i class="fa-solid fa-heart" style="color: #6b9bd0"></i> Wishlist
                        </button>
                    </a>
                </div>
                <?php endif; ?>
                <?php if(!is_null($wishlist)): ?>
                <div class="text-muted small">
                    <a href="/wishlist/add/<?php echo e($detail_item->id_item); ?>">
                        <button
                            type="button"
                            class="btn btn-outline-secondary d-bloxk w-100"
                        >
                            <i class="fa-solid fa-heart" style="color: red"></i> Wishlist
                        </button>
                    </a>
                </div>
                <?php endif; ?>

            </div>
            <p class="h6 fw-bold">Description</p>
            <p class="me-3">
                <?php echo e($detail_item->vdescription); ?>

            </p>
            <div class="text-center">
                <?php if($detail_item->istock > 0): ?>
                    <a href="<?php echo e(url('add_cart').'/'.$detail_item->id_item); ?>">
                        <button
                        type="button"
                        class="btn btn-outline-primary w-75 text-white fw-bold mt-3"
                        style="background-color: #6b9bd0"
                        >
                        + Cart
                        </button>
                    </a>
                <?php endif; ?>
                <?php if($detail_item->istock <= 0): ?>

                        <button
                        type="button"
                        class="btn btn-outline-primary w-75 text-white fw-bold mt-3"
                        style="background-color: #6b9bd0"
                        disabled
                        >
                        + Cart
                        </button>

                <?php endif; ?>
            </div>
            </div>
        </div>
        </div>
    </section>
    <br>
    <br>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/product_detail.blade.php ENDPATH**/ ?>