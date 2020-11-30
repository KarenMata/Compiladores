<?php

use App\Http\Controllers\RutasController;
use App\Models\CatalogoCC;
$colors = ['bg-primary','bg-success','bg-info','bg-warning','bg-danger'];
$catalogo_cc = CatalogoCC::all();
?>
<aside class="sidebar">
    <div class="scrollbar-inner">

        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="{{ asset((\Auth::User()->fotografia!=null) ? 'img/usuarios/'.\Auth::User()->fotografia : "img/usuarios/default.png") }}" alt="">
                <div>
                    <div class="user__name">{{ \Auth::User()->nombreCompleto() }}</div>
                    <div class="user__email">{{ \Auth::User()->correo }}</div>
                </div>
            </div>

            <div class="dropdown-menu">
                <!--<a class="dropdown-item" href="">View Profile</a>-->
                <!--<a class="dropdown-item" href="">Settings</a>-->
                <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </div>
        </div>
        <ul class="navigation">
            <li class="navigation__active "><a href="{{url('/admin')}}"><i class="zmdi zmdi-home"></i> Home</a></li>

            <li class="navigation__sub {{RutasController::parentRoute(['catalogo_cc','facturas_recibidas','facturasEmitidas','solicitudVG','depositos','compras','bancos','usuarios'],Request::path())}}">
                <a href=""><i class="zmdi zmdi-view-week"></i> Administración</a>

                <ul>
                    <li class="{{ (Request::is('catalogo_cc/*') ? 'navigation__active' : '') }}"><a href="{{url('/catalogo_cc/index')}}">Catálogo de Centro de Costos</a></li>
                    <li class="{{ (Request::is('facturas_recibidas/*') ? 'navigation__active' : '') }}"><a href="{{url('/facturas_recibidas/index')}}">Facturas Recibidas</a></li>
                    <li class="{{ (Request::is('facturasEmitidas/*') ? 'navigation__active' : '') }}"><a href="{{url('/facturasEmitidas/index')}}">Facturas Emitidas</a></li>
                    <li class="{{ (Request::is('solicitudVG/*') ? 'navigation__active' : '') }}"><a href="{{url('/solicitudVG/index')}}">Solicitud Viáticos/Gasolina</a></li>
                    <li class="{{ (Request::is('depositos/*') ? 'navigation__active' : '') }}"><a href="{{url('/depositos/index')}}">Depósitos</a></li>
                    <li class="{{ (Request::is('compras/*') ? 'navigation__active' : '') }}"><a href="{{url('/compras/compras')}}">Compras</a></li>
                    <li class="{{ (Request::is('bancos/*') ? 'navigation__active' : '') }}"><a href="{{url('/bancos/index')}}">Bancos</a></li>
                    <li class="{{ (Request::is('usuarios/*') ? 'navigation__active' : '') }}"><a href="{{url('/usuarios/index')}}">Usuarios</a></li>
                </ul>
            </li>
            <?php $c = 0; ?>
            @foreach($catalogo_cc as $cc)
            <div class="user" onclick="window.location='{{url("proyectos")}}';">
                <div class="user__info" style="padding-left: 0px;padding-right: 0px;padding-bottom: 5px;padding-top: 5px;">
                    <div class="col-md-10 col-lg-10">
                        <div class="user__name">Proyecto {{$cc->num}}</div>
                        <div class="user__email">
                            <small>Porcentaje de Avance: {{ number_format($cc->avance) }}%</small>
                            <div class="progress progress-mini">
                                <div style="width:{{ $cc->avance }}%;" class="progress-bar {{$colors[$c]}}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $c++; if($c>4) $c=0; ?>
            @endforeach
        </ul>
    </div>
</aside>