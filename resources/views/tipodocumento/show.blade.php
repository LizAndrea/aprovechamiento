@extends('layouts.master')
@section('content')
{{-- */$item=$tipoDocumento;/* --}}
<div class="card-panel">
    <div class="row">
        <div class="col s6 m4 l4">
            <h6><strong>TIPO DOCUMENTO</strong></h6>
        </div>
        <div class=" col s6 m8 l8 right-align"> 
                <a href="{{url('tipodocumento')}}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.back')}}"><i class="material-icons right">undo</i></a>
                <a href="{{ route('tipodocumento.edit', $item->id) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.edit')}}"><i class="material-icons right">mode_edit</i></a>
                {!! Form::open(['method'=>'DELETE', 'route' => ['tipodocumento.destroy', $item->id], 'style' => 'display:inline' ]) !!}
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
            @if($item->FileName!=null)
                <li class="collection-item"><strong>Tipo de Documento: <a href="{{url('downloadTipoDocumento',$item->id)}}"></strong> {{$item->TipoDocumento}}</a></li>
            @else
            <li class="collection-item"><strong>Tipo de Documento: </strong> {{$item->TipoDocumento}}</li>
            @endif
            <li class="collection-item"><strong>Obligatorio: </strong> @if($item->Obligatorio) SI @else NO @endif</li>
            <li class="collection-item"><strong>Publicado en Web: </strong> @if($item->PublicadoWeb) SI @else NO @endif</li>
            <li class="collection-item"><strong>Descripción: </strong> {{$item->Descripcion}}</li>
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