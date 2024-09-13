<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:30',
            'descricao' => 'required|string',
            'midia' => 'nullable|image|max:2048',
            'anexo' => 'nullable|mimes:pdf,doc,docx|max:2048'
        ];
    }
}
