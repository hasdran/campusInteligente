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

<body class="ixed-nav sticky-footer bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Registrar Usuário</div>
        <div class="card-body">
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    @if ($errors->has('name'))
                        <div class="alert alert-danger">
                            <strong>[Entrada Inválida] O nome do usuário não pode conter mais que 255 caracteres!</strong>
                        </div>
                    @endif

                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            <strong>[Entrada Inválida] Já existe um usuário cadastro para o E-MAIL informado!</strong>
                        </div>
                    @endif

                    @if ($errors->has('password'))
                        <div class="alert alert-danger">
                            <strong>[Entrada Inválida] A SENHA deve possuir ao menos de 6 caracteres e ser igual a digitada na confirmação!</strong>
                        </div>
                    @endif

                    @if ($errors->has('cpf'))
                        <div class="alert alert-danger">
                            <strong>[Entrada Inválida] Já existe um usuário cadastrado para o CPF informado!</strong>
                        </div>
                    @endif
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <div class="form-row">
                        <div class="col-md-12">
                          <label for="exampleInputName" class="control-label">Nome</label>
                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">Email</label>
                        <div class="form-row">
                          <div class="col-md-12">
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                          </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                        <label for="telefone" class="control-label">Telefone</label>
                        <div class="form-row">
                          <div class="col-md-12">
                              <input id="telefone" type="telefone" class="form-control" name="telefone" value="{{ old('telefone') }}" required>
                          </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                        <label for="telefone" class="control-label">CPF</label>
                        <div class="form-row">
                          <div class="col-md-12">
                              <input id="cpf" type="cpf" name="cpf" class="form-control" value="{{ old('cpf') }}" required>
                          </div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                      <div class="form-row">
                        <div class="col-md-6">
                          <label for="password" class="control-label">{{ __('Senha') }}</label>
                          <!-- <label for="exampleInputPassword1">Senha</label> -->
                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        </div>
                        <div class="col-md-6">
                          <label for="password-confirm" class=" control-label">{{ __('Confirmar Senha') }}</label>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Registrar
                    </button>
                </form>
                <div class="text-center">
                  <a class="d-block small mt-3" href="login">Fazer Login</a>                
                </div>
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
