<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'contact',
        'name',
        'is_phone'
    ];

    public $timestamps = false;
}
