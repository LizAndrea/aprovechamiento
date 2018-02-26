<div class="card-panel center-align">
	<h5>CAMBIAR ESTADO</h5>
</div>
<div class="card-panel">
{!! Form::open(['route' => 'cambiaEstadoFormulario', 'class' => 'form-horizontal','id'=>'formCambiaEstado']) !!}
{!! Form::hidden('Formulario',$item->id,['id'=>'idFormulario'])!!}
        <div class="input-field col s12 m7 l7">
            {!! Form::radio('EstadoFormulario', 1,false,['id'=>'Pendiente']) !!}
            {!! Form::label('Pendiente', 'Pendiente') !!}
            {!! Form::radio('EstadoFormulario', 2,false,['id'=>'Observado']) !!}
            {!! Form::label('Observado', 'Observado') !!}
            {!! Form::radio('EstadoFormulario', 4,false,['id'=>'Anulado']) !!}
            {!! Form::label('Anulado', 'Anulado') !!}
            {!! Form::radio('EstadoFormulario', 3,false,['id'=>'Aprobado']) !!}
            {!! Form::label('Aprobado', 'Aprobado') !!}
        </div>
        <div class="input-field col s12 m7 l7 right-align">

        {!! Form::button('<i class="material-icons right  triggerButton">done</i>Guardar', ['class' => 'btn formButton','type'=>'submit']) !!}
        </div>  
{!! Form::close()!!}
</div>