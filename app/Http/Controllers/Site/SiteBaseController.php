<?php

namespace App\Http\Controllers\Site;

use App\Repositories\Site\SiteBaseRepository;
use App\Http\Controllers\Controller;

abstract class SiteBaseController extends Controller
{
    /**
     * The attributes prefix for each model.
     *
     * @var string
     */
    protected string $prefix;

    /**
     * Init Repository
     * 
     * @var SiteBaseRepository
     */
    protected SiteBaseRepository $repository;

    /**
     * Construct function
     *
     * @return void
     */
    public function __construct()
    {   
        $this->setRepository();
    }

    /**
     * Set repository
     * 
     * @return void
     */
    protected function setRepository()
    {
        $this->repository = $this->getRepository();
    }

    /**
     * Get repository
     * 
     * @return repository
     */
    protected function getRepository()
    {
        $className = $this->prefix . 'Repository';
        $dir = "App\\Repositories\\Site\\Site$className";
        $class = new $dir;
        return $class;
    }
}
