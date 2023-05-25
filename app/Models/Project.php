<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile_user_id',
        'name',
        'position',
        'start',
        'end',
        'description',
    ];

    public function profileUser()
    {
        return $this->belongsTo('App\Models\ProfileUser');
    }

    public function getFmStartAttribute() {
        return $this->start ? Carbon::create($this->start)->format('M Y') : '';
    }

    public function getFmEndAttribute() {
        return $this->end ? Carbon::create($this->end)->format('M Y') : 'To now';
    }

    public function getFirstKeywordNameAttribute() {
        return substr($this->name, 0, 1);
    }
}
