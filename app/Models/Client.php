<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'region_id',
        'phone_number',
        'is_agreed',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
