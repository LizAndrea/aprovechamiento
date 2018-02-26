@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="modal-trigger btn-floating btn-large  light-blue darken-4" href="#modal1">
    <i class="large material-icons">add</i>
  </a>
</div>
@include('layouts.partials.messages')
<h6 class="card-panel"><strong>FORMULARIOS DE COMPRA Y VENTA DE PRODUCTOS DE LAGARTO</strong></h6>
<div class="card-panel">
<table class="table table-bordered table-striped table-hover highlight dataTable">
    <thead>
        <tr>
            <th>Nro. Formulario</th>
            <th>Fecha</th>
            <th>Empresa</th>
            <th>Red</th>
            <th>Compra/Venta</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
    @foreach($formulario as $item)
        <tr class='clickable-row {{$item->classFormulario()}}' data-href='{{url('/formulario', $item->id)}}'>
            <td class="right-align">{{ $item->NumeroFormulario }}</td>
            <td>{{ \Carbon\Carbon::parse($item->Fecha)->format('d-m-Y') }}</td>
            <td>@if($item->Empresa != null) {{ $item->esEmpresa->Empresa }} @endif</td>
            <td>{{ $item->esRed() }}</td>
            <td>{{ $item->esCompraVenta() }}</td>
            <td>{{ $item->esEstadoFormulario->EstadoFormulario }}</td>
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

    $('.modal-trigger').leanModal({ 
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .8, // Opacity of modal background
      in_duration: 400, // Transition in duration
      out_duration: 400, // Transition out duration
      starting_top: '4%', // Starting top style attribute
      ending_top: '2%', // Ending top style attribute
      //ready: function() { alert('Ready'); }, // Callback for Modal open
      //complete: function() { $("#formCarneCompra").trigger('reset'); } // Callback for Modal close
    });
</script> 

<div id="modal1" class="modal modal-fixed-footer" style="width:100%;height:100%;">
    <div class="modal-content">
      @include('formulario.create')
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
    </div>
</div>   

@endsection