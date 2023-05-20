<?php

namespace App\ModelList;

use App\ModelList\BaseList;

class CompanyList extends BaseList
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Company';

    /**
     * The attributes prefix for each model.
     * 
     * @var array
     */
    protected array $header = array(
        [
            'name' => 'Tên công ty',
        ],
        [
            'name' => 'Tax',
        ],
        [
            'name' => 'Địa chỉ',
        ],
        [
            'name' => 'Website',
        ],
        [
            'name' => 'Công nghệ',
        ],
        [
            'name' => 'Số người',
        ],
        [
            'name' => 'Việc làm',
        ],
    );

        /**
     * The attributes prefix for each model.
     * 
     * @var array
     */
    protected array $list = array(
        [
            'key' => 'name',
        ],
        [
            'key' => 'tax',
        ],
        [
            'key' => 'address',
        ],
        [
            'key' => 'website',
        ],
        [
            'key' => 'technologies',
        ],
        [
            'key' => 'people',
        ],
        [
            'component' => 'button',
            'model' => 'job',
            'queryParam' => [
                'key' => 'id',
            ],
        ],
    );
        
}


