@extends('site.layout')

@section('title', 'Apply List')

@section('content')
<div class="main-content">

    <div class="page-content">

        <!-- Start home -->
        <section class="page-title-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center text-white">
                            <h3 class="mb-4">Apply List</h3>
                            <div class="page-next">
                                <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        
                                        <li class="breadcrumb-item active" aria-current="page"> Apply List </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!-- end home -->

        <!-- START JOB-LIST -->
        <section class="section">
            <div class="container">
              
                    <div class="job-box card" >
                        <div class="p-4">
                            <div class="row">
                                <div class="col-lg-1">
                                    <a href="/"><img src="{{ asset('storage/uploads/' . $job->company->logo) }}" alt="" class="img-fluid rounded-3" style="border: 1px solid #c4c4c4;height: 70px;width: 70px;object-fit: cover;"></a>
                                </div><!--end col-->
                                <div class="col-lg-10">
                                    <div class="mt-3 mt-lg-0">
                                        <h5 class="fs-17 mb-1"><a href="/job/detail/{{ $job->id }}" class="text-dark">{{ $job->title }}</a> <small class="text-muted fw-normal">({{ $job->year }} Yrs Exp.)</small></h5>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <p class="text-muted fs-14 mb-0">{{ $job->company->name }}</p>
                                            </li>
                                            <li class="list-inline-item">
                                                @if (is_array($job->arr_level))
                                                    <p class="text-muted fs-14 mb-0">
                                                        @foreach ($job->arr_level as $level)
                                                            <span class="badge bg-soft-success mt-1">{{ $level }}</span>
                                                        @endforeach
                                                    </p>
                                                @else
                                                    <p class="text-muted fs-14 mb-0">
                                                        <span class="badge bg-soft-success mt-1">{{ $job->level }}</span>
                                                        
                                                    </p>
                                                @endif
                                            </li>
                                            <li class="list-inline-item">
                                                <p class="text-muted fs-14 mb-0"><i class="uil uil-wallet"></i> 
                                                    @if ($job->is_negotiate)
                                                        Negotiate
                                                    @else 
                                                        @if (empty($job->min_salary))
                                                            up to {{ $job->max_salary }}$
                                                        @elseif (empty($job->max_salary))
                                                            {{ $job->min_salary }}$+
                                                        @else
                                                            {{ $job->min_salary }}$ - {{ $job->max_salary }}$
                                                        @endif
                                                    @endif
                                                </p>
                                            </li>
                                        </ul>
                                        <div class="mt-2">
                                            @if (is_array($job->arr_type))
                                                <p class="text-muted fs-14 mb-0">
                                                    @foreach ($job->arr_type as $type)
                                                        <span class="badge bg-primary mt-1">{{ $type }}</span>
                                                    @endforeach
                                                </p>
                                            @else
                                                <p class="text-muted fs-14 mb-0">
                                                    <span class="badge bg-primary mt-1">{{ $job->type }}</span>                                                                    
                                                </p>
                                            @endif
                                            {{-- <span class="badge bg-soft-success mt-1">Full Time</span>
                                            <span class="badge bg-soft-warning mt-1">Urgent</span>
                                            <span class="badge bg-soft-info mt-1">Private</span> --}}
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="favorite-icon">
                                <a href="javascript:void(0)"><i class="uil uil-heart-alt fs-18"></i></a>
                            </div>
                        </div>
                        <div class="p-3 bg-light">
                            <div class="row justify-content-between">
                                <div class="col-md-8">
                                    <div>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><i class="uil uil-tag"></i> Keywords :</li>
                                            @if (is_array($job->arr_skill))
                                                @foreach ($job->arr_skill as $skill)
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="primary-link text-muted">{{ $skill }}</a>
                                                        @if(!$loop->last)
                                                            ,
                                                        @endif
                                                    </li>
                                                @endforeach
                                               
                                            @else
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="primary-link text-muted">{{ $job->skill }}</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-3">
                                    <div class="text-md-end">
                                        @if ($job->can_apply)
                                            @if (auth()->check() && auth()->user()->type == config('constants.USER.TYPE.USER'))
                                                <form method="POST" action="{{ route('site.request.apply') }}">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">
                                                            Apply Now
                                                            <i class="mdi mdi-chevron-double-right"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            @elseif (auth()->check() && auth()->user()->type != config('constants.USER.TYPE.USER'))
                                                Just User Can To Apply
                                            @else
                                                <a href="/login" class="primary-link">
                                                    Login To Apply
                                                    <i class="mdi mdi-chevron-double-right"></i>
                                                </a>
                                            @endif
                                        @else 
                                            Was apply !
                                        @endif
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
               
                
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="mb-3 mb-lg-0 mt-4">
                            <h6 class="fs-16 mb-0"> Danh Sách Ứng Tuyển: {{ $job->number_request }} CV</h6>
                        </div>
                    </div>
                </div><!--end row-->
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="candidate-list">
                            @foreach ($job->requests as $request)
                            <div class="candidate-list-box card mt-4">
                                <div class="card-body p-4">
                                    <div class="row align-items-center">
                                        <div class="col-lg-1">
                                            <div class="candidate-list-images">
                                                <a href="javascript:void(0)"><img src="{{ asset('storage/uploads/' . $request->user->profileUser->avatar) }}" alt="" style="
                                                    object-fit: cover;
                                                " class="avatar-md img-thumbnail rounded-circle"></a>
                                            </div>
                                        </div><!--end col-->
                                        
                                        <div class="col-lg-6">
                                            <div class="candidate-list-content mt-3 mt-lg-0">
                                                <h5 class="fs-19 mb-0"><a href="/profile/detail-user/{{ $request->user->id }}" class="primary-link">{{ $request->user->name }} ({{ $request->user->profileUser->job_title }})</a> </h5>
                                                <ul class="list-inline mb-0 text-muted">
                                                    <li class="list-inline-item">
                                                        <i class="uil uil-envelope-alt"></i> {{ $request->user->email }}
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-map-marker"></i> {{ $request->user->profileUser->address }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-5 align-self-end">
                                            <ul class="list-inline text-end">
                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="File CV">
                                                    <a href="{{ asset('storage/uploads/' . $request->file_cv) }}" download class="avatar-sm bg-soft-success d-inline-block text-center rounded-circle fs-18">
                                                        <i class="uil uil-edit"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!--end col-->
                                        
                                    </div>

                                    
                                </div>
                            </div>
                            <div class="p-3 bg-light">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-md-8">
                                        <div>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item"><i class="uil uil-tag"></i> Keywords :</li>
                                                @if (is_array($request->user->profileUser->arr_skill))
                                                    @foreach ($request->user->profileUser->arr_skill as $skill)
                                                        <li class="list-inline-item"><a href="javascript:void(0)" class="primary-link text-muted">{{ $skill }}</a>
                                                            @if(!$loop->last)
                                                                ,
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                   
                                                @else
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="primary-link text-muted">{{ $request->user->profileUser->skill }}</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-3">
                                        <div class="text-md-end">
                                            <a href="/profile/detail-user/{{ $request->user->id }}"><button type="button" class="btn btn-primary">View detail profile</button></a>
                                          
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            @endforeach
                            

                            
                        </div><!--end candidate-list-->
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination job-pagination mb-0 justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript:void(0)" tabindex="-1">
                                        <i class="mdi mdi-chevron-double-left fs-15"></i>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:void(0)">
                                        <i class="mdi mdi-chevron-double-right fs-15"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!--end col-->
                </div><!-- end row -->

            </div><!--end container-->
        </section>
        <!-- END JOB-LIST -->

    </div>
    <!-- End Page-content -->

    <!-- START SUBSCRIBE -->
    
    <!-- END SUBSCRIBE -->

    <!-- START FOOTER -->
    
    <!-- end switcher-->

    <!--start back-to-top-->
    <button onclick="topFunction()" id="back-to-top">
        <i class="mdi mdi-arrow-up"></i>
    </button>
    <!--end back-to-top-->
</div>

@endsection

@section('after-main-css')
    <!-- Choise Css -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/choices.min.css') }}">

@endsection

@section('after-main-js')
    <script src="{{ asset('assets/site/js/choices.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/candidate.init.js') }}"></script>
@endsection

@section('js')
    
@endsection