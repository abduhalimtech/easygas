<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'name',
        'description',
        'address',
        'address_link',
        'image',
        'first_additional_field',
        'second_additional_field',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
