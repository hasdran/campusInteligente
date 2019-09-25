<?php

namespace App\Http\Controllers;

use Request;
use Khill\Lavacharts\Lavacharts;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsuariosController extends Controller
{
  public function gerarRelatorio() {
    $usuarios = User::all();

    return \PDF::loadView('usuariosRelatorio', compact('usuarios'))
        ->setPaper('A4', 'portrait')
        ->stream('relatorio_usuarios.pdf');
  }

  public function listar() {

    $usuarios = User::all();

    return view('usuarios')->with(compact('lava'))
                ->with('tipo', 'GaugeChart')->with('dados', $usuarios)->with('privilegio', parent::privilegio());
  }

  public function importar( request $request) {
    $arquivo = Request::file('text');
    if (empty($arquivo)) {
      echo "vazio";
    }
    $path = $arquivo->store('uploads');
    // // Efetua a Leitura do Arquivo
    $fp = fopen("../storage/app/".$path, "r");

    if ($fp != false) {
       // Array que receberá os dados do Arquivo
       $dados = array();

       while(!feof($fp)) {
         $linha = utf8_decode(fgets($fp));
         // Gera uma Senha Aleatória - 8 dígitos
         if(!empty($linha)) {
                   // Separa os dados
            $dados = explode("#", $linha);
            $usuario = new User();
            $usuario->name = $dados[0];
            $usuario->email = $dados[1];
            $usuario->cpf = $dados[2];
            $usuario->type = $dados[3];
            $usuario->telefone = $dados[4];
            $usuario->password = Hash::make($dados[5]);
            $usuario->remember_token = Hash::make($dados[5]);
            $usuario->save();
         }
       }
    }
    $usuarios = User::all();

    return view('usuarios')->with(compact('lava'))
                ->with('tipo', 'GaugeChart')
                ->with('dados', $usuarios)
                ->with('privilegio', parent::privilegio());
  }
}
