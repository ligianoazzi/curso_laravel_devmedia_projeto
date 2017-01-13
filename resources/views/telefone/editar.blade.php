@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                  <li> <a href="{{ route('cliente.index') }}">Clientes</a> </li>
                  <li> <a href="{{ route('cliente.detalhe', $telefone->cliente->id) }}">Detalhe</a> </li>
                  <li class="active">Editar</li>
                </ol>

                <div class="panel-body">
                  <form action="{{ route('telefone.atualizar', $telefone->id) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <!-- precisa deste campo para mandar por put, no REST atualizar é feito com PUT -->

                      <p>{{$telefone->cliente->nome}}</p>
                      <div class="form-group">
                          <label for="nome">Título</label>
                          <input type="text" name="titulo" class="form-control" placeholder="Título do Telefone" value="{{ $telefone->titulo }}">
                      </div>
                      <div class="form-group">
                          <label for="nome">Número</label>
                          <input type="text" name="telefone" class="form-control" placeholder="Número do Telefone" value="{{ $telefone->telefone }}">
                      </div>
                      <button class="btn btn-info">Atualizar</button>

                  </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
