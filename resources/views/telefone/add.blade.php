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
                            <li> / </li>
                            <li><a href="{{ route('client.details', $client->id) }}">Detalhes</a></li>
                            <li> / </li>
                            <li class="active">Adicionar</li>
                        </ol>
                        <div class="card-body">
                            <form action="{{ route('telefone.save', $client->id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group" {{ $errors->has('numero') ? 'has-error' : ""}}>
                                    <label for="numero">Número</label>
                                    <input type="text" name="numero" class="form-control" placeholder="Número do telefone">
                                    @if($errors->has('numero'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('numero') }}</strong>
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
