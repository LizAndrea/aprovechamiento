@extends('layouts.master')

@section('content')

    <h1>Editar Formulario</h1>
    <hr/>

    {!! Form::model($formulario, [
        'method' => 'PATCH',
        'route' => ['formulario.update', $formulario->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('version') ? 'has-error' : ''}}">
                {!! Form::label('version', 'Version: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('version', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('version', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Num') ? 'has-error' : ''}}">
                {!! Form::label('Num', 'Num: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Num', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Num', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('NumeroFormulario') ? 'has-error' : ''}}">
                {!! Form::label('NumeroFormulario', 'Numeroformulario: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('NumeroFormulario', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('NumeroFormulario', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Formulario') ? 'has-error' : ''}}">
                {!! Form::label('Formulario', 'Formulario: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Formulario', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Formulario', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('TipoFormulario') ? 'has-error' : ''}}">
                {!! Form::label('TipoFormulario', 'Tipoformulario: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('TipoFormulario', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('TipoFormulario', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CompraVenta') ? 'has-error' : ''}}">
                {!! Form::label('CompraVenta', 'Compraventa: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('CompraVenta', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CompraVenta', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('EstadoFormulario') ? 'has-error' : ''}}">
                {!! Form::label('EstadoFormulario', 'Estadoformulario: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('EstadoFormulario', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('EstadoFormulario', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Empresa') ? 'has-error' : ''}}">
                {!! Form::label('Empresa', 'Empresa: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Empresa', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Empresa', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('UsuarioRegistro') ? 'has-error' : ''}}">
                {!! Form::label('UsuarioRegistro', 'Usuarioregistro: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('UsuarioRegistro', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('UsuarioRegistro', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('UsuarioVerifica') ? 'has-error' : ''}}">
                {!! Form::label('UsuarioVerifica', 'Usuarioverifica: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('UsuarioVerifica', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('UsuarioVerifica', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection