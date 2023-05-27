<?php
namespace App\Repositories\Site;

use App\Repositories\Site\SiteBaseRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class SiteReportRepository extends SiteBaseRepository
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Report';

    /**
     * 
     * 
     * @param 
     * @return 
     */
    public function sendReport($request)
    { 
        try {
            DB::beginTransaction();
            $fillable = self::$_model->getFillable();
            $data = $request->only($fillable);

            $user = User::find($data['user_id']);
            if ($user->company->active != config('constants.COMPANY.ACTIVE.ACTIVE')) {
                session()->put('message-company-detail', 'Gửi report không thành công. Account của bạn chưa được duyệt !');
                session()->put('message-class', 'danger');
                return back();
            }

            self::$_model::create($data);
            session()->put('message-company-detail', 'Gửi report thành công !');
            DB::commit();
            return back();
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            // session()->put('message-company-detail', 'Đã xảy ra lỗi vui lòng thử lại !');
        }
    }
}