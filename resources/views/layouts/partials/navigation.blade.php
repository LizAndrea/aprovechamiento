@if(!Auth::guest())
<ul id="parametrosmobile" class="dropdown-content">
  <li><a href="{{url('red')}}">Red</a></li>
  <li><a href="{{url('tipoactividad')}}">Tipo Actividad</a></li>
  <li><a href="{{url('tipodocumento')}}">Tipo Documento</a><div class="divider"></div></li>
  <li><a href="{{url('tipoproducto')}}">Tipo Producto</a></li>
  <li><a href="{{url('unidadmedida')}}">Unidad Medida</a><div class="divider"></div></li>
  @if(Auth::user()->esRol->Usuarios)
  <li><a href="{{url('rol')}}">Roles</a></li>
  <li><a href="{{url('usuario')}}">Usuarios</a><div class="divider"></div></li>
  @endif
  @if(Auth::user()->esRol->Reportes)
  <li><a href="{{url('tiporeporte')}}">Tipo Reporte</a><div class="divider"></div></li>
  @endif
</ul>

<ul id="parametros" class="dropdown-content">
  <li><a href="{{url('red')}}">Red</a></li>
  <li><a href="{{url('tipoactividad')}}">Tipo Actividad</a></li>
  <li><a href="{{url('tipodocumento')}}">Tipo Documento</a><div class="divider"></div></li>
  <li><a href="{{url('tipoproducto')}}">Tipo Producto</a></li>
  <li><a href="{{url('unidadmedida')}}">Unidad Medida</a><div class="divider"></div></li>
  @if(Auth::user()->esRol->Usuarios)
  <li><a href="{{url('rol')}}">Roles</a></li>
  <li><a href="{{url('usuario')}}">Usuarios</a><div class="divider"></div></li>
  @endif
  @if(Auth::user()->esRol->Reportes)
  <li><a href="{{url('tiporeporte')}}">Tipo Reporte</a><div class="divider"></div></li>
  @endif
</ul>
<ul id="cuero" class="dropdown-content">
  <li><a href="{{url('informacionCuero')}}">Guias y Actas</a></li>
  <li><a href="{{url('cueroregional')}}">Reporte Regional</a></li>
  <li><a href="{{url('departamentalCuero')}}">Reporte Departamental</a></li>
  <li><a href="{{url('empresaCuero')}}">Reporte Empresa</a></li>
  <li><a href="{{url('nacionalCuero')}}">Informe Nacional</a></li>
</ul>

<ul id="cueromobile" class="dropdown-content">
  <li><a href="{{url('informacionCuero')}}">Guias y Actas</a></li>
  <li><a href="{{url('regionalCuero')}}">Reporte Regional</a></li>
  <li><a href="{{url('departamentalCuero')}}">Reporte Departamental</a></li>
  <li><a href="{{url('empresaCuero')}}">Reporte Empresa</a></li>
  <li><a href="{{url('nacionalCuero')}}">Informe Nacional</a></li>
</ul>

<ul id="usuario" class="dropdown-content">
  <li><a href="{{url('showProfile',Auth::user()->id)}}"><i class="material-icons">perm_identity</i>{{Auth::user()->Usuario}}</a></li>
  <li><a href="{{url('logout')}}"><i class="material-icons">exit_to_app</i>Salir</a></li>
</ul>

<ul id="usuariomobile" class="dropdown-content">
  <li><a href="{{url('showProfile',Auth::user()->id)}}"><i class="material-icons">perm_identity</i>{{Auth::user()->Usuario}}</a></li>
  <li><a href="{{url('logout')}}"><i class="material-icons">exit_to_app</i>Salir</a></li>
</ul>

<ul id="empresa" class="dropdown-content">
  <li><a href="{{url('empresa')}}">Empresas</a></li>
  <li><a href="{{url('usuario')}}">Usuarios</a></li>
</ul>

<ul id="empresamobile" class="dropdown-content">
  <li><a href="{{url('empresa')}}">Empresas</a></li>
  <li><a href="{{url('usuario')}}">Usuarios</a></li>
</ul>

<ul id="reporte" class="dropdown-content">
  <li><a href="{{url('reportes')}}">Reportes</a></li>
</ul>

<ul id="reportemobile" class="dropdown-content">
  <li><a href="{{url('reportes')}}">Reportes</a></li>
</ul>

<ul id="formulario" class="dropdown-content">
  <li><a href="{{url('formulario')}}">Formularios</a></li>
</ul>

<ul id="formulariomobile" class="dropdown-content">
  <li><a href="{{url('formulario')}}">Formularios</a></li>
</ul>

<div class="navbar-fixed">
<nav>
  <div class="nav-wrapper green darken-1">
    <a href="{{url('/')}}" class="brand-logo pull-m6">{!! HTML::image(asset('images/principal.png'),'Welcome',['class'=>'squart responsive-img','width' => 230 , 'height' => 200]) !!}
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    
    <ul class="right hide-on-med-and-down">
      
      @if(Auth::user()->esRol->Empresas)
        <li><a href="#" class="dropdown-button" data-activates="cuero"><i class="material-icons right">arrow_drop_down</i>CUERO</a></li>
      @endif
      @if(Auth::user()->esRol->Reportes)
      <li><a href="#" class="dropdown-button" data-activates="reporte"><i class="material-icons right">arrow_drop_down</i>Reportes</a></li>
      @endif
      <li><a href="#" class="dropdown-button" data-activates="formulario"><i class="material-icons right">arrow_drop_down</i>Formularios</a></li>
      @if(Auth::user()->esRol->Empresas)
        <li><a href="#" class="dropdown-button" data-activates="empresa"><i class="material-icons right">arrow_drop_down</i>Empresas</a></li>
      @endif
      @if(Auth::user()->esRol->Parametros)
      <li><a href="#" class="dropdown-button" data-activates="parametros"><i class="material-icons right">arrow_drop_down</i>Parámetros</a></li>
      @endif
      <li><a href="#" class="dropdown-button" data-activates="usuario"><i class="material-icons right">arrow_drop_down</i>Mi Perfil</a></li>
    </ul>

    <ul class="side-nav green darken-1" id="mobile-demo">
      @if(Auth::user()->esRol->Empresas)
        <li><a href="#" class="dropdown-button" data-activates="cueromobile"><i class="material-icons right">arrow_drop_down</i>CUERO</a></li>
      @endif
      @if(Auth::user()->esRol->Reportes)
      <li><a href="#" class="dropdown-button" data-activates="reportemobile"><i class="material-icons right">arrow_drop_down</i>Reportes
      @endif
      <li><a href="#" class="dropdown-button" data-activates="formulariomobile"><i class="material-icons right">arrow_drop_down</i>Formularios</a></li>
      @if(Auth::user()->esRol->Empresas)
      <li><a href="#" class="dropdown-button" data-activates="empresamobile"><i class="material-icons right">arrow_drop_down</i>Empresas</a></li>
      @endif
      @if(Auth::user()->esRol->Parametros)
      <li><a href="#" class="dropdown-button" data-activates="parametrosmobile"><i class="material-icons right">arrow_drop_down</i>Parámetros</a></li>
      @endif
      <li><a href="#" class="dropdown-button" data-activates="usuariomobile"><i class="material-icons right">arrow_drop_down</i>Mi Perfil</a></li>
    </ul>
  </div>
</nav>
</div>
@else
<div class="navbar-fixed">
<nav>
  <div class="nav-wrapper green darken-1">
    <a href="{{url('/')}}" class="brand-logo pull-m6">{!! HTML::image(asset('images/principal.png'),'Welcome',['class'=>'squart responsive-img','width' => 230 , 'height' => 200]) !!}
    </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="{{url('tipodocumentoweb')}}" class="dropdown-button" data-activates="reporte">Descarga Formularios</a></li>
      <li><a href="{{url('login')}}" class="dropdown-button" data-activates="formulario">Inicio Sesión</a></li>
      </ul>

    <ul class="side-nav green darken-1" id="mobile-demo">
           <li><a href="#" class="dropdown-button" data-activates="reporte"><i class="material-icons right">arrow_drop_down</i>Descarga Formularios</a></li>
      <li><a href="#" class="dropdown-button" data-activates="formulario"><i class="material-icons right">arrow_drop_down</i>Inicio Sesión</a></li>
    </ul>
  </div>
</nav>
</div>
@endif
