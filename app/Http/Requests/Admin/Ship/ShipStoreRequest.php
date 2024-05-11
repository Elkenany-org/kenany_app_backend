<?php

namespace App\Http\Requests\Admin\Ship;

use Illuminate\Foundation\Http\FormRequest;

class ShipStoreRequest extends FormRequest
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
            'name.*'      => 'required',
            'country'	  => 'required',
            'agent'	      => 'required',
            'load'	      => 'required',
            'date'	      => 'required',
            'dir_date' 	  => 'required',
            'product_id'  => 'required',
            'company_id'  => 'required',
            'port_id'	  => 'required',
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
