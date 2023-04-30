<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'title',
        'description',
        'min_salary',
        'max_salary',
        'level',
        'year',
        'type',
        'skill',
        'active',
        'expired_date',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
