<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>
<div class="card-body">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 ">
            <form action="<?php echo e(url('detail/edit')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="">Id Item</label>
                    <input type="text" name="id" value="<?php echo e($master->id_itemdtl); ?>">
                    <div class="mb-3 mt-5">
                        <label for="exampleFormControlInput1" class="form-label">Image Product</label>
                        <input name="image" type="file" class="form-control" required>
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

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/itemdtl_edit.blade.php ENDPATH**/ ?>