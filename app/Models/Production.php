<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Production extends Model
{
    protected $fillable = [
        'preview',
        'full'
    ];

    public $timestamps = false;
}
