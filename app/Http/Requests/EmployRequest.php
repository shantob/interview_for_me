<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployRequest extends FormRequest
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
        if ($this->isMethod('put')) {
            $email = 'required|email|unique:companies|max:255';
        }
        $email = 'required|email|unique:companies|max:255' . $this->id;

        return [
            'first_name' => 'required|string|max:255',
            'lust_name' => 'string|max:255',
            'company_id' => 'required',
            'phone' => 'required|min:11|max:15',
            'email' => $email,
        ];
    }
}
