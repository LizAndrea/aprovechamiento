@extends('layouts.master')
@section('content')
{{-- */$item=$empresa;/* --}}
<div class="card-panel">
    <div class="row">
        <div class="col s2 m2 l2">
            <h6><strong>EMPRESA DETALLE</strong></h6>
        </div>
        <div class=" col s10 m10 l10 right-align"> 
                <a href="{{url('listEmpresaDocumento',$item->id)}}" class="btn right-align toolBarButton tooltipped" data-tooltip="Documentos"><i class="material-icons right">attach_file</i></a>
                <a href="{{url('listEmpresaPermiso',$item->id)}}" class="btn right-align toolBarButton tooltipped" data-tooltip="Registros"><i class="material-icons right">insert_drive_file</i></a>
                <a href="{{url('empresa')}}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.back')}}"><i class="material-icons right">undo</i></a>
                <a href="{{ route('empresa.edit', $item->id) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="{{trans('labels.edit')}}"><i class="material-icons right">mode_edit</i></a>
                {!! Form::open(['method'=>'DELETE', 'route' => ['empresa.destroy', $item->id], 'style' => 'display:inline' ]) !!}
                {!! Form::button('<i class="material-icons left">delete</i>', ['class' => 'waves-effect waves-light btn toolBarButton tooltipped','type'=>'submit', 'data-tooltip'=>trans('Eliminar')]) !!}
                {!! Form::close() !!}
                
        </div>
    </div>
</div>
<div class="card-panel">
    <div class="row">
      <div class="col s12 m12">
        <ul class="collection with-header">
            <li class="collection-item"><strong>Empresa: </strong> {{$item->Empresa}}</li>
            <li class="collection-item"><strong>NIT: </strong> {{$item->NIT}}</li>
            <li class="collection-item"><strong>Red: </strong> {{$item->esRed->Red}}</li>
            <li class="collection-item"><strong>Tipo Actividad: </strong> {{$item->esTipoActividad->TipoActividad}}</li>
            <li class="collection-item"><strong>Representante Legal: </strong> {{$item->RepresentanteLegal}}</li>
            <li class="collection-item"><strong>Tipo de Empresa: </strong> {{$item->esTipoEmpresa->TipoEmpresa}}</li>
            <li class="collection-item"><strong>Fecha de Inscripción: </strong> {{\Carbon\Carbon::parse($item->FechaInscripcion)->format('d-m-Y')}}</li>
            <li class="collection-item"><strong>Estado: </strong> @if($item->Activo) Activo @else Inactivo @endif</li>
            <li class="collection-item"><strong>Departamento: </strong> {{$item->esDepartamento->Departamento}}</li>
            <li class="collection-item"><strong>Dirección: </strong> {{$item->Direccion}}</li>
            <li class="collection-item"><strong>Teléfono(s): </strong> {{$item->Telefono}}</li>
            <li class="collection-item"><strong>Correo Electrónico: </strong> {{$item->Email}}</li>
            <li class="collection-item"><strong>Página Web: </strong> {{$item->WebPage}}</li>
            <li class="collection-item"><strong>Notas: </strong> {{$item->Notas}}</li>
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