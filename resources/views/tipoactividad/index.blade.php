@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large  light-blue darken-4" href="{{ route('tipoactividad.create') }}">
    <i class="large material-icons">add</i>
  </a>
</div>
@include('layouts.partials.messages')
<h6 class="card-panel"><strong>TIPO ACTIVIDAD</strong></h6>
<div class="card-panel">
<table class="table table-bordered table-striped table-hover highlight">
    <thead>
        <tr>
            <th>Num</th>
            <th>Código</th>
            <th>Tipo Actividad</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoActividad as $item)
        <tr class='clickable-row' data-href='{{url('/tipoactividad', $item->id)}}'>
            <td>{{ $item->Num }}</td>
            <td>{{ $item->Codigo }}</td>
            <td>{{ $item->TipoActividad }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>         
        <div class="pagination"> {!! $tipoActividad->render() !!} </div>
@endsection