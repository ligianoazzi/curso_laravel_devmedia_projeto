<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	public function telefones()
	{
		return $this->hasMany('App\Telefone');
		// criando relacionamento com a model de telefone
		// retorna uma lista de telefones que pertencem a este cliente
		// hasMany ... tem muitos
	}

	public function addTelefone(Telefone $tel)
	{
		return $this->telefones()->save($tel);
		// cadastra no banco telefone referente a este cliente
		// recebe um objeto do tipo Telefone
		// telefones() aqui, é o mesmo telefones() da linha 9
		// manda salva na tabela de telefones o que ele recebe via addTelefone()
	}
}
