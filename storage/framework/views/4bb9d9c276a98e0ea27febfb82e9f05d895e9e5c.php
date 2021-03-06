<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('message.pagenotfound')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('message.404error')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('$contentheader_description'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<div class="error-page">
    <h2 class="headline text-yellow"> 404</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> <?php echo e(trans('message.emotionOps')); ?>! <?php echo e(trans('message.pagenotfound')); ?>.</h3>
        <p>
            <?php echo e(trans('message.notfindpage')); ?>

            <?php echo e(trans('message.mainwhile')); ?> <a href='<?php echo e(url('/home')); ?>'><?php echo e(trans('message.returndashboard')); ?></a>
        </p>
    </div><!-- /.error-content -->
</div><!-- /.error-page -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>