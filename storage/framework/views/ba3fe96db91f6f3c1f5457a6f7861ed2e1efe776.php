<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('message.buscador')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('message.buscador')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="/js/operacion/scripts/searchajax.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main-content'); ?>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Escribe la Serie o MAC del dispositivo:</h3>
      <div class="box-tools pull-right">
      </div>
    </div>

      <div class="box-body">
        <div class="form-group">
          <!-- search form (Optional) -->
          <div class="input-group">
            <input type="text" name="q" id="search-input-equipo" class="form-control" placeholder="Buscar equipo activo..."/>
            <span class="input-group-btn">
            <button type='submit' name='search' id='search-btn-equipo' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
          </div>
          <br>
          <div class="input-group">
            <input type="text" name="q" id="search-input-movimiento" class="form-control" placeholder="Buscar historial de equipo..."/>
            <span class="input-group-btn">
            <button type='submit' name='search' id='search-btn-movimiento' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
          </div>
          <!-- /.search form -->
        </div>
      </div>
  </div>

  <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Búsqueda:</h3>
        <div class="box-tools pull-right">
        </div>
      </div>

      <div class="box-body">
        <div id="divbusqueda1">
          <table id="datosBusqueda" name="datosBusqueda" class="table table-bordered table-striped" style="font-size: 85%;">
            <thead style="background-color: #F39C12; color: white;">
              <tr>

              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
        <div id="divbusqueda2" width="100%">
          <table id="datosBusqueda2" name="datosBusqueda" class="table table-bordered table-striped" style="font-size: 80%;" width="100%">
            <thead style="background-color: #F39C12; color: white;">
              <tr>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>