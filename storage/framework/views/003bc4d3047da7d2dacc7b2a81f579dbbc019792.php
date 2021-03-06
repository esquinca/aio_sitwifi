<?php $__env->startSection('htmlheader_title'); ?>
<?php echo e(trans('message.passwordreset')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <img style='width: 50%;' src="<?php echo e(asset ('../img/Sitwifi-natural.png')); ?>" >
        </div><!-- /.login-logo -->

        <?php if(session('status')): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong><?php echo e(trans('message.emotionOps')); ?> </strong> <?php echo e(trans('message.someproblems')); ?><br><br>
                <ul>
                    <?php foreach($errors->all() as $error): ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="login-box-body">
            <p class="login-box-msg"><?php echo e(trans('message.passwordreset')); ?></p>
            <form action="<?php echo e(url('/password/email')); ?>" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="<?php echo e(trans('message.enteremail')); ?>" name="email" value="<?php echo e(old('email')); ?>"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-5">
                      <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(trans('message.sendpassword')); ?></button>
                    </div><!-- /.col -->
                    <div class="col-xs-2">
                    </div><!-- /.col -->
                    <div class="col-xs-5">
                      <a class="btn btn-danger btn-block btn-flat" href="<?php echo e(url('/login')); ?>"><?php echo e(trans('message.regresarLogin')); ?></a><br>
                    </div><!-- /.col -->
                </div>
            </form>


        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    <?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>