<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>
<div class="card-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-4 text-center">
            <form action="<?php echo e(url('admin/edit')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="">Id Account</label>
                    <input type="text" name="id" value="<?php echo e($admin->id_user); ?>">
                    <div class="input-group mb-3 mt-5">
                      <span class="input-group-text w-25" id="inputGroup-sizing-default"
                        >Full Name</span
                      >
                      <input
                        name="name"
                        type="text"
                        class="form-control"
                        value="<?php echo e($admin->vname); ?>"
                        aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default"
                      />
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text w-25" id="inputGroup-sizing-default"
                        >Phone No.</span
                      >
                      <input
                        name="no_telp"
                        type="text"
                        class="form-control"
                        value="<?php echo e($admin->vno_telp); ?>"
                        aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default"
                      />
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text w-25" id="inputGroup-sizing-default"
                        >Active</span
                      >
                      <select name="status" class="form-select" aria-label="Default select example">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                    <div class="input-group mb-5">
                      <span class="input-group-text w-25" id="inputGroup-sizing-default"
                        >Role</span
                      >
                      <select name="role" class="form-select" aria-label="Default select example">
                        <option value="44441">Admin</option>
						<option value="44442">Staff</option>
					    <option value="44443">User</option>
                      </select>
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

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/edit_account.blade.php ENDPATH**/ ?>