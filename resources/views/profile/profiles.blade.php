@extends('layouts.app')

@section('htmlheader_title')
    {{ trans('message.profile') }}
@endsection

@section('contentheader_title')
    {{ trans('message.profile') }}
@endsection

@push('scripts')
    <link href="/bower_components/admin-lte/dist/css/invoicePage.css" rel="stylesheet" type="text/css" />
    <script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/js/profile/script_profile.js"></script>
@endpush

@section('main-content')
<section class="content">

      <div class="row">
        <div class="col-md-4">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="img/avatars/{{ Auth::user()->avatar }}" alt="User profile picture">
              <h3 class="profile-username text-center">@if(Auth::check()){{ Auth::user()->Nombre }} {{ Auth::user()->Apellido }}@endif</h3>
              <p class="text-muted text-center">@if(Auth::check()){{ Auth::user()->Area }}@endif</p>

              <form enctype="multipart/form-data" action="/profile" method="POST">
                  <div class="form-group">
                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <label>{{ trans('message.changeimage') }}</label>
                        <input type="file" name="avatar" onchange="control(this)">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </li>
                      <li class="list-group-item">
                        <input id="changeperfil" type="submit" class="btn btn-success btn-block" value="{{ trans('message.envio') }}">
                      </li>
                    </ul>
                  </div>
              </form>

            </div>
          </div>
          <!-- /.box -->
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ trans('message.aboutprofile') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> {{ trans('message.education') }}</strong>

              <p class="text-muted">
                @if(Auth::check()){{ Auth::user()->Carrera }}@endif
              </p>
              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> {{ trans('message.locationP') }}</strong>
              <p class="text-muted">{{ $LocationIP }} <label id="divcontexto"></label></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab">{{ trans('message.timeline')}}</a></li>
              <li><a href="#settings" data-toggle="tab">{{ trans('message.actinfo')}}</a></li>
              <li><a href="#change" data-toggle="tab">{{ trans('message.changePassword')}}</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red" id="fechaIngreso" name="fechaIngreso"></span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="glyphicon glyphicon-time bg-aqua" aria-hidden="true"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i></span>
                      <h3 class="timeline-header"><a href="javascript:void(0);">{{ trans('message.iniEmpresa') }}</a></h3>
                      <div class="timeline-body">
                        {{ trans('message.bienvenido') }} @if(Auth::check()){{ Auth::user()->Nombre }} {{ Auth::user()->Apellido }}@endif
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->

                  <!-- END timeline item -->
                  <!-- timeline item -->


                  <li>
                    <i class="fa fa-star bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i></span>
                      <h3 class="timeline-header"><a href="javascript:void(0);">{{ trans('message.privilegio') }}</a></h3>
                      <div class="timeline-body">
                        @if(Auth::check()){{ Auth::user()->Privilegio }}@endif
                      </div>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-user-secret bg-green"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i></span>
                      <h3 class="timeline-header"><a href="javascript:void(0);">{{ trans('message.jefeDir') }}</a></h3>
                      <div class="timeline-body">
                        <p id='jefediract'></p>
                      </div>
                    </div>
                  </li>

                  <li id="cumpleEmpleado">
                    <i class="fa fa-birthday-cake bg-red"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i></span>
                      <h3 class="timeline-header"><a href="javascript:void(0);">{{ trans('message.happy') }}</a></h3>
                      <div class="timeline-body">
                        <?php
                          include 'php/dateHappy.php';
                        ?>
                        <input type="hidden" id="diaAct" name="diaAct" value="<?php echo $diaAC; ?>">
                        <input type="hidden" id="mesAct" name="mesAct" value="<?php echo $mesAC; ?>">
                        <input type="hidden" id="diaCumpl" name="diaCumpl" value="">
                        <input type="hidden" id="mesCumpl" name="mesCumpl" value="">

                        {{ trans('message.textHappy') }}
                      </div>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="settings">
                {!! Form::open(['action' => 'profilesController@update', 'url' => '/updatedatas', 'method' => 'post', 'id' => 'formPerfil', 'class' => 'form-horizontal' ]) !!}
                <!--<form class="form-horizontal">-->
                  <div class="form-group">
                    <label for="inputNamefull" class="col-sm-4 control-label">{{ trans('message.nombre')}}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputNamefull" name="inputNamefull" placeholder="{{ trans('message.addname') }}. {{ trans('message.maxcardoce') }}" maxlength='12' value='@if(Auth::check()){{ Auth::user()->Nombre }}@endif'>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputapellido" class="col-sm-4 control-label">{{ trans('message.apellido')}}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputapellido" name="inputapellido" placeholder="{{ trans('message.apellido') }}. {{ trans('message.maxcardoce') }}" maxlength='12' value='@if(Auth::check()){{ Auth::user()->Apellido }}@endif'>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-4 control-label">{{ trans('message.emailaddress') }}</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="{{ trans('message.emailaddress') }}" maxlength="30" value='@if(Auth::check()){{ Auth::user()->email }}@endif' readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputdateing" class="col-sm-4 control-label">{{ trans('message.daIngreso') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputdateing" name="inputdateing" placeholder="{{ trans('message.daintIngreso') }}" value="@if(Auth::check()){{ Auth::user()->date_ingreso }}@endif" maxlength="10">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputdatenac" class="col-sm-4 control-label">{{ trans('message.daCumple') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputdatenac" name="inputdatenac" placeholder="{{ trans('message.daintCumple') }}" value="{{Auth::user()->yearing}}-{{Auth::user()->mes}}-{{Auth::user()->dia}}" maxlength="10">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputgradoest" class="col-sm-4 control-label">{{ trans('message.gradoest') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputgradoest" name="inputgradoest" placeholder="{{ trans('message.gradointest') }}. {{ trans('message.maxcarname') }}" maxlength="20" title="{{ trans('message.maxcarname') }}" value="@if(Auth::check()){{ Auth::user()->Carrera }}@endif">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button id="update_data" name="update_data" type="button" class="btn btn-warning"><span class="fa fa-pencil-square-o" style="margin-right: 4px;"></span>{{ trans('message.actualizar') }}</button>
                    </div>
                  </div>
                <!--</form>-->
                {!! Form::close() !!}

              </div>

              <!-- /.tab-pane -->
              
                <!-- /.tab-pane -->
                <div class="tab-pane" id="change">
                  {!! Form::open(['action' => 'profilesController@updatetwo', 'url' => '/upd_password', 'method' => 'post', 'id' => 'formPerfilpass', 'class' => 'form-horizontal' ]) !!}
                    <div class="form-group" style="display:none;">
                      <label for="inputEmailcorreo" class="col-sm-4 control-label">{{ trans('message.emailaddress') }}</label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control" id="inputEmailcorreo" name="inputEmailcorreo" placeholder="{{ trans('message.emailaddress') }}" maxlength="30" value='@if(Auth::check()){{ Auth::user()->email }}@endif' readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputnpass" class="col-sm-4 control-label">{{ trans('message.newPassword')}}<span style="color: red;">*</span></label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputnpass" name="inputnpass" placeholder="{{ trans('message.newPassword') }}." maxlength='6' minlength='5'>
                        <div class="checkbox">
                          <label><input type="checkbox" name="show" id="show"> {{ trans('message.showpass') }}</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button id="update_pass" name="update_pass" type="button" class="btn btn-warning"><span class="fa fa-pencil-square-o" style="margin-right: 4px;"></span>{{ trans('message.actualizar') }}</button>
                      </div>
                    </div>
                  {!! Form::close() !!}
                </div>
                <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection
