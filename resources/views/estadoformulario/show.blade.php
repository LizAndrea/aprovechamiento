@extends('layouts.master')

@section('content')

    <h1>Estadoformulario</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Num</th><th>EstadoFormulario</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $estadoformulario->id }}</td> <td> {{ $estadoformulario->Num }} </td><td> {{ $estadoformulario->EstadoFormulario }} </td>
                </tr>
            </tbody>    
        </table>
    </div>


    <div class="panel panel-default">
      <div class="panel-heading">Autor</div>
      <div class="panel-body">
        <div class="row">
            <div class="col-md-2">Creador</div>
            <div class="col-md-2">{{$estadoformulario->CreatorUser}}</div>
            <div class="col-md-2">{{$estadoformulario->CreatorFullName}}</div>
            <div class="col-md-2">{{$estadoformulario->CreationIP}}</div>
            <div class="col-md-2">{{$estadoformulario->created_at->format('d-m-y H:i:s')}}</div>
        </div>
        <div class="row">
            <div class="col-md-2">Actualizador</div>
            <div class="col-md-2">{{$estadoformulario->UpdaterUser}}</div>
            <div class="col-md-2">{{$estadoformulario->UpdaterFullName}}</div>
            <div class="col-md-2">{{$estadoformulario->UpdaterIP}}</div>
            <div class="col-md-2">{{$estadoformulario->updated_at->format('d-m-y H:i:s')}}</div>
        </div>
      </div>
    </div>

@endsection