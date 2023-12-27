<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LoginDashboardRequest;
use App\Services\SignInDashboardService;
use Illuminate\Http\Request;

class SignInDashboardController extends Controller
{
    protected $view = 'dashboard.auth.';
    public function signIn()
    {
        return view($this->view . 'login');
    }

    public function postSignIn(LoginDashboardRequest $request)
    {
        $validated_data = $request->validated();
        $service = new SignInDashboardService();
        $response = $service->postSignIn($validated_data);
        return  $response->getStatus() == true ? redirect()->route('admin.orders.index') : redirect()->back()->with(['error' => $response->getMessage()]);
    }
}//End of controller
