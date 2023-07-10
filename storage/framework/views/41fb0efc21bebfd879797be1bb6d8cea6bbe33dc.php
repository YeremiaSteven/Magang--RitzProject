<!-- Menghubungkan dengan view template master -->

<?php $__env->startSection('content'); ?>

<div class="col d-flex flex-column h-sm-100">
	<h1 class="text-center mt-3 fw-bold">Member List</h1>

	<div class="col-md ps-5 pe-5" style="padding-top:1rem;">
		<table id="example" class="table table-stripped" style="width:100%">
			<thead>
			  <tr class="text-center">
                <th scope="col">Id</th>
				<th scope="col">Full Name</th>
				<th scope="col">Status</th>
                <th scope="col">Member Type</th>
				<th scope="col">Created by</th>
                <th scope="col">Member Since</th>
				
			  </tr>
		    </thead>
            <tbody>
			<?php $__currentLoopData = $member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e(++$i); ?></td>
				<td><?php echo e($u->vname); ?></td>
                <?php if($u->istatus_member == 1): ?>
                <td>Active</td>
                <?php endif; ?>
                <?php if($u->istatus_member == 0): ?>
                <td>Inactive</td>
                <?php endif; ?>

			
				<?php if($u->vtipemem == 0): ?>
                <td>Basic</td>
                <?php endif; ?>
				<?php if($u->vtipemem == 1): ?>
                <td>Premium</td>
                <?php endif; ?>

				
                <td><?php echo e($u->vcrea); ?></td>
                <td><?php echo e($u->dcrea); ?></td>
				
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    </tbody>
        </table>
	</div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProjectMagang\ecm_app-main\resources\views/member_list.blade.php ENDPATH**/ ?>