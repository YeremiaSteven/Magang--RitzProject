<?php $__env->startSection('content'); ?>

    <div style="background-color:#ffffff"class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-4 text-center">
          <img
            src="<?php echo e(asset('assets/picture').'/'.(Auth::user()->profile_picture)); ?>"
            alt="Foto Profil"
            style="border-radius: 50%; width:150px; height:150px;"
            class="img-fluid mt-3 "/>
          <br><br>
          <p class="fw-bold"><?php echo e(Auth::user()->vname); ?></p>
          <p class="pb-4"><?php echo e(Auth::user()->email); ?></p>
          <div class="container">
            <div class="row text-start fw-bold">
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <div class="text-center mb-3">
                <button
                class="btn text-white fw-bold"
                type="button"
                style="background-color: #6b9bd0"
                data-bs-toggle="modal" data-bs-target="#addAddress">
                Add Address
                </button>
            </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row justify-content-center my-3">
        <div class="col-md-6">
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
                            <div class="row">
                                <div class="col-6">
                                    <a href="/address/edit/<?php echo e($u->id_table); ?>" class="btn btn-link mx-1">Change Address</a>
                                </div>
                                <?php if(count($address) > 1): ?>
                                <div class="col">
                                    <form action="<?php echo e(url('address/delete')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                            <input type="text" name="id" value="<?php echo e($u->id_table); ?>" hidden>
                                            <?php if($u->istatus_address == 0): ?>
                                                <button type="submit" class="btn btn-link">Delete</button>
                                            <?php endif; ?>

                                    </form>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($u->istatus_address == 0): ?>
                        <div class="col-3">
                            <form action="<?php echo e(url('address/select')); ?>" method="POST">
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
    <!-- Modal -->
    <div class="modal fade" id="addAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Address</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(url('address/add')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Recipient's Name</label>
                        <div class="col-sm-8">
                          <input type="text" name="name" class="form-control" required>
                        </div>
                      </div>
                      <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Address</label>
                        <div class="col-sm-8">
                          <textarea name="address" class="form-control" required></textarea>
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/address_list.blade.php ENDPATH**/ ?>