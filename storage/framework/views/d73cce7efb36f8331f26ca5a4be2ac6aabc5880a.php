<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>

<div class="col d-flex flex-column h-sm-100">
	<main class="row overflow-auto flex-column">
		<h1 class="text-center mt-3 fw-bold">Transaction Detail</h1>
		<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
                <th scope="col">Number</th>
				<th scope="col">Id Transaction</th>
				<th scope="col">Item Name</th>
				<th scope="col">Total Quantity</th>
				<th scope="col">Date Packing</th>
				<th scope="col">Date Sending</th>
				<th scope="col">Date Arriving</th>
                <th scope="col">Date Failed</th>

			  </tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e(++$i); ?></td>
					<td><?php echo e($u->id_transaction); ?></td>
					<td><?php echo e($u->vname_item); ?></td>
					<td><?php echo e($u->iquantity); ?></td>
					<td><?php echo e($u->dspack); ?></td>
					<td><?php echo e($u->dssend); ?></td>
					<td><?php echo e($u->dsarriv); ?></td>
					<td><?php echo e($u->dsfail); ?></td>
					
					
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		  </table>
		</div>
        <div id="tableDetail"></div>
	</main>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/transaction_dtl.blade.php ENDPATH**/ ?>