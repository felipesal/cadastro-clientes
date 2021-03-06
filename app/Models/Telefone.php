<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = ['numero'];
    public function cliente(){
        return $this->belongsTo('App\Models\Client');
    }
}
