<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <?php if(Auth::check()): ?>
            <?php if(! Auth::guest()): ?>
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="img/avatars/<?php echo e(Auth::user()->avatar); ?>" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p><?php echo e(Auth::user()->Nombre); ?> <?php echo e(Auth::user()->Apellido); ?></p>
                        <!--Privilegio-->
                        <a href="javascript:void(0);"><i class="fa fa-key text-danger"></i> <?php echo e(Auth::user()->Privilegio); ?></a>
                        <!-- Status -->
                        <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> <?php echo e(trans('message.online')); ?></a>
                    </div>
                </div>


                <?php if(Auth::user()->Privilegio == 'Admin' || Auth::user()->Privilegio == 'Programador' || Auth::user()->Privilegio == 'Direccion' || Auth::user()->Privilegio == 'IT' || Auth::user()->Privilegio == 'ADMSUR' || Auth::user()->Privilegio == 'ADMCENTRO'): ?>
                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header"><?php echo e(trans('message.navigation')); ?></li>
                        <li><a href="<?php echo e(url('home')); ?>"><i class='fa fa-bookmark'></i> <span><?php echo e(trans('message.home')); ?></span></a></li>
                        <li class="treeview">
                            <a href="javascript:void(0);"><i class='fa fa-folder'></i> <span><?php echo e(trans('message.reportes')); ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo e(url('reporte_detallado')); ?>"><i class="fa fa-circle-o"></i><?php echo e(trans('message.detHotel')); ?></a></li>
                                <?php if(Auth::user()->Privilegio == 'Admin' || Auth::user()->Privilegio == 'Programador' || Auth::user()->Privilegio == 'Direccion'): ?>
                                <li><a href="<?php echo e(url('reporte_detalladop')); ?>"><i class="fa fa-circle-o"></i><?php echo e(trans('message.detHotelP')); ?></a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo e(url('reporte_detalladopy')); ?>"><i class="fa fa-circle-o"></i><?php echo e(trans('message.detProyec')); ?></a></li>
                                <li><a href="<?php echo e(url('reporte_detalladoc')); ?>"><i class="fa fa-circle-o"></i><?php echo e(trans('message.caratula')); ?></a></li>
                                <?php if(Auth::user()->Privilegio == 'Admin' || Auth::user()->Privilegio == 'Programador' || Auth::user()->Privilegio == 'Direccion'): ?>
                                <li><a href="<?php echo e(url('reporte_distribucion')); ?>"><i class="fa fa-circle-o"></i><?php echo e(trans('message.distribucion')); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="javascript:void(0);"><i class='fa fa-folder'></i> <span><?php echo e(trans('message.operacion')); ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo e(url('inventario')); ?>"><i class='fa fa-circle-o'></i> <?php echo e(trans('message.inventario')); ?></a></li>
                                <li><a href="<?php echo e(url('entrega')); ?>"><i class='fa fa-circle-o'></i> <?php echo e(trans('message.entserv')); ?></a></li>
                                <li><a href="<?php echo e(url('search')); ?>"><i class='fa fa-circle-o'></i> <?php echo e(trans('message.buscador')); ?></a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="javascript:void(0);"><i class='fa fa-folder'></i> <span><?php echo e(trans('message.dignostico')); ?></span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo e(url('DiagHuesped')); ?>"><i class='fa fa-circle-o'></i><?php echo e(trans('message.revhusped')); ?></a></li>
                                <li><a href="<?php echo e(url('DiagServer')); ?>"><i class='fa fa-circle-o'></i><?php echo e(trans('message.revserver')); ?></a></li>
                            </ul>
                        </li>


                        <li class="header"><?php echo e(trans('message.page')); ?></li>

                        <li><a href="<?php echo e(url('profile')); ?>"><i class='fa fa-user'></i> <span><?php echo e(trans('message.profile')); ?></span></a></li>
                        <li><a href="<?php echo e(url('config_one')); ?>"><i class='fa fa-cog'></i> <span><?php echo e(trans('message.settings')); ?></span></a></li>
                    </ul>
                    <!-- /.sidebar-menu -->
                <?php endif; ?>

            <?php endif; ?>

        <?php else: ?>
            <ul class="sidebar-menu">
                <li class="header"><?php echo e(trans('message.header')); ?></li>
                <li class='Active'><a href="<?php echo e(url('home')); ?>"><i class='fa fa-close'></i> <span><?php echo e(trans('message.404error')); ?></span></a></li>
            </ul>
        <?php endif; ?>
    </section>
    <!-- /.sidebar -->
</aside>
