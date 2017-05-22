

<?php if(Auth::user()->Privilegio == 'Programador' || Auth::user()->Privilegio == 'Admin' || Auth::user()->Privilegio == 'Direccion'): ?>

<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('message.distribucion')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('message.distribucion')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <link href="/bower_components/admin-lte/dist/css/invoicePage.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.0/Chart.js"></script>
    <script src="/js/reporte/detalladodistribucion/dhotel.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main-content'); ?>
<div id="opciones"  name="opciones" class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-lg-2">
				<a id="generaPDF" name="generaPDF"  target="_blank" class="btn btn-success" style=""><i class="fa fa-print"></i> Imprimir</a>
			</div>
			<div class="col-xs-10 col-sm-10 col-lg-10">
				<div class="alert alert-info">
				    <strong>Información!</strong> Si su resolución es
				  	<li>Es igual a 1366 X 768 utilice el zoom a 100% para generar el archivo.</li>
				  	<li>Es igual a 1920 X 1080 utilice el zoom a 150% para generar el archivo.</li>
				  	<li>La resolución de la impresion depende del zoom del navegador.</li>
				  	<li>Saber la resolución de pantalla consulta aqui. http://www.cualesmiresolucion.com/ o Dar clic <a href="http://www.cualesmiresolucion.com/" target="_blank" >Aqui!!</a> </li>
            <br>Nota:</b> Comprimir el sidebar para mejor la resolución de la impresion.

				</div>
			</div>
		</div>
	</div>
</div>
<section id='invoiceContep' name='invoiceContep' class="invoice">
    <!--Start title row -->
      <div id="titulos" name="titulos" class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-desktop"></i> Informe de Distribución.
            <small class="pull-right">
              <?php echo e(trans('message.fecha')); ?>: <?php $now = new \DateTime();
              echo $now->format('d-m-Y');?>
            </small>
          </h2>
        </div>
      </div>
    <!--End title row -->
	<!--Start info row -->
	    <div class="row invoice-info">
	        <div class="col-xs-2 col-sm-2 col-lg-2">
	          <img src="<?php echo e(asset ('/bower_components/admin-lte/dist/img/logo.png')); ?>"  class="img-responsive" width="150" height="150" alt="">
	        </div>

	        <div class="col-xs-10 col-sm-10 col-lg-10" >
    				<div class="row">

              <div class="col-xs-4 col-sm-4 col-lg-4">
    						<address class="aviso" style="text-align: left;">
    				      <strong class="especial" style="color: #0F8787; font-size: 20px;">Contenido</strong><br>
    				      <strong style="font-size: 14px;">Distribución de AP por país</strong><br>
    				      <strong style="font-size: 14px;">Distribución de APs por país y vertical</strong><br>
    				      <strong style="font-size: 14px;">Distribución de AP por  país y estado</strong><br>
    				      <strong style="font-size: 14px;">Distribución de Sitios por país y estado</strong><br>
    				      <strong style="font-size: 14px;">Sitios Monitoreados por NOC</strong><br>
    				    </address>
    					</div>

              <div class="col-xs-8 col-sm-8 col-lg-8">
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-lg-6">
                    <div id="contenedor1Chart" class="chart-responsive">
                      <canvas id="pieChart" height="100"></canvas>
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-lg-6">
                    <div id="canvas-holder-br1" class="chart-responsive">
                      <canvas id="pieChart2" height="150"></canvas>
                    </div>
                  </div>
                </div>
			        </div>

				   </div>
	        </div>
	    </div>
	<!--End info row -->
	<div class="row invoice-info" style="padding-top: 40px;">
      <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
        <div id="canvas-holder-br2" class="chart-responsive">
          <canvas id="pieChart3" height="150"></canvas>
        </div>
      </div>

      <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
        <div id="canvas-holder-br3" class="chart-responsive">
          <canvas id="pieChart4" height="150"></canvas>
        </div>
      </div>

      <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12" style="padding-top: 40px;">
        <div id="canvas-holder-br4" class="chart-responsive">
          <canvas id="pieChart5" height="150"></canvas>
        </div>
      </div>
	</div>
  	<!--Start Dates of project -->
	<!--End Dates of project  -->
	<!--End Content of firm-->
	</div>
	<!--End Content data-->
</section>
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php if(Auth::user()->Privilegio != 'Programador' || Auth::user()->Privilegio != 'Admin' || Auth::user()->Privilegio != 'Direccion'): ?>
  <?php $__env->startSection('htmlheader_title'); ?>
      <?php echo e(trans('message.pagenotfound')); ?>

  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('contentheader_title'); ?>
      <?php echo e(trans('message.error')); ?>

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
          </div>
      </div>
  <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>