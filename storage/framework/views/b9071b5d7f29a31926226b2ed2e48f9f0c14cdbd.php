<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>
<div class="card-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-4 text-center">
            <form action="<?php echo e(url('web/edit')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <div class="fs-1">Website Setting</div>
                    <?php $__currentLoopData = $setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="input-group mb-3 mt-5">
                        <span class="input-group-text w-30" id="inputGroup-sizing-default"
                          >
                          <?php if($u->id_global == 1): ?>
                            Discount Flashsale
                          <?php endif; ?>
                          <?php if($u->id_global == 2): ?>
                            Discount Member
                          <?php endif; ?>
                          <?php if($u->id_global == 3): ?>
                            Name Store
                          <?php endif; ?>
                          </span
                        >
                        <?php if($u->id_global != 3): ?>
                            <input
                            name="dvalue<?php echo e($u->id_global); ?>"
                            type="number"
                            class="form-control"
                            value="<?php echo e($u->dvalue * 100); ?>"
                            aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            required
                            />
                            <input
                            name="ivalue<?php echo e($u->id_global); ?>"
                            type="number"
                            class="form-control"
                            value="<?php echo e($u->ivalue); ?>"
                            aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"
                            required
                            />
                        <?php endif; ?>
                        <?php if($u->id_global == 3): ?>
                        <input
                          name="name"
                          type="text"
                          class="form-control"
                          value="<?php echo e($u->vvalue); ?>"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          required
                        />
                        <?php endif; ?>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/web_setting.blade.php ENDPATH**/ ?>