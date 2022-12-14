<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobImage;

class Job extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'description',
        'active'
    ];

    public function jobImages()
    {
        return $this->hasMany(JobImage::class);
    }
}
