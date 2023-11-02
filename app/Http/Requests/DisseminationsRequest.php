<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisseminationsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'naslov' => 'required|string',
            'content' => 'required|string',
            'sadrzaj' => 'required|string',
            'photo' => 'nullable|file',
            'video' => 'nullable|url',
            'link' => 'nullable|url'
        ];
    }
}
