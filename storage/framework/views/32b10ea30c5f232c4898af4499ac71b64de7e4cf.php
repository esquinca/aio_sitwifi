<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<?php $__env->startSection('htmlheader'); ?>
    <?php echo $__env->make('layouts.partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <?php echo $__env->make('layouts.partials.mainheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

         <?php if(Auth::check()): ?>
          <?php if(Auth::user()->Privilegio == 'Admin' || Auth::user()->Privilegio == 'Programador' || Auth::user()->Privilegio == 'Direccion' || Auth::user()->Privilegio == 'IT' || Auth::user()->Privilegio == 'ADMSUR' || Auth::user()->Privilegio == 'ADMCENTRO'): ?>
              <?php echo $__env->make('layouts.partials.contentheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <?php echo $__env->make('layouts.partials.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

              <section class="content">
                      <?php echo $__env->yieldContent('main-content'); ?>
              </section>
          <?php else: ?>
              <section class="content-header">
                <h1>
                  <?php echo e(trans('message.error')); ?>

                  <small> <?php echo e(trans('message.detalleD')); ?></small>
                </h1>
                <ol class="breadcrumb">
                  <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> <?php echo e(trans('message.alerta')); ?></a></li>
                </ol>
              </section>
              <section class="content">
                <?php echo $__env->make('layouts.partials.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              </section>
          <?php endif; ?>
          <?php else: ?>
            <section class="content">
                <?php echo $__env->yieldContent('main-content'); ?>
            </section>
          <?php endif; ?>


    </div><!-- /.content-wrapper -->

    <?php echo $__env->make('layouts.partials.controlsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div><!-- ./wrapper -->

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('layouts.partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

</body>
</html>
