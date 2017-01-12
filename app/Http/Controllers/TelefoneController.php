<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adicionar($id)
    {
        $cliente = \App\Cliente::find($id);
        return view('telefone.adicionar', compact('cliente'));
        // montando a tela com o form para add telefone para o cliente recebido como parametro.
    }

    public function salvar(Request $request, $id)
    {
      $telefone = new \App\Telefone; // instanciando objeto telefone ... da model Telefone
      $telefone->titulo = $request->input('titulo');
      // $telefone->titulo é uma posição (até então) vazia do objeto telefone
      // $request->input('titulo') tá puxando do campo do form
      $telefone->telefone = $request->input('telefone');

      \App\Cliente::find($id)->addTelefone($telefone);
      // addTelefone é um método que está na model Cliente, ao passo que ele encontrou o cliente ao mesmo tempo já usou o método da model Cliente para adicionar um telefone a ele
      // o find($id), acho que é direto do Eloquent

      \Session::flash('flash_message',[
        'msg'=>"Telefone adicionado com Sucesso",
        'class'=>"alert-success"
      ]);

      return redirect()->route('cliente.detalhe', $id);



    }
}
