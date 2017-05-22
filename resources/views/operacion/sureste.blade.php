@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('message.reportDeHot') }}
@endsection

@section('contentheader_title')
    {{ trans('message.reportDeHot') }}
@endsection

@push('scripts')
    <link href="/bower_components/admin-lte/dist/css/invoicePage.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.0/Chart.js"></script>
    <script src="/js/operacion/scripts/datatableajax.js"></script>
    <script type="text/javascript">
      //$('#fila-p').hide();
      //$('#fila-np').show();
      $('#imgHotel').show();
      $(".select2").select2();
    </script>
@endpush

@section('main-content')
  <div class="box no-print">
    <div class="box-header">
      <h3 class="box-title">Selecciona un hotel</h3>

      <div class="box-body">
        <!--<form method="POST "action="/ajax-hotel">-->
        <div class="form-group">
          <select class="form-control select2" name="hoteles" id="hoteles" style="width: 100%;">
            <option value="" selected="selected">-----</option>
            @foreach ($hoteles as $hotel)
              <option value="{{ $hotel->Nombre_hotel }}">{{ $hotel->Nombre_hotel }}</option>
            @endforeach
          </select>
          <!--<button type="button" class="btn btn-block btn-default">Búsqueda</button>
        </form>-->
        </div>
      </div>
    </div>
  </div>

  <!-- Fila de datos.
  <img src="{{ asset ("/bower_components/admin-lte/dist/img/logo.png") }}">
  -->

  <div class="box">
    <div class="box-header">
      <div class="box-body">
        <div class="col-sm-2">
          <img class="pull-left" height="100%" width="100%" src="{{ asset ("/bower_components/admin-lte/dist/img/logo.png") }}">
        </div>
        <div class="col-sm-4" id="datosReporte">
          <p id="datosParrafo" class="pull-left"></p>

        </div>
        <div class="col-sm-4" id="datosReporte2">
          <p id="datosParrafo2" class="pull-left"></p>
        </div>
        <div class="col-sm-2" id="imgHotel">
          <input id="linkd" name="linkd" type="hidden" value="{{ asset ("") }}">
          <img class="pull-left" id="imgLink" style="" height="80%" width="80%" src="/img/Sin_imagen.png">
        </div>
      </div>
    </div>
  </div>

  <br><br>
  <div class="row" id="fila-np" style="">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header" style="text-align: center;">
        <h3 class="box-title">Número de Antenas: </h3>
          <div class="box-body">
            <div id="chart1-container">
              <canvas id="line-chart" style="height:300px"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="box">
        <div class="box-header" style="text-align: center;">
        <h3 class="box-title">Número de equipos:</h3>
          <div class="box-body">
            <div id="chart2-container">
              <canvas id="bar-chart" style="height:300px"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br><br>
    <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <table id="datosHotel" name="datosHotel" class="table table-bordered table-striped" style="font-size: 85%;">
              <thead>
                        <tr >
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

@endsection
