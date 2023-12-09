<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.auth.login')->with(['success'=> __("messages.logout successfully")]);
    }
}
