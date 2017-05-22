<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('message.addUser')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('message.addUser')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="/js/user/user.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main-content'); ?>

  <div class="modal modal-default fade" id="modal-delUser" data-backdrop="static">
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-bookmark" style="margin-right: 4px;"></i><?php echo e(trans('message.confirmacion')); ?></h4>
        </div>
        <div class="modal-body">
          <div class="box-body table-responsive">
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12">
                  <input id='recibidoconf' name='recibidoconf' type="hidden" class="form-control" placeholder="">
                  <input id='recibidoconfD' name='recibidoconfD' type="hidden" class="form-control" value="<?php echo e(Auth::user()->email); ?>">
                  <h4 style="font-weight: bold;"><?php echo e(trans('message.preguntaconf')); ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id='delete_user_data'><i class="fa fa-trash" style="margin-right: 4px;"></i><?php echo e(trans('message.eliminar')); ?></button>

          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" style="margin-right: 4px;"></i><?php echo e(trans('message.ccmodal')); ?></button>

        </div>
      </div>
    </div>
  </div>


  <div class="modal modal-default fade" id="modal-editUser" data-backdrop="static">
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-id-card-o" style="margin-right: 4px;"></i><?php echo e(trans('message.editusers')); ?></h4>
        </div>
        <div class="modal-body">
          <div class="box-body table-responsive">
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12">
                    <?php echo Form::open(['action' => 'UserController@update', 'url' => '/config_two_sobre', 'method' => 'post', 'id' => 'formrewrite', 'class' => 'form-horizontal' ]); ?>

                        <input id='id_recibido' name='id_recibido' type="hidden" class="form-control" placeholder="">
                        <div class="form-group">
                          <label for="inputEditName" class="col-sm-4 control-label"><?php echo e(trans('message.nombre')); ?><span style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEditName" name="inputEditName" placeholder="<?php echo e(trans('message.addfullnamet')); ?>" maxlength="12" title=""/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEditLastName" class="col-sm-4 control-label"><?php echo e(trans('message.apellido')); ?><span style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEditLastName" name="inputEditLastName" placeholder="<?php echo e(trans('message.addfullapellido')); ?>" maxlength="12" title=""/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEditEmail" class="col-sm-4 control-label"><?php echo e(trans('message.emailaddress')); ?><span style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <input type="email" class="form-control" id="inputEditEmail" name="inputEditEmail" placeholder="<?php echo e(trans('message.enteremail')); ?>" maxlength="60" title="<?php echo e(trans('message.maxcarname')); ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="selectEditPriv" class="col-sm-4 control-label"><?php echo e(trans('message.privilegio')); ?><span style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <select id="selectEditPriv" name="selectEditPriv"  class="form-control" required>
        				                <option value=""><?php echo e(trans('message.selectopt')); ?></option>
                                <option value="IT"><?php echo e(trans('message.privIT')); ?></option>
                                <option value="ADMSUR"><?php echo e(trans('message.admsur')); ?></option>
                                <option value="ADMCENTRO"><?php echo e(trans('message.admcentro')); ?></option>
                                <option value="Direccion"><?php echo e(trans('message.address')); ?></option>
        				                <option value="Admin"><?php echo e(trans('message.priv_one')); ?></option>
                                <option value="Programador"><?php echo e(trans('message.priv_two')); ?></option>
        				            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="selectEditjefedir" class="col-sm-4 control-label"><?php echo e(trans('message.jefeDir')); ?><span style="color: red;">*</span></label>
                          <div class="col-sm-8">
                            <select id="selectEditjefedir" name="selectEditjefedir"  class="form-control" required>
        				                <option value=""><?php echo e(trans('message.selectopt')); ?></option>
                                <?php foreach($privilegios as $priv): ?>
                                  <option value="<?php echo e($priv->id); ?>"><?php echo e($priv->Nombre); ?></option>
                                <?php endforeach; ?>
        				            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inpuEditArea" class="col-sm-4 control-label"><?php echo e(trans('message.area')); ?></label>
                          <div class="col-sm-8">
                            <input type="email" class="form-control" id="inpuEditArea" name="inpuEditArea" placeholder="<?php echo e(trans('message.addfolder')); ?>" maxlength="30" title="<?php echo e(trans('message.maxcarfolder')); ?>">
                          </div>
                        </div>
                    <?php echo Form::close(); ?>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-navy" id='update_user_data'><i class="fa fa-pencil-square-o" style="margin-right: 4px;"></i><?php echo e(trans('message.actualizar')); ?></button>

          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" style="margin-right: 4px;"></i><?php echo e(trans('message.ccmodal')); ?></button>

        </div>
      </div>
    </div>
  </div>

  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-user-circle-o"></i> <?php echo e(trans('message.registermember')); ?>

            <small class="pull-right"><?php echo e(trans('message.dateAct')); ?> <?php $now = new \DateTime();
            echo $now->format('d-m-Y');?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
          <!--<form class="form-horizontal" id='form_user'>-->
          <?php echo Form::open(['action' => 'UserController@create', 'url' => '/config_two_c', 'method' => 'post', 'id' => 'formadduser', 'class' => 'form-horizontal' ]); ?>


                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"><?php echo e(trans('message.nombre')); ?><span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="inputName" placeholder="<?php echo e(trans('message.addfullnamet')); ?>. <?php echo e(trans('message.maxcardoce')); ?>." maxlength="12" title="<?php echo e(trans('message.maxcardoce')); ?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputApellido" class="col-sm-2 control-label"><?php echo e(trans('message.apellido')); ?><span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputApellido" name="inputApellido" placeholder="<?php echo e(trans('message.addfullapellido')); ?>. <?php echo e(trans('message.maxcardoce')); ?>." maxlength="12" title="<?php echo e(trans('message.maxcardoce')); ?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label"><?php echo e(trans('message.emailaddress')); ?><span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="<?php echo e(trans('message.enteremail')); ?>" maxlength="60" title="<?php echo e(trans('message.maxcarname')); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="selectpriv" class="col-sm-2 control-label"><?php echo e(trans('message.privilegio')); ?><span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                      <select id="selectpriv" name="selectpriv"  class="form-control" required>
  				                <option value="" selected><?php echo e(trans('message.selectopt')); ?></option>
                          <option value="IT"><?php echo e(trans('message.privIT')); ?></option>
                          <option value="ADMSUR"><?php echo e(trans('message.admsur')); ?></option>
                          <option value="ADMCENTRO"><?php echo e(trans('message.admcentro')); ?></option>
                          <option value="Direccion"><?php echo e(trans('message.address')); ?></option>
  				                <option value="Admin"><?php echo e(trans('message.priv_one')); ?></option>
                          <option value="Programador"><?php echo e(trans('message.priv_two')); ?></option>
  				            </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="selectjefedir" class="col-sm-2 control-label"><?php echo e(trans('message.jefeDir')); ?><span style="color: red;">*</span></label>
                    <div class="col-sm-10">
                      <select id="selectjefedir" name="selectjefedir"  class="form-control" required>
  				                <option value="" selected><?php echo e(trans('message.selectopt')); ?></option>
                          <?php foreach($privilegios as $priv): ?>
                						<option value="<?php echo e($priv->id); ?>"><?php echo e($priv->Nombre); ?></option>
                					<?php endforeach; ?>
  				            </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputfolder" class="col-sm-2 control-label"><?php echo e(trans('message.area')); ?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputarea" name="inputarea" placeholder="<?php echo e(trans('message.addarea')); ?>" maxlength="30" title="<?php echo e(trans('message.maxcarfolder')); ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button id='btnregister' name='btnregister' type="button" class="btn btn-danger"><?php echo e(trans('message.registrar')); ?></button>
                    </div>
                  </div>
          <?php echo Form::close(); ?>

          <!--</form>-->
          <!--<a href="<?php echo e(url('/config_two', ['id' => 1 ] )); ?>" class="btn btn-primary">Editar</a>-->



        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-users"></i> <?php echo e(trans('message.viewuser')); ?>

          </h2>
        </div>
      </div>
      <!-- Table row -->
      <div class="row invoice-info">
        <div class="col-xs-12 table-responsive">
          <table id="tableUser" name='tableUser' class="display nowrap table table-bordered table-hover" cellspacing="0" width="95%">
            <input type='hidden' id='_tokenb' name='_tokenb' value='<?php echo csrf_token(); ?>'>
            <thead >
              <tr class="bg-primary" style="background: #001934;">
                <th><?php echo e(trans('message.idnum')); ?></th>
                <th><?php echo e(trans('message.nombre')); ?></th>
                <th><?php echo e(trans('message.apellido')); ?></th>
                <th><?php echo e(trans('message.email')); ?></th>
                <th><?php echo e(trans('message.privilegio')); ?></th>
                <th><?php echo e(trans('message.jefeDir')); ?></th>
                <th><?php echo e(trans('message.operation')); ?></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>


        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
      <!-- this row will not appear when printing -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>