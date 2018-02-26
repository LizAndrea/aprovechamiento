@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h6 class="header2"><strong>TIPO REPORTE</strong></h6>
    {!! Form::model($tipoReporte, [
        'method' => 'PATCH',
        'route' => ['tiporeporte.update', $tipoReporte->id],
        'class' => 'form-horizontal'
    ]) !!}
    <div class="row">
        <div class="input-field col s12 m3 l3">
          {!! Form::number('Num', null) !!}
          {!! Form::label('Num', 'Num: ') !!}
        </div>
        <div class="input-field col s9 m9">
            {!! Form::text('TipoReporte', null) !!}
            {!! Form::label('TipoReporte', 'Tipo Reporte:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 m6 l6">
          {!! Form::checkbox('Activo', '1',$tipoReporte->Activo, ['id'=>'Activo']) !!}
          {!! Form::label('Activo', 'Activo: ') !!}
        </div>
    </div>
    <div class="row">
       <div class="input-field col s12 m12">
            {!! Form::text('XLSXFileName', null) !!}
            {!! Form::label('XLSXFileName', 'Nombre Archivo Excel:') !!}
        </div>
    </div>
        <div class="row">
        <div class="input-field col s12 m12">
            {!! Form::textarea('Parametros', null,['class'=>'materialize-textarea']) !!}
            {!! Form::label('Parametros', 'Parámetros:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12">
            {!! Form::textarea('Requerimientos', null,['class'=>'materialize-textarea']) !!}
            {!! Form::label('Requerimientos', 'Requerimientos:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12">
            {!! Form::textarea('DefinicionReporte', null,['class'=>'materialize-textarea','size'=>'5x50']) !!}
            {!! Form::label('DefinicionReporte', 'Definición Reporte:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>Guardar', ['class' => 'btn formButton','type'=>'submit']) !!}
            <a href="{{route('tiporeporte.index')}}" class="btn formButton"><i class="material-icons right">clear</i>Cancelar</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@include('layouts.partials.formerrors')
@endsection