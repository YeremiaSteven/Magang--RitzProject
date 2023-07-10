<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>

<div class="col d-flex flex-column h-sm-100">
	<main class="row overflow-auto flex-column">
		<h1 class="text-center mt-3 fw-bold">Transaction Header</h1>
		<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		  <table id="example" class="table table-bordered">
			<thead>
			  <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Id Transaction</th>
                <th scope="col">Id Payment</th>
				<th scope="col">User</th>
				<th scope="col">Total Quantity</th>
				<th scope="col">Tracking Status</th>
				<th scope="col">Total Price</th>
				<th scope="col">Notes</th>
				<th scope="col">Address</th>
				<th scope="col">Action</th>
			   </tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e(++$i); ?></td>
                    <td><?php echo e($u->id_transaction); ?></td>
					<td><?php echo e($u->id_payment); ?></td>
					<td><?php echo e($u->vname); ?></td>
					<td><?php echo e($u->itotal_quantity); ?></td>
                    <?php if($u->itracking_status == 0): ?>
                        <td>Packing</td>
                    <?php endif; ?>
                    <?php if($u->itracking_status == 1): ?>
                        <td>Sending</td>
                    <?php endif; ?>
                    <?php if($u->itracking_status == 2): ?>
                        <td>Arrived</td>
                    <?php endif; ?>
                    <?php if($u->itracking_status == 3): ?>
                        <td>Failed</td>
                    <?php endif; ?>
					<td>Rp.<?php echo e(number_format($u->itotal_price)); ?></td>
					<td><?php echo e($u->vnote); ?></td>
					<td><?php echo e($u->vaddress); ?></td>
					<td class="text-center"><a href="/transaction_edit_status/<?php echo e($u->id_transaction); ?>"><i class="fa fa-pen-to-square me-2" aria-hidden="true"></i></a><a href="/transaction_detail/<?php echo e($u->id_transaction); ?>"><i class="fa fa-info-circle me-2" aria-hidden="true"></i></a><a href="/payment_detail/<?php echo e($u->id_payment); ?>"><i class="fa fa-usd me-2" aria-hidden="true"></i></a></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		  </table>
		</div>
        <div id="tableDetail"></div>
	</main>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/transaction_hdr.blade.php ENDPATH**/ ?>