<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile_user_id',
        'name',
        'organize_name',
        'time',
        'description',
        'file',
    ];

    public function profileUser()
    {
        return $this->belongsTo('App\Models\ProfileUser');
    }
}
