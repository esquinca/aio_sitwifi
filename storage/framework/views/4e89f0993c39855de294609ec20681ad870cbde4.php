<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo e(asset('/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('/js/app.min.js')); ?>" type="text/javascript"></script>
<!-- Mas usados -->
<script src="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?php echo e(asset('/plugins/select2/select2.full.min.js')); ?>" type="text/javascript"></script>

<?php echo $__env->yieldPushContent('scripts'); ?>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
