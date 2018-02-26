@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large  light-blue darken-4" href="{{ route('usuario.create') }}">
    <i class="large material-icons">add</i>
  </a>
</div>
@include('layouts.partials.messages')
<div class="card-panel">
    <div class="row">
        <div class="col s12 m3 l3">
            <h6><strong>USUARIOS</strong></h6>
        </div>
    </div>
</div>
<div class="card-panel">
<table class="table table-bordered table-striped table-hover highlight dataTable">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Correo Electrónico</th>
            <th>Empresa</th>
            <th>Rol</th>
            <th>Activo</th>
        </tr>
    </thead>
    <tbody>
    @foreach($usuario as $item)
        <tr class='clickable-row' data-href='{{url('/usuario', $item->id)}}'>
            <td>{{ $item->Usuario }}</td>
            <td>{{ $item->email}}</td>
            <td>@if($item->Empresa!=null) {{$item->esEmpresa->Empresa}} @else - @endif</td>
            <td>@if($item->Rol!=null) {{$item->esRol->Rol}} @else - @endif</td>
            <td>@if($item->Activo) SI @else NO @endif</td>
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