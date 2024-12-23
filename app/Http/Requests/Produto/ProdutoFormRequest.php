<?php


namespace App\Http\Requests\Produto;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => [
                'required',
            ],
            'preco' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é de preenchimento obrigatório',
            'preco.required' => 'Preço é de preenchimento obrigatório',
        ];
    }
}
