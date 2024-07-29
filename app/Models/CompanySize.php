<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySize extends Model
{
    use HasFactory;

    protected $fillable = ['size', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
