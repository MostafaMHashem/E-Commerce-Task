<?php

namespace App\Services;

use App\Constants\UserStatus;
use App\Http\Resources\UserResource;
use App\Models\User\User;
use App\Response\DataStatus;
use App\Response\DataFailed;
use App\Response\DataSuccess;
use Illuminate\Support\Facades\Hash;

class SignUPApiService
{
    public function signUp($data): DataStatus
    {
        try {

            $userPhone = User::wherePhone($data["phone"])->first();

            $userEmail = User::whereEmail($data["email"])->first();

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
                        'api_token' => Hash::make(rand(554, 41515515)),
                    ]);

                    //add device to user
                    $user->user_devices()->firstOrCreate([
                        'device_token' => $data['device_token'],
                        'device_type' => $data['device_type'],
                        'device_id' => $data['device_id'],
                        'device_name' => $data['device_name'],
                    ]);
                }
            }else{
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
