@extends('layouts.master')

@section('content')

    <h1>Editar Departamento</h1>
    <hr/>

    {!! Form::model($departamento, [
        'method' => 'PATCH',
        'route' => ['departamento.update', $departamento->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('Num') ? 'has-error' : ''}}">
                {!! Form::label('Num', 'Num: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Num', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Num', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Departamento') ? 'has-error' : ''}}">
                {!! Form::label('Departamento', 'Departamento: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Departamento', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Departamento', '<p class="help-block">:message</p>') !!}
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