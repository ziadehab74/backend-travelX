<?php

namespace App\Http\Requests\Api;

use Dotenv\Exception\ValidationException;
use GrahamCampbell\ResultType\Success;
use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterHotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */



    public function rules()
    {
        return [
            'Hotel_name' => ['required', 'string', ],
            'city_id' => ['required', 'integer'],
            'Total_price' => ['required', 'integer', ],
            'rating' => ['required', 'integer'],
            'type' => ['required', 'string', ],
            'facilities' => ['required', 'string'],
            'owner_name' => ['required', 'string', ],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'string', ],
            'phone_number' => ['required', 'string'],
            'number_of_rooms' => ['required', 'integer', ],

        ];
    }
}
