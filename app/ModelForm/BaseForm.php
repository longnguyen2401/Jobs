<?php

namespace App\ModelForm;

abstract class BaseForm
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix;

    /** 
     * The attributes form for each model
     * 
     * @var string
     */
    protected array $form;

    /**
     * Get Form.
     * 
     * @return \Illuminate\Support\Collection
     */
    public function getModelForm(): \Illuminate\Support\Collection
    {
        return collect($this->form);
    }
}