<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        $logoValidationRules = 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100';

        if ($this->isMethod('put')) {
            $email = 'required|email|unique:companies|max:255';
        }
        $email = 'required|email|unique:companies|max:255' . $this->id;

        return [
            'name' => "required",
            'email' => $email,
            'logo' => $logoValidationRules,
            'website' => 'required',
        ];
    }
}
