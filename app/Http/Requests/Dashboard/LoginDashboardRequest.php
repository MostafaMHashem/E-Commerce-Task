<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginDashboardRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        $validator = [];
        $validator['email'] = [
            'nullable',
            'email',
        ];

        $validator['phone'] = [
            'nullable',
            'string',
            Rule::requiredIf(function () {
                return $this->get('email') == null;
            })
        ];

        $validator['password'] = [
            'required',
            'string',
        ];
        return $validator;
    }
}
