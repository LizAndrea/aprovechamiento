@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
  <h6 class="header card-panel center-align green darken-2"><strong>EDITAR DATOS DE APROVECHAMIENTO Y COMERCIALIZACION</strong></h6>
  <div class="card horizontal">
    {!! Form::model($cueroRegionalAprovechamiento, [
        'method' => 'PATCH',
        'route' => ['cueroregionalaprovechamiento.update', $cueroRegionalAprovechamiento->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}  

    {!! Form::hidden('cueroRegional',$cueroRegionalAprovechamiento->CueroRegional)!!} 

     <div class="row">
        <div class="input-field col s12 m5 l5">
          {!! Form::text('Comunidad', null) !!}
          {!! Form::label('Comunidad', 'Comunidad o Regional: ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('Cupo', null) !!}
          {!! Form::label('Cupo', 'Cupo de la Comunidad: ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('CupoAprovechado', null) !!}
          {!! Form::label('CupoAprovechado', 'Cupo Aprovechado: ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('CueroRechazado', null) !!}
          {!! Form::label('CueroRechazado', 'Nro. Cueros Rechazados: ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('CueroVendido', null) !!}
          {!! Form::label('CueroVendido', 'Nro. Cueros Vendidos: ') !!}
        </div>
        <div class="col s12 m5 l5">
          {!! Form::label('Empresa', 'Empresa Compradora: ') !!}
          {!! Form::select('Empresa', $empresa,null,['class'=>'selectMaterial']) !!}
        </div>
    </div>

    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>Actualizar Datos de Aprovechamiento', ['class' => 'btn formButton','type'=>'submit']) !!}
            
        </div>
    </div>
    {!! Form::close() !!}
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.selectMaterial').material_select();
  });
</script>
@endsection