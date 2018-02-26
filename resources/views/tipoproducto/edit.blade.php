@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h6 class="header2"><strong>TIPO PRODUCTO</strong></h6>
    {!! Form::model($tipoProducto, [
        'method' => 'PATCH',
        'route' => ['tipoproducto.update', $tipoProducto->id],
        'class' => 'form-horizontal'
    ]) !!}
   <div class="row">
        <div class="input-field col s12 m3 l3">
          {!! Form::number('Num', null) !!}
          {!! Form::label('Num', 'Num: ') !!}
        </div>
        <div class="input-field col s9 m9">
            {!! Form::text('TipoProducto', null) !!}
            {!! Form::label('TipoProducto', 'Tipo Producto:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::textarea('Descripcion', null,['class'=>'materialize-textarea']) !!}
            {!! Form::label('Descripcion', 'Descripción:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>Guardar', ['class' => 'btn formButton','type'=>'submit']) !!}
            <a href="{{route('tipoproducto.index')}}" class="btn formButton"><i class="material-icons right">clear</i>Cancelar</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@include('layouts.partials.formerrors')
@endsection