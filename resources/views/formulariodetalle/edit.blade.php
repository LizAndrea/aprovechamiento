@extends('layouts.master')

@section('content')

    <h1>Editar Formulariodetalle</h1>
    <hr/>

    {!! Form::model($formulariodetalle, [
        'method' => 'PATCH',
        'route' => ['formulariodetalle.update', $formulariodetalle->id],
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
            <div class="form-group {{ $errors->has('Formulario') ? 'has-error' : ''}}">
                {!! Form::label('Formulario', 'Formulario: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Formulario', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Formulario', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Fecha') ? 'has-error' : ''}}">
                {!! Form::label('Fecha', 'Fecha: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('Fecha', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Fecha', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('TipoPlato') ? 'has-error' : ''}}">
                {!! Form::label('TipoPlato', 'Tipoplato: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('TipoPlato', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('TipoPlato', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CantidadPlatos') ? 'has-error' : ''}}">
                {!! Form::label('CantidadPlatos', 'Cantidadplatos: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('CantidadPlatos', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CantidadPlatos', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Charque') ? 'has-error' : ''}}">
                {!! Form::label('Charque', 'Charque: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Charque', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Charque', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CarnePrimera') ? 'has-error' : ''}}">
                {!! Form::label('CarnePrimera', 'Carneprimera: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('CarnePrimera', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CarnePrimera', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CarneSegunda') ? 'has-error' : ''}}">
                {!! Form::label('CarneSegunda', 'Carnesegunda: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('CarneSegunda', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CarneSegunda', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('TotalCarne') ? 'has-error' : ''}}">
                {!! Form::label('TotalCarne', 'Totalcarne: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('TotalCarne', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('TotalCarne', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Precio') ? 'has-error' : ''}}">
                {!! Form::label('Precio', 'Precio: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Precio', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Precio', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Documento') ? 'has-error' : ''}}">
                {!! Form::label('Documento', 'Documento: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Documento', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Documento', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Observaciones') ? 'has-error' : ''}}">
                {!! Form::label('Observaciones', 'Observaciones: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Observaciones', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Observaciones', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FileName') ? 'has-error' : ''}}">
                {!! Form::label('FileName', 'Filename: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('FileName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('FileName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('OutPutFileName') ? 'has-error' : ''}}">
                {!! Form::label('OutPutFileName', 'Outputfilename: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('OutPutFileName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('OutPutFileName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('FileType') ? 'has-error' : ''}}">
                {!! Form::label('FileType', 'Filetype: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('FileType', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('FileType', '<p class="help-block">:message</p>') !!}
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