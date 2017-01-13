<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable  = ['titulo', 'telefone'];
    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    	// criando relacionamento com a model de cliente
    	// returna o único cliente a qual este telefone pertence
    	// belongsTo ... pertence a
    }
}
