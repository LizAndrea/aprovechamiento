@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h6 class="header2"><strong>TIPO DOCUMENTO</strong></h6>
    {!! Form::model($tipoDocumento, [
        'method' => 'PATCH',
        'route' => ['tipodocumento.update', $tipoDocumento->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}
 <div class="row">
        <div class="input-field col s12 m3 l3">
          {!! Form::number('Num', null) !!}
          {!! Form::label('Num', 'Num: ') !!}
        </div>
        <div class="input-field col s9 m9">
            {!! Form::text('TipoDocumento', null) !!}
            {!! Form::label('TipoDocumento', 'Tipo de Documento:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 m6 l6">
          {!! Form::checkbox('Obligatorio', '1',$tipoDocumento->Obligatorio, ['id'=>'Obligatorio']) !!}
          {!! Form::label('Obligatorio', 'Obligatorio ') !!}
        </div>
    <div class="input-field col s6 m6 l6">
          {!! Form::checkbox('PublicadoWeb', '1',$tipoDocumento->PublicadoWeb, ['id'=>'PublicadoWeb']) !!}
          {!! Form::label('PublicadoWeb', 'Publicado en Portal ') !!}
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
        <div class="input-field col s12 m12 l12">
            {!! Form::textarea('Descripcion',null,['class'=>'materialize-textarea'])!!}
            {!! Form::label('Descripcion','Descripción:')!!}
        </div>
    </div>
    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>Guardar', ['class' => 'btn formButton','type'=>'submit']) !!}
            <a href="{{route('tipodocumento.index')}}" class="btn formButton"><i class="material-icons right">clear</i>Cancelar</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@include('layouts.partials.formerrors')
@endsection