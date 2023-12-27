<?php

namespace App\Services;

use App\Constants\UserStatus;
use App\Http\Resources\UserResource;
use App\Models\Admin;
use App\Models\User\User;
use App\Response\DataStatus;
use App\Response\DataFailed;
use App\Response\DataSuccess;
use Illuminate\Support\Facades\Hash;

class SignInDashboardService
{
    public function postSignIn($data): DataStatus
    {
        try {

            $data["phone"] = $data["phone"] ?? null;
            $data["email"] = $data["email"] ?? null;

            $userPhone = $data["phone"] ? Admin::wherePhone($data["phone"])->first() : null;

            $userEmail = $data["email"] ? Admin::whereEmail($data["email"])->first() : null;


            if ($userPhone) {
                $user = $userPhone;
                $credentials["phone"] = $data['phone'];
                $credentials["password"] = $data['password'];
            } elseif ($userEmail) {
                $user = $userEmail;
                $credentials["email"] = $data['phone'];
                $credentials["password"] = $data['password'];
            } else {
                throw new \Exception("user not found");
            }

            if (auth()->guard('admin')->attempt($credentials, true)) {
                return new DataSuccess(
                    message: "user signed in successfully",
                );
            } else {
                throw new \Exception("invalid credentials");
            }


            //response


        } catch (\Throwable $th) {
            // throw $th;
            return new DataFailed(message: $th->getMessage());
        }
    }
}
