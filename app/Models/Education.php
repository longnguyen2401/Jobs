<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile_user_id',
        'school_name',
        'major',
        'start',
        'end',
        'description'
    ];

    public function profileUser()
    {
        return $this->belongsTo('App\Models\ProfileUser');
    }
}
