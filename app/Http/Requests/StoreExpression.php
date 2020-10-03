<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpression extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'text' => ['required', 'unique:expressions,text', 'string', 'max:255'],
            'file' => ['required', 'file', 'mimes:gif'],
            'tags' => ['nullable', 'exists:tags,id'],
        ];
    }
}
