<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile_user_id',
        'company_name',
        'position',
        'start',
        'description',
        'address',
    ];

    public function profileUser()
    {
        return $this->belongsTo('App\Models\ProfileUser');
    }
}
