<?php

namespace App\Http\Controllers\Api\HotelsApi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterHotelRequest;
use App\Http\Traits\ApiResponser;
use App\Models\hotels;
use Illuminate\Http\Request;

class RegisterHotelsController extends Controller
{
    use ApiResponser;
    public function register(RegisterHotelRequest $request)
    {

        $data = hotels::create($request->validated());


        return $this->success([
            'data' => $data,
            'token' => $data->createToken('api-auth-token')->plainTextToken,
        ] ,'You are Registerd successfully');
    }
}
