<?php
namespace App\Repositories\Site;

use App\Models\Job;
use App\Repositories\Site\SiteBaseRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteCompanyRepository extends SiteBaseRepository
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Company';
    
    /**
     * Get detail job
     * 
     * @param int|null $id
     * @return View
     */
    public function detail(int $id)
    { 
        $detail = self::$_model->find($id);
        return view('site.company.detail', compact('detail'));
    }
    
    /**
     * Get detail job
     * 
     * @param int|null $id
     * @return View
     */
    public function profile()
    { 
        if (auth()->user()->type != config('constants.USER.TYPE.COMPANY')) {
            return redirect('/');    
        }

        return view('site.company.profile');
    }

    /**
     * Get detail job
     * 
     * @param int|null $id
     * @return View
     */
    public function applys(int $id)
    { 
        if (auth()->user()->type != config('constants.USER.TYPE.COMPANY')) {
            return redirect('/');    
        }
        // dd($id);
        $job = Job::find($id);

        if (!$job) {
            return redirect('/');
        }

        return view('site.company.request', compact('job'));
    }

    /**
     * 
     * 
     * @param Request $request
     * @return 
     */
    public function save(Request $request)
    { 
        try {
            DB::beginTransaction();

            $request = $this->checkUploadFile($request);
            $profileAttr = self::$_model->getFillable();
            $profileData = $request->only($profileAttr);
            self::$_model::updateOrCreate(['user_id' => $request->user_id], $profileData);
            session()->put('message-profile-detail', 'Cập nhật thông tin thành công !');

            DB::commit();
            return redirect('company/profile');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            session()->put('message-profile-detail', 'Đã xảy ra lỗi vui lòng thử lại !');
            return redirect('company/profile');
        }
    }
}