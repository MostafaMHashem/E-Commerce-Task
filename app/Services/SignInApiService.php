<?php

namespace App\Services;

use App\Constants\UserStatus;
use App\Http\Resources\UserResource;
use App\Models\User\User;
use App\Response\DataStatus;
use App\Response\DataFailed;
use App\Response\DataSuccess;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SignInApiService
{
    public function signIn($data): DataStatus
    {
        try {

            $data["phone"] = $data["phone"] ?? null;
            $data["email"] = $data["email"] ?? null;

            $userPhone = $data["phone"] ? User::wherePhone($data["phone"])->first() : null;

            $userEmail = $data["email"] ? User::whereEmail($data["email"])->first() : null;


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

            if (auth()->attempt($credentials)) {
                if ($user->status == UserStatus::blocked) {
                    throw new \Exception("user is blocked, please contact with admin");
                } else {
                    $user->update([
                        'api_token' =>  $user->createToken($data['device_name'] ?? ($user->user_devices->first()->device_name ?? Str::random(length: 60)))->plainTextToken,
                    ]);

                    //add device to user
                    $user->user_devices()->firstOrCreate([
                        'device_token' => $data['device_token'] ?? null,
                        'device_type' => $data['device_type'] ?? null,
                        'device_id' => $data['device_id'] ?? null,
                        'device_name' => $data['device_name'] ?? null,
                    ]);
                }
            } else {
                throw new \Exception("invalid credentials");
            }


            //response

            return new DataSuccess(
                resourceData: UserResource::make($user),
                message: "user signed in successfully",
            );
        } catch (\Throwable $th) {
            // throw $th;
            return new DataFailed(message: $th->getMessage());
        }
    }
}
