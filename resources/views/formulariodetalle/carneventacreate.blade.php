<div class="card-panel">
    {!! Form::open(['method'=>'POST','class' => 'form-horizontal','id'=>'formCarneVenta']) !!}
    {!! Form::hidden('Formulario',$formulario->id) !!}
    {!! Form::hidden('FormularioDetalle',null,['id'=>'FormularioDetalle']) !!}
    <div class="row">
        <div class="col s12 m3 l3">
          {!! Form::label('Fecha', 'Fecha: ') !!}
          {!! Form::date('Fecha', null,['class'=>'datepicker','id'=>'Fecha']) !!}
        </div>
        <div class="input-field col s9 m9">
            {!! Form::text('TipoPlato', null,['id'=>'TipoPlato']) !!}
            {!! Form::label('TipoPlato', 'Tipo de Plato Comercializado:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m4 l4">
            {!! Form::number('CantidadPlatos', null,['step'=>'any','id'=>'CantidadPlatos']) !!}
            {!! Form::label('CantidadPlatos', 'Cantidad de Platos:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m4 l4">
            {!! Form::number('Charque', null,['step'=>'any','id'=>'Charque']) !!}
            {!! Form::label('Charque', 'Cantidad CHARQUE(kg):') !!}
        </div>
        <div class="input-field col s12 m4 l4">
            {!! Form::number('CarnePrimera', null,['step'=>'any','id'=>'CarnePrimera']) !!}
            {!! Form::label('CarnePrimera', 'Cantidad CARNE DE PRIMERA(kg)') !!}
        </div>
        <div class="input-field col s12 m4 l4">
            {!! Form::number('CarneSegunda', null,['step'=>'any','id'=>'CarneSegunda']) !!}
            {!! Form::label('CarneSegunda', 'Cantidad CARNE DE SEGUNDA(kg)') !!}
        </div>        
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::textarea('Documento', null,['class'=>'materialize-textarea','id'=>'Documento']) !!}
            {!! Form::label('Documento', 'Nro. DE FACTURA:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::textarea('Observaciones', null,['class'=>'materialize-textarea','id'=>'Observaciones']) !!}
            {!! Form::label('Observaciones', 'Observaciones:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  saveFormAsync">done</i>GUARDAR', ['class' => 'btn formButton','type'=>'submit','id'=>'btnSaveCV']) !!}
          <a href="#" class="btn formButton hide updatetableCV" id="btnUpdateCV"><i class="material-icons right  saveFormAsync">done</i>ACTUALIZAR</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
