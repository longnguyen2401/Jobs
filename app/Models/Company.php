<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'address',
        'email',
        'name',
        'about',
        'website',
        'images',
        'technologies',
        'people',
        'logo',
        'slogan',
    ];

    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }

    public function requests()
    {
        return $this->hasMany('App\Models\Request');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function getArrImageAttribute() {
        return explode("|", $this->images);
    }
}
