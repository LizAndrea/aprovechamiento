@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large  light-blue darken-4" href="{{ route('rol.create') }}">
    <i class="large material-icons">add</i>
  </a>
</div>
@include('layouts.partials.messages')
<h6 class="card-panel"><strong>ROL</strong></h6>
<div class="card-panel">
<table class="table table-bordered table-striped table-hover highlight dataTable">
    <thead>
        <tr>
            <th>Num</th>
            <th>Rol</th>
            <th>Parámetros</th>
            <th>Empresas</th>
            <th>Usuarios</th>
            <th>Formularios</th>
            <th>Reportes</th>
            <th>Sólo Empresa</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rol as $item)
        <tr class='clickable-row' data-href='{{url('/rol', $item->id)}}'>
            <td>{{ $item->Num }}</td>
            <td>{{ $item->Rol }}</td>
            <td>{{ $item->Parametros }}</td>
            <td>{{ $item->Empresas }}</td>
            <td>{{ $item->Usuarios }}</td>
            <td>{{ $item->Formularios }}</td>
            <td>{{ $item->Reportes }}</td>
            <td>{{ $item->SoloEmpresa }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>     
<script type="text/javascript">
    $('.dataTable').DataTable({
      language: { "url": "/lang/datatables.es.json" },
       dom: '<"active"f>rtp<"bottom"i>',
       //lengthMenu: [[5, 25, 50, -1]]
    });
</script>    
@endsection