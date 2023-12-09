<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class SignUPApiRequest extends ApiMasterRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $validator = [];

        $validator['name'] = [
            'required',
            'string',

        ];

        $validator['email'] = [
            'nullable',
            'email',
            "unique:users,email",
        ];

        $validator['phone'] = [
            'nullable',
            'string',
            'min:11',
            "unique:users,phone",
            Rule::requiredIf(function () {
                return $this->get('email') == null;
            })
        ];

        $validator['password'] = [
            'required',
            Password::defaults(),
        ];

        return $validator;
    }
}
