@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

              <ol class="breadcrumb panel-heading">
                <li> <a href="{{ route('cliente.index') }}">Clientes</a> </li>
                <li class="active">Detalhe</li>
              </ol>


                <div class="panel-body">
                  <p><b> Cliente: </b>{{ $cliente->nome }}</p>
                  <p><b> E-mail: </b>{{ $cliente->email }}</p>
                  <p><b> Endereço: </b>{{ $cliente->telefone }}</p>

                  <!-- este $cliente->nome  vem do método do controller que chamou esta view
                  ex.:    $cliente = \App\Cliente::find($id);
                          return view('cliente.detalhe', compact('cliente'));
                -->


                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Número</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($cliente->telefones as $telefone)
                      <!-- $cliente->telefones faz referência ao método telefones() na model Cliente -->
                      <tr>
                        <th scope="row">{{ $telefone->id }}</th>
                        <td>{{ $telefone->titulo }}</td>
                        <td>{{ $telefone->telefone }}</td>
                        <td>
                            <a class="btn btn-default" href="#">Editar</a>
                            <a class="btn btn-danger"  href="javascript:(confirm('Deletar este cliente?') ? window.location.href='#' : console.log('desistiu de deletar cliente '+{{$cliente->id}}))">Deletar</a>
                        </td>
                      </tr>
                      @endforeach

                    </tbody>

                  </table>

                  <p>
                    <a class="btn btn-info"  href="#">Adicionar Telefone</a>
                  </p>



                </div>


            </div>
        </div>
    </div>
</div>
@endsection
