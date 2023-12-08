<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SignInApiRequest;
use App\Services\SignInApiService;
use Illuminate\Http\Request;

class SignInApiController extends Controller
{
    public function signIn(SignInApiRequest $request){
        $validated_data = $request->validated();
        $service = new SignInApiService();
        return $service->signIn($validated_data)->response();
    }
}//End of class
