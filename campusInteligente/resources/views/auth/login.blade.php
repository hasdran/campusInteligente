<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
  </head>

  <body class="bg-dark">
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            @if ($errors->has('email'))
              <div class="alert alert-danger" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </div>
            @endif

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Endereço de e-mail</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Digite o email" required autofocus>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Senha</label>
                <input id="password" type="password" class="form-control" name="password" placeholder="Senha" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">
                Entrar
            </button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register">Registrar-se</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  </body>

</html>
