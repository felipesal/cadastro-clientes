
@extends('layouts.app')

@section('content')
    @if(session()->has('flash_message'))
        <div class="container">
            <div class="row">

                <div class="col-md-offset-12">
                    <div align="center" class="alert {{ session()->get('flash_message')['class'] }}">
                        {{session()->get('flash_message')['msg']}}
                    </div>
                </div>
            </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <ol class="breadcrumb card-header">
                            <li><a href="{{ route('client.index') }}">Clientes</a></li>
                            <li class="active"> / Detalhes</li>
                        </ol>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <p><b>Cliente: </b>{{ $client->name }}</p>
                            <p><b>E-mail: </b>{{ $client->email }}</p>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Telefone</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($client->telefones as $telefone)
                                    <tr>
                                        <th scope="row">{{ $telefone->id }}</th>
                                        <td>{{ $telefone->numero }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{ route('telefone.edit', $telefone->id) }}">Editar</a>
                                            <a class="btn btn-danger" href="{{ route('telefone.delete', $telefone->id) }}" onclick="return confirm('Tem certeza que deseja deletar esse registro?');">Deletar</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                <div>
                                    <a class="btn btn-info" href="{{ route('telefone.add', $client->id) }}">Adicionar Telefone</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
