<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>

<div class="col d-flex flex-column h-sm-100">
	<main class="row overflow-auto flex-column">
		<h1 class="text-center mt-3 fw-bold">Toko Management</h1>
		<div class="col-md-4 mt-3 ps-5">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#admin_store">Tambah Data</button>
		</div>
		<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-bordered">
			<thead>
			  <tr class="text-center">
				<th scope="col">Id</th>
				<th scope="col">Name Toko</th>
				<th scope="col">Alamat Toko</th>
				<th scope="col">Rate Toko</th>
				<th scope="col">Last Update</th>
				<th scope="col">Action</th>
			  </tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e(++$i); ?></td>
					<td><?php echo e($u->vname_toko); ?></td>
					<td><?php echo e($u->vaddress_toko); ?></td>
					<td><?php echo e($u->irate_toko); ?></td>
					<td><?php echo e($u->dmodi); ?></td>
					<td class="text-center"><a href="/master/toko/edit/<?php echo e($u->id_toko); ?>"><i class="fa-regular fa-pen-to-square me-2"></i></a><a href="/master/header/delete/<?php echo e($u->id_item); ?>"><i class="fa-solid fa-trash me-2"></i></a><a href="detail/<?php echo e($u->id_item); ?>"><i class="fa fa-info-circle me-2" aria-hidden="true"></i></a></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		  </table>
		</div>
        <div id="tableDetail"></div>
	</main>
</div>

<!-- Modal -->
<div class="modal fade" id="admin_store" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Insert Item</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="<?php echo e(url('master/toko/store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group row mt-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name Toko</label>
                        <input name="nama" type="text" class="form-control" placeholder="Enter the Name Toko" required>
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Address Toko</label>
                        <input name="nama" type="text" class="form-control" placeholder="Enter the Address Toko" required>
                    </div>
					<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Rate Toko</label>
                        <input name="stock" type="number" class="form-control" placeholder="Enter the Stock" min="0" oninput="this.value =
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required >
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
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/mastertoko.blade.php ENDPATH**/ ?>