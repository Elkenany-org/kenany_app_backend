<?php

namespace App\Http\Requests\Admin\Service;

use App\Helpers\TranslationHelper;
use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
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
            'name.*'     => 'required',
            'image'       => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ];
    }

    public function messages()
    {
        return [
            'title.ar.required' => TranslationHelper::translate('title_in_english_required' , 'message'),   
            'title.en.required' => TranslationHelper::translate('title_in_araic_required' , 'message'),   
            'image.required'    => TranslationHelper::translate('image_required' , 'message'),
            'image.image'       => TranslationHelper::translate('file_must_be_image' , 'message'),
            'image.mimes'       => TranslationHelper::translate('file_extention_not_supported' , 'message'),
        ];
    }
}
