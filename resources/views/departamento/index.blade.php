@extends('layouts.master')

@section('content')

    <h1>Departamentos <a href="{{ route('departamento.create') }}" class="btn btn-primary pull-right btn-xs" title="Añadir"><span class="glyphicon glyphicon-plus"></span></a></h1>

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th><th>Num</th><th>Departamento</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($departamentos as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/departamento', $item->id) }}">{{ $item->Num }}</a></td><td>{{ $item->Departamento }}</td>
                    <td>
                        <a href="{{ route('departamento.edit', $item->id) }}" title="Actualizar" class="btn btn-primary btn-xs">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a> 

                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['departamento.destroy', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $departamentos->render() !!} </div>
    </div>
@endsection