@if (Session::has('info_message'))
  <script type="text/javascript">
    Materialize.toast("{!! Session::get('info_message') !!}",7000,"rounded green");
  </script>
@endif

@if (Session::has('warning_message'))
  <script type="text/javascript">
    Materialize.toast("{!! Session::get('warning_message') !!}",7000,"rounded amber");
  </script>
@endif

@if (Session::has('error_message'))
  <script type="text/javascript">
    Materialize.toast("{!! Session::get('error_message') !!}",7000,"rounded red");
  </script>
@endif

@if (Session::has('success_message'))
  <script type="text/javascript">
    Materialize.toast("{!! Session::get('success_message') !!}",7000,"rounded green");
  </script>
@endif
