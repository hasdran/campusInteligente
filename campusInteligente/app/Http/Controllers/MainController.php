<?php

namespace App\Http\Controllers;

use Request;
use Khill\Lavacharts\Lavacharts;
use App\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
  public function mostrar() {

//    if (parent::privilegio() == 0) { return view('principal')->with('tipo', ); }
    return view('principal')->with('privilegio', parent::privilegio());
  }
}
