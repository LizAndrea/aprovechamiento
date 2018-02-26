@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large  light-blue darken-4" href="{{ route('newEmpresaPermiso',$empresa->id) }}">
    <i class="large material-icons">add</i>
  </a>
</div>
@include('layouts.partials.messages')
<div class="card-panel">
    <div class="row">
        <div class="col s12 m3 l3">
            <h6><strong>REGISTROS DE EMPRESA</strong></h6>
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
            <th>No. Registro</th>
            <th>Fecha Emision</th>
            <th>Fecha Vencimiento</th>
            <th>Vigente</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empresaPermiso as $item)
        <tr class='clickable-row' data-href='{{url('/empresapermiso', $item->id)}}'>
            <td>{{ $item->EmpresaPermiso }}</td>
            <td>{{ \Carbon\Carbon::parse($item->FechaEmision)->format('d-m-Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($item->FechaVencimiento)->format('d-m-Y') }}</td>
            <td>@if($item->Vigente) SI @else NO @endif</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>         
@endsection