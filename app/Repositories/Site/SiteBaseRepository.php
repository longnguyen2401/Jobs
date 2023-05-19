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
     * Init filter
     * 
     * @var 
     */
    protected $filter;

    /**
     * View Filter
     * 
     * @var 
     */
    protected $viewFilter;

    /**
     * BaseRepository constructor.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->setModel();
        $this->setFilter();
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

    /**
     * get filter
     * 
     * @return class
     */
    protected function getFilter()
    {
        $className = $this->prefix . 'Filter';
        $dir = "App\\Filter\\Site\\$className";
        if (class_exists($dir)) {
            $class = new $dir;
            return $class;
        }
        
    }

    /**
     * Set filter
     */
    protected function setFilter()
    {
        $this->filter = $this->getFilter();
    }

     /**
     * BaseRepository constructor.
     * 
     * @return 
     */
    public function filter(Request $request)
    {
        $list = $this->filter->main(self::$_model, $request);
        return view($this->viewFilter, compact('list'));
    }


}