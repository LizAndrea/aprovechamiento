@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h6 class="header2"><strong>USUARIO</strong></h6>
    {!! Form::open(['route' => 'usuario.store', 'class' => 'form-horizontal']) !!}
    <div class="row">
        <div class="input-field col s12 m6 l6">
            {!! Form::text('Nombres', null) !!}
            {!! Form::label('Nombres', 'Nombres:') !!}
        </div>
        <div class="input-field col s12 m6 l6">
            {!! Form::text('Apellidos', null) !!}
            {!! Form::label('Apellidos', 'Apellidos:') !!}
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
          {!! Form::label('Rol', 'Rol: ') !!}
          {!! Form::select('Rol', $rol,null,['class'=>'selectable2']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
          {!! Form::label('Empresa', 'Empresa: ') !!}
          {!! Form::select('Empresa', $empresa,null,['class'=>'selectable2']) !!}
        </div>
    </div>
        <div class="row">
        <div class="input-field col s12 m9 l9">
            {!! Form::text('email', null) !!}
            {!! Form::label('email', 'Correo Electrónico:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m7 l7">
            {!! Form::password('password', null) !!}
            {!! Form::label('password', 'Contraseña:') !!}
        </div>
    </div>
   <div class="row">
        <div class="input-field col s12 m7 l7">
            {!! Form::password('password_confirmation', null) !!}
            {!! Form::label('password_confirmation', 'Confirmar Contraseña:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m3 l3">
          {!! Form::checkbox('Activo', '1',false,['id'=>'Activo']) !!}
          {!! Form::label('Activo', 'Activo: ') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>Guardar', ['class' => 'btn formButton','type'=>'submit']) !!}
            <a href="{{route('usuario.index')}}" class="btn formButton"><i class="material-icons right">clear</i>Cancelar</a>
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