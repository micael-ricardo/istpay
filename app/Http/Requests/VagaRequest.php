<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VagaRequest extends FormRequest
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
        return [
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'tipo' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O campo Titulo é obrigatório.',
            'titulo.string' => 'O campo Titulo deve ser uma string.',
            'titulo.max' => 'O campo Titulo deve ter no máximo :max caracteres.',
            'descricao.required' => 'O campo Descrição é obrigatório.',
            'descricao.string' => 'O campo Descrição deve ser uma string.',
            'tipo.required' => 'O campo tipo é obrigatório.',
            'tipo.string' => 'O campo Tipo deve ser uma string.',
            'tipo.max' => 'O campo Tipo deve ter no máximo :max caracteres.',
        ];
    }
}
