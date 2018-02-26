@extends('layouts.master')

@section('content')

    <h1>Añadir Tipoempresa</h1>
    <hr/>

    {!! Form::open(['route' => 'tipoempresa.store', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('Num') ? 'has-error' : ''}}">
                {!! Form::label('Num', 'Num: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Num', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Num', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('TipoEmpresa') ? 'has-error' : ''}}">
                {!! Form::label('TipoEmpresa', 'Tipoempresa: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('TipoEmpresa', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('TipoEmpresa', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Añadir', ['class' => 'btn btn-primary form-control']) !!}
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