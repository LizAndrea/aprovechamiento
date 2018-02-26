<div class="card-panel">
    {!! Form::open(['method'=>'POST','class' => 'form-horizontal','id'=>'formCarneCompra']) !!}
    {!! Form::hidden('Formulario',$formulario->id) !!}
    {!! Form::hidden('FormularioDetalle',null,['id'=>'FormularioDetalle']) !!}
    <div class="row">
        <div class="col s12 m3 l3">
          {!! Form::label('Fecha', 'Fecha: ') !!}
          {!! Form::date('Fecha', null,['class'=>'datepicker','id'=>'Fecha']) !!}
        </div>
        <div class="input-field col s9 m9">
            {!! Form::text('NombreProveedor', null,['id'=>'NombreProveedor']) !!}
            {!! Form::label('NombreProveedor', 'Nombre del Proveedor:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m4 l4">
            {!! Form::number('Charque', null,['step'=>'any','id'=>'Charque']) !!}
            {!! Form::label('Charque', 'Cantidad CARNE CHARQUE(kg)') !!}
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
            {!! Form::number('Precio', null,['step'=>'any','id'=>'Precio']) !!}
            {!! Form::label('Precio', 'Precio:') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::textarea('Documento', null,['class'=>'materialize-textarea','id'=>'Documento']) !!}
            {!! Form::label('Documento', 'Nro. DE ACTA DE PROCEDENCIA DE CARNE y/o FACTURA:') !!}
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
          {!! Form::button('<i class="material-icons right  saveFormAsync">done</i>GUARDAR', ['class' => 'btn formButton','type'=>'submit','id'=>'btnSaveCC']) !!}
          <a href="#" class="btn formButton hide updatetableCC" id="btnUpdateCC"><i class="material-icons right  saveFormAsync">done</i>ACTUALIZAR</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
