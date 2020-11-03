<?php

namespace App\Http\Controllers;

use App\Http\Requests\TelefoneRequest;
use App\Models\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add($id)
    {
        $client = \App\Models\Client::find($id);

        return view('telefone.add', compact('client'));
    }

    public function save(TelefoneRequest $request, $id)
    {
        $telefone = new Telefone();
        $telefone->numero = $request->input('numero');
        $cliente = \App\Models\Client::find($id);
        $cliente->addTelefone($telefone);

        $request->session()->flash('flash_message', [
            'msg' => "Telefone adicionado com sucesso ao cliente " . $cliente->name,
            'class' => 'alert-success'
        ]);
        return redirect()->route('client.details', $id);
    }

    public function edit(Request $request, $id)
    {
        ($telefone = Telefone::find($id));
        if(!$telefone){
            $request->session()->flash('flash_message', [
                'msg' => "Telefone não encontrado",
                'class' => 'alert-danger'
            ]);
            return redirect()->route('client.details', $telefone->client->id);
        }

        return view('telefone.edit', compact('telefone'));
    }

    public function update(Request $request, $id)
    {
        ($telefone = Telefone::find($id));
        $telefone->update($request->all());

        $request->session()->flash('flash_message', [
            'msg' => "Telefone atualizado com sucesso",
            'class' => 'alert-success'
        ]);
        return redirect()->route('client.details', $telefone->client_id);
    }
    public function delete(Request $request, $id)
    {
        $telefone = Telefone::find($id);

        $telefone->delete();

        $request->session()->flash('flash_message', [
            'msg' => "Telefone deletado com sucesso",
            'class' => 'alert-success'
        ]);
        return redirect()->route('client.details', $telefone->client_id);
    }
}
