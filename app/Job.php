<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'title', 'description',
    ];

    public function userJob()
    {
        return $this->hasMany(UserJob::class,'job_id');
    }

    public static function getJobs($userId,$filter)
    {
        $jobs = Job::with(['userJob' => function($q) use($userId) {
            $q->where('user_id', $userId);
        }]);
        if($filter && $filter != '')
        {
            $jobs =  $jobs->where('title','like', '%' . $filter . '%');
        }
        $jobs =  $jobs->orderByDesc('id')
         ->paginate(10);

        return $jobs;
    }



}
