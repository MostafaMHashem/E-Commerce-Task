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
        return $service->postSignIn($validated_data)->redirect('admin.orders.index');
    }
}//End of controller
