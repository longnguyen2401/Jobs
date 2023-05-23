<?php
namespace App\Repositories\Site;

use App\Repositories\Site\SiteBaseRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Request;

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
     * Key use mutiple value 
     * 
     * @var 
     */
    protected $mutipleValueKey = [
        'skill'
    ];
    
    /**
     * Get list job
     * 
     * @param int|null $id
     * @return View
     */
    public function index(): View
    { 
        $list = self::$_model->where('active', 1)->paginate(2);
        $jobs = Request::getCountRequest();
        return view('site.job.list', compact('list', 'jobs'));
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
        $jobs = Request::getCountRequest();
        return view('site.job.detail', compact('detail', 'jobs'));
    }

    /**
     * Get list job
     * 
     * @param int|null $id
     * @return View
     */
    public function create(): View
    { 
        $jobs = Request::getCountRequest();
        if (auth()->user()->type === config('constants.USER.TYPE.USER')) {
            return view('/', compact('jobs'));
        }
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $now = $dt->toDateString();
        return view('site.job.create', compact('now', 'jobs'));
    }

    /**
     * 
     * 
     * @param 
     * @return 
     */
    public function save($request)
    { 
        try {
            DB::beginTransaction();
            $request = $this->mutipleValueByString($request);

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