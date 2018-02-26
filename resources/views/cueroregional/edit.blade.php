@extends('layouts.master')

@section('content')

    <h1>EDITAR REPORTE REGIONAL</h1>
    <hr/>

    {!! Form::model($cueroRegional, [
        'method' => 'PATCH',
        'route' => ['cueroregional.update', $cueroRegional->id],
        'class' => 'form-horizontal'
    ]) !!}

          {!! Form::hidden('cueroRegional',$cueroRegional->id)!!}

    <div class="row">
        <div class="col s12 m3 l3">
            {!! Form::label('Fecha', 'Fecha del Reporte:') !!}
            {!! Form::date('Fecha', null,['class'=>'datepicker']) !!}
        </div>
    </div>
    <h6 class="header2"><strong>A. DATOS GENERALES DE LA REGIÓN <strong></h6>
    <div class="row">
        <div class="input-field col s12 m5 l5">
          {!! Form::text('Regional', null) !!}
          {!! Form::label('Regional', 'Nombre de Regional (TCO, predio, comunidad): ') !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('Cupo', null) !!}
          {!! Form::label('Cupo', 'Cupo aprobado para la gestión: ') !!}
        </div>
        <div class="input-field col s12 m9 l9">
          {!! Form::text('RepresentanteLegal', null) !!}
          {!! Form::label('RepresentanteLegal', 'Nombre del Representante Legal: ') !!}
        </div>
        <div class="col s12 m5 l5">
            {!! Form::label('Departamento', 'Departamento: ') !!}
            {!! Form::select('Departamento', $departamento,null,['class'=>'selectMaterial']) !!}
        </div>
        <div class="input-field col s12 m5 l5">
          {!! Form::number('Telefono', null) !!}
          {!! Form::label('Telefono', 'Telefono/Celular: ') !!}
        </div>
    </div>


<div class="card-panel">
    <h6 class="header2"><strong>B.  DATOS GENERALES DE LAS COMUNIDADES DE LA REGIONAL <strong></h6>
    Llene en los cuadros correspondientes y adicione más filas en caso necesario.
    <table class="table table-bordered table-striped table-hover highlight dataTable">
    <thead>
        <tr>
            <th>provincia</th>
            <th>Comunidad</th>
            <th>Representante Comunal</th>
            <th>Telefono</th>
            <th>NumeroCazadores</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cueroRegionalComunidad as $item)
        <tr>
            <td>{{ $item->Provincia}}</td>
            <td>{{ $item->Comunidad }}</td>
            <td>{{ $item->Representante }}</td>
            <td>{{ $item->Telefono }}</td>
            <td>{{ $item->NumeroCazadores }}</td>
            <td>
                <a href="{{url('printColaborador',$item->id)}}" 
                  class="tooltipped" data-tooltip="{{trans('Imprimir')}}">
                    <i class="material-icons right">print</i>
                </a>
                <a href="{{ route('cueroregional.edit', $item->id) }}" 
                   class="tooltipped" data-tooltip="{{trans('labels.edit')}}">
                    <i class="material-icons right">mode_edit</i>
                </a>
                 <a href="{{ route('cueroregional.destroy', $item->id) }}" 
                   class="tooltipped" data-tooltip="{{trans('labels.delete')}}">
                    <i class="material-icons right">delete</i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    <div class="row">
          <div class="input-field right-align col s12 m12">
            {!! Form::button('<i class="material-icons right  triggerButton">add</i>ADICIONAR COMUNIDAD', ['class' => 'btn formButton','type'=>'submit']) !!}
          </div>
    </div>
    <div>
        <a class="modal-trigger btn-large  light-blue darken-4" href="#modal1">
        <i class="large material-icons">add</i>
    </a>
</div>
</div>



<div class="card-panel">
    <h6 class="header2"><strong>C.  DATOS DEL APROVECHAMIENTO Y COMERCIALIZACIÓN DE LOS CUEROS <strong></h6>
    Llene en los cuadros correspondientes y adicione más filas en caso necesario. Recuerde que la tabla se debe llenar con los cupos que se asigna a cada comunidad que compone la REGIONAL de la TCO, Predio ó Comunidad. Si no se asignan cupos por comunidad, llene con los datos totales de la REGIONAL.
    <table class="table table-bordered table-striped table-hover highlight dataTable">
    <thead>
        <tr>
            <th>Comunidad/Regional</th>
            <th>Cupo</th>
            <th>Cupo Aprovechado</th>
            <th>Nro. Cueros Rechazados</th>
            <th>Nro. Cuero Vendidos</th>
            <th>Empresa Compradora</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cueroRegionalAprovechamiento as $item)

        <tr>
            <!--<td class="right-align">{{ $item->NumeroFormulario }}</td>-->
            <td>{{ $item->Comunidad }}</td>
            <td>{{ $item->Cupo }}</td>
            <td>{{ $item->CupoAprovechado }}</td>
            <td>{{ $item->CueroRechazado }}</td>
            <td>{{ $item->CueroVendido }}</td>
            <td>{{ $item->esEmpresa->Empresa }}</td>
            <td>
                  <a href="{{url('printColaborador',$item->id)}}" 
                  class="tooltipped" data-tooltip="{{trans('Imprimir')}}">
                    <i class="material-icons right">print</i>
                </a>
                <a href="{{ route('cueroregional.edit', $item->id) }}" 
                   class="tooltipped" data-tooltip="{{trans('labels.edit')}}">
                    <i class="material-icons right">mode_edit</i>
                </a>
                 <a href="{{ route('cueroregional.destroy', $item->id) }}" 
                   class="tooltipped" data-tooltip="{{trans('labels.delete')}}">
                    <i class="material-icons right">delete</i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    <div class="row">
      <div class="input-field right-align col s12 m12">
        {!! Form::button('<i class="material-icons right triggerButton">add</i>ADICIONAR APROVECHAMIENTO', ['class' => 'btn formButton','type'=>'submit']) !!}
      </div>
    </div>
</div>

</p></p></p>

<div class="card-panel">
    <!--TABLA DE BENEFICIOS-->
<h6 class="header2"><strong>D.  BENEFICIOS POR LA COMERCIALIZACIÓN DE CUERO DE LAGARTO <strong></h6>
    <table class="table table-bordered table-striped table-hover highlight dataTable">
    <thead>
        <tr>
            <th>Total de Beneficios Económicos Percibidos de la comercialización (Bs)</th>
            <th>*Total de gastos de Operación (Bs)</th>
            <th>Total de aportes comunales/organización (Bs)</th>
            <th>Total de Beneficios Económicos Distribuidos (Bs)</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cueroRegionalBeneficio as $item)
        <tr>
            <td>{{ $item->TotalBeneficio }}</td>
            <td>{{ $item->TotalGasto }}</td>
            <td>{{ $item->TotalAporte }}</td>
            <td>{{ $item->TotalBeneficioDistribuido }}</td>
            <td>
                  <a href="{{url('printColaborador',$item->id)}}" 
                  class="tooltipped" data-tooltip="{{trans('Imprimir')}}">
                    <i class="material-icons right">print</i>
                </a>
                <a href="{{ route('cueroregional.edit', $item->id) }}" 
                   class="tooltipped" data-tooltip="{{trans('labels.edit')}}">
                    <i class="material-icons right">mode_edit</i>
                </a>
                 <a href="{{ route('cueroregional.destroy', $item->id) }}" 
                   class="tooltipped" data-tooltip="{{trans('labels.delete')}}">
                    <i class="material-icons right">delete</i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">
      <div class="input-field right-align col s12 m12">
        {!! Form::button('<i class="material-icons right  triggerButton">add</i>ADICIONAR BENEFICIO', ['class' => 'btn formButton','type'=>'submit']) !!}
      </div>
    </div>
*Los gastos de operación son aquellos que utilizo en compras o pagos como: compra de balas, gasolina, balanzas, cuchillos y otros.
</div>
</p></p></p>
<div class="row">
    <div class="input-field col s12 m5 l5">
      {!! Form::textarea('MotivoRechazo', null,['class'=>'materialize-textarea']) !!}
      {!! Form::label('MotivoRechazo', 'Motivo por el cual se rechazaron los cueros reportados: ') !!}
    </div>
    <div class="input-field col s12 m5 l5">
      {!! Form::textarea('InformacionRechazo', null,['class'=>'materialize-textarea']) !!}
      {!! Form::label('InformacionRechazo', 'Indicar donde se encuentran o a quien se comercializo los cueros rechazados: ') !!}
    </div>
</div>

<div class="row">
        <div class="input-field col s12 m12 l12">
          {!! Form::textarea('Observaciones', null,['class'=>'materialize-textarea']) !!}
          {!! Form::label('Observaciones', 'Otras observaciones que considere importante reportar: ') !!}
        </div>
</div>
    <div class="row">
        <div class="input-field right-align col s12 m12">
          {!! Form::button('<i class="material-icons right  triggerButton">done</i>Actualizar Repoerte Regional', ['class' => 'btn formButton','type'=>'submit']) !!}
            <a href="{{route('cueroregional.index')}}" class="btn formButton"><i class="material-icons right">clear</i>Cancelar</a>
        </div>
    </div>
{!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <script type="text/javascript">
  $(document).ready(function() {
    $('.selectMaterial').material_select();
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 ,// Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });

    $('.selectable2').select2();
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
  });
</script>
<div id="modal1" class="modal modal-fixed-footer" style="width:100%;height:100%;">
    <div class="modal-content">
      @include('cueroregional.create', array('miVar'=>'$cueroRegional->id'))
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
    </div>
</div>   
@endsection