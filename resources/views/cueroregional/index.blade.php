@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn right-align toolBarButton tooltipped" data-tooltip="Descargar reporte regional" href="{{ route('downloadTipoDocumento', 12) }}"> 
    <i class="material-icons right">archive</i>DESCARGAR REPORTE REGIONAL
  </a> 
  <a class="btn right-align toolBarButton tooltipped" data-tooltip="Nuevo reporte regional" href="{{ route('cueroregional.create') }}"> 
    <i class="material-icons right">add</i>NUEVO REPORTE REGIONAL
  </a> 
</div>
@include('layouts.partials.messages')
<h5 class="card-panel"><strong>REPORTE DE APROVECHAMIENTO REGIONAL - CUERO</strong></h5>
<div class="card-panel">
  
  En el marco del PROGRAMA NACIONAL PARA LA CONSERVACIÓN Y APROVECHAMIENTO SOSTENIBLE DEL LAGARTO (Caiman yacare) se presenta el siguiente reporte, CORRESPONDIENTE A LA COSECHA DE LA GESTIÓN <strong>2018</strong>.

<table class="table table-bordered table-striped table-hover highlight dataTable">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Departamento</th>
            <th>Regional</th>
            <th>RepresentanteLegal</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cueroRegional as $item)
        <tr>
            <!--<td class="right-align">{{ $item->NumeroFormulario }}</td>-->
            <td>{{ \Carbon\Carbon::parse($item->Fecha)->format('d-m-Y') }}</td>
            <td>{{ $item->esDepartamento->Departamento }}</td>
            <td>{{ $item->Regional }}</td>
            <td>{{ $item->RepresentanteLegal }}</td>
            <td>{{ $item->Telefono }}</td>
            <td>
             <a href="{{ route('cueroregional.destroy', $item->id) }}" 
                   class="tooltipped" data-tooltip="{{trans('labels.delete')}}">
                    <i class="material-icons right">delete</i>
                </a>
                <a href="{{url('printCueroRegional',$item->id)}}" 
                  class="tooltipped" data-tooltip="{{trans('Imprimir')}}">
                    <i class="material-icons right">print</i>
                </a>
                <a href="{{ route('cueroregional.edit', $item->id) }}" 
                   class="tooltipped" data-tooltip="{{trans('labels.edit')}}">
                    <i class="material-icons right">mode_edit</i>
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
@endsection