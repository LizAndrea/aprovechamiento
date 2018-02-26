@if ($errors->any())
    @foreach ($errors->all() as $error)
	<script type="text/javascript">
	Materialize.toast("{!! $error !!}",8000,"red lighten-1");
	</script>
    @endforeach
@endif