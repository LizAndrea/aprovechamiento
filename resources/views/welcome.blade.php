@extends('layouts.master')
@section('content')
<table>
	<tr>
		<td colspan="2">
				<strong><center><h5>BIENVENIDO AL SISTEMA DEL PROGRAMA DE APROVECHAMIENTO SUSTENTABLE DE CUERO Y CARNE DEL LAGARTO</h5></center></strong>
		</td>
	</tr>
	<tr>
		<td style="padding-right: 100px">
			En el marco del PROGRAMA NACIONAL PARA LA CONSERVACIÓN Y APROVECHAMIENTO SOSTENIBLE DE LAGARTO (caimán yacaré), el sistema provee una plataforma  de apoyo e informacion relacionada al aprovechamiento del Caiman yacare y sus derivados, como: 
			</p>		
			- Aprovechamiento de Cuero 
			</br>
			- Aprovechamiento de Carne
			</br>
			- Zoocriaderos comunales y privados
			</br>
			- Red nacional de cuero y carne
			</p>
			<div class="col m6 s12 center-align">
			    {!! HTML::image(asset('images/welcome2.jpg'),'Welcome',['class'=>'circle responsive-img','width' => 300 , 'height' => 300]) !!}
			</div>
		</td>
		<td width="50%">
			<div class="card-panel">
			<table class="table table-bordered table-striped table-hover highlight">
			    <thead>
			        <tr>
			            <th>Documento</th>
			            <th>Descripción</th>
			            <th></th>
			        </tr>
			    </thead>
			    <tbody>
	
			        <tr>
			            <td>Resolucion Lagarto</td>
			             <td>Certificado que se debe presentar como requisito, para el registro de la empresa</td>
			             <td><a href="{{ route('downloadTipoDocumento', 1) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="Descargar"><i class="material-icons medium">archive</i></a></td>             
			        </tr>
			        <tr>
			            <td>Resolucion Lagarto</td>
			             <td>Certificado que se debe presentar como requisito, imprimir en dos copias </td>
			             <td><a href="{{ route('downloadTipoDocumento', 2) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="Descargar"><i class="material-icons medium">archive</i></a></td>             
			        </tr>
			        <tr>
			            <td>Resolucion Lagarto</td>
			             <td>Certificado que se debe presentar como requisito, el registro de la empresa</td>
			             <td><a href="{{ route('downloadTipoDocumento', 3) }}" class="btn right-align toolBarButton tooltipped" data-tooltip="Descargar"><i class="material-icons medium">archive</i></a></td>             
			        </tr>
		
			    </tbody>
			</table>
		</div>
		</td>
	</tr>
</table>
@endsection
       