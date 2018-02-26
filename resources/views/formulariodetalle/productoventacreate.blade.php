<div class="card-panel">
    {!! Form::open(['method'=>'POST','class' => 'form-horizontal','id'=>'formProductoVenta']) !!}
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
        <div class="col s12 m12 l12">
            {!! Form::label('TipoProducto', 'Producto:') !!}
            {!! Form::select('TipoProducto', $tipoProducto,null,['id'=>'TipoProducto','class'=>'selectable2']) !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m4 l4">
            {!! Form::number('CantidadProducto', null,['step'=>'any','id'=>'CantidadProducto']) !!}
            {!! Form::label('CantidadProducto', 'Cantidad:') !!}
        </div>
                <div class="col s12 m4 l4">
            {!! Form::label('UnidadMedida', 'Unidad de Medida:') !!}
            {!! Form::select('UnidadMedida', $unidadMedida,null,['id'=>'UnidadMedida','class'=>'selectable2']) !!}
        </div>
        <div class="input-field col s12 m4 l4">
            {!! Form::number('Precio', null,['step'=>'any','id'=>'Precio']) !!}
            {!! Form::label('Precio', 'Precio (Bs) por (unidad, pie, etc):') !!}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l12">
            {!! Form::textarea('Documento', null,['class'=>'materialize-textarea','id'=>'Documento']) !!}
            {!! Form::label('Documento', 'Nro. de Acta de procedencia de Cuero y/o Factura:') !!}
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
          {!! Form::button('<i class="material-icons right  saveFormAsync">done</i>GUARDAR', ['class' => 'btn formButton','type'=>'submit','id'=>'btnSavePV']) !!}
          <a href="#" class="btn formButton hide updatetablePV" id="btnUpdatePV"><i class="material-icons right  saveFormAsync">done</i>ACTUALIZAR</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<script type="text/javascript">
    $(".selectable2").select2();
</script>