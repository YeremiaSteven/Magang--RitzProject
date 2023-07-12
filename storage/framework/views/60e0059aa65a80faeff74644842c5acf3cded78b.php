<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>
<div class="card-body">
    <form action="<?php echo e(url('account_delete')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label class="me-3" for="">Are you sure delete this account?</label>
            <input type="text" name="id" value="<?php echo e($admin->id_user); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Yes</button>
        <a href="/admin"><button type="button" class="btn btn-secondary">Close</button></a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/delete_account.blade.php ENDPATH**/ ?>