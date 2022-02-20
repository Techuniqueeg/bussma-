<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'logo' => 'required|mimes:jpeg,jpg,png',
            'site_name' => 'required|string|max:191',
            'phone' => 'required|max:191|min:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'location' => 'nullable|string|max:191',
            'location_url' => 'nullable|url|max:191',
            'whatsapp' => 'nullable|url|max:191',
            'description' => 'required|string|max:191',
            'copyright' => 'required|string|max:191',
        ];
    }
}
