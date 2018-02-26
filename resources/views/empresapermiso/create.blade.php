@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h6 class="header2"><strong>PERMISO</strong></h6>
    {!! Form::open(['route' => 'empresapermiso.store', 'class' => 'form-horizontal','files'=>true]) !!}
    {!! Form::hidden('Empresa',$empresa->id)!!}
    <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::text('EmpresaPermiso', null) !!}
            {!! Form::label('EmpresaPermiso', 'No. Registro:') !!}
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6 l6">
            {!! Form::label('FechaEmision', 'Fecha de Emisión:') !!}
            {!! Form::date('FechaEmision', null,['class'=>'datepicker']) !!}
        </div>
        <div class="col s12 m6 l6">
            {!! Form::label('FechaVencimiento', 'Fecha de Vencimiento:') !!}
            {!! Form::text('FechaVencimiento', null,['class'=>'datepicker']) !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m3 l3">
            {!! Form::checkbox('Vigente', '1', false , ['id'=>'Vigente']) !!}
            {!! Form::label('Vigente', 'Vigente') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::textarea('Observaciones', null, ['class'=>'materialize-textarea']) !!}
            {!! Form::label('Observaciones', 'Observaciones:') !!}
        </div>
    </div>
    <div class="row">
      <div class="file-field input-field col s12 m12">
        <div class="btn">
          <span>Archivo</span>
            {!! Form::file('File') !!}
        </div>
        <div class="file-path-wrapper">
          {!! Form::text('Fotowraper',null,['class'=>'file-path validate']) !!}
        </div>
      </div>
    </div>
    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>Guardar', ['class' => 'btn formButton','type'=>'submit']) !!}
            <a href="{{route('listEmpresaPermiso',$empresa->id)}}" class="btn formButton"><i class="material-icons right">clear</i>Cancelar</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@include('layouts.partials.formerrors')
<script type="text/javascript">
  $(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 ,// Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });
  });
</script>
@endsection