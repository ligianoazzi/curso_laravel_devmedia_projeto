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

    public function salvar(\App\Http\Requests\TelefoneRequest $request, $id)
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

    public function editar($id) // monta a tela do form
    {
        $telefone = \App\Telefone::find($id);

        if(!$telefone){// se não existir cliente com este id
          \Session::flash('flash_message',[
            'msg'=>"Não existe este telefone cadastrado!",
            'class'=>"alert-danger"
          ]);
          return redirect()->route('cliente.detalhe', $telefone->cliente->id);
          // $telefone tem o objeto da model telefone de acordo com o id recebido como parametro
          // ->cliente vem da Model de Telefone, é um método, e ele pega o campo id
        }

        return view('telefone.editar', compact('telefone'));
        // em compact('cliente') está mandando os dados de $cliente
    }


    public function atualizar(Request $request, $id)
    {
        $telefone = \App\Telefone::find($id);
        $telefone->update($request->all());
        // aqui já está jogando os dados do cliente na variável cliente (array)
        // não esquecer de colocar o fillable na model telefone

          \Session::flash('flash_message',[
            'msg'=>"Telefone atualizado com sucesso!",
            'class'=>"alert-success"
          ]);

          return redirect()->route('cliente.detalhe', $telefone->cliente->id);

        // em compact('cliente') está mandando os dados de $cliente
    }


    public function deletar($id)
    {
        $telefone = \App\Telefone::find($id);
        // buscando o objeto cliente

        $telefone->delete();
        // deletando o cliente

        \Session::flash('flash_message',[
          'msg'=>"Telefone deletado com sucesso!",
          'class'=>"alert-success"
        ]);

        return redirect()->route('cliente.detalhe', $telefone->cliente->id);
    }

}
