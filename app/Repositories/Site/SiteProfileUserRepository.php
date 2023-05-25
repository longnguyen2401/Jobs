<?php
namespace App\Repositories\Site;

use App\Models\Certification;
use App\Models\Education;
use App\Models\Experiences;
use App\Models\Project;
use App\Models\User;
use App\Models\Request;
use App\Repositories\Site\SiteBaseRepository;
use App\Traits\MonthTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class SiteProfileUserRepository extends SiteBaseRepository
{
    use MonthTrait;

    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'ProfileUser';

    /**
     * View Filter
     * 
     * @var 
     */
    protected $viewFilter = 'site.profile.list';
    
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
        $list = self::$_model->orderBy('id', 'DESC')->paginate(4);
        $jobs = Request::getCountRequest();
        return view('site.profile.list', compact('list', 'jobs'));
    }

    /**
     * Get detail 
     * 
     * @param int|null $id
     * @return View
     */
    public function detail(int $id)
    { 
        $detail = self::$_model->where('user_id', $id)->first();
        $jobs = Request::getCountRequest();
        return view('site.profile.profile', compact('detail', 'jobs'));
    }

    /**
     * Get list job
     * 
     * @param int|null $id
     * @return 
     */
    public function save($request)
    { 
        try {
          
            DB::beginTransaction();
            $request = $this->checkUploadFile($request);
            $request = $this->mutipleValueByString($request);
            
            $profileAttr = self::$_model->getFillable();
            $profileData = $request->only($profileAttr);
    
            $profile = self::$_model::updateOrCreate(['user_id' => $request->user_id], $profileData);
          
            $education = $this->handleTime($request->education);            
            Education::updateOrCreate(['profile_user_id' => $profile->id], $education);

            $experience = $this->handleTime($request->experience);
            Experiences::updateOrCreate(['profile_user_id' => $profile->id], $experience);
           
            $project = $this->handleTime($request->project);
            Project::updateOrCreate(['profile_user_id' => $profile->id], $project);

            $certificate = $this->handleTime($request->certification); 
            if (empty($certificate['time'])) {
                $certificate['time'] = null;
            }
            Certification::updateOrCreate(['profile_user_id' => $profile->id], $certificate);
           
            User::updateOrCreate(['id' => $request->user_id], $request->user);
            
            DB::commit();
            
            if ($request->job_id) {
                $SiteRequestRepository = \App::make('App\Repositories\Site\SiteRequestRepository');
                return $SiteRequestRepository->apply($request);
            }
            session()->put('message-profile-detail', 'Cập nhật thông tin thành công !');
            return redirect('profile/detail');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            $message = 'Đã xảy ra lỗi khi cập nhật thông tin! hãy thử lại.';
            $jobs = Request::getCountRequest();
            return view('site.profile.user', compact('message', 'jobs'));
        }
        
    }
}