<?php

namespace App\Services;

use App\Constants\UserStatus;
use App\Http\Resources\UserResource;
use App\Models\User\User;
use App\Response\DataStatus;
use App\Response\DataFailed;
use App\Response\DataSuccess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SignUPApiService
{
    public function signUp($data): DataStatus
    {
        try {
            $data["phone"] = $data["phone"] ?? null;
            $data["email"] = $data["email"] ?? null;

            $userPhone = $data["phone"] ? User::wherePhone($data["phone"])->first() : null;

            $userEmail = $data["email"] ? User::whereEmail($data["email"])->first() : null;

            if ($userPhone) {
                throw new \Exception("user already exists with this phone");
            } elseif ($userEmail) {
                throw new \Exception("user already exists this email");
            }
            DB::beginTransaction();
            $user = User::create([
                'name' => $data["name"],
                'phone' => $data["phone"],
                'email' => $data["email"],
                'password' => Hash::make($data["password"]),
                "api_token" => Hash::make(rand(554, 41515515)),
            ]);

            $user->user_devices()->firstOrCreate([
                'device_token' => $data['device_token'] ?? null,
                'device_type' => $data['device_type'] ?? null,
                'device_id' => $data['device_id'] ?? null,
                'device_name' => $data['device_name'] ?? null,
            ]);

            DB::commit();

            //response
            return new DataSuccess(
                resourceData: UserResource::make($user),
                message: "user signed up successfully",
            );
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            return new DataFailed(message: $th->getMessage());
        }
    }
}
