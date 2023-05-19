<?php

namespace App\Filter;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

abstract class BaseFilter
{    
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix;

    /**
     * 
     * 
     * @var array
     */
    protected array $columns;

    /**
     * BaseRepository constructor.
     * 
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Main filter.
     * 
     * @return 
     */
    public function main($model, Request $request)
    {
        $q = $model;
        $requests = $request->all();

        foreach ($requests as $key => $value) {
            foreach ($this->columns as $column => $condition) {
                if ($column == $key) {
                    switch ($condition) {
                        case 'like':
                            $q = $q->where($key, 'like', '%' . $value .'%');
                        break;

                        case 'in':
                            $q = $q->whereIn($key, $value);
                        break;

                        case 'before_date':
                            $value = $this->getValueBeforeDate($value);
                            $q = $q->where($key, '>', $value);
                        break;
                    }
                }
            }
        }
        
        return $q->paginate(2);
    }

    /**
     * Get value before date condition
     * 
     * @return 
     */
    public function getValueBeforeDate($type) {
        switch ($type) {
            case 1:
                return Carbon::now()->subHours(1)->toDateTimeString();
            break;

            case 2:
                return Carbon::now()->subHours(24)->toDateTimeString();
            break;

            case 3:
                return Carbon::now()->subDays(7)->toDateTimeString();
            break;

            case 4:
                return Carbon::now()->subDays(30)->toDateTimeString();
            break;
        }
    }
}