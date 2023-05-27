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
        'tax',
        'license',
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
        'active',
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

    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }
    
    public function getArrImageAttribute() {
        return explode("|", $this->images);
    }

    public function getArrTechAttribute() {
        return explode("|", $this->technologies);
    }

    public function getDisplayTechAttribute() {
        return implode(",", $this->arr_tech);
    }
}
