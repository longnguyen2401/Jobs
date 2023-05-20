<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class CompanyRepository extends BaseRepository
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Company';

    /**
     * Hook before return index by id
     *
     * @return 
     */
    public function hookBeforeUpdate($data) {
        if (empty($data['active']) || $data['active'] != 1) {
            $data['active'] = 0;
        }

        return $data;
    }
}