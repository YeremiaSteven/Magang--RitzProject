<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>
<div class="card-body">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 ">
            <form action="<?php echo e(url('master/header/delete')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="me-3" for="">Are you sure delete this data?</label>

                    <input type="text" name="id" value="<?php echo e($id); ?>" disabled>
                    <input type="text" name="id" value="<?php echo e($id); ?>" hidden>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/masterheader_delete.blade.php ENDPATH**/ ?>