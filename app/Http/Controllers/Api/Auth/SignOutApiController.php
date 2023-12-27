<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SignInApiRequest;
use App\Services\SignOutApiService;
use Illuminate\Http\Request;

class SignOutApiController extends Controller
{
    public function signOut(){
        // $validated_data = $request->validated();
        $service = new SignOutApiService();
        $validated_data['user_id'] = auth()->user()->id;
        return $service->signOut($validated_data)->response();
    }
}//End of class
