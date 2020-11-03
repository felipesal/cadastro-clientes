<?php

namespace App\Http\Controllers;


use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $clients = \App\Models\Client::paginate(15);
        return view('client.index', compact('clients'));
    }

    public function add(){
        return view('client.add');
    }

    public function save(ClientRequest $request){
        \App\Models\Client::create($request->all());
        $request->session()->flash('flash_message', [
            'msg' => "Cliente adicionado com sucesso",
            'class' => 'alert-success'
        ]);
        return redirect()->route('client.add');
    }

    public function edit(Request $request, $id){
        $cliente = \App\Models\Client::find($id);
        if(!$cliente){
            $request->session()->flash('flash_message', [
                'msg' => "Cliente não encontrado",
                'class' => 'alert-danger'
            ]);
            return redirect()->route('client.add');
        }

        return view('client.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        \App\Models\Client::find($id)->update($request->all());

        $request->session()->flash('flash_message', [
            'msg' => "Cliente atualizado com sucesso",
            'class' => 'alert-success'
        ]);
        return redirect()->route('client.index');
    }

    public function delete(Request $request, $id)
    {
        $client = \App\Models\Client::find($id);

        if(!$client->deleteTelefones()){
            $request->session()->flash('flash_message', [
                'msg' => "Cliente não pôde ser deletado",
                'class' => 'alert-danger'
            ]);
            return redirect()->route('client.index');
        }

        $client->delete();

        $request->session()->flash('flash_message', [
            'msg' => "Cliente deletado com sucesso",
            'class' => 'alert-success'
        ]);
        return redirect()->route('client.index');
    }

    public function details($id)
    {
        $client = \App\Models\Client::find($id);

        return view('client.details', compact('client'));
    }
}
