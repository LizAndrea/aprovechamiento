@extends('layouts.default')
@section('content')
{!! Form::open(['route' => 'login'])!!}

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
			    {!! HTML::image(asset('images/welcome2.jpg'),'Welcome',['class'=>'circle responsive-img','width' => 360 , 'height' => 360]) !!}
			</div>
		</td>
		<td width="35%">
		
				<div class="col s12 m12 center-align">
					<img src="{{asset('/images/logo.png')}}" alt="Biblioteca Digital" width="200" hegiht="200" >
				</div>
		
			
				<div class="input-field col s12 m6 push-m3 pull-m3">
					<i class="material-icons prefix">account_circle</i>
					{!! Form::text('email',old('email'),['class' => 'validate'])!!}
					{!! Form::label('email','Correo Electrónico:',['data-error'=>'wrong required'])!!}
				</div>
		
			
				<div class="input-field col s12 m6 push-m3 pull-m3">
					<i class="material-icons prefix">lock_outline</i>
					{!! Form::password('password',null)!!}
					{!! Form::label('password','Contraseña:')!!}
				</div>
			
			{{--@if (count($errors) > 0)
			<div class="row">
				<script type="text/javascript">
					Materialize.toast("Credenciales Inválidas",8000,"red lighten-1");
				</script>
			</div>
			@endif--}}
			@include('layouts.partials.formerrors')

			<div class="row right-align">
				
					<!--<a href="{{url('password/email')}}" class="btn green darken-1">Olvidé mi contraseña</a>-->
					{!! Form::submit('Ingresar', ['class' => 'btn green darken-1','type'=>'submit']) !!}
				
			</div>
			<div class="col m6 s12 center-align">
			    {!! HTML::image(asset('images/welcome1.jpg'),'Welcome',['class'=>'circle responsive-img','width' => 260 , 'height' => 260]) !!}
			</div>
		</td>
	</tr>
</table>

{!! Form::close() !!}
@endsection
