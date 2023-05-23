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
        'quantity',
        'min_salary',
        'max_salary',
        'level',
        'year',
        'type',
        'skill',
        'active',
        'expired_date',
        'from_date',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function requests()
    {
        return $this->hasMany('App\Models\Request');
    }

    public function getArrLevelAttribute() {
        return explode("|", $this->level);
    }

    public function getArrSkillAttribute() {
        return explode("|", $this->skill);
    }

    public function getArrTypeAttribute() {
        return explode("|", $this->type);
    }

    public function getIsNegotiateAttribute() {
        return empty($this->min_salary) && empty($this->max_salary);
    }

    public function getCanApplyAttribute() {
        return auth()->check() && auth()->user()->requests->firstWhere('job_id', $this->id) ? false : true;
    }

    public function getNumberRequestAttribute() {
        return $this->requests->count();
    }

    public function getRelatedAttribute() {
        $skills = $this->arr_skill;
        $q = $this->where('skill', '!=', '');
        $q->where(function ($query) use ($skills) {
            foreach ($skills as $skill) {
                $query->orWhere('skill', 'like', '%' . $skill);
            }
        });
        return $q->get();
    }
}

