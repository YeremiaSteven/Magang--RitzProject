<?php $__env->startSection('content'); ?>
<?php if($message = Session::get('success')): ?>
<div class="alert alert-info">
   <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>

    <br><br><br>
    <div style="background-color:white; border-radius:5%" class="container">
    <br><br>
    <?php if(empty($item)): ?>
    <div class="row mt-3 justify-content-center">
        <div class="col-md d-flex justify-content-center">
            <p class="fs-3">Keranjang kamu masih kosong!! <br></p>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-10">
              <div class="card w-100 shadow flex-md-row">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                      <h5 class="card-text fw-bold">Subtotal</h5>
                    </div>
                    <div class="col-md-2">
                      <p>Rp. 0</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <h5 class="card-text fw-bold text-danger">Discount</h5>
                    </div>
                    <div class="col-md-2">
                      <p class="text-danger">Rp. 0</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <h5 class="card-text fw-bold text-danger">
                        Member Discount
                      </h5>
                    </div>
                    <div class="col-md-2">

                      <p class="text-danger">Rp. 0</p>

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <h5 class="card-text fw-bold">Shipping & Handling</h5>
                    </div>
                    <div class="col-md-2">
                      <p>Rp. 0</p>
                    </div>
                  </div>
                  <div class="row border-top">
                    <div class="col-md-10 mt-3">
                      <h5 class="card-text fw-bold">Grand Total</h5>
                    </div>
                    <div class="col-md-2 mt-3">
                      <p class="fw-bold">Rp. 0</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-md-10 d-flex justify-content-center">
              <button class="btn btn-primary w-75 mb-3" disabled><a style="color:white"href="/checkout"> Check Out</a></button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if(!empty($item)): ?>
    <div class="row mt-3 justify-content-center">
    <div class="col-md-10 d-flex justify-content-center">
                  <div class="card shadow flex-md-row p-4 w-75">
                    <div class="row justify-content-center ms-1">
                      <div
                        class="col-md-2 d-flex align-items-center justify-content-center"
                      >
                        <img src="assets/picture/voucher.png" alt="..." width="300" height="80" />
                      </div>
                      <div class="col-md-8 align-items-center">
                        <h5 class="card-title fw-bold">Voucher Event</h5>
                        <p class="text-muted card-text">
                            <input
                                name="discevent"
                                type="text"
                                class="form-control"
                                value="<?php echo e($discevent->vdesc); ?>"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"
                                hidden
                            />
                            <?php echo e($discevent->vname); ?>

                            <br>
                            <?php echo e($discevent->vdesc); ?>

                        </p>
                      </div>
                      <div class="col-md-2 d-flex align-items-center">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#changeEvent" >Change</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        <?php
            $total_price = 0;
            $total_discount = 0;
        ?>
        <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row justify-content-center mt-3">
            <div class="col-md-10">
              <div class="card w-100 shadow flex-md-row">
                <?php if($count['picture'] == null): ?>
                <img src="<?php echo e(asset('assets/picture/blank_profilepicture.png')); ?>" alt="..." style="width: 25%;"/>
                <?php endif; ?>
                <?php if($count['picture'] != null): ?>
                <img src="<?php echo e(asset('assets/picture').'/'.($count['picture'])); ?>" alt="..." style="width: 25%;"/>
                <?php endif; ?>
                <div class="card-body">
                  <h5 class="card-title fw-bold"><?php echo e($count['vname_item']); ?></h5>
                  <h6 class="text-muted card-text"><?php echo e($count['vname']); ?></h6>
                  <p class="text-muted card-text"><?php echo e($count['vcategory']); ?></p>
                  <p class="fw-bold">Rp. <?php echo e(number_format($count['iprice'] * $count['iquantity'])); ?></p>
                  <div class="col-lg text-start">
                    <a href="/item_cart/increa/<?php echo e($count['id']); ?>"
                      ><i
                        class="fa-solid fa-circle-plus fa-xl"
                        style="color: #345ea8"
                      ></i
                    ></a>
                    <?php echo e($count['iquantity']); ?>

                    <a href="/item_cart/decrea/<?php echo e($count['id']); ?>"
                      ><i
                        class="fa-solid fa-circle-minus fa-xl"
                        style="color: #345ea8"
                      ></i
                    ></a>
                  </div>
                </div>
                <div
                  class="col-sm-2 d-flex justify-content-center align-items-center"
                >
                  <div class="form-check fs-1">
                    <a href="/item_cart/delete/<?php echo e($count['id']); ?>">
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
        <?php
            $total_price += $count['iprice']* $count['iquantity'];
            $total_discount += $count['iprice_after']* $count['iquantity'];
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <form action="<?php echo e(url('/checkout')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="row justify-content-center mt-3">
            <div class="col-md-10 d-flex justify-content-center">
                  <div class="card shadow flex-md-row p-4 w-75">
                    <div class="row justify-content-center ms-1">
                      <div
                        class="col-md-2 d-flex align-items-center justify-content-center"
                      >
                        <img src="assets/picture/Mobil.png" alt="..." width="600" height="60" />
                      </div>
                      <div class="col-md-8 align-items-center">
                        <h5 class="card-title fw-bold">Address</h5>
                        <p class="text-muted card-text">
                            <input
                                name="address"
                                type="text"
                                class="form-control"
                                value="<?php echo e($address->vaddress); ?>"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"
                                hidden
                            />
                          <?php echo e($address->vaddress); ?>

                        </p>
                      </div>
                      <div class="col-md-2 d-flex align-items-center">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#changeAddress" >Change</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3 justify-content-center">
                <div class="col-md-10">
                  <div class="mb-3">
                    <label
                      for="exampleFormControlTextarea1"
                      class="form-label fw-bold"
                      >Notes</label
                    >
                    <textarea
                      name="notes"
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="2"
                    ></textarea>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center mt-3">
                <div class="col-md-10">
                  <div class="card w-100 shadow flex-md-row">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-10">
                          <h5 class="card-text fw-bold">Subtotal</h5>
                        </div>
                        <div class="col-md-2">
                          <p>Rp. <?php echo e(number_format($total_price)); ?></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10">
                          <h5 class="card-text fw-bold text-danger">Discount</h5>
                        </div>
                        <div class="col-md-2">
                          <p class="text-danger">Rp. <?php echo e(number_format($total_price - $total_discount)); ?></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10">
                          <h5 class="card-text fw-bold text-danger">Discount Event</h5>
                        </div>
                        <div class="col-md-2">
                          <p class="text-danger">Rp. 0</p>
                        </div>
                        <div class="row">
                        <div class="col-md-10">
                          <h5 class="card-text fw-bold text-danger">Discount Birthday</h5>
                        </div>
                        <div class="col-md-2">
                          <p class="text-danger">Rp. 0</p>
                        </div>
                      <div class="row">
                        <div class="col-md-10">
                          <h5 class="card-text fw-bold text-danger">
                            Member Discount
                          </h5>
                        </div>
                        <div class="col-md-2">
                          <?php if(is_null($member)): ?>
                            <p class="text-danger">Rp. 0</p>
                          <?php endif; ?>
                          <?php if(!is_null($member)): ?>
                            <?php if($member->istatus_member == 1): ?>
                            <p class="text-danger">Rp. <?php echo e(number_format($total_discount * $disc2)); ?></p>
                            <?php endif; ?>
                            <?php if($member->istatus_member == 0): ?>
                            <p class="text-danger">Rp. 0</p>
                            <?php endif; ?>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10">
                          <h5 class="card-text fw-bold">Shipping & Handling</h5>
                        </div>
                        <div class="col-md-2">
                          <p>Rp. 15,000</p>
                        </div>
                      </div>
                      <div class="row border-top">
                        <div class="col-md-10 mt-3">
                          <h5 class="card-text fw-bold">Grand Total</h5>
                        </div>
                        <div class="col-md-2 mt-3">
                          <p class="fw-bold">

                            <?php if(is_null($member)): ?>
                            <input
                                name="amount"
                                type="number"
                                class="form-control"
                                value="<?php echo e($total_discount + 15000); ?>"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"
                                hidden
                            />
                            Rp. <?php echo e(number_format($total_discount + 15000)); ?>

                            <?php endif; ?>
                            <?php if(!is_null($member)): ?>
                                <?php if($member->istatus_member == 1): ?>
                                <input
                                name="amount"
                                type="number"
                                class="form-control"
                                value="<?php echo e($total_discount - ($total_discount * $disc2)+ 15000); ?>"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"
                                hidden
                                />
                                Rp. <?php echo e(number_format($total_discount - ($total_discount * $disc2)+ 15000)); ?>

                                <?php endif; ?>
                                <?php if($member->istatus_member == 0): ?>
                                <input
                                name="amount"
                                type="number"
                                class="form-control"
                                value="<?php echo e($total_discount +15000); ?>"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"
                                hidden
                                 />
                                Rp. <?php echo e(number_format($total_discount + 15000)); ?>

                                <?php endif; ?>
                            <?php endif; ?>

                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3 justify-content-center">
                <div class="col-md-10 d-flex form-group justify-content-center">
                    <button type="submit" class="btn btn-primary w-75 mb-3" data-confirm-delete="true">Check Out</button>
                </div>
              </div>
        </form>
      </div>
    <?php endif; ?>
    </div>
    <br><br><br>
    
    
    <div class="modal fade" id="changeAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Change Address</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $__currentLoopData = $address2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row justify-content-center my-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <?php if($u->istatus_address == 1): ?>
                                <div class="badge bg-secondary mx-3 mb-3 fs-6">Default</div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-9">
                                    <div class="row">
                                        <h5 class="card-title fw-bolder mx-3"><?php echo e($u->vreceiver_name); ?></h5>
                                        <label for="" class="mx-3"><?php echo e($u->vaddress); ?></label>
                                    </div>
                                </div>
                                <?php if($u->istatus_address == 0): ?>
                                <div class="col-3">
                                    <form action="<?php echo e(url('cart/address/select')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                            <input type="text" name="id" value="<?php echo e($u->id_table); ?>" hidden>
                                            <button type="submit" class="btn btn-primary mt-3">Select</button>
                                    </form>
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

      
    <div class="modal fade" id="changeEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Change Event</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $__currentLoopData = $discevent2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row justify-content-center my-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <?php if($u->status == 1): ?>
                                <div class="badge bg-secondary mx-3 mb-3 fs-6">Ready</div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-9">
                                    <div class="row">
                                        <h5 class="card-title fw-bolder mx-3"><?php echo e($u->vdesc); ?></h5>
                                        <label for="" class="mx-3"><?php echo e($u->vname); ?></label>
                                        <label for="" class="mx-3"><?php echo e($u->value); ?></label>
                                    </div>
                                </div>
                                <?php if($u->status == 0): ?>
                                <div class="col-3">
                                    <form action="<?php echo e(url('cart/voucher/select')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                            <input type="text" name="id" value="<?php echo e($u->id_ttransaction_event); ?>" hidden>
                                            <button type="submit" class="btn btn-primary mt-3">Select</button>
                                    </form>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/cart.blade.php ENDPATH**/ ?>