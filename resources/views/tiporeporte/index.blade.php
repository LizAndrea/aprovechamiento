@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large  light-blue darken-4" href="{{ route('tiporeporte.create') }}">
    <i class="large material-icons">add</i>
  </a>
</div>
@include('layouts.partials.messages')
<h6 class="card-panel"><strong>TIPO REPORTE</strong></h6>
<div class="card-panel">
<table class="table table-bordered table-striped table-hover highlight">
    <thead>
        <tr>
            <th>Num</th>
            <th>Tipo Reporte</th>
            <th>Nombre Archivo</th>
            <th>Activo</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoReporte as $item)
        <tr class='clickable-row' data-href='{{url('/tiporeporte', $item->id)}}'>
            <td>{{ $item->Num }}</td>
            <td>{{ $item->TipoReporte }}</td>
            <td>{{ $item->XLSXFileName }}</td>
            <td>@if($item->Activo) SI @else NO @endif</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>         
@endsection