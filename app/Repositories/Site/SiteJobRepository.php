<?php
namespace App\Repositories\Site;

use App\Repositories\Site\SiteBaseRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class SiteJobRepository extends SiteBaseRepository
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Job';
    
    /**
     * View Filter
     * 
     * @var 
     */
    protected $viewFilter = 'site.job.list';

    /**
     * Get list job
     * 
     * @param int|null $id
     * @return View
     */
    public function index(): View
    { 
        $list = self::$_model->where('active', 1)->paginate(2);
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
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $now = $dt->toDateString();
        return view('site.job.create', compact('now'));
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
            if ($request->negotiate == 'on') {
                $profileData['min_salary'] = null;
                $profileData['max_salary'] = null;
            }

            $profileData['level'] = implode("|", $request->level);
            $profileData['type'] = implode("|", $request->type);

            self::$_model::create($profileData);
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

    /**
     * 
     *
     * @return
     */
    public function delele($id)
    {   
        self::$_model->find($id)->delete();
        return redirect('company/profile');
    }
}