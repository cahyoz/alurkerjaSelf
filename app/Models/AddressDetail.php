<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressDetail extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'address'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
