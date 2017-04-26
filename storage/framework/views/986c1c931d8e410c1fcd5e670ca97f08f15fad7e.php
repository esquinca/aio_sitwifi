<?php if(Auth::user()->Privilegio == 'Programador' || Auth::user()->Privilegio == 'Admin' || Auth::user()->Privilegio == 'Direccion'): ?>

<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e(trans('message.reportDeHotCosto')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo e(trans('message.reportDeHotCosto')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <link href="/bower_components/admin-lte/dist/css/invoicePage.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.0/Chart.js"></script>
    <script src="/js/reporte/detalladohotelcostos/hotelC.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main-content'); ?>
  <div id="opciones"  name="opciones" class="row">
  	<div class="col-md-12">
  		<div class="row">
  			<div class="col-md-8">
  				<form class="form-inline">
  					<div class="form-group">
                  <label for="selectregprecios" >Cliente</label>
                  	<div class="selectContainer">
  	                 	<select id="selectregprecios" name="selectregprecios"  class="form-control select2" style="width: 200px;" required>
  					            <option value="" selected>Seleccione una opción</option>
  				                <?php foreach($cargaone as $proyects): ?>
  									         <option value="<?php echo e($proyects->Nombre_hotel); ?>"> <?php echo e($proyects->Nombre_hotel); ?> </option>
  								        <?php endforeach; ?>
  				            </select>
  				         	<span class="help-block"></span>
  				        </div>
            </div>
  				  <button id="generarReg" name="generarReg" type="button" class="btn btn-primary" >Generar</button>
  				  <a id="generaPDF" name="generaPDF"  target="_blank" class="btn btn-success" style="display: none;"><i class="fa fa-print"></i> Imprimir</a>
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
              <i class="fa fa-desktop"></i> <?php echo e(trans('message.reportDeHotCosto')); ?>

              <small class="pull-right">
                <?php echo e(trans('message.fecha')); ?>: <?php $now = new \DateTime();
                echo $now->format('d-m-Y');?>
              </small>
            </h2>
          </div>
        </div>
      <!--End title row -->
      <!--Start info row -->
        <div class="row invoice-info" style="padding-top: 30px;">
          <div class="col-sm-2 col-xs-2 ">
            <img src="<?php echo e(asset ('/bower_components/admin-lte/dist/img/logo.png')); ?>"  class="img-responsive" width="150" height="150" alt="">
          </div>
          <!-- /.col -->
          <div class="col-sm-3 col-xs-4" >
          	<address class="aviso">
  	            <strong class="especial" style="color: #0F8787;"><?php echo e(trans('message.cliente')); ?>: </strong><label id='cliente01' name='cliente01' class="especial"></label><br>
  	            <strong><?php echo e(trans('message.address')); ?>: </strong><label id='cliente02' name='cliente02'></label><br>
  	            <strong><?php echo e(trans('message.pais')); ?> </strong><label id='cliente03' name='cliente03'></label><br>
  	            <strong><?php echo e(trans('message.estado')); ?> </strong><label id='cliente04' name='cliente04'></label><br>
  	            <strong><?php echo e(trans('message.expedrep')); ?> </strong> <label class="fontfecha"><?php include '../public/FunctionPHP/datePHP.php';?></label>
  	        </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-3 col-xs-4 " >
          	<address class='especial'>
        			<strong><?php echo e(trans('message.vertical')); ?>:</strong>  <label id='cliente05' name='cliente05'></label><br>
        			<strong><?php echo e(trans('message.itconc')); ?>:</strong>  <label id='cliente06' name='cliente06'></label><br>
        			<strong><?php echo e(trans('message.nameproye')); ?>:</strong>  <label id='cliente07' name='cliente07'></label><br>
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
        <div class="row"  style="padding-top: 20px;">
          <div class="col-xs-12">
            <h2 class="page-header">
              <?php echo e(trans('message.reportetitletwo')); ?>

            </h2>
          </div>
        </div>
      <!--End Title Quantity breakdown row -->
      <!--Start Content Quantity breakdown row -->
        <div class="row"  style="padding-top: 30px;">
          <!-- Start resume -->
  	        <div class="col-xs-9">
  	          	<p class="lead"><?php echo e(trans('message.resumen')); ?>:</p>
  		        <div class="table-responsive" style="padding-top: 7px;">
  		            <table class="table table-bordered">
  		            	<thead>
        						    <tr>
        						      <th class="bg-primary"><?php echo e(trans('message.namehotel')); ?></th>
        						      <th class="bg-primary"><?php echo e(trans('message.apstock')); ?></th>
        						      <th class="bg-primary"><?php echo e(trans('message.apprestamo')); ?></th>
        						      <th class="bg-primary"><?php echo e(trans('message.apventa')); ?></th>
        						      <th class="bg-primary"><?php echo e(trans('message.aprenta')); ?></th>
        						      <th class="bg-primary"><?php echo e(trans('message.apdemo')); ?></th>
        						      <th class="bg-primary"><?php echo e(trans('message.swstock')); ?></th>
        						      <th class="bg-primary"><?php echo e(trans('message.swprestamo')); ?></th>
        						    </tr>
        						</thead>
        						<tbody>
        							  <tr>
        						      <th scope="row"><p id="cliente11" name="cliente11"></p></th>
        						      <td><p id="cliente12" name="cliente12"></p></td>
        						      <td><p id="cliente13" name="cliente13"></p></td>
        						      <td><p id="cliente14" name="cliente14"></p></td>
        						      <td><p id="cliente15" name="cliente15"></p></td>
        						      <td><p id="cliente16" name="cliente16"></p></td>
        						      <td><p id="cliente17" name="cliente17"></p></td>
        						      <td><p id="cliente18" name="cliente18"></p></td>
        						    </tr>
  		              </tbody>
  		            </table>
  		        </div>

  		        <div class="table-responsive" style="padding-top: 30px;">
  		            <table class="table table-bordered">
  		            	<thead>
          						 <tr>
          						    <th class="bg-primary"><?php echo e(trans('message.namehotel')); ?></th>
          						    <th class="bg-primary"><?php echo e(trans('message.swdemo')); ?></th>
          						    <th class="bg-primary"><?php echo e(trans('message.swrenta')); ?></th>
          						    <th class="bg-primary"><?php echo e(trans('message.zdventa')); ?></th>
          						    <th class="bg-primary"><?php echo e(trans('message.zdrenta')); ?></th>
          						    <th class="bg-primary"><?php echo e(trans('message.zddemo')); ?></th>
          						    <th class="bg-primary"><?php echo e(trans('message.apcambio')); ?></th>
          						 </tr>
          					</thead>
          					<tbody>
          						 <tr>
          						    <th scope="row"><p id="cliente19" name="cliente19"></p></th>
          						    <td><p id="cliente20" name="cliente20"></p></td>
          						    <td><p id="cliente21" name="cliente21"></p></td>
          						    <td><p id="cliente22" name="cliente22"></p></td>
          						    <td><p id="cliente23" name="cliente23"></p></td>
          						    <td><p id="cliente24" name="cliente24"></p></td>
          						    <td><p id="cliente25" name="cliente25"></p></td>
          						 </tr>
  		              </tbody>
  		            </table>
  		        </div>
  	        </div>
          <!-- End resume-->
          <div class="col-xs-3">
            <p class="lead"><?php echo e(trans('message.graficapasteles')); ?>:</p>

  		<!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div id='canvas-char1' class="chart-responsive">
                      <canvas id="pieChart" height="150"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <ul class="chart-legend clearfix">
                      <li><i class="fa fa-circle-o text-red"></i> <small class="fontlegend"><?php echo e(trans('message.apstock')); ?>=<p id="apstock" name="apstock" class="elimSpacetwo"></p> </small> </li>
                      <li><i class="fa fa-circle-o text-green"></i><small class="fontlegend"><?php echo e(trans('message.aprenta')); ?>=<p id="aprenta" name="aprenta" class="elimSpacetwo"></p> </small> </li>
                      <li><i class="fa fa-circle-o text-yellow"></i><small class="fontlegend"><?php echo e(trans('message.apprestamo')); ?>=<p id="apprestamo" name="apprestamo" class="elimSpacetwo"></p> </small> </li>
                      <li><i class="fa fa-circle-o text-aqua"></i><small class="fontlegend"><?php echo e(trans('message.apventa')); ?>=<p id="apventa" name="apventa" class="elimSpacetwo"></p> </small> </li>
                      <li><i class="fa fa-circle-o text-light-blue"></i><small class="fontlegend"><?php echo e(trans('message.apdemo')); ?>=<p id="apdemo" name="apdemo" class="elimSpacetwo"></p> </small> </li>
                      <li><i class="fa fa-circle-o text-gray"></i><small class="fontlegend"><?php echo e(trans('message.swrenta')); ?>=<p id="swrentas" name="swrentas" class="elimSpacetwo"></p> </small> </li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.box-body -->

              <!-- /.footer -->
          </div>
          <!-- /.col -->
        </div>
      <!--End Content Quantity breakdown row -->
      <!--Start Title Graphs of numbers of equipment row -->
        <div class="row" style="padding-top: 100px;">
          <div class="col-xs-12"style="padding-top: 10px;">
            <h2 class="page-header">
              <?php echo e(trans('message.titlegraphicone')); ?>

            </h2>
          </div>
        </div>
      <!--End Title Graphs of numbers of equipment row -->

  	<!--Start Graphs by Office and model-->
  	    <div class="row">
  	        <div class="col-lg-6 col-md-6 col-sm-6">
  	      		<div id="canvas-holder" class="chart-responsive">
  	      			<h5><?php echo e(trans('message.distribucionequipos')); ?></h5>
  					    <canvas id="chart-area3" height="100"></canvas>
  				    </div>
  	        </div>
  	        <div class="col-lg-6 col-md-6 col-sm-6">
  	      		<div id="canvas-holder-lin" class="chart-responsive" >
  	      			<h5><?php echo e(trans('message.relacionmodelos')); ?></h5>
  					    <canvas id="chart-area-lin" height="100"></canvas>
  				    </div>
  	        </div>
  	    </div>
    	<!--End Graphs by Office and model-->
      <!--Start Title equipment costs row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <?php echo e(trans('message.costoeq')); ?>

            </h2>
          </div>
        </div>
      <!--End Title equipment costs row -->

  	<!--Start Table costs -->
  		<div class="row">
  	        <div class="col-xs-12 table-responsive">
  	          <table class="table table-striped table-bordered" id="contentTablePrice" name="contentTablePrice">
  	            <thead style="background-color: #B61311; color: white;">
  	            <tr>
  	              <th><?php echo e(trans('message.equipo')); ?></th>
  	              <th><?php echo e(trans('message.mac')); ?></th>
  	              <th><?php echo e(trans('message.serie')); ?></th>
  	              <th><?php echo e(trans('message.modelo')); ?></th>
  	              <th><?php echo e(trans('message.description')); ?></th>
  	              <th><?php echo e(trans('message.costo')); ?></th>
  	            </tr>
  	            </thead>
  	            <tfoot>
  		            <tr>
  		                <th colspan="5" style="text-align:right"><?php echo e(trans('message.total')); ?>:</th>
  		                <th></th>
  		            </tr>
  		        </tfoot>
  	            <tbody>

  	            </tbody>
  	          </table>
  	        </div>
  	    </div>
  	<!--End Table costs-->
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