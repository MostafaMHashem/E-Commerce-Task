<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ApiMasterRequest extends FormRequest
{
    public function expectsJson()
    {
        return true;
    }


    
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => $validator->errors()
        ], 400));
    }
}
