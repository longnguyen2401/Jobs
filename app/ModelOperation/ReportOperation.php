<?php

namespace App\ModelOperation;

use App\ModelOperation\BaseOperation;

class ReportOperation extends BaseOperation
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Report';

    /** 
     * The attributes form for each model
     * 
     * @var string
     */
    protected array $operation = array(
        // [
        //     'action' => 'update'
        // ],
        [
            'action' => 'delete'
        ]
    );

    /** 
     * The attributes form for each model
     * 
     * @var string
     */
    protected array $roles = [
        // [
        //     'action' => 'create'
        // ]
    ];
}


