<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }// retirado de HomeController

    public function index()
    {
    	//$clientes = \App\Cliente::all();

 		  $clientes = \App\Cliente::paginate(5);
		  // vai trazer 15 registros e gerar paginação

    	//dd($clientes);
    	// dd(); é tipo o var_dump(); do php

    	return view('cliente.index',compact('clientes'));
    	// pasta cliente, arquivo index.php
    	//'clientes' faz referencia a $clientes
    }

    public function adicionar()
    {
        return view('cliente.adicionar');
    }

    /* o forma faz uma requisição post e a funcao, no Laravel, trata a requisicao usanco uma classe chamada request
      a variavel $meu_request recebe esses dados (ja tratados, pelo que eu entendi)
    */
    public function salvar(Request $meu_request)// aqui dentro
    {
      \App\Cliente::create($meu_request->all());

      \Session::flash('flash_message',[
        'msg'=>"Cliente adicionado com Sucesso",
        'class'=>"alert-success"
      ]);

      return redirect()->route('cliente.adicionar');
    }


}
