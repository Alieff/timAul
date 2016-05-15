<!DOCTYPE html>
<html>
	<head>
    	<?php echo $__env->make('layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</head>
	
	<body>
		<!--NAVBAR CODE HERE -->
		<?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<!--CONTENT OF BODY HERE -->
		<?php echo $__env->yieldContent('bodycontent'); ?>
		
	</body>

	<footer class="footer">
		<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</footer>

</html>
