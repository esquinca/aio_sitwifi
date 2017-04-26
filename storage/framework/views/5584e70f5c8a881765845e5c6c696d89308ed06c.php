<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo e(url('/home')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini" style="font-size: 50%;"><?php echo e(trans('message.empresa')); ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?php echo e(trans('message.empresa')); ?></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"><?php echo e(trans('message.togglenav')); ?></span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(url('/login')); ?>"><?php echo e(trans('message.login')); ?></a></li>
                <?php endif; ?>
                <?php if(! Auth::guest()): ?>

                  <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" title="<?php echo e(trans('locale.lang')); ?>">
                        <i class="fa fa-globe"></i><span class="label label-warning"><?php echo e(trans('locale.numlang')); ?></span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" style="width: 10%">
                        <!--<li class="header"><?php echo e(trans('message.tabmessages')); ?></li>-->
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu" style="width: 100%">
                                <li><a href="<?php echo e(url('lang/en')); ?>"><div class="pull-left"><img src="/img/flags/en.png" class="img-circle" alt="User Image"></div><h4><?php echo e(trans('locale.en')); ?></h4> </a></li>
                                <li><a href="<?php echo e(url('lang/es')); ?>"><div class="pull-left"><img src="/img/flags/es.png" class="img-circle" alt="User Image"></div><h4><?php echo e(trans('locale.es')); ?></h4> </a></li>
                            </ul><!-- /.menu -->
                        </li>
                        <!--<li class="footer"><a href="javascript:void(0);"></a></li>-->
                    </ul>
                  </li><!-- /.messages-menu -->


                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="img/avatars/<?php echo e(Auth::user()->avatar); ?>" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo e(Auth::user()->Nombre); ?> <?php echo e(Auth::user()->Apellido); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="img/avatars/<?php echo e(Auth::user()->avatar); ?>" class="img-thumbnail" alt="User Image" />
                                <p>
                                    <?php echo e(Auth::user()->Nombre); ?> <?php echo e(Auth::user()->Apellido); ?>

                                    <small><?php echo e(trans('message.dateAct')); ?> <?php $now = new \DateTime();
                                    echo $now->format('d-m-Y');?></small>

                                    <small><?php echo e(Auth::user()->email); ?></small>
                                </p>
                            </li>

                            <li class="user-footer">
                                <?php if(Auth::user()->Privilegio == 'Admin' || Auth::user()->Privilegio == 'Programador' || Auth::user()->Privilegio == 'Direccion' || Auth::user()->Privilegio == 'IT' || Auth::user()->Privilegio == 'ADMSUR' || Auth::user()->Privilegio == 'ADMCENTRO'): ?>
                                <div class="pull-left">
                                    <a href="<?php echo e(url('/profile')); ?>" class="btn btn-default btn-flat"><span class="glyphicon glyphicon-user"></span> <?php echo e(trans('message.profile')); ?></a>
                                </div>
                                <?php endif; ?>
                                <div class="pull-right">
                                    <a href="<?php echo e(url('/logout')); ?>" class="btn btn-default btn-flat"><span class="fa fa-key"></span>  <?php echo e(trans('message.signout')); ?></a>
                                </div>
                            </li>

                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
