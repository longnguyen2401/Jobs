<?php

namespace App\Http\Controllers;

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
        $bool = $this->repository->toggleActive($id);
        
        if ($bool) {
            $data = $this->getMetadata('show');
            return view($data['view'], $data);
        }
        else {
            // return 'Message'
        }
        
    }
}
