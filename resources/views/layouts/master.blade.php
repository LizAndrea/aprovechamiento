<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Aprovechamiento del Lagarto </title>
  	<link rel="shortcut icon" href="{{asset('/images/app.ico')	}}">
  	<link href="{{asset('fonts/font.css')}}" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>
  	<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables.materialize.css')}}"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="{{asset('css/select2-materialize.css')}}"  media="screen,projection"/>
  	<link type="text/css" rel="stylesheet" href="{{asset('css/app.css')}}"  media="screen,projection"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script type="text/javascript">
		var APP_URL = {!! json_encode(url('/')) !!};
	</script>
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/dataTables.materialize.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/select2.full.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	<script>
		$(document).ready(function(){
			 $(".button-collapse").sideNav();
		});
	</script>
</head>
<body>
	<header>
		<div>
			@include('layouts/partials/header')
		</div>
	</header>
	<main>
			<div class="container">
				@yield('content')
			</div>
	</main>
	<footer class="page-footer green darken-1">
		@include('layouts/partials/footer')
	</footer>
</body>
</html>
