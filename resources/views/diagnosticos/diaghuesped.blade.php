@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('message.diaghuesp') }}
@endsection

@section('contentheader_title')
    {{ trans('message.diaghuesp') }}
@endsection

@push('scripts')
    <link href="/plugins/sweetalert-master/dist/sweetalert.css" rel="stylesheet" type="text/css" />
    <script src="/plugins/sweetalert-master/dist/sweetalert-dev.js"></script>
    <script src="/js/operacion/scripts/diagHuespedajax.js"></script>
@endpush

@section('main-content')
<section id='invoiceContep' name='invoiceContep' class="invoice">
  <div id="titulos" name="titulos" class="row">
      <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-desktop"></i> Diagnóstico para usuarios.
            <small class="pull-right"><?php include '../public/FunctionPHP/datePHPcompac.php'; ?></small>
          </h2>
      </div>
  </div>

  <div class="row invoice-info">
      <div class="col-sm-2"></div>
      <div class="col-sm-8 invoice-col">

        <div class="form-group">
          <label>Seleccione el hotel para diagnosticar.</label>
          <select id="codigoHotel" name="clienteProyectos" class="form-control select2">
            <option value="" selected>-----------------</option>
          <option value="PL">Playacar Palace</option>
          <option value="ZCJG">Jamaica Palace</option>
          <option value="CZ">Cozumel Palace</option>
        </select>
      </div>

      <div class="form-group">
        <label>Número de Habitación.</label>
        <input id="numeroHab" type="number" class="form-control" style="text-align: center;">
      </div>

      <div class="form-group" align="center">
        <button id="btnDiag" type="button" style="width: 200px" class="btn btn-block btn-primary">Diagnosticar</button>
      </div>

      <div class="form-group" id="fila-p">
        <textarea id="results" style="height: 150px" class="form-control" readonly></textarea>
      </div>

      <div class="form-group" id="fila-p2">
        <textarea id="results2" style="height: 150px" class="form-control" readonly></textarea>
      </div>

      </div>


      <div class="col-sm-2"></div>

</div>
@endsection
