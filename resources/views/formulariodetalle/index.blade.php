@extends('layouts.master')

@section('content')

    <h1>Formulariodetalles <a href="{{ route('formulariodetalle.create') }}" class="btn btn-primary pull-right btn-xs" title="Añadir"><span class="glyphicon glyphicon-plus"></span></a></h1>

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th><th>Version</th><th>Num</th><th>Formulario</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($formulariodetalles as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/formulariodetalle', $item->id) }}">{{ $item->version }}</a></td><td>{{ $item->Num }}</td><td>{{ $item->Formulario }}</td>
                    <td>
                        <a href="{{ route('formulariodetalle.edit', $item->id) }}" title="Actualizar" class="btn btn-primary btn-xs">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a> 

                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['formulariodetalle.destroy', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $formulariodetalles->render() !!} </div>
    </div>
@endsection