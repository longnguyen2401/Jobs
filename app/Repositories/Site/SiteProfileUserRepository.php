<?php
namespace App\Repositories\Site;

use App\Models\Education;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Site\SiteBaseRepository;
use App\Traits\MonthTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use App\Repositories\Site\SiteRequestRepository;

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
     * Get list job
     * 
     * @param int|null $id
     * @return View
     */
    public function index(): View
    { 
        $list = self::$_model->get();
        return view('site.profile.list', compact('list'));
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
        return view('site.profile.profile', compact('detail'));
    }

    /**
     * Get list job
     * 
     * @param int|null $id
     * @return 
     */
    public function save(Request $request)
    { 
        try {
            DB::beginTransaction();
            $request = $this->checkUploadFile($request);

            $profileAttr = self::$_model->getFillable();
            $profileData = $request->only($profileAttr);
         
            $profile = self::$_model::updateOrCreate(['user_id' => $request->user_id], $profileData);
            
            $education = $this->handleTime($request->education);
            
            Education::updateOrCreate(['profile_user_id' => $profile->id], $education);

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
            return view('site.profile.user', compact('message'));
        }
        
    }
}