<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('principal');
// });

  Route::get('teste', 'getVagas@index');

  Route::get('/', 'VagasController@visualizar');

  Route::get('/usuarios', 'UsuariosController@listar');
  Route::get('/graficos', 'GraficosController@visualizar');
  Route::get('/estatisticasDia', 'GraficosController@visualizarDia');
  Route::get('/estatisticasMes', 'GraficosController@visualizarMes');
  Route::get('/relatorio', 'UsuariosController@gerarRelatorio');
  Route::post('/importarUsuarios', 'UsuariosController@importar');




Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function() {
    Auth::logout();
    Session::flush();
    return Redirect::to('/login');
});