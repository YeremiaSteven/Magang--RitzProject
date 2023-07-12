<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>

<div class="col d-flex flex-column h-sm-100">
	<h1 class="text-center mt-3 fw-bold">Member Request</h1>

	<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		<table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
                <th scope="col">Id</th>
				<th scope="col">Email</th>
				<th scope="col">Status</th>
				<th scope="col">Created by</th>
				<th scope="col">Action</th>
			  </tr>
		    </thead>
            <tbody>
			<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e(++$i); ?></td>
				<td><?php echo e($u->email); ?></td>
				<?php if($u->istatus_request == 2): ?>
                <td>Ditolak</td>
				<?php endif; ?>
				<?php if($u->istatus_request == 1): ?>
                <td>Disetujui</td>
                <?php endif; ?>
                <?php if($u->istatus_request == 0): ?>
                <td>Belum diproses</td>
                <?php endif; ?>

				<td><?php echo e($u->created_at); ?></td>
				<td class="text-center"><a href="member/accept/<?php echo e($u->email); ?>"><i class="fa fa-check-circle me-2"></i></a>
				<a href="member/delete/<?php echo e($u->email); ?>"><i class="fa fa-times-circle me-2"></i></a>
		
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    </tbody>
        </table>
	</div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/member.blade.php ENDPATH**/ ?>