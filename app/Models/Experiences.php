<?php

namespace App\Models;

use Illuminate\Support\Carbon;
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
        'end',
        'description',
        'address',
    ];

    public function profileUser()
    {
        return $this->belongsTo('App\Models\ProfileUser');
    }

    public function getFmStartAttribute() {
        return Carbon::create($this->start)->format('M Y');
    }

    public function getFmEndAttribute() {
        return Carbon::create($this->end)->format('M Y');
    }

    public function getFirstKeywordNameAttribute() {
        return substr($this->company_name, 0, 1);
    }
}
