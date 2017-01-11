@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <ol class="breadcrumb panel-heading">
                  @if (!Auth::guest()) <!-- se não estiver logado, exibe -->
                    <li class="active">Cliente</li>
                  @endif
                </ol>


                <div class="panel-body">

                  <a class="btn btn-info"  href="{{ route('cliente.adicionar') }}">Adicionar</a>

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Endereço</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($clientes as $cliente)

                      <tr>
                        <th scope="row">{{ $cliente->id }}</th>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->endereco }}</td>
                        <td>
                            <a class="btn btn-default" href="#">Editar</a>
                            <a class="btn btn-danger"  href="#">Deletar</a>
                        </td>
                      </tr>

                      <!-- qual a financeira que você trabalha?
                          Estes dias passei a ficha pra uma moto e passou na portocred e na santander financiamentos, visto que não tenho restrição nem em SPC nem Serasa



                    -->

                      @endforeach

                    </tbody>

                  </table>



                </div>

                <div align="center">
                    {{ $clientes->links() }}
                    <!-- as exclamações servem pra poder interpretar Html dentro do {{}}, que vem a ser o echo do php -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
