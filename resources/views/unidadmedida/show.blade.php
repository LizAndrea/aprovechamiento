@extends('layouts.master')
@section('content')
{{-- */$item=$unidadMedida;/* --}}
<div class="card-panel">
    <div class="row">
        <div class="col s2 m2 l2">
            <h6><strong>UNIDAD DE MEDIDA</strong></h6>
        </div>
        <div class=" col s10 m10 l10 right-align"> 
                <a href="{{url('unidadmedida')}}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.back')}}"><i class="material-icons right">undo</i></a>
                <a href="{{ route('unidadmedida.edit', $item->id) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.edit')}}"><i class="material-icons right">mode_edit</i></a>
                {!! Form::open(['method'=>'DELETE', 'route' => ['unidadmedida.destroy', $item->id], 'style' => 'display:inline' ]) !!}
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
            <li class="collection-item"><strong>Unidad de Medida: </strong> {{$item->UnidadMedida}}</li>
            <li class="collection-item"><strong>{!! trans('labels.equivalencia1')!!}: </strong> {{$item->Equivalencia1}}</li>
            <li class="collection-item"><strong>{!! trans('labels.equivalencia2')!!}: </strong> {{$item->Equivalencia2}}</li>
            <li class="collection-item"><strong>{!! trans('labels.equivalencia3')!!}: </strong> {{$item->Equivalencia3}}</li>
            <li class="collection-item"><strong>{!! trans('labels.equivalencia4')!!}: </strong> {{$item->Equivalencia4}}</li>
            <li class="collection-item"><strong>{!! trans('labels.equivalencia5')!!}: </strong> {{$item->Equivalencia5}}</li>
            <li class="collection-item"><strong>{!! trans('labels.equivalencia6')!!}: </strong> {{$item->Equivalencia6}}</li>
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