

<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('message.entserv')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('message.entserv')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <link href="/bower_components/admin-lte/dist/css/invoicePage.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.0/Chart.js"></script>
    <script src="/js/operacion/scripts/entrega_ajax.js"></script>
    <script type="text/javascript">
      $(".select2").select2();
    </script>
    <style>
  		p {
  		    font-size: 11px;
  		    padding-left: 8px;
  		}
  		b {
  			font-size: 11px;
  		}
  		h3 {
  			font-size: 13px;
  		}
  		h4 {
  			font-size: 14px;
  		}
  		.verticalLine {
      		border-left: thick solid #ff0000;
  		}
	</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main-content'); ?>
  <div class="box no-print">
		<div class="box-header">
			<h3 class="box-title">Selecciona un hotel</h3>
		</div>
		<div class="box-body">
			<!--<form method="POST "action="/ajax-hotel">-->
			<div class="form-group">
				<select class="form-control select2" name="hoteles" id="hoteles" style="width: 100%;">
					<option value="" selected="selected">-----</option>
					<?php foreach($hoteles as $hotel): ?>
						<option value="<?php echo e($hotel->Nombre_hotel); ?>"><?php echo e($hotel->Nombre_hotel); ?></option>
					<?php endforeach; ?>
				</select>
				<!--<button type="button" class="btn btn-block btn-default">Búsqueda</button>
			</form>-->
			</div>
		</div>
	</div>

	<div class="box">
		<div class="box-body">
			<div class="col-sm-2">
				<img class="pull-left" height="70" width="100" src="<?php echo e(asset ("/bower_components/admin-lte/dist/img/logo.png")); ?>">
			</div>
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
			</div>
			<div class="col-sm-2">
			</div>
		</div>
	</div>

	<div class="box">
		<div class="box-header">
		</div>
		<div class="box-body">
			<div class="col-sm-4" id="datosReporte">
				<p id="datosParrafo" class="pull-left"></p>
			</div>
			<div class="col-sm-2">

			</div>
			<div class="col-sm-4" id="datosReporte2">
				<p id="datosParrafo2" class="pull-left"></p>
			</div>
			<div class="col-sm-2" id="imgHotel">
				<img class="pull-left" id="imgLink" style="" height="80%" width="80%" src="/img/Sin_imagen.png">
			</div>
		</div>
	</div>

	<div class="box">
		<div class="box-body">
			<div id="datosContainer">
				<div id="datosFechaI">
					<p id="datosFecha"></p>
				</div>
				<div id="datosFechaE">
					<p id="datosFecha2"></p>
				</div>

			</div>
			<div id="datosEstaticos">
					<p id="datosEstac"><h4>Las intalaciones de los equipos se realizaron acorde a cada uno de los términos y condiciones, respetando así el tiempo estipulado para las instalaciones.</h4></p>
			</div>
		</div>
	</div>

  <div class="row" id="fila-p">
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Número de Antenas:</h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8">
              <div id="chart1-containerP" align="center" class="chart-responsive" style="text-align: center;">
                <canvas id="line-chartP" height="150"></canvas>
              </div>
            </div>

            <div class="col-md-2"></div>
          </div>
        </div>
        <div class="box-footer no-padding">
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Número de equipos:</h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div id="chart2-containerP" align="center" class="chart-responsive" style="text-align: center;">
                <canvas id="bar-chartP" height="150"></canvas>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
        <div class="box-footer no-padding">
        </div>
      </div>
    </div>
  </div>



	<div class="row" id="" style="">
		<div class="col-md-6 pull-left" style="width: 50%;">
			<div class="box">
				<div class="box-header">
				</div>
				<div class="box-body">
					<hr style="width: 100%; height: 3px; background: #F87431;">
					<h3 align="center">Nombre y firma del responsable del proyecto</h3>
				</div>
			</div>
		</div>

		<div class="col-md-6 pull-right" style="width: 50%;">
			<div class="box">
				<div class="box-header">
				</div>
				<div class="box-body">
					<hr style="width: 100%; height: 3px; background: #F87431;">
					<h3 align="center">Nombre y firma del cliente</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="box">
	    <div class="box-body">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
      			<table id="datosHotel" name="datosHotel" class="table table-bordered table-striped" style="font-size: 85%;">
      				<thead>
      	                <tr>
      	                  <th class="bg-primary">Equipo</th>
      	                  <th class="bg-primary">MAC</th>
      	                  <th class="bg-primary">Serie</th>
      	                  <th class="bg-primary">Modelo</th>
      	                  <th class="bg-primary">Descripción</th>
      	                  <th class="bg-primary">Estado</th>
      	                  <th class="bg-primary">Servicio</th>
      	                </tr>
      				</thead>
      			</table>
        </div>
      </div>
		</div>
	</div>

	<div class="row no-print">
		<div class="col-md-2">
		</div>
		<div class="col-md-2">
		</div>
		<div class="col-md-2">
		</div>
		<div class="col-md-2">
		</div>
		<div class="col-md-2">
			<button id="btn-pdf" type="button" class="fa fa-file-pdf-o fa-lg btn btn-block btn-danger"> Export PDF</button>
		</div>
		<div class="col-md-2">
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>