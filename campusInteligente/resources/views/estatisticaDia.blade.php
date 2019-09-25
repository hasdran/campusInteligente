@extends ('main')
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr id="cabecalho">              
              <th>Horários</th>
              <th>Quantidade de Entradas</th>
              <th>Quantidade de Saídas</th>
              <th>Total</th>              
            </tr>
            </thead>
            <tbody>
            @php 
              echo $tabela;
            @endphp             
  
            </tbody>
          </table>
        </div>

