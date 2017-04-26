

<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('message.cartaentrega')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('message.cartaentrega')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <link href="/bower_components/admin-lte/dist/css/invoicePage.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.0/Chart.js"></script>
    <script src="/js/reporte/detalladocaratula/carhotel.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main-content'); ?>
<div id="opciones"  name="opciones" class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-8">
				<form class="form-inline">
					<div class="form-group">
             <label for="selectcarta" >Cliente</label>
               <div class="selectContainer">
	                 <select id="selectcarta" name="selectcarta"  class="form-control select2" style="width: 200px;" required>
					            <option value="" selected>Seleccione una opción</option>
								      <?php foreach($cargaCarta as $proyects): ?>
									    <option value="<?php echo e($proyects->Nombre_hotel); ?>"> <?php echo e($proyects->Nombre_hotel); ?> </option>
								      <?php endforeach; ?>
				           </select>
				         	 <span class="help-block"></span>
				        </div>
          </div>
				  <button id="generarReg" name="generarReg" type="button" class="btn btn-primary" ><?php echo e(trans('message.generar')); ?></button>
				  <a id="generaPDF" name="generaPDF"  target="_blank" class="btn btn-success" style="display: none;"><i class="fa fa-print"></i> <?php echo e(trans('message.imprimir')); ?></a>
				</form>
			</div>
		</div>
	</div>
</div>
<section id='invoiceContep' name='invoiceContep' class="invoice ocultar">
    <!--Start title row -->
      <div id="titulos" name="titulos" class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-desktop"></i> <?php echo e(trans('message.reportecart')); ?>.
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
	        <div class="col-sm-2 col-xs-2 ">
	          <img src="<?php echo e(asset ('/bower_components/admin-lte/dist/img/logo.png')); ?>"  class="img-responsive" width="150" height="150" alt="">
	        </div>

	        <div class="col-sm-10 col-xs-10" >
    				<div class="row">
    					<div class="col-sm-8 col-xs-8">
    						<address class="aviso" style="font-size: 20px; text-align: center;">
    				          	<strong class="especial" style="color: #0F8787;"><?php echo e(trans('message.cartaentrega')); ?></strong><br>
    				            <strong><?php echo e(trans('message.equipoactserv')); ?></strong><br>
    				        </address>
    					</div>
    					<div class="col-sm-4 col-xs-4" style="text-align: right; font-size: 12px;">
    						<strong ><?php echo e(trans('message.fecha')); ?>: </strong> <label class="fontfecha"><?php include '../public/FunctionPHP/datePHP.php';?></label>
    					</div>
    				</div>
	      	</div>
	    </div>
	<!--End info row -->
    <!--Start Separador-->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header"></h2>
        </div>
      </div>
    <!--End Separador -->
    <!--Start Content data-->
    	<div class="row">
    		<!--Start Table data 1-->
			<div class="col-xs-6">
				<div class="col-xs-12 table-responsive">
				    <table class="table table-striped table-bordered" id="tablegraphs" name="tablegraphs">
			            <thead>
				            <tr >
				              	<th class="bg-gris"><?php echo e(trans('message.datageneral')); ?></th>
				            </tr>
			            </thead>
			            <tbody>
			            	<tr>
						     	     <th><?php echo e(trans('message.titucarat')); ?>: <?php echo e(trans('message.razonempresasit')); ?></th>
						        </tr>
    						    <tr>
    						     	<th><?php echo e(trans('message.responsable')); ?>: <p id="responsableEmpresa" name="responsableEmpresa" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						        <th><?php echo e(trans('message.areatrab')); ?>: <p id="areaEmpresa" name="areaEmpresa" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						        <th><?php echo e(trans('message.address')); ?>: <?php echo e(trans('message.addressmexicosit')); ?></th>
    						    </tr>
    						    <tr>
    						        <th><?php echo e(trans('message.telefono')); ?>: <p id="telefonoEmpresa" name="telefonoEmpresa" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
						            <th><?php echo e(trans('message.correo')); ?>: <p id="correoEmpresa" name="correoEmpresa" class="elimSpace"></p></th>
				            </tr>
					    </tbody>
				    </table>
				</div>
			</div>
			<!--End Table data 1-->
			<!--Start Table data 2-->
			<div class="col-xs-6">
				<div class="col-xs-12 table-responsive">
				    <table class="table table-striped table-bordered" id="tablegraphs2" name="tablegraphs2">
			            <thead>
				            <tr>
				              	<th class="bg-gris"><?php echo e(trans('message.datageneralclient')); ?></th>
				            </tr>
			            </thead>
			            <tbody>
			            	<tr>
    						     	<th><?php echo e(trans('message.titucarat')); ?>: <p id="nameEmpCliente" name="nameEmpCliente" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						     	<th><?php echo e(trans('message.responsable')); ?>: <p id="respEmpCliente" name="respEmpCliente" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						     	<th><?php echo e(trans('message.pais')); ?> <p id="paisEmpCliente" name="paisEmpCliente" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						        <th><?php echo e(trans('message.estado')); ?> <p id="estadoEmpCliente" name="estadoEmpCliente" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						        <th><?php echo e(trans('message.address')); ?>: <p id="dirEmpCliente" name="dirEmpCliente" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						        <th><?php echo e(trans('message.telefono')); ?>: <p id="telfEmpCliente" name="telfEmpCliente" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
						            <th><?php echo e(trans('message.correo')); ?>: <p id="correoEmpCliente" name="correoEmpCliente" class="elimSpace"></p></th>
				            </tr>
					    </tbody>
				    </table>
				</div>
			</div>

      <div class="col-xs-12">
        <b><?php echo e(trans('message.fechainiproycar')); ?>: </b><label id="fechaInicio" name="fechaInicio"></label><br>
        <b><?php echo e(trans('message.fechafinproycar')); ?>: </b><label id="fechaFin" name="fechaFin"></label>
        <p><?php echo e(trans('message.instparrafo')); ?>.</p>
      </div>

			<!--End Table data 2-->
		</div>
  	<!--End Content data-->
  	<!--Start Content of graphs-->
		<div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6">
	      <div id="canvas-holder-br1" class="chart-responsive">
      		<p class="lead"><?php echo e(trans('message.resmeqinst')); ?></p>
					<canvas id="chart-areabr1" height="100"></canvas>
				</div>
	     </div>
       <div class="col-lg-6 col-md-6 col-sm-6">
	      <div id="canvas-holder-br2" class="chart-responsive">
	        <p class="lead"><?php echo e(trans('message.resmmodelo')); ?></p>
					<canvas id="chart-areabr2" height="100"></canvas>
				</div>
	    </div>
	  </div>
    <!--End Content of graphs-->
	<!--Start Content of firm-->
	<div class="row" style="padding-top: 60px;">
		<div class="col-xs-6" style="text-align: center;"><hr class="line1"><?php echo e(trans('message.nameandfirmresp')); ?></div>
		<div class="col-xs-6" style="text-align: center;"><hr class="line1"><?php echo e(trans('message.nameandfirmclie')); ?></div>
	</div>
	<!--End Content of firm-->


	</div>
	<!--End Content data-->

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>