<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// todos as rotas que estiverem daqui para baixo precisarão estar çlogados para passar
// se não estiver logado, em app\Http\Middleware\RedirectIfAuthenticated.php linha 21, está a configuração de redirecionamento


  // Route::get('/cliente', 'ClienteController@index'); forma sem uso de alias
  Route::get('/cliente', ['uses'=>'ClienteController@index','as'=>'cliente.index']);
  // nos links

  Route::get('/cliente/adicionar', ['uses'=>'ClienteController@adicionar','as'=>'cliente.adicionar']);

  Route::post('/cliente/salvar',   ['uses'=>'ClienteController@salvar'   ,'as'=>'cliente.salvar']);

  Route::get('/cliente/editar/{id}',    ['uses'=>'ClienteController@editar'   ,'as'=>'cliente.editar']);
  // rota para montar a tela de editar
 // se o parametro não fosse obrigatório, seria assim -> {id?}

  Route::put('/cliente/atualizar/{id}',    ['uses'=>'ClienteController@atualizar'   ,'as'=>'cliente.atualizar']);
