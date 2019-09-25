@extends('main')
                                                   
<label>Vagas Disponíveis</label>
<div class="col-sm-6">
  <div>
      <img src="img/car-parking-icon.png"> 
      <h1>{{$vagasDisponiveis}}/{{$totalVagas}}</h1>
  </div>         
</div>

  <label for="[object Object]">Percentual de Vagas(%):</label>
  <div id='lava_div_ponteiro' >
    <?php echo $lava1->render($grafico_ponteiro, 'Dados1', 'lava_div_ponteiro'); ?>                
  </div>
   


        
