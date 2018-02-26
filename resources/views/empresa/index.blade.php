@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large  light-blue darken-4" href="{{ route('empresa.create') }}">
    <i class="large material-icons">add</i>
  </a>
</div>
@include('layouts.partials.messages')
<h6 class="card-panel"><strong>EMPRESA</strong></h6>
<div class="card-panel">
<table class="table table-bordered table-striped table-hover highlight dataTable">
    <thead>
        <tr>
            <th>Empresa</th>
            <th>NIT</th>
            <th>Red</th>
            <th>Actividad</th>
            <th>Fecha Inscripción</th>
            <th>Teléfono</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empresa as $item)
        <tr class='clickable-row' data-href='{{url('/empresa', $item->id)}}'>
            <td>{{ $item->Empresa }}</td>
            <td>{{ $item->NIT }}</td>
            <td>{{ $item->esRed->Red }}</td>
            <td>{{ $item->esTipoActividad->TipoActividad }}</td>
            <td>{{ \Carbon\Carbon::parse($item->FechaInscripcion)->format('d-mY') }}</td>
            <td>{{ $item->Telefono }}</td>
            <td>
                <a href="{{url('printEmpresa',$item->id)}}" 
                    class="tooltipped" data-tooltip="{{trans('Imprimir')}}">
                    <i class="material-icons right">print</i>
                </a>
            </td>

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