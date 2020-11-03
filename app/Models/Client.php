<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'email'];

    public function telefones()
    {
        return $this->hasMany('App\Models\Telefone');
    }

    public function addTelefone(Telefone $telefone)
    {
          return $this->telefones()->save($telefone);
    }

    public function deleteTelefones(){
        foreach ($this->telefones() as $telefone){
            $telefone->delete();
        }

        return true;
    }
}
