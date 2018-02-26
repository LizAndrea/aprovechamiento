@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h6 class="header2 center-align"><strong>REPORTE</strong></h6>
</div>
<div class="card-panel">
    {!! Form::open(['route' => 'generaReporte', 'class' => 'form-horizontal']) !!}
    <div class="row">
        <div class="col s12 m12">
            {!! Form::label('TipoReporte', 'Tipo Reporte:') !!}
            {!! Form::select('TipoReporte', $tipoReporte,null,['class'=>'selectable2']) !!}
        </div>
    </div>
    @if(!Auth::user()->esRol->SoloEmpresa)
    <div class="row">
        <div class="col s12 m12">
            {!! Form::label('Empresa', 'Empresa:') !!}
            {!! Form::select('Empresa', $empresa,null,['class'=>'selectable2']) !!}
        </div>
    @endif
    </div>
    <div class="row">
       <div class="col s12 m6 l6">
            {!! Form::label('Desde', 'Desde:') !!}
            {!! Form::date('Desde', null,['class'=>'datepicker']) !!}
        </div>
       <div class="col s12 m6 l6">
            {!! Form::label('Hasta', 'Hasta:') !!}
            {!! Form::date('Hasta', null,['class'=>'datepicker']) !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>GENERAR', ['class' => 'btn formButton','type'=>'submit']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
        <div class="card-panel">
            {!! Form::open(['route' => 'generaReporteEmpresa', 'class' => 'form-horizontal']) !!}
            <h6 class="header2"><strong>Listado de Empresas registradas y aceptadas:</strong></h6>
            <div class="row">
                <div class="col s12 m12">
                    {!! Form::label('TipoReporte', 'Listado de las Empresas registradas en el Sistema:') !!}
                </div>
                  {!! Form::button('<i class="material-icons right triggerButton">done</i>GENERAR', ['class' => 'btn formButton','type'=>'submit']) !!}
            </div>
            {!! Form::close() !!}
        </div>
@include('layouts.partials.formerrors')
<script type="text/javascript">
  $(document).ready(function() {
    $('.selectMaterial').material_select();
    $('.selectable2').select2();
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 ,// Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });
  });
</script>
@endsection