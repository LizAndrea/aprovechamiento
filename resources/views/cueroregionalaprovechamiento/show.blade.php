@extends('layouts.master')
@section('content')
{{-- */$item=$empresaDocumento;/* --}}
<div class="card-panel">
    <div class="row">
        <div class="col s2 m2 l2">
            <h6><strong>DOCUMENTO</strong></h6>
        </div>
        <div class=" col s10 m10 l10 right-align"> 
                <a href="{{url('listEmpresaDocumento',$item->Empresa)}}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.back')}}"><i class="material-icons right">undo</i></a>
                <a href="{{ route('empresadocumento.edit', $item->id) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.edit')}}"><i class="material-icons right">mode_edit</i></a>
                {!! Form::open(['method'=>'DELETE', 'route' => ['empresadocumento.destroy', $item->id], 'style' => 'display:inline' ]) !!}
                {!! Form::button('<i class="material-icons left">delete</i>', ['class' => 'waves-effect waves-light btn toolBarButton tooltipped','type'=>'submit', 'data-tooltip'=>trans('labels.edit')]) !!}
                {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="card-panel">
    <div class="row">
      <div class="col s12 m12">
        <ul class="collection with-header">
            <li class="collection-item"><strong>Empresa: </strong> {{$item->esEmpresa->Empresa}}</li>
            <li class="collection-item"><strong>Documento: </strong> {{$item->EmpresaDocumento}}</li>
            <li class="collection-item"><strong>Tipo de Documento: </strong> {{$item->esTipoDocumento->TipoDocumento}}</li>
            <li class="collection-item"><strong>Fecha de Registro: </strong> {{\Carbon\Carbon::parse($item->Fecha)->format('d-m-Y')}}</li>
            <li class="collection-item"><strong>Observaciones: </strong> {{$item->Observaciones}}</li>
            @if($item->FileName == null)
                <li class="collection-item"><strong>Archivo: </strong> {{$item->OutPutFileName}}</li>
            @else
            <li class="collection-item"><strong>Archivo: </strong> <a href="{{url('downloadEmpresaDocumento',$item->id)}}">{{$item->OutPutFileName}}</a></li>
            @endif
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