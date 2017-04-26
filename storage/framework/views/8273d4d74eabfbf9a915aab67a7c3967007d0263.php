<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('message.reportDeHotProy')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('message.reportDeHotProy')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <link href="/bower_components/admin-lte/dist/css/invoicePage.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.0/Chart.js"></script>
    <script src="/js/reporte/detalladoproyecto/photel.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main-content'); ?>
<div id="opciones"  name="opciones" class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-8">
				<form class="form-inline">
					<div class="form-group">
            <label for="selectregproyect"><?php echo e(trans('message.nameproye')); ?></label>
             	<div class="selectContainer">
	             	<select id="selectregproyect" name="selectregproyect"  class="form-control select2" style="width: 200px;" required>
					        <option value="" selected>Seleccione una opción</option>
								  <?php foreach($cargat as $proyects): ?>
									<option value="<?php echo e($proyects->Nombre_proyecto); ?>"> <?php echo e($proyects->Nombre_proyecto); ?> </option>
								  <?php endforeach; ?>
				        </select>
				        <span class="help-block"></span>
				      </div>
          </div>
				  <button id="generarReg" name="generarReg" type="button" class="btn btn-primary" ><?php echo e(trans('message.generar')); ?></button>
				  <a id="generaPDF" name="generaPDF"  target="_blank" class="btn btn-success" style="display: none;"><i class="fa fa-print"></i><?php echo e(trans('message.imprimir')); ?></a>
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
            <i class="fa fa-desktop"></i><?php echo e(trans('message.reportDeHotProy')); ?>.
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
        <!-- /.col -->
        <div class="col-sm-3 col-xs-4" >
        	<address class="aviso">
	          <strong class="especial" style="color: #0F8787;"><?php echo e(trans('message.nameproye')); ?>:</strong><label id='cliente07' name='cliente07' class="especial"></label><br>
	          <strong><?php echo e(trans('message.pais')); ?> </strong><label id='cliente03' name='cliente03'></label><br>
	          <strong><?php echo e(trans('message.expedrep')); ?> </strong> <label class="fontfecha"><?php include '../public/FunctionPHP/datePHP.php';?></label>
	        </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3 col-xs-4 " >
        	<address class='especial'>
      			<strong><?php echo e(trans('message.vertical')); ?>:</strong>  <label id='cliente05' name='cliente05'></label><br>
      			<strong><?php echo e(trans('message.itconc')); ?>:</strong>  <label id='cliente06' name='cliente06'></label><br>
      			<strong><?php echo e(trans('message.operacion')); ?>:</strong>  <label id='cliente08' name='cliente08'></label><br>
      			<strong><?php echo e(trans('message.servicio')); ?>:</strong>  <label id='cliente09' name='cliente09'></label><br>
      		</address>
        </div>
        <div class="col-sm-2 col-xs-2" >
            <img id="imgH" name="imgH" src="" class="img-responsive"  width="100" height="100" >
        </div>
      </div>
    <!--End info row -->
    <!--Start Title Quantity breakdown row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <?php echo e(trans('message.reportetitletwo')); ?>

          </h2>
          <p class="lead"><?php echo e(trans('message.resumen')); ?>:</p>
        </div>
      </div>
    <!--End Title Quantity breakdown row -->
	<!--Start Content with the table AP-->
		<div class="row">
		    <div class="col-xs-12 table-responsive">
		        <table class="table table-striped table-bordered" id="tableAP" name="tableAP">
		            <thead>
			            <tr>
			              <th class="bg-primary"><?php echo e(trans('message.namehotel')); ?></th>
      							<th class="bg-primary"><?php echo e(trans('message.apstock')); ?></th>
      							<th class="bg-primary"><?php echo e(trans('message.apprestamo')); ?></th>
      							<th class="bg-primary"><?php echo e(trans('message.apventa')); ?></th>
      							<th class="bg-primary"><?php echo e(trans('message.aprenta')); ?></th>
      							<th class="bg-primary"><?php echo e(trans('message.apdemo')); ?></th>
      							<th class="bg-primary"><?php echo e(trans('message.apcambio')); ?></th>
      							<th class="bg-primary"><?php echo e(trans('message.swrenta')); ?></th>
			            </tr>
		            </thead>
		            <tfoot>
			            <tr>
			                <th><?php echo e(trans('message.total')); ?>:</th>
			                <th></th>
			                <th></th>
			                <th></th>
			                <th></th>
			                <th></th>
			                <th></th>
			                <th></th>
			            </tr>
		        	  </tfoot>
		            <tbody>
		            </tbody>
		        </table>
		   	</div>
		</div>
	<!--End Content with the table AP-->
	<!--Start Content with the table zd y sw-->
		<div class="row">
		    <div class="col-xs-12 table-responsive">
		        <table class="table table-striped table-bordered" id="tableSWZD" name="tableSWZD">
		            <thead>
			            <tr>
			              	<th class="bg-primary"><?php echo e(trans('message.namehotel')); ?></th>
        							<th class="bg-primary"><?php echo e(trans('message.zdventa')); ?></th>
        							<th class="bg-primary"><?php echo e(trans('message.zdrenta')); ?></th>
        							<th class="bg-primary"><?php echo e(trans('message.zddemo')); ?></th>
        							<th class="bg-primary"><?php echo e(trans('message.swstock')); ?></th>
					            <th class="bg-primary"><?php echo e(trans('message.swprestamo')); ?></th>
			  		          <th class="bg-primary"><?php echo e(trans('message.swdemo')); ?></th>
					            <th class="bg-primary"><?php echo e(trans('message.swventa')); ?></th>
			            </tr>
		            </thead>
					      <tfoot>
			            <tr>
			                <th><?php echo e(trans('message.total')); ?>:</th>
			                <th></th>
			                <th></th>
			                <th></th>
			                <th></th>
			                <th></th>
			                <th></th>
			                <th></th>
			            </tr>
		        	  </tfoot>
		            <tbody>
		            </tbody>
		        </table>
		   	</div>
		</div>
	<!--Ent Content with the table zd y sw-->
    <!--Start Graphs row -->
      <div class="row">
        <!-- Start Graphs 1 -->
	        <div class="col-xs-6">
	          	<p class="lead"><?php echo e(trans('message.piepastelone')); ?>:</p>
				      <div class="box-body">
					        <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
		                  <div id='canvas-char1' class="chart-responsive">
		                    <canvas id="pieChart1" height="150" class='canvarresp'></canvas>
		                  </div>
		                </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
	                  		<ul class="chart-legend clearfix">
			                    <li><i class="fa fa-circle-o text-red"></i> <?php echo e(trans('message.swrenta')); ?>=<p id="swrenta" name="swrenta" class="elimSpace"></p></li>
			                    <li><i class="fa fa-circle-o text-green"></i> <?php echo e(trans('message.swprestamo')); ?>=<p id="swprest" name="swprest" class="elimSpace"></p></li>
			                    <li><i class="fa fa-circle-o text-yellow"></i> <?php echo e(trans('message.swdemo')); ?>=<p id="swdemo" name="swdemo" class="elimSpace"></p></li>
			                    <li><i class="fa fa-circle-o text-aqua"></i> <?php echo e(trans('message.swstock')); ?>=<p id="swstock" name="swstock" class="elimSpace"></p></li>
			                    <li><i class="fa fa-circle-o text-light-blue"></i> <?php echo e(trans('message.swventa')); ?>=<p id="swventa" name="swventa" class="elimSpace"></p></li>
	                  		</ul>
	                	</div>
	              	</div>
           		</div>
	        </div>
        <!-- End Graphs 1-->
        <!-- Start Graphs 2 -->
	      <div class="col-xs-6">
	         <p class="lead"><?php echo e(trans('message.piepasteltwo')); ?>:</p>
				   <div class="box-body">
				       <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
		                  <div id='canvas-char2' class="chart-responsive">
		                    <canvas id="pieChart2" height="150" class='canvarresp'></canvas>
		                  </div>
		                </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
	                  		<ul class="chart-legend clearfix">
			                    <li><i class="fa fa-circle-o text-red"></i> <?php echo e(trans('message.apstock')); ?>=<p id="apstock" name="apstock" class="elimSpace"></p></li>
			                    <li><i class="fa fa-circle-o text-green"></i> <?php echo e(trans('message.apventa')); ?>=<p id="apventa" name="apventa" class="elimSpace"></p></li>
			                    <li><i class="fa fa-circle-o text-yellow"></i> <?php echo e(trans('message.aprenta')); ?>=<p id="aprenta" name="aprenta" class="elimSpace"></p></li>
			                    <li><i class="fa fa-circle-o text-aqua"></i> <?php echo e(trans('message.apprestamo')); ?>=<p id="apprestamo" name="apprestamo" class="elimSpace"></p></li>
			                    <li><i class="fa fa-circle-o text-light-blue"></i> <?php echo e(trans('message.apdemo')); ?>=<p id="apdemo" name="apdemo" class="elimSpace"></p></li>
	                  		</ul>
	                	</div>
	             </div>
           </div>
	      </div>
        <!-- End Graphs 2-->
      </div>
    <!--End Graphs row -->
    <!--Start Graphs of numbers of equipment-->
   		<div class="row">
	        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class='row'>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="canvas-holder" class="chart-responsive">
                  <p class="lead"><?php echo e(trans('message.distribucionequiporesg')); ?>:</p>
 					        <canvas id="chart-area3" height="100"></canvas>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12">
    				        <table class="table table-striped table-bordered table-responsive" id="tablegraphs" name="tablegraphs">
    				            <thead>
    					            <tr>
    					              <th class="bg-success2"><small><?php echo e(trans('message.namehotel')); ?></small></th>
    									      <th class="bg-success2"><small><?php echo e(trans('message.antenaap')); ?></small></th>
    									      <th class="bg-success2"><small><?php echo e(trans('message.sw')); ?></small></th>
    									      <th class="bg-success2"><small><?php echo e(trans('message.sonda')); ?></small></th>
    									      <th class="bg-success2"><small><?php echo e(trans('message.cctv')); ?></small></th>
    									      <th class="bg-success2"><small><?php echo e(trans('message.sonicwall')); ?></small></th>
    					            </tr>
    				            </thead>
    				            <tfoot>
    					            <tr>
    					                <th><?php echo e(trans('message.total')); ?>:</th>
    					                <th></th>
    					                <th></th>
    					                <th></th>
    					                <th></th>
    					                <th></th>
    					            </tr>
    				        	  </tfoot>
    				            <tbody>
    				            </tbody>
    				        </table>
              </div>
            </div>

	        </div>
	        <div class="col-lg-6 col-md-6 col-sm-6">
	      		<div id="canvas-holder-lin" class="chart-responsive" >
	      		     <p class="lead"><?php echo e(trans('message.relacionmodelos')); ?>:</p>
  					     <canvas id="chart-area-lin" height="100"></canvas>
  				  </div>
	        </div>
	    </div>
    <!--End Graphs of numbers of equipment-->
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>