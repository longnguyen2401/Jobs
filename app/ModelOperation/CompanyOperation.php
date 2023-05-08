<?php

namespace App\ModelOperation;

use App\ModelOperation\BaseOperation;

class CompanyOperation extends BaseOperation
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Company';

    /** 
     * The attributes form for each model
     * 
     * @var string
     */
    protected array $operation = array(
        [
            'action' => 'update'
        ],
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
        [
            'action' => 'create'
        ]
    ];
}


