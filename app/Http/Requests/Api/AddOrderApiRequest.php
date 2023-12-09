<?php

namespace App\Http\Requests\Api\Cart;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class AddOrderApiRequest extends ApiMasterRequest
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

        $validator['cart_id'] = [
            'required',
            'array',
            'exists:carts,id',
        ];

        $validator['product_id'] = [
            'required',
            'exists:products,id',

        ];

        $validator['product_quantity'] = [
            'nullable',
            'integer',
            "min:1",
        ];

        $validator['user_address_id'] = [
            "required",
            "exists:user_info,id",
        ];



        return $validator;
    }
}
