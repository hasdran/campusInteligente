@extends('principal')

@section('script')
<script type="text/javascript">
    $(()=>{ 
      setTime()
      function setTime(){        
        setTimeout(setTime, 3000);
        $('#setTime').load('teste');
      }			
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
      <li class="breadcrumb-item active">Vagas</li>
    </ol>


<div class="row" align="center">
    <div id="setTime" class="col-sm-12"> </div>   
</div>

    <!-- <div id="setTime">  -->
      <!-- <div class="col-sm-6">
            <label for="[object Object]">Percentual de Vagas(%):</label>
            <div id='lava_div' >
                          
            </div>
      </div>       -->
    <!-- </div> -->

    

    <!-- Example DataTables Card-->
    <div class="card mb-3" style="margin-top: 1.5%">

  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
