<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // o default é false
        // responsavel por fazer a validação com acl, com permissões, com papéis dos seus usuários, você pode fazer uma validação para saber se o usuário tem permissão para executar o formulário
        // neste nosso caso estamos deixando passar por padrao
    }

    public function messages()
    {
      return [
          'nome.required'=>'Preencha um nome.',
          'nome.max'=>'Nome não pode exceder 255 caracteres.',
          'email.required'=>'Digite o e-mail',
          'email.email'=>'Preencha um e-mail válido',
          'email.max'=>'E-mail deve ter até 255 caracteres',
          'endereco.required'=>'Preencha um endereço'
      ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'=>'required|max:255',
            'email'=>'required|max:255',
            'endereco'=>'required'
        ];
    }
}
