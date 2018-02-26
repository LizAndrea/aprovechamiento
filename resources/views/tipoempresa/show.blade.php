@extends('layouts.master')

@section('content')

    <h1>Tipoempresa</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Num</th><th>TipoEmpresa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tipoempresa->id }}</td> <td> {{ $tipoempresa->Num }} </td><td> {{ $tipoempresa->TipoEmpresa }} </td>
                </tr>
            </tbody>    
        </table>
    </div>


    <div class="panel panel-default">
      <div class="panel-heading">Autor</div>
      <div class="panel-body">
        <div class="row">
            <div class="col-md-2">Creador</div>
            <div class="col-md-2">{{$tipoempresa->CreatorUser}}</div>
            <div class="col-md-2">{{$tipoempresa->CreatorFullName}}</div>
            <div class="col-md-2">{{$tipoempresa->CreationIP}}</div>
            <div class="col-md-2">{{$tipoempresa->created_at->format('d-m-y H:i:s')}}</div>
        </div>
        <div class="row">
            <div class="col-md-2">Actualizador</div>
            <div class="col-md-2">{{$tipoempresa->UpdaterUser}}</div>
            <div class="col-md-2">{{$tipoempresa->UpdaterFullName}}</div>
            <div class="col-md-2">{{$tipoempresa->UpdaterIP}}</div>
            <div class="col-md-2">{{$tipoempresa->updated_at->format('d-m-y H:i:s')}}</div>
        </div>
      </div>
    </div>

@endsection