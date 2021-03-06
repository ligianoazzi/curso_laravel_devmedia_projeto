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

Route::get('/home', ['uses'=>'HomeController@index','as'=>'home.index']);


  // Route::get('/cliente', 'ClienteController@index'); forma sem uso de alias
  Route::get('/cliente', ['uses'=>'ClienteController@index','as'=>'cliente.index']);
  // nos links
 //  /cliente (é o que aparece na url)
 //  'uses'=>'ClienteController@index' (fazendo referencia ao controller de cliente)
 //  'as'=>'cliente.index' (determinando um apelido para fazer referencia a esta rota no sistema, assim se mudar o controller, não precisa mudar nas chamadas)





  Route::get('/cliente/adicionar', ['uses'=>'ClienteController@adicionar','as'=>'cliente.adicionar']);

  Route::post('/cliente/salvar',   ['uses'=>'ClienteController@salvar'   ,'as'=>'cliente.salvar']);

  Route::get('/cliente/editar/{id}',    ['uses'=>'ClienteController@editar'   ,'as'=>'cliente.editar']);
  // rota para montar a tela de editar
 // se o parametro não fosse obrigatório, seria assim -> {id?}

  Route::put('/cliente/atualizar/{id}',    ['uses'=>'ClienteController@atualizar'   ,'as'=>'cliente.atualizar']);

  Route::get('/cliente/deletar/{id}',    ['uses'=>'ClienteController@deletar'   ,'as'=>'cliente.deletar']);

  Route::get('/cliente/detalhe/{id}',    ['uses'=>'ClienteController@detalhe', 'as'=>'cliente.detalhe']);

  Route::get('/telefone/adicionar/{id}', ['uses'=>'TelefoneController@adicionar', 'as'=>'telefone.adicionar']);

  Route::post('/telefone/salvar/{id}', ['uses'=>'TelefoneController@salvar', 'as'=>'telefone.salvar']);





  Route::get('/telefone/editar/{id}', ['uses'=>'TelefoneController@editar',     'as'=>'telefone.editar']);
  // monta a tela do form

  Route::put('/telefone/atualizar/{id}',   ['uses'=>'TelefoneController@atualizar',  'as'=>'telefone.atualizar']);

  Route::get('/telefone/deletar/{id}',    ['uses'=>'TelefoneController@deletar',    'as'=>'telefone.deletar']);
