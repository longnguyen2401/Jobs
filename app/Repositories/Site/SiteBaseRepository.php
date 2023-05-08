<?php

namespace App\Repositories\Site;

use App\Traits\FilesTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class SiteBaseRepository
{
    use FilesTrait;
    
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix;

    /**
     * Init model
     * 
     * @var Model
     */
    protected static Model $_model;

    /**
     * BaseRepository constructor.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * 
     * @return class
     */
    protected function getModel()
    {
        $className = $this->prefix;
        $dir = "App\\Models\\$className";
        $class = new $dir;
        return $class;
    }

    /**
     * Set model
     */
    protected function setModel()
    {
        self::$_model = $this->getModel();
    }
}