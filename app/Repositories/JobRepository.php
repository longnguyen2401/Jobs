<?php
namespace App\Repositories;

use App\Models\Company;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class JobRepository extends BaseRepository
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Job';
    
    /**
     * Get data by Id
     * 
     * @param int|null $id
     * @return
     */
    public function getDataById(int $id = null)
    { 
        $detail = Company::find($id);
        $list = $detail->jobs;
        return compact('detail', 'list');
    }

    /**
     * Create or update
     * 
     * @param int $id
     * @return mixed
     */
    public function toggleActive(int $id)
    {
        $data = $this->find($id);
        
        if (!$data) return false;

        $data->active = !$data->active;
        $data->save();
        return $data->company->id;
    }
}