@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                  <li> <a href="{{ route('cliente.index') }}">Clientes</a> </li>
                  <li class="active">Editar</li>
                </ol>

                <div class="panel-body">
                  <form action="{{ route('cliente.atualizar', $cliente->id) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <!-- está alterando o método do formulário, será put -->
                    <!-- mas continua usando o action -->

                      <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="Nome do cliente" value="{{$cliente->nome}}">
                      </div>
                      <div class="form-group">
                        <label for="nome">E-mail</label>
                        <input type="text" name="email" class="form-control" placeholder="E-mail do cliente" value="{{$cliente->email}}">
                      </div>
                      <div class="form-group">
                        <label for="nome">Endereço</label>
                        <input type="text" name="endereco" class="form-control" placeholder="Endereço do cliente" value="{{$cliente->endereco}}">
                      </div>
                      <button class="btn btn-info">Adicionar</button>

                  </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
