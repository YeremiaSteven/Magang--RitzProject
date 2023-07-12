<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>

    <div style="background-color:#ffffff"class="container-fluid">
      <br><br><div class="row justify-content-center">
        <div class="col-md-6 text-center">
          <div class="container">
            <div
              class="row p-2 mb-2 fw-bold rounded"
              style="background-color: #6b9bd0"
            >
              <div style="color:white;"class="col text-start">Change Password</div>
            </div>
            <form action="<?php echo e(url('password_change')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="row p-2">
                <div class="col text-start mb-2">
                    <div class="form-group">
                        <div class="input-group mb-2 mt-3">
                            <span class="input-group-text" id="inputGroup-sizing-default" style="width: 25%"
                            >Password</span
                            >
                            <input
                            name="password"
                            type="password"
                            class="form-control"
                            aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            />
                        </div>
                        <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                </div>
              </div>
              <div class="row p-2">
                <div class="col text-start mb-2">
                    <div class="form-group">
                        <div class="input-group mb-2 mt-3">
                            <span class="input-group-text" id="inputGroup-sizing-default" style="width: 25%"
                            >Confirm Password</span
                            >
                            <input
                            name="password_confirmation"
                            type="password"
                            class="form-control"
                            aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            />
                        </div>
                        <span class="text-danger"><?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-warning">Change</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/change_password.blade.php ENDPATH**/ ?>