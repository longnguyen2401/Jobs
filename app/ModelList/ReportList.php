<?php

namespace App\ModelList;

use App\ModelList\BaseList;

class ReportList extends BaseList
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Report';

    /**
     * The attributes prefix for each model.
     * 
     * @var array
     */
    protected array $header = array(
        [
            'name' => 'Title',
        ],
        [
            'name' => 'Company Report',
        ],
        [
            'name' => 'Report',
        ],
        [
            'name' => 'Status',
        ],
    );

        /**
     * The attributes prefix for each model.
     * 
     * @var array
     */
    protected array $list = array(
        [
            'key' => 'title',
        ],
        [
            'key' => 'user.company.name',
        ],
        [
            'key' => 'company.name',
        ],
        [
            'const' => 'constants.REPORT.MESSAGE',
            'key' => 'status',
        ],
    );
        
}


