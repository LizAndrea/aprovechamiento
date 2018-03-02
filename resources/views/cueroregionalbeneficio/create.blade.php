

<div class="row">
        <h6 class="header card-panel center-align green darken-2"><strong>ADICIONAR BENEFICIOS POR LA COMERCIALIZACIÓN DE CUERO DE LAGARTO</strong></h6>
  <div class="card horizontal">
    
  <div class="row">
    {!! Form::open(['route' => 'cueroregionalbeneficio.store', 'class' => 'form-horizontal']) !!}
     {!! Form::hidden('cueroRegional',$miVar)!!}
      
     {{ $miVar }}
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
          {!! Form::label('TotalBeneficioDistribuido', 'Total Beneficios Económicos Distribuidos (Bs): ') !!}
        </div>
    </div>  

            <div class="row">
              <div class="input-field right-align col s12 m12">
                {!! Form::button('<i class="material-icons right triggerButton">save</i>GUARDAR DATOS DE BENEFICIO', ['class' => 'btn formButton','type'=>'submit']) !!}
              </div>
            </div>
    {!! Form::close() !!}  
    </div> 
  </div>