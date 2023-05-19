<?php
namespace App\Filter\Site;

use App\Filter\BaseFilter;

class ProfileUserFilter extends BaseFilter
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'ProfileUser';

    /**
     * 
     * 
     * @var array
     */
    protected array $columns = [
        'skill' => 'like',
    ];
    
}