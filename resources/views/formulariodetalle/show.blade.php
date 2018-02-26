@extends('layouts.master')

@section('content')

    <h1>Formulariodetalle</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Version</th><th>Num</th><th>Formulario</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $formulariodetalle->id }}</td> <td> {{ $formulariodetalle->version }} </td><td> {{ $formulariodetalle->Num }} </td><td> {{ $formulariodetalle->Formulario }} </td>
                </tr>
            </tbody>    
        </table>
    </div>


    <div class="panel panel-default">
      <div class="panel-heading">Autor</div>
      <div class="panel-body">
        <div class="row">
            <div class="col-md-2">Creador</div>
            <div class="col-md-2">{{$formulariodetalle->CreatorUser}}</div>
            <div class="col-md-2">{{$formulariodetalle->CreatorFullName}}</div>
            <div class="col-md-2">{{$formulariodetalle->CreationIP}}</div>
            <div class="col-md-2">{{$formulariodetalle->created_at->format('d-m-y H:i:s')}}</div>
        </div>
        <div class="row">
            <div class="col-md-2">Actualizador</div>
            <div class="col-md-2">{{$formulariodetalle->UpdaterUser}}</div>
            <div class="col-md-2">{{$formulariodetalle->UpdaterFullName}}</div>
            <div class="col-md-2">{{$formulariodetalle->UpdaterIP}}</div>
            <div class="col-md-2">{{$formulariodetalle->updated_at->format('d-m-y H:i:s')}}</div>
        </div>
      </div>
    </div>

@endsection