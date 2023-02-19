<?php

namespace App\Http\Controllers\api\HotelsApi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginHotelRequest;
use App\Http\Traits\ApiResponser;
use App\Models\hotels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginHotelController extends Controller
{
    use ApiResponser;
    public function login(LoginHotelRequest $request)
    {
        $hotels = hotels::where('email', $request->email)->first();

        if(!$hotels || !Hash::check($request->password, $hotels->password)) {

            return $this->error('The provided credentials are incorrect.', 401);

        }

        return $this->success([
            'token' => $hotels->createToken('api-auth-token')->plainTextToken,
            'Hotels' => $hotels
        ], 'You are logged!');
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}


