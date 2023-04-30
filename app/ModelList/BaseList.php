<?php

namespace App\ModelList;

use Illuminate\Support\Collection;

abstract class BaseList
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
    protected array $list;

    /** 
     * The attributes form for each model
     * 
     * @var string
     */
    protected array $header;

    /**
     * Get List.
     * 
     * @return Collection
     */
    public function getModelList(): Collection
    {
        return collect($this->list);
    }

    /**
     * Get List.
     * 
     * @return Collection
     */
    public function getModelHeaderList(): Collection
    {
        return collect($this->header);
    }
}