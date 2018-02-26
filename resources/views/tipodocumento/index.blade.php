@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large  light-blue darken-4" href="{{ route('tipodocumento.create') }}">
    <i class="large material-icons">add</i>
  </a>
</div>
@include('layouts.partials.messages')
<h6 class="card-panel"><strong>TIPO DOCUMENTO</strong></h6>
<div class="card-panel">
<table class="table table-bordered table-striped table-hover highlight">
    <thead>
        <tr>
            <th>Num</th>
            <th>TipoDocumento</th>
            <th>Obligatorio</th>
            <th>Publicación Web</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoDocumento as $item)
        <tr class='clickable-row' data-href='{{url('/tipodocumento', $item->id)}}'>
            <td>{{ $item->Num }}</td>
            <td>{{ $item->TipoDocumento }}</td>
            <td>@if($item->Obligatorio) SI @else NO @endif</td>
            <td>@if($item->PublicadoWeb) SI @else NO @endif</td>
            <td>{{ $item->Descripcion }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>         
        <div class="pagination"> {!! $tipoDocumento->render() !!} </div>
@endsection