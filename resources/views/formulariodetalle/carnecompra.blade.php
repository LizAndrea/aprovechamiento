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

<div class=" col s10 m10 l10 right-align">
</div>
<div class="card-panel">
    <div class=" col s10 m10 l10 right-align"> 
        <a href="{{url('/formulario', $formulario->id)}}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.back')}}"><i class="material-icons right">undo</i></a>
    </div>
    <h5 class="header2 center-align"><strong>FOMULARIO: COMPRA CARNE DE LAGARTO <i>(Caiman yacare)</i></strong></h5>

    <ul>
    	<li><strong>Número Formulario: </strong>{{$formulario->NumeroFormulario}}</li>
    	<li><strong>Fecha: </strong>{{\Carbon\Carbon::parse($formulario->Fecha)->format('d-m-Y')}}</li>
    	<li><strong>Estado: </strong>{{$formulario->esEstadoFormulario->EstadoFormulario}}</li>
    	<li><strong>Nombre o razón social: </strong>@if($formulario->Empresa!=null) {{$formulario->esEmpresa->Empresa}} @endif</li>
    </ul>
 </div>
<div class="card-panel">
<table class="table table-bordered table-striped table-hover highlight" id="tableCompraCarne">
    <thead>
        <tr>
            <th>FECHA</th>
            <th>NOMBRE DEL PROVEEDOR</th>
            <th>Cantidad CHARQUE (kg)</th>
            <th>Cantidad CARNE DE PRIMERA (kg)</th>
            <th>Cantidad CARNE DE SEGUNDA (kg)</th>
            <th>Cantidad TOTAL CARNE (kg)</th>
            <th>Cantidad PRECIO (Bs) por 1kg</th>
            <th>Nro. de ACTA DE PROCENDENCIA DE CARNE y/o FACTURA</th>
            <th>Observaciones</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($formularioDetalle as $item)
        <tr class="optionableForm" data-href='#' data-id='{{$item->id}}' id='tr{{$item->id}}' >
            <td>{{ \Carbon\Carbon::parse($item->Fecha)->format('d-m-Y') }}</td>
            <td>{{ $item->NombreProveedor}}</td>
            <td>{{ $item->Charque}}</td>
            <td>{{ $item->CarnePrimera}}</td>
            <td>{{ $item->CarneSegunda}}</td>
            <td>{{ $item->TotalCarne}}</td>
            <td>{{ $item->Precio}}</td>
            <td>{{ $item->Documento}}</td>
            <td>{{ $item->Observaciones}}</td>
            @if($formulario->EstadoFormulario<=2)
            <!--<td class="hide">-->
            <td>
            	<a class="ajaxDeletable btn red" href="#" data-id="{{$item->id}}"><i class="material-icons">delete</i></a> 
            	<a class="ajaxEditableCC btn blue" href="#" data-id="{{$item->id}}"><i class="material-icons">mode_edit</i></a>
           	</td>
            @endif
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
        $('#formCarneCompra').trigger('reset');
        $('#btnUpdateCC').addClass('hide');
        $('#btnSaveCC').removeClass('hide');
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
      @include('formulariodetalle.carnecompracreate')
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
    </div>
</div>

 @endsection