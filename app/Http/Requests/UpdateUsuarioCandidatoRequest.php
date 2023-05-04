<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUsuarioCandidatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
      public function rules(): array
    {

        $userId = Auth::id();

        return [
            'nome' => 'required',
            'email' => 'required|email|unique:users,email,' .  $userId,
            'telefone' => 'required',
            'curriculo' => 'required|string',
            'password' =>  'nullable|min:8|confirmed'
        ];

    }
        public function messages(): array
    {
        return [
            'nome.required' => 'O campo de nome é obrigatório.',
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'Insira um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso.',
            'telefone.required' => 'O campo de telefone é obrigatório.',
            'curriculo.required' => 'O campo currículo é obrigatório.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.'
        ];
    }
}
