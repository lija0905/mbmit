<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResearchersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|string',
            'email' => 'required|string',
            'title' => 'required|string',
            'titula' => 'required|string',
            'photo' => 'nullable|file',
            'password' => 'nullable|string|confirmed',
            'password_confirmation' => 'nullable|string'
        ];
    }
}
