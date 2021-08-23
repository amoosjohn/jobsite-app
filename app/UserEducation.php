<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    protected $table = 'user_education';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'degree', 'school', 'completed_date'
    ];
}
