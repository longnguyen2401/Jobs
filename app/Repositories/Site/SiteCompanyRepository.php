<?php
namespace App\Repositories\Site;

use App\Models\Job;
use App\Repositories\Site\SiteBaseRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Request;
use Illuminate\Support\Facades\Http;

class SiteCompanyRepository extends SiteBaseRepository
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Company';
    
    /**
     * Key use mutiple value 
     * 
     * @var 
     */
    protected $mutipleValueKey = [
        'technologies'
    ];

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
        return view('site.company.detail', compact('detail', 'jobs'));
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
        $jobs = Request::getCountRequest();
        return view('site.company.profile', compact('jobs'));
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
        $job = Job::find($id);

        if (!$job) {
            return redirect('/');
        }
        $jobs = Request::getCountRequest();
        return view('site.company.request', compact('job', 'jobs'));
    }

    /**
     * 
     * 
     * @param $request
     * @return 
     */
    public function save($request)
    { 
        try {
            DB::beginTransaction();
            $request = $this->checkUploadFile($request);
            $request = $this->mutipleValueByString($request);
            $request->validate([
                'tax' => ['required'],
                'license' => ['required'],
            ]);

            $profileAttr = self::$_model->getFillable();
            $profileData = $request->only($profileAttr);
            
            $profileData = $this->checkTax($profileData); 

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

    /**
     * 
     * 
     * @param $request
     * @return 
     */
    public function checkTax($profileData) {
        $apiURL = 'https://api.vietqr.io/v2/business/' . $profileData['tax'];
        $response = Http::get($apiURL);

        if ($response->status() == 200) {
            $data = json_decode($response->getBody(), true)['data'];
            
            if (isset($data) &&
                $profileData['tax'] == $data['id'] &&
                trim($profileData['name']) == trim($data['name'])
            ) {
                $profileData['active'] = config('constants.COMPANY.ACTIVE.ACTIVE');
            } else {
                $profileData['active'] = config('constants.COMPANY.ACTIVE.DEFAULT');
            }
        } else {
            $profileData['active'] = config('constants.COMPANY.ACTIVE.DEFAULT');
        }

        return $profileData;
    }
    
}