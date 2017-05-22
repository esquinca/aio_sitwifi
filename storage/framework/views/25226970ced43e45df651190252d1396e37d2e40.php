

<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('message.diagserve')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('message.diagserve')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <link href="/plugins/sweetalert-master/dist/sweetalert.css" rel="stylesheet" type="text/css" />
  <script src="/plugins/sweetalert-master/dist/sweetalert-dev.js"></script>
  <script src="/js/operacion/scripts/diagServidorajax.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main-content'); ?>
<section id='invoiceContep' name='invoiceContep' class="invoice">
    <div id="titulos" name="titulos" class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-desktop"></i> Diagnóstico para servidores.
                <small class="pull-right"><?php include '../public/FunctionPHP/datePHPcompac.php'; ?></small>
            </h2>
        </div>
    </div>

    <div class="row invoice-info">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 invoice-col">

                <div class="form-group" align="center">
                    <label>Seleccione el hotel para diagnosticar.</label>
                    <select id="codigoHotel" name="clienteProyectos" class="form-control select2">
                        <option value="" selected>-----------------</option>
                        <option value="PL">Playacar Palace</option>
                        <option value="ZCJG">Jamaica Palace</option>
                        <option value="CZ">Cozumel Palace</option>
                    </select>
                    <hr>
                    <label>Presione para verificar la disponibilidad del servidor RADIUS elegido.</label>
                    <button id="btnDiagRAD" type="button" style="width: 200px" class="btn btn-block btn-primary">Diagnosticar</button>
                </div>

                <hr>

                <div class="form-group" align="center">
                    <label>Presione para verificar la disponibilidad del WebService elegido.</label>
                    <button id="btnDiagWB" type="button" style="width: 200px" class="btn btn-block btn-primary">Diagnosticar</button>
                </div>



            </div>


            <div class="col-sm-2"></div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>