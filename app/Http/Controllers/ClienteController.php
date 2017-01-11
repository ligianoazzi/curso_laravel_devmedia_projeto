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

    public function editar($id)
    {
        $cliente = \App\Cliente::find($id);
        // aqui já está jogando os dados do cliente na variável cliente (array)

        if(!$cliente){// se não existir cliente com este id
          \Session::flash('flash_message',[
            'msg'=>"Cliente inexistente! Deseja cadastrar um novo cliente?",
            'class'=>"alert-danger"
          ]);
          return redirect()->route('cliente.index');
        }

        return view('cliente.editar', compact('cliente'));
        // em compact('cliente') está mandando os dados de $cliente
    }

    public function atualizar(Request $request, $id)
    {
        \App\Cliente::find($id)->update($request->all());
        // aqui já está jogando os dados do cliente na variável cliente (array)

          \Session::flash('flash_message',[
            'msg'=>"Cliente atualizado com sucesso!",
            'class'=>"alert-success"
          ]);

          return redirect()->route('cliente.index');

        // em compact('cliente') está mandando os dados de $cliente
    }

    public function deletar($id)
    {
        $cliente = \App\Cliente::find($id);
        // buscando o objeto cliente

        if(!$cliente->deletarTelefones()){
            \Session::flash('flash_message',[
              'msg'=>"Registro não pode ser deletado!",
              'class'=>"alert-danger"
            ]);
            return redirect()->route('cliente.index');
        }// deletando os telefones deste cliente, senão a integridade referencial não deixa

        $cliente->delete();
        // deletando o cliente

        \Session::flash('flash_message',[
          'msg'=>"Cliente deletado com sucesso!",
          'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.index');
    }
}
