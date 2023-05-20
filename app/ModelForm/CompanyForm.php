<?php

namespace App\ModelForm;

use App\ModelForm\BaseForm;

class CompanyForm extends BaseForm
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
            'name' => 'Logo',
            'key' => 'logo',
            'component' => 'image',
        ],
        [
            'name' => 'Tên công ty',
            'key' => 'name',
            'component' => 'input',
            'type' => 'text',
        ],
        [
            'name' => 'Slogan',
            'key' => 'slogan',
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
            'key' => 'technologies',
            'component' => 'input',
            'type' => 'text',
        ],
        [
            'name' => 'Số nhân viên',
            'key' => 'people',
            'component' => 'input',
            'type' => 'text',
        ],
        [
            'name' => 'Giới thiệu',
            'key' => 'about',
            'component' => 'textarea',
        ],
        [
            'name' => 'Tax',
            'key' => 'tax',
            'component' => 'input',
            'type' => 'number',
        ],
        [
            'name' => 'Active',
            'key' => 'active',
            'component' => 'checkbox',
        ],
    );
        
}


