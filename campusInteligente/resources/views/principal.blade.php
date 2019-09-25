@extends('main')



@section('documento')
  <!-- Navigation-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/">S-vag</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="/">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Início</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="{{action('GraficosController@visualizar')}}">
              <i class="fa fa-fw fa-area-chart"></i>
              <span class="nav-link-text">Estatísticas</span>
            </a>
          </li>
        <!-- @if ($privilegio == 1)
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/usuarios">
            <i class="fa fa-users"></i>
            <span class="nav-link-text">Usuários</span>
          </a>
        </li>
        @endif -->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
          <div class="dropdown show">
            @if(Auth::check())
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            @endif
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Logout</a>
            </div>
          </div>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    @yield('conteudo')
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © S-vag 2018</small>
        </div>
      </div>
    </footer>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja Terminar a Sessão Atual?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!-- <div class="modal-body">Selecione "Logout" abaixo se você estiver pronto para terminar sua sessão atual.</div> -->
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="{{ url('/logout') }}"> Sair</a>
        </div>
      </div>
    </div>
  </div>
@stop
