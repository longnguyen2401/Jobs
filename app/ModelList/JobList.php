<?php

namespace App\ModelList;

use App\ModelList\BaseList;

class JobList extends BaseList
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Job';

    /**
     * The attributes prefix for each model.
     * 
     * @var array
     */
    protected array $header = array(
        [
            'name' => 'Job Title',
        ],
        [
            'name' => 'Lương từ',
        ],
        [
            'name' => 'Đến',
        ],
        [
            'name' => 'Level',
        ],
        [
            'name' => 'Số năm kinh nghiệm',
        ],
        [
            'name' => 'Loại',
        ],
        [
            'name' => 'Skill',
        ],
        // [
        //     'name' => 'Duyệt',
        // ],
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
            'key' => 'min_salary',
        ],
        [
            'key' => 'max_salary',
        ],
        [
            'key' => 'level',
        ],
        [
            'key' => 'year',
        ],
        [
            'key' => 'type',
        ],
        [
            'key' => 'skill',
        ],
        // [
        //     'component' => 'icon-button',
        //     'key' => 'active',
        //     'condition' => '==',
        //     'value' => 1,
        //     'textTrue' => 'Đã duyệt',
        //     'textFalse' => 'Chưa duyệt',
        //     'url' => '/admin/job/toggle-active'
        // ],
    );
        
}


