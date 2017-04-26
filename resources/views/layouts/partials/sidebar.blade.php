<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if(Auth::check())
            @if (! Auth::guest())
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="img/avatars/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->Nombre }} {{ Auth::user()->Apellido }}</p>
                        <!--Privilegio-->
                        <a href="javascript:void(0);"><i class="fa fa-key text-danger"></i> {{ Auth::user()->Privilegio }}</a>
                        <!-- Status -->
                        <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> {{ trans('message.online') }}</a>
                    </div>
                </div>


                @if (Auth::user()->Privilegio == 'Admin' || Auth::user()->Privilegio == 'Programador' || Auth::user()->Privilegio == 'Direccion' || Auth::user()->Privilegio == 'IT' || Auth::user()->Privilegio == 'ADMSUR' || Auth::user()->Privilegio == 'ADMCENTRO')
                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">{{ trans('message.navigation') }}</li>
                        <li><a href="{{ url('home') }}"><i class='fa fa-bookmark'></i> <span>{{ trans('message.home') }}</span></a></li>
                        <li class="treeview">
                            <a href="javascript:void(0);"><i class='fa fa-folder'></i> <span>{{ trans('message.reportes') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="{{ url('reporte_detallado') }}"><i class="fa fa-circle-o"></i>{{ trans('message.detHotel') }}</a></li>
                                @if (Auth::user()->Privilegio == 'Admin' || Auth::user()->Privilegio == 'Programador' || Auth::user()->Privilegio == 'Direccion')
                                <li><a href="{{ url('reporte_detalladop') }}"><i class="fa fa-circle-o"></i>{{ trans('message.detHotelP') }}</a></li>
                                @endif
                                <li><a href="{{ url('reporte_detalladopy') }}"><i class="fa fa-circle-o"></i>{{ trans('message.detProyec') }}</a></li>
                                <li><a href="{{ url('reporte_detalladoc') }}"><i class="fa fa-circle-o"></i>{{ trans('message.caratula') }}</a></li>
                                @if (Auth::user()->Privilegio == 'Admin' || Auth::user()->Privilegio == 'Programador' || Auth::user()->Privilegio == 'Direccion')
                                <li><a href="{{ url('reporte_distribucion') }}"><i class="fa fa-circle-o"></i>{{ trans('message.distribucion') }}</a></li>
                                @endif
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="javascript:void(0);"><i class='fa fa-folder'></i> <span>{{ trans('message.operacion') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="{{ url('inventario') }}"><i class='fa fa-circle-o'></i> {{ trans('message.inventario') }}</a></li>
                                <li><a href="{{ url('entrega') }}"><i class='fa fa-circle-o'></i> {{ trans('message.entserv') }}</a></li>
                                <li><a href="{{ url('search') }}"><i class='fa fa-circle-o'></i> {{ trans('message.buscador') }}</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="javascript:void(0);"><i class='fa fa-folder'></i> <span>{{ trans('message.dignostico') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="{{ url('DiagHuesped') }}"><i class='fa fa-circle-o'></i>{{ trans('message.revhusped') }}</a></li>
                                <li><a href="{{ url('DiagServer') }}"><i class='fa fa-circle-o'></i>{{ trans('message.revserver') }}</a></li>
                            </ul>
                        </li>


                        <li class="header">{{ trans('message.page') }}</li>

                        <li><a href="{{ url('profile') }}"><i class='fa fa-user'></i> <span>{{ trans('message.profile') }}</span></a></li>
                        @if (Auth::user()->Privilegio == 'Admin' || Auth::user()->Privilegio == 'Programador' || Auth::user()->Privilegio == 'Direccion')
                        <li><a href="{{ url('config_one') }}"><i class='fa fa-cog'></i> <span>{{ trans('message.settings') }}</span></a></li>
                        @endif
                    </ul>
                    <!-- /.sidebar-menu -->
                @endif

            @endif

        @else
            <ul class="sidebar-menu">
                <li class="header">{{ trans('message.header') }}</li>
                <li class='Active'><a href="{{ url('home') }}"><i class='fa fa-close'></i> <span>{{ trans('message.404error') }}</span></a></li>
            </ul>
        @endif
    </section>
    <!-- /.sidebar -->
</aside>
