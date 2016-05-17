<?php $__env->startSection('bodycontent'); ?>
<div class="container">
	<h1>List Quote</h1>
	<p>Find masih smua (asumsiin)</p>
	<table cellspacing="0" class="table">
		<tr>
			<th>Quote</th>
			<th>Author</th>
		</tr>
		<?php foreach($quotes as $quote): ?>
		<tr>
			<td> <?php echo e($quote->quote); ?></td>
			<td> <?php echo e($quote->author); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<div class="pagination"> <?php echo e($quotes->links()); ?> </div>
</div>	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>