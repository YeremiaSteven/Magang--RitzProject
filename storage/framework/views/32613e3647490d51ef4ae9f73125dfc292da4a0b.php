<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>
<div class="card-body">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 ">
            <form action="<?php echo e(url('master/header/edit')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="">Id Item</label>
                    <input type="text" name="id" value="<?php echo e($master->id_item); ?>" disabled>
                    <input type="text" name="id" value="<?php echo e($master->id_item); ?>" hidden>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Store Name</span
                        >
                        <select name="store" class="form-select" aria-label="Default select example">
                            <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->id_user== $master->id_user): ?>
                                    <option value="<?php echo e($item->id_user); ?>" selected><?php echo e($item->vname); ?></option>
                                <?php endif; ?>
                                <?php if($item->id_user != $master->id_user): ?>
                                    <option value="<?php echo e($item->id_user); ?>"><?php echo e($item->vname); ?></option>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Item Name</span
                        >
                        <input
                          name="name"
                          type="text"
                          class="form-control"
                          value="<?php echo e($master->vname_item); ?>"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          required
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Category</span
                        >
                        <select name="category" class="form-select" aria-label="Default select example">
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->id_category == $master->id_category): ?>
                                    <option value="<?php echo e($item->id_category); ?>" selected><?php echo e($item->vcategory); ?></option>
                                <?php endif; ?>
                                <?php if($item->id_category != $master->id_category): ?>
                                    <option value="<?php echo e($item->id_category); ?>"><?php echo e($item->vcategory); ?></option>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Barcode</span
                        >
                        <input
                          name="barcode"
                          type="number"
                          class="form-control"
                          value="<?php echo e($master->vbarcode); ?>"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          maxlength="20"
                          
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Description</span
                        >
                        <textarea
                          name="desc"
                          type="text"
                          class="form-control"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"required
                        ><?php echo e($master->vdescription); ?></textarea>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Stock</span
                        >
                        <input
                          name="stock"
                          type="number"
                          class="form-control"
                          value="<?php echo e($master->istock); ?>"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          min="0" 
                          oninput="this.value = 
                          !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                          required
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Item Price</span
                        >
                        <input
                          name="price"
                          type="number"
                          class="form-control"
                          value="<?php echo e($master->iprice); ?>"
                          aria-label="Sizing example input"
                          aria-describedby="inputGroup-sizing-default"
                          min="0" 
                          oninput="this.value = 
                          !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                          required
                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Item Expired</span
                        >
                        <input
                          value="<?php echo e($master->dexpired); ?>"
                          name="expired"
                          type="date"
                          class="form-control"

                        />
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Item Active</span
                        >
                        <select required  name="itemactive" class="form-select" aria-label="Default select example">
                            <?php if($master->iactive == 1): ?>
                                <option value="1" selected>Active</option>
                                <option value="0" >Inactive</option>
                            <?php endif; ?>
                            <?php if($master->iactive == 0): ?>
                                <option value="1" >Active</option>
                                <option value="0" selected>Inactive</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text w-50" id="inputGroup-sizing-default"
                          >Flash Sale Active</span
                        >
                        <select name="flashsale" class="form-select" aria-label="Default select example">
                            <?php if($master->iflashsale == 1): ?>
                                <option value="1" selected>Active</option>
                                <option value="0" >Inactive</option>
                            <?php endif; ?>
                            <?php if($master->iflashsale == 0): ?>
                                <option value="1" >Active</option>
                                <option value="0" selected>Inactive</option>
                            <?php endif; ?>
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

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/masterheader_edit.blade.php ENDPATH**/ ?>