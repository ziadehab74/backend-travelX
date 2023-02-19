<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $fillable =[
    'id',
    'name_ar',
    'name_en'
    ];



    public function hotles(){
        $this->hasMany(hotles::class);

    }
}
