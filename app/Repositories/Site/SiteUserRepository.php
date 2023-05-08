<?php
namespace App\Repositories\Site;

use Illuminate\Http\Request;
use App\Repositories\Site\SiteBaseRepository;
use Illuminate\Contracts\View\View;

class SiteUserRepository extends SiteBaseRepository
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'User';
    
    /**
     * Get list job
     * 
     * @param int|null $id
     * @return 
     */
    public function save(Request $request)
    { 
        dd($request);
    }
}