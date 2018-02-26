@extends('layouts.master')

@section('content')

    <h1>Departamento</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Num</th><th>Departamento</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $departamento->id }}</td> <td> {{ $departamento->Num }} </td><td> {{ $departamento->Departamento }} </td>
                </tr>
            </tbody>    
        </table>
    </div>


    <div class="panel panel-default">
      <div class="panel-heading">Autor</div>
      <div class="panel-body">
        <div class="row">
            <div class="col-md-2">Creador</div>
            <div class="col-md-2">{{$departamento->CreatorUser}}</div>
            <div class="col-md-2">{{$departamento->CreatorFullName}}</div>
            <div class="col-md-2">{{$departamento->CreationIP}}</div>
            <div class="col-md-2">{{$departamento->created_at->format('d-m-y H:i:s')}}</div>
        </div>
        <div class="row">
            <div class="col-md-2">Actualizador</div>
            <div class="col-md-2">{{$departamento->UpdaterUser}}</div>
            <div class="col-md-2">{{$departamento->UpdaterFullName}}</div>
            <div class="col-md-2">{{$departamento->UpdaterIP}}</div>
            <div class="col-md-2">{{$departamento->updated_at->format('d-m-y H:i:s')}}</div>
        </div>
      </div>
    </div>

@endsection