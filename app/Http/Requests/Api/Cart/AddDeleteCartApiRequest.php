<?php

namespace App\Http\Requests\Api\Cart;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class AddDeleteCartApiRequest extends ApiMasterRequest
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
            'nullable',
            Rule::requiredIf(function () {
                return Request::is('api/delete_from_cart') ? true : false ;
            }),
            'exists:carts,id',
        ];

        $validator['product_id'] = [
            'nullable',
            Rule::requiredIf(function () {
                return Request::is('api/add_to_cart') ? true : false ;
            }),
            'exists:products,id',

        ];

        $validator['product_quantity'] = [
            'nullable',
            'integer',
            "min:1",
        ];



        return $validator;
    }
}
