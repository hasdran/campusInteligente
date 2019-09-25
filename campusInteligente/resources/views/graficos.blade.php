@extends('principal')

@section('script')
<script type="text/javascript">

$(document).ready(function(){
// Executa o evento CLICK em todos os links do menu
    carregar();
    function carregar() {
      $('#conteudo').load('estatisticasDia');
    }
    $( "#target a" ).click(function() {
      $('#conteudo').load($(this).attr('href'));
      return false;
    });
});
</script>
@stop

@section('conteudo')
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/">Início</a>
      </li>
      <li class="breadcrumb-item active">Estatísticas</li>
    </ol>
    
    <div id="target">
      <a href="estatisticasDia"></a>    
    </div>
    <!-- <div class="btn-group" role="group" aria-label="Basic example">
                      
    </div> -->
       
    <div class="row">
      <div class="col-sm-8">
      
        <br>    
          <input type="hidden" >
          <div id='conteudo' class="container-fluid"></div>
        
          <div id='lava_div'>          
            <?php echo $lava->render($grafico_coluna, 'Dados', 'lava_div'); ?>
          </div>
      </div>
    </div>

    <!-- Example DataTables Card-->
    <div class="card mb-3" style="margin-top: 1.5%">

  </div>
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
  <!-- <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small>Copyright © Your Website 2018</small>
      </div>
    </div>
  </footer> -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
