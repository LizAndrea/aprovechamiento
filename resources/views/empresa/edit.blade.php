@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h6 class="header2"><strong>EMPRESA</strong></h6>
    {!! Form::model($empresa, [
        'method' => 'PATCH',
        'route' => ['empresa.update', $empresa->id],
        'class' => 'form-horizontal'
    ]) !!}
   <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::text('Empresa', null) !!}
            {!! Form::label('Empresa', 'Nombre de la Empresa / Razón Social:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m4 l4">
            {!! Form::text('NIT', null) !!}
            {!! Form::label('NIT', 'NIT:') !!}
        </div>
        <div class="input-field col s12 m8 l8">
            {!! Form::select('Red', $red,null, ['id'=>'Red','class'=>'selectMaterial']) !!}
            {!! Form::label('Red', 'Red:') !!}
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
          {!! Form::label('TipoActividad', 'Tipo Actividad: ') !!}
          {!! Form::select('TipoActividad', $tipoActividad,null,['class'=>'selectable2']) !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l12">
          {!! Form::text('RepresentanteLegal', null) !!}
          {!! Form::label('RepresentanteLegal', 'Representate Legal: ') !!}
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6 l6">
          {!! Form::label('TipoEmpresa', 'Tipo Empresa: ') !!}
          {!! Form::select('TipoEmpresa', $tipoEmpresa,null,['class'=>'selectMaterial']) !!}
        </div>
        <div class="col s12 m6 l6">
          {!! Form::label('FechaInscripcion', 'FechaInscripcion: ') !!}
          {!! Form::date('FechaInscripcion', null,['class'=>'datepicker']) !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m3 l3">
          {!! Form::checkbox('Estado', '1',$empresa->Estado,['id'=>'Estado']) !!}
          {!! Form::label('Estado', 'Activo: ') !!}
        </div>
        <div class="col s12 m9 l9">
          {!! Form::label('Departamento', 'Departamento: ') !!}
          {!! Form::select('Departamento', $departamento,null,['class'=>'selectMaterial']) !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l12">
          {!! Form::textarea('Direccion', null,['class'=>'materialize-textarea']) !!}
          {!! Form::label('Direccion', 'Dirección: ') !!}
        </div>
    </div>    
    <div class="row">
        <div class="input-field col s12 m12 l12">
          {!! Form::text('Telefono', null) !!}
          {!! Form::label('Telefono', 'Teléfono(s): ') !!}
        </div>
    </div>    
    <div class="row">
        <div class="input-field col s12 m12 l12">
          {!! Form::text('Email', null) !!}
          {!! Form::label('Email', 'Correo Electrónico: ') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l12">
          {!! Form::text('WebPage', null) !!}
          {!! Form::label('WebPage', 'Página Web: ') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l12">
          {!! Form::textarea('Notas', null,['class'=>'materialize-textarea']) !!}
          {!! Form::label('Notas', 'Notas: ') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>Guardar', ['class' => 'btn formButton','type'=>'submit']) !!}
            <a href="{{route('empresa.index')}}" class="btn formButton"><i class="material-icons right">clear</i>Cancelar</a>
        </div>
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