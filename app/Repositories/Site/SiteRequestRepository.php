<?php
namespace App\Repositories\Site;

use App\Models\User;
use App\Repositories\Site\SiteBaseRepository;
use App\Models\Request;

class SiteRequestRepository extends SiteBaseRepository
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'Request';
    
    /**
     * Get list job
     * 
     * @param $request
     * @param $id
     * @return 
     */
    public function list($request, int $id)
    {
        $data = self::$_model::where('user_id', $id)->get();
        $jobs = Request::getCountRequest();
        return view('site.profile.request', compact('data', 'jobs'));
    }

    /**
     * Get list job
     * 
     * @param $request
     * @return mixed
     */
    public function apply($request): mixed
    {
        $user = User::where('id', (int)auth()->user()->id)->first();
        if (auth()->user()->type != config('constants.USER.TYPE.USER')) {
            return '';
        }
        $jobs = Request::getCountRequest();
        if (empty($user->ProfileUser)) {
            session()->put('message-profile-detail', 'Nhập thông tin của bạn để apply !');
            $job_id = $request->job_id;
            return view('site.profile.user', compact('job_id', 'jobs'));
        }

        if (empty($request->file_cv)) {
            $job_id = $request->job_id;
            return view('site.component.choice-cv', compact('job_id', 'jobs'));
        }

        $request = $this->handleFileCV($request);

        $data = [
            'user_id' => auth()->user()->id,
            'job_id' => $request->job_id,
            'file_cv' => $request->file_cv
        ];

        self::$_model::insert($data);
            
        return redirect('apply/list/' . auth()->user()->id);
    }

    /**
     * handleFileCV
     * 
     * @param $request
     * @return $request
     */
    public function handleFileCV($request)
    {
        if ($request->is_use_profile_cv) {
            $request->file_cv = auth()->user()->profileUser->cv;
            return $request;
        }
        $this->checkUploadFile($request);
        return $request;
    }
}