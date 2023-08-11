<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>

<div class="col d-flex flex-column h-sm-100">
	<main class="row overflow-auto flex-column">
		<h1 class="text-center mt-3 fw-bold">Address Toko</h1>
		<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-bordered">
			<thead>
			  <tr class="text-center">
				<th scope="col">Id</th>
				<th scope="col">Name Toko</th>
				<th scope="col">Alamat Toko</th>
				<th scope="col">Last Update</th>
				<th scope="col">Modified by</th>
				<th scope="col">Action</th>
			  </tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e(++$i); ?></td>
					<td><?php echo e($u->vreceiver_name); ?></td>
					<td><?php echo e($u->vaddress); ?></td>
					<td><?php echo e($u->vmodi); ?></td>
					
                <td><?php echo e($u->dmodi); ?></td>
				
					<td class="text-center">
					<a href="/master/address/delete/<?php echo e($u->id_user); ?>"><i class="fa-solid fa-trash me-2"></i></a></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		  </table>
		</div>
        <div id="tableDetail"></div>
	</main>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/addresstoko.blade.php ENDPATH**/ ?>