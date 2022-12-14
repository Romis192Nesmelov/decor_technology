<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class JobImage extends Model
{
    protected $fillable = [
        'preview',
        'full',
        'job_id'
    ];

    public $timestamps = false;

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
