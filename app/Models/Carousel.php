<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'head',
        'text',
        'image'
    ];

    public $timestamps = false;
}
