@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="card-panel">
    <h5 class="header2"><strong>REPORTE DE APROVECHAMIENTO SOSTENIBLE DE CUERO DE LAGARTO <i>(Caiman yacare)</i></strong></h5>
    
    {!! Form::open(['route' => 'cueroregional.store', 'class' => 'form-horizontal']) !!}

    En el marco del PROGRAMA NACIONAL PARA LA CONSERVACIÓN Y APROVECHAMIENTO SOSTENIBLE DEL LAGARTO (Caiman yacare) se presenta el siguiente reporte, CORRESPONDIENTE A LA COSECHA DE LA GESTIÓN:
</p>
    <div class="row">
        <div class="col s12 m3 l3">
            {!! Form::label('Fecha', 'Fecha del Reporte:') !!}
            {!! Form::date('Fecha', null,['class'=>'datepicker']) !!}
        </div>
        @if(Auth::user()->esRol->Formularios)
        
        @endif
        
    </div>
    <h6 class="header2"><strong>A. DATOS GENERALES DE LA REGIÓN <strong></h6>
    <div class="row">
        <div class="input-field col s12 m5 l5">
          {!! Form::text('Regional', null) !!}
          {!! Form::label('Regional', 'Nombre de Regional (TCO, predio, comunidad): ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('Cupo', null) !!}
          {!! Form::label('Cupo', 'Cupo aprobado para la gestión: ') !!}
        </div>
        <div class="input-field col s12 m9 l9">
          {!! Form::text('RepresentanteLegal', null) !!}
          {!! Form::label('RepresentanteLegal', 'Nombre del Representante Legal: ') !!}
        </div>
        <div class="col s12 m5 l5">
            {!! Form::label('Departamento', 'Departamento: ') !!}
            {!! Form::select('Departamento', $departamento,null,['class'=>'selectMaterial']) !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('Telefono', null) !!}
          {!! Form::label('Telefono', 'Telefono/Celular: ') !!}
        </div>
        <div class="input-field col s12 m9 l9">
          {!! Form::text('CorreoElectronico', null) !!}
          {!! Form::label('CorreoElectronico', 'Correo Electronico: ') !!}
        </div>
    </div>    
    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right triggerButton">skip_next</i>SIGUIENTE PASO....', ['class' => 'btn formButton','type'=>'submit']) !!}
        </div>
    </div>
    
{!! Form::close() !!}
</div>
Nota: La información contenida en el presente documento tiene carácter de declaración jurada.
</br>ADJUNTAR: 
</br>1.  Actas de procedencia cuero o guías de movilización de cuero. 
</br>Recuerde que las copias corresponden; BLANCA: REGIONAL, AMARILLA: DGBAP, VERDE: GOBERNACIÓN, ROSA: COMUNIDAD: AZUL: LAGARTERO
</br>2.  Acta de distribución de beneficios 


<script type="text/javascript">
  $(document).ready(function() {
    $('.selectMaterial').material_select();
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 ,// Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });

    $('.selectable2').select2();
  });
</script>

@endsection