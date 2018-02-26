@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col s12 m12">
		<div class="card blue-grey darken-1">
      <div class="card-content white-text">
          <span class="card-title">Vamos a reestablecer contraseña, introduce tu dirección de correo electrónico</span>
			</div>
		</div>
	</div>
</div>
{!! Form::open(['url' => 'password/email']) !!}
	<div class="row">
			<div class="input-field col s12 m12">
				{!! Form::email('email',old('email')) !!}
				{!! Form::label('email','Introduce tu dirección de correo electrónico') !!}
			</div>
	</div>
	<div class="row">
		<div class="input-field right-align col s12 m12">
			<a href="{{url('/')}}" class="btn">Cancelar</a>
			{!! Form::submit('Envíar enlace',['class' => 'btn','type'=>'submit'])!!}
		</div>
	</div>
{!! Form::close() !!}
<div class="row">
	<div class="col s12 m12 push-m2 pull-m2">
		@if (session('status'))
			<div class="chip red lighten-1">
				{{ session('status') }}<i class="material-icons">close</i>
			</div>
		@endif
		@if (count($errors) > 0)
			<div class="row">
				<ul>
					@foreach ($errors->all() as $error)
						<li class="chip red lighten-1">{{ $error }}<i class="material-icons">close</i></li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>
</div>
@endsection
