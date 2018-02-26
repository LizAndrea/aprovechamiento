@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h6 class="header2"><strong>DOCUMENTO</strong></h6>
    {!! Form::model($empresaDocumento, [
        'method' => 'PATCH',
        'route' => ['empresadocumento.update', $empresaDocumento->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}
   <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::text('EmpresaDocumento', null) !!}
            {!! Form::label('EmpresaDocumento', 'Documento:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::select('TipoDocumento', $tipoDocumento, null , ['class'=>'selectMaterial']) !!}
            {!! Form::label('TipoDocumento', 'Tipo de Documento:') !!}
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6 l6">
            {!! Form::label('Fecha', 'Fecha de Registro:') !!}
            {!! Form::date('Fecha', null,['class'=>'datepicker']) !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::textarea('Notas', null, ['class'=>'materialize-textarea']) !!}
            {!! Form::label('Notas', 'Notas:') !!}
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
            <a href="{{route('listEmpresaDocumento',$empresaDocumento->Empresa)}}" class="btn formButton"><i class="material-icons right">clear</i>Cancelar</a>
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