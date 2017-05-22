<link href="<?php echo e(asset('/plugins/toastr/toastr.css')); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo e(asset('/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
<script src="<?php echo e(asset('/plugins/toastr/toastr.js')); ?>" type="text/javascript"></script>

<?php if($message = Session::get('imagenperf')): ?>
<script type="text/javascript">
	//alert('<?php echo $message; ?>');
	toastr.success('<?php echo $message; ?>', 'Mensaje', {timeOut: 2500})
</script>
<?php Session::forget('success'); ?>
<?php endif; ?>

<?php if($message = Session::get('bienvenido')): ?>
<script type="text/javascript">
	//alert('<?php echo $message; ?>');
	toastr.success('<?php echo $message; ?>', 'Mensaje', {timeOut: 5000})
</script>
<?php Session::forget('success'); ?>
<?php endif; ?>

<?php if($message = Session::get('success')): ?>
<script type="text/javascript">
	//alert('<?php echo $message; ?>');
	toastr.success('<?php echo $message; ?>', 'Éxito', {timeOut: 5000})
</script>
<?php Session::forget('success'); ?>
<?php endif; ?>

<?php if($message = Session::get('danger')): ?>
<script type="text/javascript">
	//alert('<?php echo $message; ?>');
	toastr.error('<?php echo $message; ?>', 'Peligro', {timeOut: 5000})
</script>
<?php Session::forget('danger'); ?>
<?php endif; ?>
