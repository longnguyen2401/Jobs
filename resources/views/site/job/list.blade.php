@extends('site.layout')

@section('title', 'Job List')

@section('content')
<div class="main-content">

    <div class="page-content">

        <!-- Start home -->
        <section class="page-title-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center text-white">
                            <h3 class="mb-4">Job List</h3>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!-- end home -->

        <!-- START SHAPE -->
        <div class="position-relative" style="z-index: 1">
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
                    <path fill="#FFFFFF" fill-opacity="1"
                        d="M0,192L120,202.7C240,213,480,235,720,234.7C960,235,1200,213,1320,202.7L1440,192L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
                </svg>
            </div>
        </div>
        <!-- END SHAPE -->


        <!-- START JOB-LIST -->
        <section class="section">
            <div class="container">
                <form action="/job/filter" method="get">
                <div class="row">

                    <div class="col-lg-9">
                        <div class="me-lg-5">
                            <div class="job-list-header">
                                
                                    <div class="row g-2">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="filler-job-form">
                                                <i class="uil uil-briefcase-alt"></i>
                                                <input type="search" class="form-control filter-job-input-box" id="job-title" name="title" placeholder="Job title... ">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="filler-job-form">
                                                <i class="uil uil-clipboard-notes"></i>
                                                <select class="form-select" data-trigger name="company|address" id="address" aria-label="Default select example">
                                                    <option value="">Thành phố</option>
                                                    <option value="hochiminh|hcm" {{ isset(request()->{'company|address'}) && 'hochiminh|hcm' == request()->{'company|address'} ? 'selected' : ''}}>TP Hồ Chí Minh</option>
                                                    <option value="hanoi|hn" {{ isset(request()->{'company|address'}) && 'hanoi|hn' == request()->{'company|address'} ? 'selected' : ''}}>Hà Nội</option>
                                                    <option value="danang|dn" {{ isset(request()->{'company|address'}) && 'danang|dn' == request()->{'company|address'} ? 'selected' : ''}}>Đà Nẵng</option>
                                                    <option value="dalat|dl" {{ isset(request()->{'company|address'}) && 'dalat|dl' == request()->{'company|address'} ? 'selected' : ''}}>Đà Lạt</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="filler-job-form">
                                                <i class="uil uil-clipboard-notes"></i>
                                                <select class="form-select" data-trigger name="level" id="level" aria-label="Default select example">
                                                    <option value="">Level</option>
                                                    <option value="Intern" {{ isset(request()->level) && 'Intern' == request()->level ? 'selected' : ''}}>Fresher</option>
                                                    <option value="Fresher" {{ isset(request()->level) && 'Fresher' == request()->level ? 'selected' : ''}}>Fresher</option>
                                                    <option value="Junior" {{ isset(request()->level) && "Junior" == request()->level ? 'selected' : ''}}>Junior</option>
                                                    <option value="Middle" {{ isset(request()->level) && "Middle" == request()->level ? 'selected' : ''}} >Middle</option>
                                                    <option value="Senior" {{ isset(request()->level) && "Senior" == request()->level ? 'selected' : ''}}>Senior</option>
                                                </select>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-3 col-md-6">
                                            <button href="javascript:void(0)" type="submit" class="btn btn-primary w-100"><i class="uil uil-filter"></i> 
                                                Fliter
                                            </button>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div><!--end job-list-header-->
                            {{-- <div class="wedget-popular-title mt-4">
                                <h6>Popular</h6>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <div class="popular-box d-flex align-items-center">
                                            <div class="number flex-shrink-0 me-2">
                                                20  
                                            </div>
                                            <a href="javascript:void(0)" class="primary-link stretched-link"><h6 class="fs-14 mb-0">UI/UX designer</h6></a>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="popular-box d-flex align-items-center">
                                            <div class="number flex-shrink-0 me-2">
                                                18  
                                            </div>
                                            <a href="javascript:void(0)" class="primary-link stretched-link"><h6 class="fs-14 mb-0">HR manager</h6></a>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="popular-box d-flex align-items-center">
                                            <div class="number flex-shrink-0 me-2">
                                                10  
                                            </div>
                                            <a href="javascript:void(0)" class="primary-link stretched-link"><h6 class="fs-14 mb-0">Product manager</h6></a>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="popular-box d-flex align-items-center">
                                            <div class="number flex-shrink-0 me-2">
                                                15  
                                            </div>
                                            <a href="javascript:void(0)" class="primary-link stretched-link"><h6 class="fs-14 mb-0">Sales manager</h6></a>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="popular-box d-flex align-items-center">
                                            <div class="number flex-shrink-0 me-2">
                                                28  
                                            </div>
                                            <a href="javascript:void(0)" class="primary-link stretched-link"><h6 class="fs-14 mb-0">Developer</h6></a>
                                        </div>
                                    </li>
                                </ul>
                            </div><!--end wedget-popular-title--> --}}
        
                            <!-- Job-list -->
                            <div>
                                @foreach ($list as $job)
                                    <div class="job-box card mt-4">
                                        <div class="p-4">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <a href="/"><img src="{{ asset('storage/uploads/' . $job->company->logo) }}" alt="" class="img-fluid rounded-3"></a>
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
                                @endforeach
        
                            </div>
                            <!-- End Job-list -->
        
                            <div class="row">
                                <div class="col-lg-12 mt-4 pt-2">
                                    {{ $list->appends(request()->input())->links('site.component.pagination') }}
                                    
                                </div><!--end col-->
                            </div><!-- end row -->
                        </div>

                    </div>
                    <!-- START SIDE-BAR -->
                    <div class="col-lg-3">
                        <div class="side-bar mt-5 mt-lg-0">
                            <div class="accordion" id="accordionExample">
                        
                                <div class="accordion-item">   
                                <h2 class="accordion-header" id="experienceOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#experience" aria-expanded="true" aria-controls="experience">
                                        Work experience
                                    </button>
                                </h2>
                                <div id="experience" class="accordion-collapse collapse show" aria-labelledby="experienceOne">
                                    <div class="accordion-body">
                                        <div class="side-title">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="0" {{ isset(request()->year) && in_array("0", request()->year) ? 'checked' : ''}} id="year1" name="year[]"/>
                                                <label class="form-check-label ms-2 text-muted" for="year1" >No experience</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="1" {{ isset(request()->year) && in_array("1", request()->year) ? 'checked' : ''}} id="year2"  name="year[]" />
                                                <label class="form-check-label ms-2 text-muted" for="year2">1 years</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="2" {{ isset(request()->year) && in_array("2", request()->year) ? 'checked' : ''}} id="year3" name="year[]" />
                                                <label class="form-check-label ms-2 text-muted" for="year3">2 years</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="3" {{ isset(request()->year) && in_array("3", request()->year) ? 'checked' : ''}} id="year4" name="year[]" />
                                                <label class="form-check-label ms-2 text-muted" for="year4">3 years</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div><!-- end accordion-item -->
                        
                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="jobType">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#jobtype" aria-expanded="false" aria-controls="jobtype">
                                            Type of employment
                                        </button>
                                    </h2>
                                    <div id="jobtype" class="accordion-collapse collapse show" aria-labelledby="jobType">
                                        <div class="accordion-body">
                                            <div class="side-title">
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" value='Freelance' name="type" id="type1" {{ isset(request()->type) && 'Freelance' == request()->type ? 'checked' : ''}}>
                                                    <label class="form-check-label ms-2 text-muted" for="type1">
                                                        Freelance
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" value='Partime' name="type" id="type7" {{ isset(request()->type) && 'FullTime' == request()->type ? 'checked' : ''}}>
                                                    <label class="form-check-label ms-2 text-muted" for="type7">
                                                        Part Time
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" value='FullTime' name="type" id="type2" {{ isset(request()->type) && 'FullTime' == request()->type ? 'checked' : ''}}>
                                                    <label class="form-check-label ms-2 text-muted" for="type2">
                                                        Full Time
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" value='Internship' name="type" id="type3" {{ isset(request()->type) && 'Internship' == request()->type ? 'checked' : ''}}>
                                                    <label class="form-check-label ms-2 text-muted" for="type3">
                                                        Internship
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" value='Remote' name="type" id="type4" {{ isset(request()->type) && 'Remote' == request()->type ? 'checked' : ''}}>
                                                    <label class="form-check-label ms-2 text-muted" for="type4">
                                                        Remote
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" value='' name="type" id="type5" {{ empty(request()->type) ? 'checked' : ''}}>
                                                    <label class="form-check-label ms-2 text-muted" for="type5">
                                                        None
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end accordion-item -->
                        
                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="datePosted">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dateposted" aria-expanded="false" aria-controls="dateposted">
                                            Date Posted
                                        </button>
                                    </h2>
                                    <div id="dateposted" class="accordion-collapse collapse show" aria-labelledby="datePosted">
                                        <div class="accordion-body">
                                            <div class="side-title form-check-all">
                                                {{-- <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="" />
                                                    <label class="form-check-label ms-2 text-muted" for="checkAll">
                                                        All
                                                    </label>
                                                </div> --}}
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" value="1" name="created_at" {{ isset(request()->created_at) && '1' == request()->created_at ? 'checked' : ''}} value="last" id="created_at1" />
                                                    <label class="form-check-label ms-2 text-muted" for="created_at1">
                                                        Last Hour
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" value="2" name="created_at" {{ isset(request()->created_at) && '2' == request()->created_at ? 'checked' : ''}} value="last" id="created_at2" />
                                                    <label class="form-check-label ms-2 text-muted" for="created_at2">
                                                        Last 24 hours
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" value="3" name="created_at" {{ isset(request()->created_at) && '3' == request()->created_at ? 'checked' : ''}} value="last" id="created_at3" />
                                                    <label class="form-check-label ms-2 text-muted" for="created_at3">
                                                        Last 7 days
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" value="4" name="created_at" {{ isset(request()->created_at) && '4' == request()->created_at ? 'checked' : ''}} value="last" id="created_at4" />
                                                    <label class="form-check-label ms-2 text-muted" for="created_at4">
                                                        Last 14 days
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" value="5" name="created_at" {{ isset(request()->created_at) && '5' == request()->created_at ? 'checked' : ''}} value="last" id="created_at5" />
                                                    <label class="form-check-label ms-2 text-muted" for="created_at5">
                                                        Last 30 days
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" value='' name="created_at" {{ empty(request()->created_at) ? 'checked' : ''}} id="created_at6" checked>
                                                    <label class="form-check-label ms-2 text-muted" for="created_at6">
                                                        None
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end accordion-item -->
                    
                        
                            </div><!--end accordion-->
                            
                        </div><!--end side-bar-->
                    </div>
                    <!-- END SIDE-BAR -->
                </div>
            </div>
        </section>
        <!-- END JOB-LIST -->

        <!-- START APPLY MODAL -->
        <div class="modal fade" id="applyNow" tabindex="-1" aria-labelledby="applyNow" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-5">
                        <div class="text-center mb-4">
                            <h5 class="modal-title" id="staticBackdropLabel">Apply For This Job</h5>
                        </div>
                        <div class="position-absolute end-0 top-0 p-3">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mb-3">
                            <label for="nameControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameControlInput" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="emailControlInput2" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="emailControlInput2" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="messageControlTextarea" class="form-label">Message</label>
                            <textarea class="form-control" id="messageControlTextarea" rows="4" placeholder="Enter your message"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="inputGroupFile01">Resume Upload</label>
                            <input type="file" class="form-control" id="inputGroupFile01">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Application</button>
                    </div>
                </div>
            </div>
        </div><!-- END APPLY MODAL -->

    </div>
    <!-- End Page-content -->

    
</div>
@endsection

@section('after-main-css')
    <!-- Choise Css -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/choices.min.css') }}">

    <!-- Nouislider Css -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/nouislider.min.css') }}">
@endsection

@section('after-main-js')
    <!-- Choice Js -->
    <script src="{{ asset('assets/site/js/choices.min.js') }}"></script>

    <!-- Nouislider Js -->
    <script src="{{ asset('assets/site/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/area-filter-range.init.js') }}"></script>

    <!-- Checkbox Init Js -->
    <script src="{{ asset('assets/site/js/checkbox.init.js') }}"></script>
    <!-- Job Init Js -->
    {{-- <script src="assets/js/pages/job-list.init.js"></script> --}}
    <!-- Job Init Js -->
    <script src="{{ asset('assets/site/js/job-list.init.js') }}"></script>
@endsection