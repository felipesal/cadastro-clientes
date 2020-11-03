<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
          'name.required' => 'Preencha um nome',
          'name.max'=>'Nome deve ter no máximo 255 caracteres',
          'email.required'=>'Preencha o e-mail',
          'email.email' => 'Preencha um e-mail válido',
          'email.max'=>'E-mail deve ter no máximo 255 caracteres'
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
            'name' => 'required|max:255',
            'email'=> 'required|email|max:255'
        ];
    }
}
