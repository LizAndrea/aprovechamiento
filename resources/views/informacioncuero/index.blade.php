@extends('layouts.master')
@section('content')


<table style="width:100%">
    <tr>
        <td>
            <div class="card-panel">
                <strong><center><h5>ACTAS DE PROCEDENCIA</h5></center></strong>

                En el marco del PROGRAMA NACIONAL PARA LA CONSERVACIÓN Y APROVECHAMIENTO SOSTENIBLE DE LAGARTO (caimán yacaré), el sistema provee una plataforma  de apoyo e informacion relacionada al aprovechamiento del Caiman yacare y sus derivados, como: 
                </p>        
                - Aprovechamiento de Cuero 
                </br>
                - Aprovechamiento de Carne
                </br>
                - Zoocriaderos comunales y privados
                </br>
                </p>
                <a href="{{ route('downloadTipoDocumento', 11) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="Descargar">Descargar Acta de Procedencia<i class="material-icons medium">archive</i></a>
                </p>
                </p>
                <div class="col m6 s12 center-align">
                    {!! HTML::image(asset('images/guias.jpg'),'Welcome',['class'=>'squart responsive-img','width' => 300 , 'height' => 300]) !!}
                </div>
            </div>
        </td>
        <td>
            <div class="card-panel">
                <strong><center><h5>GUIAS DE MOVILIZACIÓN</h5></center></strong>

                En el marco del PROGRAMA NACIONAL PARA  CONSERVACIÓN Y APROVECHAMIENTO SOSTENIBLE DE LAGARTO (caimán yacaré), el sistema provee una plataforma  de apoyo e informacion relacionada al aprovechamiento del Caiman yacare y sus derivados, como: 
                </p>        
                - Aprovechamiento de Cuero 
                </br>
                - Aprovechamiento de Carne
                </br>
                - Zoocriaderos comunales y privados
                </br>
                </p>
                <a href="{{ route('downloadTipoDocumento', 10) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="Descargar">Descargar Guias de Movilizacion<i class="material-icons medium">archive</i></a>
                </p>
                <div class="col m6 s12 center-align">
                    {!! HTML::image(asset('images/guias.jpg'),'Welcome',['class'=>'squart responsive-img','width' => 300 , 'height' => 300]) !!}
                </div>
            </div>
            </td> 
        </tr>
    </table>

@endsection