<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modeler extends Model
{
    use HasFactory;
    protected $fillable = ['project','bpmn'];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}