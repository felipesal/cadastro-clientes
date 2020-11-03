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
                            <li class="active"> / Editar</li>
                        </ol>
                    <div class="card-body">
                        <form action="{{ route('client.update', $cliente->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" name="name" class="form-control" value={{$cliente->name}}>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" class="form-control" value={{ $cliente->email }}>
                            </div>
                            <button class="btn btn-success">Atualizar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
