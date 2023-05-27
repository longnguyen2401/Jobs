<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Company;

class ReportRepository extends BaseRepository
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Report';

    /**
     * Hook before return index by id
     *
     * @return 
     */
    public function hookBeforeUpdate($data) {
        if (isset($data['status']) && $data['status'] == config('constants.REPORT.STATUS.BAN')) {
            $this->updateCompanyActive($data['company_id'], config('constants.COMPANY.ACTIVE.BAN'));
        }
        return $data;
    }

    /**
     *
     *
     * @return 
     */
    protected function updateCompanyActive($companyId, $status) {
        $company = Company::find($companyId);
        $company->active = $status;
        $company->save();
    }



}