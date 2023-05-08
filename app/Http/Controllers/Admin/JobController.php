<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class JobController extends CURDController
{
    /**
     * The attributes prefix for each model.
     */
    protected string $prefix = 'Job';
    
    /**
     * Toggle active
     *
     * @param int $id
     * @return mixed
     */
    protected function toggleActive(int $id)
    {
        $companyId = $this->repository->toggleActive($id);
        
        if ($companyId) {
            return redirect('admin/job/company/' . $companyId);
        }
        else {
            // return 'Message'
        }
        
    }
}
