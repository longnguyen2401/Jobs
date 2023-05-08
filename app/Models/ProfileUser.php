<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'job_title',
        'about',
        'avatar',
        'skill',
        'address',
        'preventive_email',
        'website',
        'project',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function experiences()
    {
        return $this->hasMany('App\Models\Experiences');
    }

    public function education()
    {
        return $this->hasMany('App\Models\Education');
    }

    public function certification()
    {
        return $this->hasMany('App\Models\Certification');
    }
}
