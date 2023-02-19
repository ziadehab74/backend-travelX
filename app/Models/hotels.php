<?php

namespace App\Models;

use App\Models\city;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class hotels extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
protected $table = 'hotels';
protected $primaryKey = 'id';
protected $fillable =[
'id',
'Hotel_name',
'city_id',
'Total_price',
'rating',
'type',
'facilities',
'owner_name',
'email',
'phone_number',
'number_of_rooms',
'image',
'application_documents',
'location_id',
'password'
];
protected $hidden = [
    'password',
];
public function setPasswordAttribute($password)
{
    return $this->attributes['password'] = Hash::make($password);
}
    public function city(){
        return $this->hasOne(city::class,'id','city_id');
    }

    public function users(){
        return   $this->hasMany(User::class);
    }
    public function rooms(){
        return $this->belgonsTo(rooms::class);
    }
}
