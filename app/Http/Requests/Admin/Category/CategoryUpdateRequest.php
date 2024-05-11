<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title.*'     => 'required',
            'image'       => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'title.en.required' => 'title in english required',
            'title.ar.required' => 'title in arabic required',
        ];
    }

}
