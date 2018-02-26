@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
@if($formulario->EstadoFormulario<=2)
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="modal-trigger btn-floating btn-large  light-blue darken-4" href="#modal1">
        <i class="large material-icons">add</i>
    </a>
    <ul>
        <li><a href="{{url('/formulario', $formulario->id)}}" class="btn-floating red"><i class="material-icons">close</i></a></li>
        <li><a href="{{url('printFormulario',$formulario->id)}}" class="btn-floating green"><i class="material-icons">print</i></a></li>
        <li><a href="{{url('listFormularioDetalle',$formulario->id)}}" class="btn-floating blue darken-1"><i class="material-icons">save</i></a></li>
    </ul>
</div>
@else
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a href="{{url('/formulario', $formulario->id)}}" class="btn-floating red"><i class="material-icons">close</i></a>
    </div>
@endif
<div class="card-panel">
    <div class=" col s10 m10 l10 right-align"> 
        <a href="{{url('/formulario', $formulario->id)}}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.back')}}"><i class="material-icons right">undo</i></a>
    </div>
    <h5 class="header2 center-align"><strong>FOMULARIO DE REPORTE: COMPRA-VENTA DE PRODUCTOS y/o SUBPRODUCTOS DE CUERO DE LAGARTO <i>(Caiman yacare)</i></strong></h5>
    <ul>
    	<li><strong>Número Formulario: </strong>{{$formulario->NumeroFormulario}}</li>
    	<li><strong>Fecha: </strong>{{\Carbon\Carbon::parse($formulario->Fecha)->format('d-m-Y')}}</li>
    	<li><strong>Estado: </strong>{{$formulario->esEstadoFormulario->EstadoFormulario}}</li>
    	<li><strong>Nombre o razón social: </strong>@if($formulario->Empresa!=null) {{$formulario->esEmpresa->Empresa}} @endif</li>
    </ul>
 </div>
<div class="card-panel">
<table class="table table-bordered table-striped table-hover highlight" id="tableData">
    <thead>
        <tr>
            <th>FECHA</th>
            <th>NOMBRE DEL PROVEEDOR</th>
            <th>PRODUCTO</th>
            <th>CANTIDAD</th>
            <th>UNIDAD MEDIDA</th>
            <th>PRECIO (Bs)</th>
            <th>Nro. DE ACTA DE PROCEDENCIA o FACTURA</th>
            <th>OBSERVACIONES</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($formularioDetalle as $item)
        <tr class="optionableForm" data-href='#' data-id='{{$item->id}}' id='tr{{$item->id}}' >
            <td>{{ \Carbon\Carbon::parse($item->Fecha)->format('d-m-Y') }}</td>
            <td>{{ $item->NombreProveedor}}</td>
            <td>@if($item->TipoProducto != null) {{ $item->esTipoProducto->TipoProducto}} @endif</td>
            <td>{{ $item->CantidadProducto}}</td>
            <td>@if($item->UnidadMedida != null) {{ $item->esUnidadMedida->UnidadMedida}} @endif</td>
            <td>{{ $item->Precio}}</td>
            <td>{{ $item->Documento}}</td>
            <td>{{ $item->Observaciones}}</td>
            <td class="hide">
            	<a class="ajaxDeletable btn red" href="#" data-id="{{$item->id}}"><i class="material-icons">delete</i></a> 
            	<a class="ajaxEditablePV btn blue" href="#" data-id="{{$item->id}}"><i class="material-icons">mode_edit</i></a>
           	</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 ,// Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });
    $('.modal-trigger')
    .click(function(){
        $('#formProductoVenta').trigger('reset');
        $('#btnUpdatePV').addClass('hide');
        $('#btnSavePV').removeClass('hide');
    })
    .leanModal({
	  dismissible: true, // Modal can be dismissed by clicking outside of the modal
	  opacity: .8, // Opacity of modal background
	  in_duration: 400, // Transition in duration
	  out_duration: 400, // Transition out duration
	  starting_top: '4%', // Starting top style attribute
	  ending_top: '2%', // Ending top style attribute
	  //ready: function() { alert('Ready'); }, // Callback for Modal open
	  //complete: function() { $("#formCarneCompra").trigger('reset'); } // Callback for Modal close
	});
  });

</script>

 <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      @include('formulariodetalle.productoventacreate')
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
    </div>
</div>
 @endsection