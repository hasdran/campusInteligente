<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\User;
use App\OcupacaoModel;
use App\EntradaModel;
use Carbon\Carbon;

class getVagas extends Controller
{
    public function index()
    {

        Carbon::setLocale('pt_BR');
        $data = Carbon::now('America/Belem')->format('Y-m-d');
        
        $lava1 = new Lavacharts;     

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
        
        
        $qtdeCarros = $entrada-$saida;
        $totalVagas = 55;
        $vagasDisponiveis = $totalVagas - $qtdeCarros;       
        if ($vagasDisponiveis>55) {
            $vagasDisponiveis = 55;
        } else if($vagasDisponiveis < 0) {
            $vagasDisponiveis = 0;
        }
        
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
        
        return view ('teste')
            ->with(compact('lava1'))
            ->with('grafico_ponteiro', 'GaugeChart')
            ->with('totalVagas',$totalVagas)    
            ->with('vagasDisponiveis',$vagasDisponiveis);
    }
}
