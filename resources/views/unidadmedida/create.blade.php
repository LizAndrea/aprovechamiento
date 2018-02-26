@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h6 class="header2"><strong>UNIDAD DE MEDIDA</strong></h6>
    {!! Form::open(['route' => 'unidadmedida.store', 'class' => 'form-horizontal']) !!}
    <div class="row">
        <div class="input-field col s12 m3 l3">
          {!! Form::number('Num', null) !!}
          {!! Form::label('Num', 'Num: ') !!}
        </div>
        <div class="input-field col s9 m9">
            {!! Form::text('UnidadMedida', null) !!}
            {!! Form::label('UnidadMedida', 'Unidad de Medida:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m4 l4">
            {!! Form::number('Equivalencia1', null,['step'=>'any']) !!}
            {!! Form::label('Equivalencia1', trans('labels.equivalencia1')) !!}
        </div>
        <div class="input-field col s12 m4 l4">
            {!! Form::number('Equivalencia2', null,['step'=>'any']) !!}
            {!! Form::label('Equivalencia2', trans('labels.equivalencia2')) !!}
        </div>
        <div class="input-field col s12 m4 l4">
            {!! Form::number('Equivalencia3', null,['step'=>'any']) !!}
            {!! Form::label('Equivalencia3', trans('labels.equivalencia3')) !!}
        </div>
    </div>
        <div class="row">
        <div class="input-field col s12 m4 l4">
            {!! Form::number('Equivalencia4', null,['step'=>'any']) !!}
            {!! Form::label('Equivalencia4', trans('labels.equivalencia4')) !!}
        </div>
        <div class="input-field col s12 m4 l4">
            {!! Form::number('Equivalencia5', null,['step'=>'any']) !!}
            {!! Form::label('Equivalencia5', trans('labels.equivalencia5')) !!}
        </div>
        <div class="input-field col s12 m4 l4">
            {!! Form::number('Equivalencia6', null,['step'=>'any']) !!}
            {!! Form::label('Equivalencia6', trans('labels.equivalencia6')) !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>Guardar', ['class' => 'btn formButton','type'=>'submit']) !!}
            <a href="{{route('unidadmedida.index')}}" class="btn formButton"><i class="material-icons right">clear</i>Cancelar</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@include('layouts.partials.formerrors')
@endsection