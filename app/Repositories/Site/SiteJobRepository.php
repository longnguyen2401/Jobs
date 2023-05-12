<?php
namespace App\Repositories\Site;

use App\Repositories\Site\SiteBaseRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /**
     * Get detail job
     * 
     * @param int|null $id
     * @return View
     */
    public function detail(int $id)
    { 
        $detail = self::$_model->find($id);
        return view('site.job.detail', compact('detail'));
    }

    /**
     * Get list job
     * 
     * @param int|null $id
     * @return View
     */
    public function create(): View
    { 
        if (auth()->user()->type === config('constants.USER.TYPE.USER')) {
            return view('/');
        }
        return view('site.job.create');
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

            $profileAttr = self::$_model->getFillable();
            $profileData = $request->only($profileAttr);
            self::$_model::updateOrCreate(['company_id' => $request->company_id], $profileData);
            session()->put('message-profile-detail', 'Tạo tin thành công !');

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