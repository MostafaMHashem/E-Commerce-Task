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

    // public function postSignIn(LoginDashboardRequest $request)
    // {

    //     if (auth()->guard('admin')->attempt(['phone' => $request->phone, 'password' => $request->password], true)) {
    //         return redirect()->route('admin.orders.index')
    //             ->with(['success' => __("messages.login successfully")]);
    //     }elseif(auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], true)){
    //         return redirect()->route('admin.orders.index')
    //             ->with(['success' => __("messages.login successfully")]);
    //     }
    //     return redirect()->back()->with(['error' => __("messages.phone or password may be wrong")]);
    // }
    public function postSignIn(LoginDashboardRequest $request)
    {
        $validated_data = $request->validated();
        $service = new SignInDashboardService();
        $response = $service->postSignIn($validated_data);
        return  $response->getStatus() == true ? redirect()->route('admin.orders.index') : redirect()->back()->with(['error' => $response->getMessage()]);
    }
}//End of controller
