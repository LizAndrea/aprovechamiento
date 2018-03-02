@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="row">
        <h6 class="header card-panel center-align green darken-2"><strong>EDITAR DATOS DEL BENEFICIO POR LA COMERCIALIZACION DE CUERO</strong></h6>
  <div class="card horizontal">
    
    {!! Form::model($cueroRegionalBeneficio, [
        'method' => 'PATCH',
        'route' => ['cueroregionalbeneficio.update', $cueroRegionalBeneficio->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}  

    {!! Form::hidden('cueroRegional',$cueroRegionalBeneficio->CueroRegional)!!} 

     <div class="row">
        <div class="input-field col s12 m5 l5">
          {!! Form::number('TotalBeneficio', null) !!}
          {!! Form::label('TotalBeneficio', 'Total Beneficio Economico Percivido (Bs): ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('TotalGasto', null) !!}
          {!! Form::label('TotalGasto', 'Total Gasto de Operación (Bs): ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('TotalAporte', null) !!}
          {!! Form::label('TotalAporte', 'Total Aporte Comunal/Organización (Bs): ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('TotalBeneficioDistribuido', null) !!}
          {!! Form::label('TotalBeneficioDistribuido', 'Total Beneficios Eoconómicos Distribuidos (Bs): ') !!}
        </div>
    </div>

    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>Guardar Datos de Beneficio', ['class' => 'btn formButton','type'=>'submit']) !!}
            
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection