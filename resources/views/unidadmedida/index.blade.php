@extends('layouts.master')
@section('content')
@include('layouts.partials.status')
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large  light-blue darken-4" href="{{ route('unidadmedida.create') }}">
    <i class="large material-icons">add</i>
  </a>
</div>
@include('layouts.partials.messages')
<h6 class="card-panel"><strong>UNIDAD DE MEDIDA</strong></h6>
<div class="card-panel">
<table class="table table-bordered table-striped table-hover highlight">
    <thead>
        <tr>
            <th>Num</th>
            <th>Unidad de Medida</th>
            <th>{!! trans('labels.equivalencia1')!!}</th>
            <th>{!! trans('labels.equivalencia2')!!}</th>
            <th>{!! trans('labels.equivalencia3')!!}</th>
            <th>{!! trans('labels.equivalencia4')!!}</th>
            <th>{!! trans('labels.equivalencia5')!!}</th>
            <th>{!! trans('labels.equivalencia6')!!}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($unidadMedida as $item)
        <tr class='clickable-row' data-href='{{url('/unidadmedida', $item->id)}}'>
            <td>{{ $item->Num }}</td>
            <td>{{ $item->UnidadMedida }}</td>
            <td>{{ $item->Equivalencia1 }}</td>
            <td>{{ $item->Equivalencia2 }}</td>
            <td>{{ $item->Equivalencia3 }}</td>
            <td>{{ $item->Equivalencia4 }}</td>
            <td>{{ $item->Equivalencia5 }}</td>
            <td>{{ $item->Equivalencia6 }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>         
        <div class="pagination"> {!! $unidadMedida->render() !!} </div>
@endsection