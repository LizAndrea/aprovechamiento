@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="row">
        <h6 class="header card-panel center-align green darken-2"><strong>ADICIONAR DATOS DELAS COMUNIDADES DE LA REGIONAL</strong></h6>
  <div class="card horizontal">
    

    <h6 class="header2"><strong>EDITAR DATOS COMUNIDAD</strong></h6>
    {!! Form::model($cueroRegionalComunidad, [
        'method' => 'PATCH',
        'route' => ['cueroregionalcomunidad.update', $cueroRegionalComunidad->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}  

    {!! Form::hidden('cueroRegional',$cueroRegionalComunidad->CueroRegional)!!} 

     <div class="row">
        <div class="input-field col s12 m5 l5">
          {!! Form::text('Provincia', null) !!}
          {!! Form::label('Provincia', 'Provincia: ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::text('Municipio', null) !!}
          {!! Form::label('Municipio', 'Municipio: ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::text('Comunidad', null) !!}
          {!! Form::label('Comunidad', 'Comunidad: ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('NumeroCazadores', null) !!}
          {!! Form::label('NumeroCazadores', 'Numero de Cazadores: ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::text('Representante', null) !!}
          {!! Form::label('Representante', 'Representante Comunal: ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('Telefono', null) !!}
          {!! Form::label('Telefono', 'Telefono/Celular: ') !!}
        </div>
    </div>

    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>Guardar', ['class' => 'btn formButton','type'=>'submit']) !!}
            
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection