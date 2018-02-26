{!! Form::open() !!}
<div class="row">
  <div class="input-field col s12 m6 left">
    <div class="col s11 m11">
      {!! Form::text('searchkey',null,['placeholder'=>'Buscar...'])!!}
    </div>
    <div class="col s1 m1">
      {!! Form::button('<i class="material-icons">search</i>',['class'=>'btn tooltipped', 'data-tooltip'=>'Buscar','type'=>'submit'])!!}
    </div>
  </div>
  <div class="col s12 m6 right-align">
    <div class="chip">
      6 Registros encontrados
    </div>
  </div>
</div>
{!! Form::close() !!}
