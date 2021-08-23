<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWorkExperience extends Model
{
    protected $table = 'user_work_experience';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'job_title', 'company_name', 'started_date', 'industry'
    ];
}
