<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $fillable = [
        'icon',
        'head',
        'text'
    ];

    public $timestamps = false;
}
