<!DOCTYPE html>
<html lang="es">
<head>
	<title>Admin</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <script>
    const appUrl = @json(env("APP_URL"));
  </script>

</head>
<body>

  <div class="container-fluid">
      @yield('content')
      @include('admin.layouts.modal')
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <script>
    const msg = "{{ Session::get('msg') }}"
  </script>

  <script>
    $(document).ready(function(){
      if (msg != '') {
        
        $('#text-msg-modal').html(msg);
        $('#msg-modal').modal('show');
        
      }
    });
  </script>

  <script src="{{ asset('js/admin/empleados/app.js') }}"></script>

</body>
</html>
