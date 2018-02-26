@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col s12 m12">
		<div class="card blue-grey darken-1">
      <div class="card-content white-text">
          <span class="card-title">Reestablece tu contraseña</span>
			</div>
		</div>
	</div>
</div>
{!! Form::open(['url'=>'password/reset'])!!}
	{!! Form::hidden('token',$token)!!}
	<div class="row">
		<div class="input-field col s12 m12">
			{!! Form::email('email',old('email')) !!}
			{!! Form::label('email','Dirección de correo electrónico')!!}
		</div>
	</div>
	<div class="row">
		<div class="input-field col s12 m12">
			{!! Form::password('password',null) !!}
			{!! Form::label('password','Contraseña:')!!}
		</div>
	</div>
	<div class="row">
		<div class="input-field col s12 m12">
			{!! Form::password('password_confirmation',null) !!}
			{!! Form::label('password_confirmation','Confirme Contraseña:')!!}
		</div>
	</div>
	<div class="row">
		<div class="col s12 m12 push-m9 push-s6">
			{!! Form::submit('Reestablecer',['class' => 'btn','type'=>'submit'])!!}
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
