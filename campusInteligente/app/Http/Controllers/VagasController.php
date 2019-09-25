<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\User;
use App\OcupacaoModel;
use App\EntradaModel;
use Carbon\Carbon;
class VagasController extends Controller
{
  public function visualizar()
  {

    Carbon::setLocale('pt_BR');
    $data = Carbon::now('America/Belem')->format('Y-m-d');

    $entrada = OcupacaoModel::select('id_entrada')
                ->where('id_entrada', '!=', null)
                ->where('data', '=', $data)
                ->get()
                ->count();

    $saida = OcupacaoModel::select('id_saida')
                ->where('id_saida', '!=', null)
                ->where('data', '=', $data)
                ->get()
                ->count();

    $qtdeCarros = $entrada - $saida;
    $totalVagas = 50;
    $vagasDisponiveis = $totalVagas - $qtdeCarros;
    $lava1 = new Lavacharts;
    $graficoPonteiro = $lava1->DataTable();
    $percentual = ($qtdeCarros/$totalVagas)*100;
    $percentual = number_format($percentual, 0, '.', ',');

    $graficoPonteiro->addStringColumn('Carros')
          ->addNumberColumn('Percentual- %')
          ->addRow(['', $percentual]);

    $lava1->GaugeChart('Dados1', $graficoPonteiro, [
        'width'      => 1000,
        'greenFrom'  => 0,
        'greenTo'    => 49,
        'yellowFrom' => 50,
        'yellowTo'   => 79,
        'redFrom'    => 80,
        'redTo'      => 100,
        'majorTicks' => [
            'Normal',
            'Crítico'
        ]
    ]);
    return view('vagas')
                ->with(compact('lava1'))
                ->with('grafico_ponteiro', 'GaugeChart')
                ->with('total', $totalVagas)
                ->with('vagasDisponiveis', $vagasDisponiveis)
                ->with('privilegio', parent::privilegio());
  }
}
