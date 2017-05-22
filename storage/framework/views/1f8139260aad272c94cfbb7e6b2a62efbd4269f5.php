<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('message.profile')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('message.profile')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <link href="/bower_components/admin-lte/dist/css/invoicePage.css" rel="stylesheet" type="text/css" />
    <script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/js/profile/script_profile.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main-content'); ?>
<section class="content">

      <div class="row">
        <div class="col-md-4">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="img/avatars/<?php echo e(Auth::user()->avatar); ?>" alt="User profile picture">
              <h3 class="profile-username text-center"><?php if(Auth::check()): ?><?php echo e(Auth::user()->Nombre); ?> <?php echo e(Auth::user()->Apellido); ?><?php endif; ?></h3>
              <p class="text-muted text-center"><?php if(Auth::check()): ?><?php echo e(Auth::user()->Area); ?><?php endif; ?></p>

              <form enctype="multipart/form-data" action="/profile" method="POST">
                  <div class="form-group">
                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <label><?php echo e(trans('message.changeimage')); ?></label>
                        <input type="file" name="avatar" onchange="control(this)">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                      </li>
                      <li class="list-group-item">
                        <input id="changeperfil" type="submit" class="btn btn-success btn-block" value="<?php echo e(trans('message.envio')); ?>">
                      </li>
                    </ul>
                  </div>
              </form>

            </div>
          </div>
          <!-- /.box -->
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo e(trans('message.aboutprofile')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> <?php echo e(trans('message.education')); ?></strong>

              <p class="text-muted">
                <?php if(Auth::check()): ?><?php echo e(Auth::user()->Carrera); ?><?php endif; ?>
              </p>
              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> <?php echo e(trans('message.locationP')); ?></strong>
              <p class="text-muted"><?php echo e($LocationIP); ?> <label id="divcontexto"></label></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab"><?php echo e(trans('message.timeline')); ?></a></li>
              <li><a href="#settings" data-toggle="tab"><?php echo e(trans('message.actinfo')); ?></a></li>

            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red" id="fechaIngreso" name="fechaIngreso"></span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="glyphicon glyphicon-time bg-aqua" aria-hidden="true"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i></span>
                      <h3 class="timeline-header"><a href="javascript:void(0);"><?php echo e(trans('message.iniEmpresa')); ?></a></h3>
                      <div class="timeline-body">
                        <?php echo e(trans('message.bienvenido')); ?> <?php if(Auth::check()): ?><?php echo e(Auth::user()->Nombre); ?> <?php echo e(Auth::user()->Apellido); ?><?php endif; ?>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->

                  <!-- END timeline item -->
                  <!-- timeline item -->


                  <li>
                    <i class="fa fa-star bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i></span>
                      <h3 class="timeline-header"><a href="javascript:void(0);"><?php echo e(trans('message.privilegio')); ?></a></h3>
                      <div class="timeline-body">
                        <?php if(Auth::check()): ?><?php echo e(Auth::user()->Privilegio); ?><?php endif; ?>
                      </div>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-user-secret bg-green"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i></span>
                      <h3 class="timeline-header"><a href="javascript:void(0);"><?php echo e(trans('message.jefeDir')); ?></a></h3>
                      <div class="timeline-body">
                        <p id='jefediract'></p>
                      </div>
                    </div>
                  </li>

                  <li id="cumpleEmpleado">
                    <i class="fa fa-birthday-cake bg-red"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i></span>
                      <h3 class="timeline-header"><a href="javascript:void(0);"><?php echo e(trans('message.happy')); ?></a></h3>
                      <div class="timeline-body">
                        <?php
                          include 'php/dateHappy.php';
                        ?>
                        <input type="hidden" id="diaAct" name="diaAct" value="<?php echo $diaAC; ?>">
                        <input type="hidden" id="mesAct" name="mesAct" value="<?php echo $mesAC; ?>">
                        <input type="hidden" id="diaCumpl" name="diaCumpl" value="">
                        <input type="hidden" id="mesCumpl" name="mesCumpl" value="">

                        <?php echo e(trans('message.textHappy')); ?>

                      </div>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="settings">
                <?php echo Form::open(['action' => 'profilesController@update', 'url' => '/updatedatas', 'method' => 'post', 'id' => 'formPerfil', 'class' => 'form-horizontal' ]); ?>

                <!--<form class="form-horizontal">-->
                  <div class="form-group">
                    <label for="inputNamefull" class="col-sm-4 control-label"><?php echo e(trans('message.nombre')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputNamefull" name="inputNamefull" placeholder="<?php echo e(trans('message.addname')); ?>. <?php echo e(trans('message.maxcardoce')); ?>" maxlength='12' value='<?php if(Auth::check()): ?><?php echo e(Auth::user()->Nombre); ?><?php endif; ?>'>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputapellido" class="col-sm-4 control-label"><?php echo e(trans('message.apellido')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputapellido" name="inputapellido" placeholder="<?php echo e(trans('message.apellido')); ?>. <?php echo e(trans('message.maxcardoce')); ?>" maxlength='12' value='<?php if(Auth::check()): ?><?php echo e(Auth::user()->Apellido); ?><?php endif; ?>'>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-4 control-label"><?php echo e(trans('message.emailaddress')); ?></label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="<?php echo e(trans('message.emailaddress')); ?>" maxlength="30" value='<?php if(Auth::check()): ?><?php echo e(Auth::user()->email); ?><?php endif; ?>' readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputdateing" class="col-sm-4 control-label"><?php echo e(trans('message.daIngreso')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputdateing" name="inputdateing" placeholder="<?php echo e(trans('message.daintIngreso')); ?>" value="<?php if(Auth::check()): ?><?php echo e(Auth::user()->date_ingreso); ?><?php endif; ?>" maxlength="10">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputdatenac" class="col-sm-4 control-label"><?php echo e(trans('message.daCumple')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputdatenac" name="inputdatenac" placeholder="<?php echo e(trans('message.daintCumple')); ?>" value="<?php echo e(Auth::user()->yearing); ?>-<?php echo e(Auth::user()->mes); ?>-<?php echo e(Auth::user()->dia); ?>" maxlength="10">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputgradoest" class="col-sm-4 control-label"><?php echo e(trans('message.gradoest')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputgradoest" name="inputgradoest" placeholder="<?php echo e(trans('message.gradointest')); ?>. <?php echo e(trans('message.maxcarname')); ?>" maxlength="20" title="<?php echo e(trans('message.maxcarname')); ?>" value="<?php if(Auth::check()): ?><?php echo e(Auth::user()->Carrera); ?><?php endif; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button id="update_data" name="update_data" type="button" class="btn btn-warning"><span class="fa fa-pencil-square-o" style="margin-right: 4px;"></span><?php echo e(trans('message.actualizar')); ?></button>
                    </div>
                  </div>
                <!--</form>-->
                <?php echo Form::close(); ?>


              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>