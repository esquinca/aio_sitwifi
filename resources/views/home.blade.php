@extends('layouts.app')

@section('htmlheader_title')
{{ trans('message.home') }}
@endsection

@section('contentheader_title')
			{{ trans('message.bienvenido') }} @if(Auth::check()){{ Auth::user()->Nombre }} {{ Auth::user()->Apellido }} @endif
@endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('message.information') }}</div>

					<div class="panel-body">
						<div class="login-logo">
		            <img style='width: 26%;' src="{{ asset ('../img/Sitwifi-natural.png') }}" >
		        </div>
						<h4><b>{{ trans('message.infositwifiq') }}</b></h4>
            <p style="text-align: justify;" >{{ trans('message.infositwifi') }}</p>
						<br>
						<b>{{ trans('message.logged') }}</b>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
