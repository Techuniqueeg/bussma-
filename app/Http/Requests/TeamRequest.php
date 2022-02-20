<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'phone' => 'required|max:255|min:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'twitter' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'web' => 'nullable|url|max:255',
        ];
    }
}
