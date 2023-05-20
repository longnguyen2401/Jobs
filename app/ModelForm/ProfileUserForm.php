<?php

namespace App\ModelForm;

use App\ModelForm\BaseForm;

class ProfileUserForm extends BaseForm
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
    protected array $form = array(
        [
            'name' => 'User',
            'key' => 'user_id',
            'component' => 'input',
            'type' => 'hidden',
        ],
        [
            'name' => 'Avatar',
            'key' => 'avatar',
            'component' => 'image',
        ],
        // [
        //     'name' => 'Name',
        //     'key' => 'user.name',
        //     'component' => 'input',
        //     'type' => 'text',
        // ],
        // [
        //     'name' => 'Email',
        //     'key' => 'user.email',
        //     'component' => 'input',
        //     'type' => 'text',
        // ],
        [
            'name' => 'Địa chỉ',
            'key' => 'address',
            'component' => 'input',
            'type' => 'text',
        ],
        [
            'name' => 'Skill',
            'key' => 'skill',
            'component' => 'input',
            'type' => 'text',
        ],
        [
            'name' => 'Địa chỉ',
            'key' => 'address',
            'component' => 'input',
            'type' => 'text',
        ],
        [
            'name' => 'Website',
            'key' => 'website',
            'component' => 'input',
            'type' => 'text',
        ],
        [
            'name' => 'Công nghệ sử dụng',
            'key' => 'skill',
            'component' => 'input',
            'type' => 'text',
        ],
        [
            'name' => 'Giới thiệu',
            'key' => 'about',
            'component' => 'textarea',
        ],
        [
            'name' => 'CV',
            'key' => 'cv',
            'component' => 'file',
        ],
    );
        
}


