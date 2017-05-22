<?php $__env->startSection('htmlheader_title'); ?>
<?php echo e(trans('message.home')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
			<?php echo e(trans('message.bienvenido')); ?> <?php if(Auth::check()): ?><?php echo e(Auth::user()->Nombre); ?> <?php echo e(Auth::user()->Apellido); ?> <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo e(trans('message.information')); ?></div>

					<div class="panel-body">
						<div class="login-logo">
		            <img style='width: 26%;' src="<?php echo e(asset ('../img/Sitwifi-natural.png')); ?>" >
		        </div>
						<h4><b><?php echo e(trans('message.infositwifiq')); ?></b></h4>
            <p style="text-align: justify;" ><?php echo e(trans('message.infositwifi')); ?></p>
						<br>
						<b><?php echo e(trans('message.logged')); ?></b>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>