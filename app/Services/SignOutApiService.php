<?php

namespace App\Services;

use App\Constants\UserStatus;
use App\Http\Resources\UserResource;
use App\Models\User\User;
use App\Response\DataStatus;
use App\Response\DataFailed;
use App\Response\DataSuccess;
use Illuminate\Support\Facades\Hash;

class SignOutApiService
{
    public function signOut($data): DataStatus
    {
        try {

            $user = User::find($data["user_id"]);

            
            request()->user()->currentAccessToken()->delete();
            //response

            return new DataSuccess(
                // resourceData: UserResource::make($user),
                message: "user signed out successfully",
            );
        } catch (\Throwable $th) {
            // throw $th;
            return new DataFailed(message: $th->getMessage());
        }
    }
}
