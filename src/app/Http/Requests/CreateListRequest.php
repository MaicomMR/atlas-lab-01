<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'nome' => 'required|max:100|min:1|string',
                'descricao' => 'required|max:100|min:1',
        ]; 
    }


    public function messages()
    {
        return [
            'nome.required' => "O campo Nome é obrigatorio!",
        ];
    }

}
