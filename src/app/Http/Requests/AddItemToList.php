<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddItemToList extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'item' => 'required|max:100|min:1|string',
        'quantidade' => 'required|max:100|min:1|integer',
        'lista_id' => 'required|integer'    
        ];
    }

    public function messages()
    {
        return [
        'item.required' => "O campo Produto é obrigatorio!",
        'quantidade.required' => "O campo quantidade é obrigatorio!",
        'quantidade.integer' => "O campo quantidade deve receber um numero",
        ];
    }
}
