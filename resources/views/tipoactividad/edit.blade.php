@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h6 class="header2"><strong>TIPO ACTIVIDAD</strong></h6>
    {!! Form::model($tipoactividad, [
        'method' => 'PATCH',
        'route' => ['tipoactividad.update', $tipoactividad->id],
        'class' => 'form-horizontal'
    ]) !!}
 <div class="row">
        <div class="input-field col s12 m3 l3">
          {!! Form::number('Num', null) !!}
          {!! Form::label('Num', 'Num: ') !!}
        </div>
        <div class="input-field col s9 m9">
            {!! Form::text('Codigo', null) !!}
            {!! Form::label('Codigo', 'Código:') !!}
        </div>
    </div>
    <div class="row">
    </div><div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::text('TipoActividad', null) !!}
            {!! Form::label('TipoActividad', 'Tipo Actividad:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>Guardar', ['class' => 'btn formButton','type'=>'submit']) !!}
            <a href="{{route('tipoactividad.index')}}" class="btn formButton"><i class="material-icons right">clear</i>Cancelar</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@include('layouts.partials.formerrors')
@endsection