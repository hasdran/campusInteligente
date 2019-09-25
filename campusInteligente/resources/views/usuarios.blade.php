@extends('principal')

<script type="text/javascript" src="{{ url('/js/plugins/mask/jquery.mask.js') }}"></script>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('conteudo')
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/">Início</a>
      </li>
      <li class="breadcrumb-item active">Usuários</li>
    </ol>
    
    <br>
    <form action="{{ action('UsuariosController@importar') }}" method="POST" enctype="multipart/form-data">
        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
        <!-- <div class="row">
          <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="text">
          </div>
          <button type="submit" name="button">asdasdasd</button>
        </div> -->
        <div class="row">
            <div class="col-sm-4 form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="text">
                <label class="custom-file-label" for="customFile">Escolher arquivo</label>
              </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"><b>Importar usuários</b></button>
            </div>
        </div>
    </form>
    <a class="btn btn-primary" href="{{ action('UsuariosController@gerarRelatorio') }}" id="toggleNavPosition">
        <span><img src="img/ic_pdf.png"> Relatório - PDF</span>
    </a>
    <!-- <div class="custom-file col-sm-6">
      <input type="file" class="custom-file-input " id="customFileLang" lang="xyzzy-Zorp!">
      <label class="custom-file-label" for="customFileLang">Selecionar Arquivo</label>
    </div>     -->


    <!-- <a class="btn btn-primary" href="#" id="toggleNavPosition">
      <span><img src="img/ic_import.png"> Importar Usuários</span>
    </a> -->

    <!-- <div class="input-group input-file" name="arq_alunos">
        <span class="input-group-btn">
            <button class="btn btn-success btn-choose" type="button">Abrir Navegador</button>
        </span>
        <input type="text" class="form-control" placeholder='Nenhum arquivo selecionado...' />
    </div> -->
    <!-- Example DataTables Card-->
    <div class="card mb-3" style="margin-top: 1.5%">
      <div class="card-header">
        <i class="fa fa-table"></i> Usuários Cadastrados</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Telefone</th>
              </tr>
            </thead>
            <tbody>
                  @foreach ($dados as $usuarios)
                      <tr>
                          <td>{{ $usuarios->name }}</td>
                          <td>{{ $usuarios->email }}</td>
                          <td>{{ $usuarios->cpf }}</td>
                          <td>{{ $usuarios->telefone }}</td>
                      </tr>
                  @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
  </div>
  <!-- /.container-fluid-->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
