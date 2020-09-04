<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentForm extends FormRequest
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
            'month' => 'required',
            'income' => 'required|numeric',
            'rent' => 'numeric|nullable',
            'utility' => 'numeric|nullable',
            'credit' => 'numeric|nullable',
            'etc' => 'numeric|nullable',
        ];
    }
}
