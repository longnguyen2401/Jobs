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
        'name',
        'about',
        'website',
        'technologies',
        'people',
        'logo',
        'slogan',
    ];

    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }
}
