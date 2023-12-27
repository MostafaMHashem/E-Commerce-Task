<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignoutDashboardController extends Controller
{
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.auth.signIn')->with(['success'=> __("messages.logout successfully")]);
    }
}
