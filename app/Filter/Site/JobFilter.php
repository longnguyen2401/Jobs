<?php
namespace App\Filter\Site;

use App\Filter\BaseFilter;

class JobFilter extends BaseFilter
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Job';

    /**
     * 
     * 
     * @var array
     */
    protected array $columns = [
        'title' => 'like',
        'company.address' => 'like_trim',
        'year' => 'in',
        'level' => 'like',
        'type' => 'like',
        'created_at' => 'before_date'
    ];
    
}