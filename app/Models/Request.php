<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'job_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }

    public static function getCountRequest() {
        if (isset(auth()->user()->company)) {
            $jobs = auth()->user()->company->jobs;
            $countAll = self::whereIn('job_id', $jobs->pluck('id'))->count();
            return array(
                'countAll' => $countAll,
                'items' => $jobs
            );
        }
        
    }
}
