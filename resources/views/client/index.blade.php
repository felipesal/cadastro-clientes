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
                        <li class="active"> Clientes</li>
                    </ol>

                    <div class="card-body">
                        <div>
                            <a class="btn btn-info" href="{{ route('client.add') }}">Adicionar</a>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <th scope="row">{{ $client->id }}</th>
                                        <td>{{ $client->name }}</td>
                                        <td>{{$client->email}}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('client.details', $client->id) }}">Detalhes</a>
                                            <a class="btn btn-warning" href="{{ route('client.edit', $client->id) }}">Editar</a>
                                            <a class="btn btn-danger" href="{{ route('client.delete', $client->id)}}" onclick="return confirm('Tem certeza que deseja deletar esse registro?');">Deletar</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        <div align="center">
                            {!! $clients->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
