@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h6 class="header2"><strong>ROL</strong></h6>
    {!! Form::model($rol, [
        'method' => 'PATCH',
        'route' => ['rol.update', $rol->id],
        'class' => 'form-horizontal'
    ]) !!}
    <div class="row">
        <div class="input-field col s12 m3 l3">
          {!! Form::number('Num', null) !!}
          {!! Form::label('Num', 'Num: ') !!}
        </div>
        <div class="input-field col s9 m9">
            {!! Form::text('Rol', null) !!}
            {!! Form::label('Rol', 'Rol:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 m6 l6">
          {!! Form::checkbox('Parametros', '1',$rol->Parametros, ['id'=>'Parametros']) !!}
          {!! Form::label('Parametros', 'Administra Parámetros ') !!}
        </div>
    </div>
        <div class="row">
        <div class="input-field col s6 m6 l6">
          {!! Form::checkbox('Empresas', '1',$rol->Empresas, ['id'=>'Empresas']) !!}
          {!! Form::label('Empresas', 'Administra Empresas ') !!}
        </div>
    </div>
        <div class="row">
        <div class="input-field col s6 m6 l6">
          {!! Form::checkbox('Usuarios', '1',$rol->Usuarios, ['id'=>'Usuarios']) !!}
          {!! Form::label('Usuarios', 'Administra Usuarios ') !!}
        </div>
    </div>
        <div class="row">
        <div class="input-field col s6 m6 l6">
          {!! Form::checkbox('Formularios', '1',$rol->Formularios, ['id'=>'Formularios']) !!}
          {!! Form::label('Formularios', 'Administra Formularios ') !!}
        </div>
    </div>
        <div class="row">
        <div class="input-field col s6 m6 l6">
          {!! Form::checkbox('Reportes', '1',$rol->Reportes, ['id'=>'Reportes']) !!}
          {!! Form::label('Reportes', 'Administra Reportes ') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 m6 l6">
          {!! Form::checkbox('SoloEmpresa', '1',$rol->SoloEmpresa, ['id'=>'SoloEmpresa']) !!}
          {!! Form::label('SoloEmpresa', 'Información sólo de su empresa ') !!}
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
            <a href="{{route('rol.index')}}" class="btn formButton"><i class="material-icons right">clear</i>Cancelar</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@include('layouts.partials.formerrors')
@endsection