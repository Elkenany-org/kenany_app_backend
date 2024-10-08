<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
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
            'address.*'                 => 'required',
            'phone.*'                   => 'required',
            'email.*'                   => 'required',
            'about_section_title.*'     => 'required',
            'about_section_content.*'   => 'required',
            'show_section_content.*'    => 'required',
            'show_section_video.en'     => 'nullable',
            'about_page_title.en'       => 'nullable',
            'contact_page_title.en'     => 'nullable',
            'tours_page_title.en'       => 'nullable',
            'faq_page_title.en'         => 'nullable',
        ];
    }

}
