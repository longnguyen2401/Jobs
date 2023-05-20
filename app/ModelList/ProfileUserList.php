<?php

namespace App\ModelList;

use App\ModelList\BaseList;

class ProfileUserList extends BaseList
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
            'name' => 'Name',
        ],
        [
            'name' => 'Email',
        ],
        [
            'name' => 'Website',
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
            'key' => 'user.name',
        ],
        [
            'key' => 'user.email',
        ],
        [
            'key' => 'website',
        ],
    );
        
}


