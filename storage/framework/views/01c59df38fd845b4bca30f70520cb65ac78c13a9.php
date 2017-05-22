<link href="<?php echo e(asset('/plugins/toastr/toastr.css')); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo e(asset('/plugins/toastr/toastr.js')); ?>" type="text/javascript"></script>
<?php if($message = Session::get('danger')): ?>
<script type="text/javascript">
	//alert('<?php echo $message; ?>');
	toastr.error('<?php echo $message; ?>', 'Peligro', {timeOut: 5000})
</script>
<?php Session::forget('danger'); ?>
<?php endif; ?>
