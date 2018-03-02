@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large  light-blue darken-4" href="{{ route('newEmpresaDocumento',$empresa->id) }}">
    <i class="large material-icons">add</i>
  </a>
</div>
@include('layouts.partials.messages')
<div class="card-panel">
    <div class="row">
        <div class="col s12 m3 l3">
            <h6><strong>DOCUMENTOS DE EMPRESA</strong></h6>
        </div>
        <div class="col s12 m9 l9 right-align">
                <a href="{{url('/empresa',$empresa->id)}}" class="btn right-align toolBarButton tooltipped" data-tooltip="Volver"><i class="material-icons right">arrow_upward</i></a>
        </div>
    </div>
</div>
<div class="card-panel">
<table class="table table-bordered table-striped table-hover highlight">
    <thead>
        <tr>
            <th>Documento</th>
            <th>Tipo de Documento</th>
            <th>Fecha</th>
            <th>Notas</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empresaDocumento as $item)
        <tr class='clickable-row' data-href='{{url('/empresadocumento', $item->id)}}'>
            <td>{{ $item->EmpresaDocumento }}</td>
            <td>{{ $item->esTipoDocumento->TipoDocumento }}</td>
            <td>{{ \Carbon\Carbon::parse($item->Fecha)->format('d-m-Y') }}</td>
            <td>{{ $item->Notas}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>         
@endsection