@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Clientes</div>
                <div class="panel-body"> View de Lista de Clientes...  

                @foreach($clientes as $cliente)

                <p>{{ $cliente->nome }}</p>

                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
