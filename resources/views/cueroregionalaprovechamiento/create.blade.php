

<div class="row">
        <h6 class="header card-panel center-align green darken-2"><strong>ADICIONAR DATOS DEL APROVECHAMIENTO Y COMERCIALIZACIÓN DE LOS CUEROS</strong></h6>
  <div class="card horizontal">
    Llene en los cuadros correspondientes y adicione más filas en caso necesario. Recuerde que la tabla se debe llenar con los cupos que se asigna a cada comunidad que compone la REGIONAL de la TCO, Predio ó Comunidad. Si no se asignan cupos por comunidad, llene con los datos totales de la REGIONAL.
    
  <div class="row">
    {!! Form::open(['route' => 'cueroregionalaprovechamiento.store', 'class' => 'form-horizontal']) !!}
    {!! Form::hidden('cueroRegional',$miVar)!!}
      
     {{ $miVar }}
    
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
          {!! Form::button('<i class="material-icons right triggerButton">save</i>GUARDAR DATOS DEL APROVECHAMIENTO', ['class' => 'btn formButton','type'=>'submit']) !!}
        </div>
      </div>
    </div>  
    {!! Form::close() !!}  
  </div> 
<script type="text/javascript">
  $(document).ready(function() {
    $('.selectMaterial').material_select();
  });
</script>