<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'logo',
        'name'
    ];

    public $timestamps = false;
}
