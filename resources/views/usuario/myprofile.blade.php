@extends('layouts.master')
@section('content')
<div class="card-panel center-align">
  <h5>MI PERFIL</h5>
</div>
<div class="row valign-wrapper">
  <div class="col m6 s12 center-align">
      {!! HTML::image(asset('images/user_profile_male.png'),'Foto de Perfil',['class'=>'circle responsive-img','width' => 360 , 'height' => 360]) !!}
   </div>
  <div class="col m6 s12">
    <ul class="collection with-header">
      <li class="collection-header blue lighten-3"><strong>Datos Generales</strong></li>
      <li class="collection-item"><strong>Nombre: </strong> {{$usuario->Usuario}}</li>
      <li class="collection-item"><strong>Empresa: </strong> @if($usuario->Empresa !=null) {{$usuario->esEmpresa->Empresa}} @endif</li>
      <li class="collection-item"><strong>E-mail: </strong> {{$usuario->email}}</li>
      <li class="collection-item"><strong>Rol: </strong> {{$usuario->esRol->Rol}}</li>
      <li class="collection-item"><a href="#modal1" class="btn waves-effect waves-light modal-trigger formButton"><i class="material-icons right">lock</i>Cambiar contraseña</a></li>
    </ul>
  </div>
</div>

<!-- Modal Form Change Password -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <div class="card-panel green lighten-3 center-align">
      <h5>CAMBIAR CONTRASEÑA</h5>
    </div>
    <div class="input-field row">
      <div class="col s12 m12">
        {!! Form::hidden('user', \Auth::user()->id,['id'=>'userId'])!!}
        {!! Form::password('oldpassword', ['id'=>'oldpassword'])!!}
        {!! Form::label('oldpassword','Contraseña Anterior')!!}
      </div>
    </div>
    <div class="input-field row">
      <div class="col s12 m12">
        {!! Form::password('newpassword', ['id'=>'newpassword'])!!}
        {!! Form::label('newpassword','Contraseña Nueva')!!}
      </div>
    </div>
    <div class="input-field row">
      <div class="col s12 m12">
        {!! Form::password('confirmpassword', ['id'=>'confirmpassword'])!!}
        {!! Form::label('confirmpassword','Confirmar Contraseña')!!}
      </div>
    </div>
    <div id="chgpwdmessages" class="right-align">
      {!! Form::button('Cambiar',['type'=>'sumbit','class'=>'btn formButton center-align','id'=>'chgpwdtrigger']) !!}
    </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
  </div>
</div>
<script type="text/javascript">
$('.modal-trigger').leanModal({
  dismissible: true, // Modal can be dismissed by clicking outside of the modal
  opacity: .8, // Opacity of modal background
  in_duration: 400, // Transition in duration
  out_duration: 400, // Transition out duration
  starting_top: '4%', // Starting top style attribute
  ending_top: '10%', // Ending top style attribute
  //ready: function() { alert('Ready'); }, // Callback for Modal open
  //complete: function() { alert('Closed'); } // Callback for Modal close
}
);

</script>
@endsection
