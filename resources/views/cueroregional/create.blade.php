<div class="row">
        <h6 class="header card-panel center-align green darken-2"><strong>ADICIONAR DATOS DELAS COMUNIDADES DE LA REGIONAL</strong></h6>
  <div class="card horizontal">
      <div class="row">
         {!! Form::open(['route' => 'saveComunidad', 'class' => 'form-horizontal']) !!}
            <div class="input-field col s12 m5 l5">
              {!! Form::text('Provincia', null) !!}
              {!! Form::label('Provincia', 'Provincia: ') !!}
            </div>
            <div class="input-field col s12 m5 l5">
              {!! Form::text('Municipio', null) !!}
              {!! Form::label('Municipio', 'Municipio: ') !!}
            </div>
            <div class="input-field col s12 m5 l5">
              {!! Form::text('Comunidad', null) !!}
              {!! Form::label('Comunidad', 'Comunidad: ') !!}
            </div>
            <div class="input-field col s12 m5 l5">
              {!! Form::number('NumeroCazadores', null) !!}
              {!! Form::label('NumeroCazadores', 'Numero de Cazadores: ') !!}
            </div>
            <div class="input-field col s12 m5 l5">
              {!! Form::text('Representante', null) !!}
              {!! Form::label('Representante', 'Representante Comunal: ') !!}
            </div>
            <div class="input-field col s12 m5 l5">
              {!! Form::number('Telefono', null) !!}
              {!! Form::label('Telefono', 'Telefono/Celular: ') !!}
            </div>
            <div class="row">
              <div class="input-field right-align col s12 m12">
                {!! Form::button('<i class="material-icons right triggerButton">save</i>GUARDAR DETALLE DE LA COMUNIDAD', ['class' => 'btn formButton','type'=>'submit']) !!}
              </div>
            </div>
            {!! Form::close() !!}  
        </div> 
  </div>
    </div>