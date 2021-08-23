<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    protected $table = 'user_job';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'job_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class,'job_id');
    }
}
