@extends('layouts.master')
@section('content')
{{-- */$item=$formulario;/* --}}
<div class="card-panel">
    <div class="row">
        <div class="col s2 m2 l2">
            <h6><strong>DETALLE FORMULARIO</strong></h6>
        </div>
        <div class=" col s10 m10 l10 right-align"> 
                <a href="{{url('formulario')}}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.back')}}"><i class="material-icons right">undo</i></a>
                {{--@if($item->EstadoFormulario<=2)
                <a href="{{ route('formulario.edit', $item->id) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.edit')}}"><i class="material-icons right">mode_edit</i></a>
                @endif--}}
                <a href="{{ route('listFormularioDetalle', $item->id) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.detail')}}"><i class="material-icons right">view_list</i></a>
                @if($item->EstadoFormulario<=2)
                {!! Form::open(['method'=>'DELETE', 'route' => ['formulario.destroy', $item->id], 'style' => 'display:inline' ]) !!}
                {!! Form::button('<i class="material-icons left">delete</i>', ['class' => 'waves-effect waves-light btn toolBarButton tooltipped','type'=>'submit', 'data-tooltip'=>trans('labels.delete')]) !!}
                {!! Form::close() !!}
                @endif
                 <a href="{{ route('printFormulario', $item->id) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="Imprimir"><i class="material-icons right">print</i></a>
                @if(Auth::user()->esRol->Formularios)
                <a href="#modal1" class="btn right-align toolBarButton tooltipped modal-trigger" data-tooltip="Cambiar Estado"><i class="material-icons right">gradient</i></a>
                @endif
        </div>
    </div>
</div>
<div class="card-panel">
    <div class="row">
      <div class="col s12 m12">
        <ul class="collection with-header">
            <li class="collection-item"><strong>Nro. Formulario: </strong> {{$item->NumeroFormulario}}</li>
            <li class="collection-item"><strong>Fecha: </strong> {{\Carbon\Carbon::parse($item->Fecha)->format('d-m-Y')}}</li>
            <li class="collection-item"><strong>Red: </strong> {{$item->esRed()}}</li>
            <li class="collection-item"><strong>Compra/Venta: </strong> {{$item->esCompraVenta()}}</li>
            <li class="collection-item {{$item->classFormulario()}}"><strong>Estado: </strong> {{$item->esEstadoFormulario->EstadoFormulario}}</li>
            <li class="collection-item"><strong>Usuario que registró: </strong> @if($item->UsuarioRegistro) {{$item->esUsuarioRegistro->Usuario}}@endif</li>
            <li class="collection-item"><strong>Fecha Registro: </strong> {{\Carbon\Carbon::parse($item->FechaRegistro)->format('d-m-Y')}}</li>
            <li class="collection-item"><strong>Usuario que Revisó/Observó: </strong> @if($item->UsuarioVerifica) {{$item->esUsuarioVerifica->Usuario}}@endif</li>
            <li class="collection-item"><strong>Fecha Revisión/Observación: </strong> {{\Carbon\Carbon::parse($item->FechaVerifica)->format('d-m-Y')}}</li>
            <li class="collection-item"><strong>Usuario que Aprobó / anuló: </strong> @if($item->UsuarioAprueba) {{$item->esUsuarioAprueba->Usuario}}@endif</li>
            <li class="collection-item"><strong>Fecha Aprobación / Anulación: </strong> {{\Carbon\Carbon::parse($item->FechaAprueba)->format('d-m-Y')}}</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m12">
        <ul class="collection with-header">
            <li class="collection-header green lighten-2"><strong>Autor </strong></li>
            <li class="collection-item">
                <div class="row">
                    <div class="col s12 m2 l2"><strong>Creador: </strong></div>
                    <div class="col s12 m4 l4"><i class="material-icons">person_pin</i>{{$item->CreatorFullName}} ({{$item->CreatorUser}})</div>
                    <div class="col s12 m2 l2"><i class="material-icons">computer</i> {{$item->CreationIP}} </div>
                    <div class="col s12 m4 l4"><i class="material-icons">alarm</i> {{$item->created_at->format('d-m-Y H:i:s')}}  </div>
                </div>
                <div class="row">
                    <div class="col s12 m2 l2"><strong>Actualizador: </strong></div>
                    <div class="col s12 m4 l4"><i class="material-icons">person_pin</i>{{$item->UpdaterFullName}} ({{$item->UpdaterUser}})</div>
                    <div class="col s12 m2 l2"><i class="material-icons">computer</i> {{$item->UpdaterIP}} </div>
                    <div class="col s12 m4 l4"><i class="material-icons">alarm</i> {{$item->updated_at->format('d-m-Y H:i:s')}}  </div>
                </div>
            </li>
        </ul>
      </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.modal-trigger')
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
      @include('formulario.cambiaestado')
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
    </div>
</div>

@endsection