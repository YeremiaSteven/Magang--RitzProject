<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>
<div class="card-body">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 ">
            <form action="<?php echo e(url('master/toko/edit')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="">Id Toko</label>
                    <input type="text" name="id" value="<?php echo e($master->id_user); ?>" disabled>
                    <input type="text" name="id" value="<?php echo e($master->id_user); ?>" hidden>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Name Toko</span
                        >
                        <input
                          name="name"
                          type="text"
                          class="form-control"
                          value="<?php echo e($master->vname); ?>"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          required
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Address</span
                        >
                        <input
                          name="address"
                          type="text"
                          class="form-control"
                          value="<?php echo e($master->vaddress); ?>"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          required
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Telp Number</span
                        >
                        <input
                          name="no_telp"
                          type="text"
                          class="form-control"
                          value="<?php echo e($master->vno_telp); ?>"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          required
                        />
                    </div>
                
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/mastertoko_edit.blade.php ENDPATH**/ ?>