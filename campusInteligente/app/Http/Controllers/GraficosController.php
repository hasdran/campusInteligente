<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

use App\User;
use App\OcupacaoModel;
use App\EntradaModel;
use App\SaidaModel;
use Carbon\Carbon;
class GraficosController extends Controller
{
  public function visualizar()
  {
    Carbon::setLocale('pt_BR');
    $data = Carbon::now('America/Belem')->format('Y-m-d');

    $horarioSaida0 = SaidaModel::select('id')
    ->where('hora', '>=', '06:00:00')
    ->where('hora', '<', '08:00:00')
    ->where('data', '=', $data)
    ->get()
    ->count();

    $horarioSaida1 = SaidaModel::select('id')
            ->where('hora', '>=', '08:00:00')
            ->where('hora', '<', '10:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horarioSaida2 = SaidaModel::select('id')
            ->where('hora', '>=', '10:00:00')
            ->where('hora', '<', '12:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horarioSaida3 = SaidaModel::select('id')
            ->where('hora', '>=', '12:00:00')
            ->where('hora', '<', '14:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horarioSaida4 = SaidaModel::select('id')
            ->where('hora', '>=', '14:00:00')
            ->where('hora', '<', '16:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horarioSaida5 = SaidaModel::select('id')
            ->where('hora', '>=', '16:00:00')
            ->where('hora', '<', '18:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();
    $horarioSaida6 = SaidaModel::select('id')
            ->where('hora', '>=', '18:00:00')
            ->where('hora', '<', '20:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();
    $horarioSaida7 = SaidaModel::select('id')
            ->where('hora', '>=', '20:00:00')
            ->where('hora', '<', '22:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();
    $horarioSaida8 = SaidaModel::select('id')
            ->where('hora', '>=', '22:00:00')
            ->where('hora', '<', '00:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

        $horario0 = EntradaModel::select('id')
                ->where('hora', '>=', '06:00:00')
                ->where('hora', '<', '08:00:00')
                ->where('data', '=', $data)
                ->get()
                ->count();

        $horario1 = EntradaModel::select('id')
                    ->where('hora', '>=', '08:00:00')
                    ->where('hora', '<', '10:00:00')
                    ->where('data', '=', $data)
                    ->get()
                    ->count();

        $horario2 = EntradaModel::select('id')
                    ->where('hora', '>=', '10:00:00')
                    ->where('hora', '<', '12:00:00')
                    ->where('data', '=', $data)
                    ->get()
                    ->count();

        $horario3 = EntradaModel::select('id')
                    ->where('hora', '>=', '12:00:00')
                    ->where('hora', '<', '14:00:00')
                    ->where('data', '=', $data)
                    ->get()
                    ->count();

        $horario4 = EntradaModel::select('id')
                    ->where('hora', '>=', '14:00:00')
                    ->where('hora', '<', '16:00:00')
                    ->where('data', '=', $data)
                    ->get()
                    ->count();

        $horario5 = EntradaModel::select('id')
                    ->where('hora', '>=', '16:00:00')
                    ->where('hora', '<', '18:00:00')
                    ->where('data', '=', $data)
                    ->get()
                    ->count();
        $horario6 = EntradaModel::select('id')
                    ->where('hora', '>=', '18:00:00')
                    ->where('hora', '<', '20:00:00')
                    ->where('data', '=', $data)
                    ->get()
                    ->count();
        $horario7 = EntradaModel::select('id')
                    ->where('hora', '>=', '20:00:00')
                    ->where('hora', '<', '22:00:00')
                    ->where('data', '=', $data)
                    ->get()
                    ->count();
        $horario8 = EntradaModel::select('id')
                    ->where('hora', '>=', '22:00:00')
                    ->where('hora', '<', '00:00:00')
                    ->where('data', '=', $data)
                    ->get()
                    ->count();                    
         $lava = new Lavacharts;
         $graficoColuna = $lava->DataTable();

        $graficoColuna->addStringColumn('Estacionamento')
                ->addNumberColumn('Quantidade de Veiculos')
                ->addRow(['6h - 8h', $horario0-$horarioSaida0])
                ->addRow(['8h - 10h', $horario1-$horarioSaida1])
                ->addRow(['10h - 12h', $horario2-$horarioSaida2])
                ->addRow(['12h - 14h', $horario3-$horarioSaida3])
                ->addRow(['14h - 16h', $horario4-$horarioSaida4])
                ->addRow(['16h - 18h', $horario5-$horarioSaida5])
                ->addRow(['18h - 20h', $horario6-$horarioSaida6])
                ->addRow(['20h - 22h', $horario7-$horarioSaida7])
                ->addRow(['22h - 00h', $horario8-$horarioSaida8]);

        $lava->ColumnChart('Dados', $graficoColuna, [
            'width'      => 1000,
            'title' => 'Concentração de Veículos / Horário',
            'titleTextStyle' => [
                'color'    => '#030101',
                'fontSize' => 16
            ]
        ]);


    return view('graficos')
                ->with(compact('lava'))
                ->with('grafico_coluna', 'ColumnChart')
                ->with('privilegio', parent::privilegio());
  }

  public function visualizarDia()
  {
    $array = [];
    $arraySaida = [];
    Carbon::setLocale('pt_BR');
    $data = Carbon::now('America/Belem')->format('Y-m-d');

    $horarioSaida0 = SaidaModel::select('id')
    ->where('hora', '>=', '06:00:00')
    ->where('hora', '<', '08:00:00')
    ->where('data', '=', $data)
    ->get()
    ->count();

    $horarioSaida1 = SaidaModel::select('id')
            ->where('hora', '>=', '08:00:00')
            ->where('hora', '<', '10:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horarioSaida2 = SaidaModel::select('id')
            ->where('hora', '>=', '10:00:00')
            ->where('hora', '<', '12:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horarioSaida3 = SaidaModel::select('id')
            ->where('hora', '>=', '12:00:00')
            ->where('hora', '<', '14:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horarioSaida4 = SaidaModel::select('id')
            ->where('hora', '>=', '14:00:00')
            ->where('hora', '<', '16:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horarioSaida5 = SaidaModel::select('id')
            ->where('hora', '>=', '16:00:00')
            ->where('hora', '<', '18:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();
    $horarioSaida6 = SaidaModel::select('id')
            ->where('hora', '>=', '18:00:00')
            ->where('hora', '<', '20:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();
    $horarioSaida7 = SaidaModel::select('id')
            ->where('hora', '>=', '20:00:00')
            ->where('hora', '<', '22:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();
    $horarioSaida8 = SaidaModel::select('id')
            ->where('hora', '>=', '22:00:00')
            ->where('hora', '<', '00:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horario0 = EntradaModel::select('id')
    ->where('hora', '>=', '06:00:00')
    ->where('hora', '<', '08:00:00')
    ->where('data', '=', $data)
    ->get()
    ->count();

    $horario1 = EntradaModel::select('id')
            ->where('hora', '>=', '08:00:00')
            ->where('hora', '<', '10:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horario2 = EntradaModel::select('id')
            ->where('hora', '>=', '10:00:00')
            ->where('hora', '<', '12:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horario3 = EntradaModel::select('id')
            ->where('hora', '>=', '12:00:00')
            ->where('hora', '<', '14:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horario4 = EntradaModel::select('id')
            ->where('hora', '>=', '14:00:00')
            ->where('hora', '<', '16:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();

    $horario5 = EntradaModel::select('id')
            ->where('hora', '>=', '16:00:00')
            ->where('hora', '<', '18:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();
    $horario6 = EntradaModel::select('id')
            ->where('hora', '>=', '18:00:00')
            ->where('hora', '<', '20:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();
        $horario7 = EntradaModel::select('id')
            ->where('hora', '>=', '20:00:00')
            ->where('hora', '<', '22:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();
        $horario8 = EntradaModel::select('id')
            ->where('hora', '>=', '22:00:00')
            ->where('hora', '<', '00:00:00')
            ->where('data', '=', $data)
            ->get()
            ->count();            
            
    array_push($array, $horario0, $horario1, $horario2, $horario3, $horario4, $horario5, $horario6, $horario7, $horario8);
    array_push($arraySaida, $horarioSaida0, $horarioSaida1, $horarioSaida2, $horarioSaida3, $horarioSaida4, $horarioSaida5, $horarioSaida6, $horarioSaida7, $horarioSaida8);    
        $str = "";
        $cont = 6;
         for ($i=0; $i < 9; $i++) {                 
                $str = $str . "<td>" . $cont . "h - "; 
                $cont+=2;
                if($cont == 24){
                        $cont = 0;
                }
                $str = $str . $cont."h </td>";
               // $str = $str . "<td>" . .'h - '; $cont+=2; echo $cont.'h' . "</td>";
                $str = $str . "<td>" . $array[$i] . "</td>";       
                $str = $str . "<td>" . $arraySaida[$i] . "</td>";
                $total = $array[$i]-$arraySaida[$i];
                $str = $str . "<td>" .$total. "</td>";
                $str = $str . "</tr>";
         }
        
       //echo $str;
    return view('estatisticaDia')
              ->with('tabela', $str)
              ->with('privilegio', parent::privilegio());      
  }
  
  public function visualizarMes()
  {
     return view('estatisticaMes')
     ->with('privilegio', parent::privilegio());      
  }

}
