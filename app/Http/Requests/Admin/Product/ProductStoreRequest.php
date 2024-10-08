<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'content.*'   => 'nullable',
            'slug'        => 'required|alpha_dash|unique:products,slug',
            'price'       => 'required',
            'category_id' => 'required',
            'image'       => 'required',
            'images'      => 'nullable'
        ];
    }
}
