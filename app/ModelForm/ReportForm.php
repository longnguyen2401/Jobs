<?php

namespace App\ModelForm;

use App\ModelForm\BaseForm;

class ReportForm extends BaseForm
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
     * @var
     */
    protected $options;

    /**
     * The attributes prefix for each model.
     * 
     * @var
     */
    protected $values;
    

    /**
     * Construct function
     *
     * @return void
     */
    public function hookForm($form)
    {   
        $form[5]['options'] = config('constants.REPORT.MESSAGE');
        $form[5]['values'] = config('constants.REPORT.STATUS');
        return $form;
    }

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
            'name' => 'Company',
            'key' => 'company_id',
            'component' => 'input',
            'type' => 'hidden',
        ],
        [
            'name' => 'Company report',
            'key' => 'user.company.name',
            'component' => 'text',
        ],
        [
            'name' => 'Report',
            'key' => 'company.name',
            'component' => 'text',
        ],
        [
            'name' => 'Email',
            'key' => 'email',
            'component' => 'text',
        ],
        [
            'name' => 'Trạng Thái',
            'key' => 'status',
            'const' => 'constants.REPORT.MESSAGE',
            'component' => 'select',
        ],
        
    );
        
}


