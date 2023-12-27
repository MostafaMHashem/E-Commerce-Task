<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SignUPApiRequest;
use App\Services\SignUPApiService;
use Illuminate\Http\Request;

class SignUPApiController extends Controller
{
    public function signUP(SignUPApiRequest $request){
        $validated_data = $request->validated();
        $service = new SignUPApiService();
        return $service->signUP($validated_data)->response();
    }
}//End of class
