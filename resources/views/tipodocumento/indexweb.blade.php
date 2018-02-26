@extends('layouts.default')
@section('content')
<h4 class="card-panel center-align"><strong>DOCUMENTOS DISPONIBLES</strong></h4>
<div class="card-panel">
<table class="table table-bordered table-striped table-hover highlight">
    <thead>
        <tr>
            <th>Documento</th>
            <th>Descripción</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoDocumento as $item)
        <tr class='clickable-row' data-href='{{url('/downloadTipoDocumento', $item->id)}}'>
            <td>{{ $item->TipoDocumento }}</td>
             <td>{{ $item->Descripcion }}</td>
             <td><a href="{{ route('downloadTipoDocumento', $item->id) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="Descargar"><i class="material-icons medium">archive</i></a></td>             
        </tr>
    @endforeach
    </tbody>
</table>
</div>         
@endsection