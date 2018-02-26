@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h5 class="header2"><strong>FOMULARIO DE REPORTE: COMPRA - VENTA DE PRODUCTOS y/o SUBPRODUCTOS DE CUERO DE LAGARTO <i>(Caiman yacare)</i></strong></h5>
    {!! Form::open(['route' => 'formulario.store', 'class' => 'form-horizontal']) !!}
    {!! Form::hidden('TipoFormulario','P') !!}
    <div class="row">
        <div class="input-field col s12 m5 l5">
          {!! Form::number('NumeroFormulario', null) !!}
          {!! Form::label('NumeroFormulario', 'Numero de Formulario: ') !!}
        </div>
        <div class="input-field col s12 m7 l7">
            {!! Form::radio('CompraVenta', 'C',false,['id'=>'Compra']) !!}
            {!! Form::label('Compra', 'Compra') !!}
            {!! Form::radio('CompraVenta', 'V',false,['id'=>'Venta']) !!}
            {!! Form::label('Venta', 'Venta') !!}
        </div>
    </div>
    <div class="row">
        <div class="col s12 m3 l3">
            {!! Form::label('Fecha', 'Fecha:') !!}
            {!! Form::date('Fecha', null,['class'=>'datepicker']) !!}
        </div>
        @if(Auth::user()->esRol->Formularios)
        <div class="col s12 m9 l9">
            {!! Form::label('Empresa', 'Empresa:') !!}
            {!! Form::select('Empresa', $empresa,null,['class'=>'selectable2']) !!}
        </div>
        @endif
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
<script type="text/javascript">
  $(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 ,// Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });

    $('.selectable2').select2();
  });
</script>
@endsection