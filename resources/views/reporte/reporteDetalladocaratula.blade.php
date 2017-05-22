@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('message.cartaentrega') }}
@endsection

@section('contentheader_title')
    {{ trans('message.cartaentrega') }}
@endsection

@push('scripts')
    <link href="/bower_components/admin-lte/dist/css/invoicePage.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.0/Chart.js"></script>
    <script src="/js/reporte/detalladocaratula/carhotel.js"></script>
@endpush

@section('main-content')
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
								      @foreach ($cargaCarta as $proyects)
									    <option value="{{ $proyects->Nombre_hotel }}"> {{ $proyects->Nombre_hotel }} </option>
								      @endforeach
				           </select>
				         	 <span class="help-block"></span>
				        </div>
          </div>
				  <button id="generarReg" name="generarReg" type="button" class="btn btn-primary" >{{ trans('message.generar') }}</button>
				  <a id="generaPDF" name="generaPDF"  target="_blank" class="btn btn-success" style="display: none;"><i class="fa fa-print"></i> {{ trans('message.imprimir') }}</a>
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
            <i class="fa fa-desktop"></i> {{trans('message.reportecart')}}.
            <small class="pull-right">
              {{ trans('message.fecha') }}: <?php $now = new \DateTime();
              echo $now->format('d-m-Y');?>
            </small>
          </h2>
        </div>
      </div>
    <!--End title row -->
	<!--Start info row -->
	    <div class="row invoice-info">
	        <div class="col-sm-2 col-xs-2 ">
	          <img src="{{ asset ('/bower_components/admin-lte/dist/img/logo.png') }}"  class="img-responsive" width="150" height="150" alt="">
	        </div>

	        <div class="col-sm-10 col-xs-10" >
    				<div class="row">
    					<div class="col-sm-8 col-xs-8">
    						<address class="aviso" style="font-size: 20px; text-align: center;">
    				          	<strong class="especial" style="color: #0F8787;">{{ trans('message.cartaentrega') }}</strong><br>
    				            <strong>{{ trans('message.equipoactserv') }}</strong><br>
    				        </address>
    					</div>
    					<div class="col-sm-4 col-xs-4" style="text-align: right; font-size: 12px;">
    						<strong >{{ trans('message.fecha') }}: </strong> <label class="fontfecha"><?php include '../public/FunctionPHP/datePHP.php';?></label>
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
				              	<th class="bg-gris">{{trans('message.datageneral')}}</th>
				            </tr>
			            </thead>
			            <tbody>
			            	<tr>
						     	     <th>{{trans('message.titucarat')}}: {{trans('message.razonempresasit')}}</th>
						        </tr>
    						    <tr>
    						     	<th>{{trans('message.responsable')}}: <p id="responsableEmpresa" name="responsableEmpresa" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						        <th>{{trans('message.areatrab')}}: <p id="areaEmpresa" name="areaEmpresa" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						        <th>{{trans('message.address')}}: {{trans('message.addressmexicosit')}}</th>
    						    </tr>
    						    <tr>
    						        <th>{{trans('message.telefono')}}: <p id="telefonoEmpresa" name="telefonoEmpresa" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
						            <th>{{trans('message.correo')}}: <p id="correoEmpresa" name="correoEmpresa" class="elimSpace"></p></th>
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
				              	<th class="bg-gris">{{trans('message.datageneralclient')}}</th>
				            </tr>
			            </thead>
			            <tbody>
			            	<tr>
    						     	<th>{{trans('message.titucarat')}}: <p id="nameEmpCliente" name="nameEmpCliente" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						     	<th>{{trans('message.responsable')}}: <p id="respEmpCliente" name="respEmpCliente" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						     	<th>{{trans('message.pais')}} <p id="paisEmpCliente" name="paisEmpCliente" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						        <th>{{trans('message.estado')}} <p id="estadoEmpCliente" name="estadoEmpCliente" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						        <th>{{trans('message.address')}}: <p id="dirEmpCliente" name="dirEmpCliente" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
    						        <th>{{trans('message.telefono')}}: <p id="telfEmpCliente" name="telfEmpCliente" class="elimSpace"></p></th>
    						    </tr>
    						    <tr>
						            <th>{{trans('message.correo')}}: <p id="correoEmpCliente" name="correoEmpCliente" class="elimSpace"></p></th>
				            </tr>
					    </tbody>
				    </table>
				</div>
			</div>

      <div class="col-xs-12">
        <b>{{trans('message.fechainiproycar')}}: </b><label id="fechaInicio" name="fechaInicio"></label><br>
        <b>{{trans('message.fechafinproycar')}}: </b><label id="fechaFin" name="fechaFin"></label>
        <p>{{trans('message.instparrafo')}}.</p>
      </div>

			<!--End Table data 2-->
		</div>
  	<!--End Content data-->
  	<!--Start Content of graphs-->
		<div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6">
	      <div id="canvas-holder-br1" class="chart-responsive">
      		<p class="lead">{{trans('message.resmeqinst')}}</p>
					<canvas id="chart-areabr1" height="100"></canvas>
				</div>
	     </div>
       <div class="col-lg-6 col-md-6 col-sm-6">
	      <div id="canvas-holder-br2" class="chart-responsive">
	        <p class="lead">{{trans('message.resmmodelo')}}</p>
					<canvas id="chart-areabr2" height="100"></canvas>
				</div>
	    </div>
	  </div>
    <!--End Content of graphs-->
	<!--Start Content of firm-->
	<div class="row" style="padding-top: 60px;">
		<div class="col-xs-6" style="text-align: center;"><hr class="line1">{{trans('message.nameandfirmresp')}}</div>
		<div class="col-xs-6" style="text-align: center;"><hr class="line1">{{trans('message.nameandfirmclie')}}</div>
	</div>
	<!--End Content of firm-->


	</div>
	<!--End Content data-->

</section>
@endsection
