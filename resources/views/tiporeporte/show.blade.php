@extends('layouts.master')
@section('content')
{{-- */$item=$tipoReporte;/* --}}
<div class="card-panel">
    <div class="row">
        <div class="col s6 m4 l4">
            <h6><strong>TIPO REPORTE</strong></h6>
        </div>
        <div class=" col s6 m8 l8 right-align"> 
                <a href="{{url('tiporeporte')}}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.back')}}"><i class="material-icons right">undo</i></a>
                <a href="{{ route('tiporeporte.edit', $item->id) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.edit')}}"><i class="material-icons right">mode_edit</i></a>
                {!! Form::open(['method'=>'DELETE', 'route' => ['tiporeporte.destroy', $item->id], 'style' => 'display:inline' ]) !!}
                {!! Form::button('<i class="material-icons left">delete</i>', ['class' => 'waves-effect waves-light btn toolBarButton tooltipped','type'=>'submit', 'data-tooltip'=>trans('labels.edit')]) !!}
                {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="card-panel">
    <div class="row">
      <div class="col s12 m12">
        <ul class="collection with-header">
            <li class="collection-item"><strong>Num: </strong> {{$item->Num}}</li>
            <li class="collection-item"><strong>Tipo Reporte:</strong> {{$item->TipoReporte}}</a></li>
            <li class="collection-item"><strong>Activo: </strong> @if($item->Activo) SI @else NO @endif</li>
            <li class="collection-item"><strong>Nombre Archivo: </strong> {{$item->XLSXFileName}}</li>
            <li class="collection-item"><strong>Parámetros: </strong> [{{$item->Parametros}}]</li>
            <li class="collection-item"><strong>Requerimientos: </strong> [{{$item->Requerimientos}}]</li>
            <li class="collection-item"><strong>Definición Reporte: </strong> {{$item->DefinicionReporte}}</li>
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
@endsection