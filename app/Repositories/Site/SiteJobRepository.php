<?php
namespace App\Repositories\Site;

use App\Repositories\Site\SiteBaseRepository;
use Illuminate\Contracts\View\View;

class SiteJobRepository extends SiteBaseRepository
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Job';
    
    /**
     * Get list job
     * 
     * @param int|null $id
     * @return View
     */
    public function index(): View
    { 
        $list = self::$_model->where('active', 1)->get();
        return view('site.job.list', compact('list'));
    }
}