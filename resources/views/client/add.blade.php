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
                            <li class="active"> / Adicionar</li>
                        </ol>
                    <div class="card-body">
                        <form action="{{ route('client.save') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group" {{ $errors->has('name') ? 'has-error' : ""}}>
                                <label for="name">Nome</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome do Cliente">
                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group" {{ $errors->has('email') ? 'has-error' : ""}}>
                                <label for="email">E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="E-mail do Cliente">
                                @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button class="btn btn-success">Adicionar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
