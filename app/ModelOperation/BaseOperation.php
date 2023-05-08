<?php

namespace App\ModelOperation;

use Illuminate\Support\Collection;

abstract class BaseOperation
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
    protected array $default = [];

    /** 
     * The attributes form for each model
     * 
     * @var string
     */
    protected array $operation = [];

    /** 
     * The attributes form for each model
     * 
     * @var string
     */
    protected array $roles = [];

    /**
     * Get Form.
     * 
     * @return Collection
     */
    public function getModelOperation(): Collection
    {
        $data = [
            'operation' => $this->operation,
            'roles' => $this->roles
        ];
        return collect($data);
    }
}