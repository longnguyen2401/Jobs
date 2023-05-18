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
                <div class="row">

                    <div class="col-lg-9">
                        <div class="me-lg-5">
                            <div class="job-list-header">
                                <form action="/search/mo/" method="get">
                                    <div class="row g-2">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="filler-job-form">
                                                <i class="uil uil-briefcase-alt"></i>
                                                <input type="search" class="form-control filter-job-input-box" id="exampleFormControlInput1" placeholder="Job, company... ">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="filler-job-form">
                                                <i class="uil uil-location-point"></i>
                                                <select class="form-select" data-trigger name="choices-single-location" id="choices-single-location" aria-label="Default select example">
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">&Aring;land Islands</option>
                                                
                                                </select>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="filler-job-form">
                                                <i class="uil uil-clipboard-notes"></i>
                                                <select class="form-select " data-trigger name="choices-single-categories" id="choices-single-categories" aria-label="Default select example">
                                                    <option value="4">Accounting</option>
                                                    <option value="1">IT & Software</option>
                                                    <option value="3">Marketing</option>
                                                    <option value="5">Banking</option>
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
                            <div class="wedget-popular-title mt-4">
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
                            </div><!--end wedget-popular-title-->
        
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
                        </div>

                    </div>
                    <!-- START SIDE-BAR -->
                    <div class="col-lg-3">
                        <div class="side-bar mt-5 mt-lg-0">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="locationOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#location" aria-expanded="true" aria-controls="location">
                                        Location
                                    </button>
                                    </h2>
                                    <div id="location" class="accordion-collapse collapse show" aria-labelledby="locationOne">
                                        <div class="accordion-body">
                                            <div class="side-title">
                                                <div class="mb-3">
                                                    <form class="position-relative">
                                                        <input class="form-control" type="search" placeholder="Search...">
                                                        <button class="bg-transparent border-0 position-absolute top-50 end-0 translate-middle-y me-2" type="submit"><span class="mdi mdi-magnify text-muted"></span></button>
                                                    </form>
                                                </div>
                                                <div class="area-range">
                                                    <div class="form-label mb-3">Area Range: <span class="example-val mt-2" id="slider1-span">0</span> miles</div>
                                                    <div id="slider1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end accordion-item -->
                        
                                <div class="accordion-item mt-4">   
                                <h2 class="accordion-header" id="experienceOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#experience" aria-expanded="true" aria-controls="experience">
                                        Work experience
                                    </button>
                                </h2>
                                <div id="experience" class="accordion-collapse collapse show" aria-labelledby="experienceOne">
                                    <div class="accordion-body">
                                        <div class="side-title">
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" />
                                                <label class="form-check-label ms-2 text-muted" for="flexCheckChecked1">No experience</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" checked />
                                                <label class="form-check-label ms-2 text-muted" for="flexCheckChecked2">0-3 years</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3" />
                                                <label class="form-check-label ms-2 text-muted" for="flexCheckChecked3">3-6 years</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked4" />
                                                <label class="form-check-label ms-2 text-muted" for="flexCheckChecked4">More than 6 years</label>
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
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6" checked>
                                                    <label class="form-check-label ms-2 text-muted" for="flexRadioDefault6">
                                                        Freelance
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                    <label class="form-check-label ms-2 text-muted" for="flexRadioDefault2">
                                                        Full Time
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                                    <label class="form-check-label ms-2 text-muted" for="flexRadioDefault3">
                                                        Internship
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                                    <label class="form-check-label ms-2 text-muted" for="flexRadioDefault4">
                                                        Part Time
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
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="" />
                                                    <label class="form-check-label ms-2 text-muted" for="checkAll">
                                                        All
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox"  name="datePosted"  value="last" id="flexCheckChecked5" checked />
                                                    <label class="form-check-label ms-2 text-muted" for="flexCheckChecked5">
                                                        Last Hour
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" name="datePosted" value="last" id="flexCheckChecked6" />
                                                    <label class="form-check-label ms-2 text-muted" for="flexCheckChecked6">
                                                        Last 24 hours
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" name="datePosted" value="last" id="flexCheckChecked7" />
                                                    <label class="form-check-label ms-2 text-muted" for="flexCheckChecked7">
                                                        Last 7 days
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" name="datePosted" value="last" id="flexCheckChecked8" />
                                                    <label class="form-check-label ms-2 text-muted" for="flexCheckChecked8">
                                                        Last 14 days
                                                    </label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" name="datePosted" value="last" id="flexCheckChecked9" />
                                                    <label class="form-check-label ms-2 text-muted" for="flexCheckChecked9">
                                                        Last 30 days
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end accordion-item -->
                        
                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="tagCloud">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tagcloud" aria-expanded="false" aria-controls="tagcloud">
                                            Tags Cloud
                                        </button>
                                    </h2>
                                    <div id="tagcloud" class="accordion-collapse collapse show" aria-labelledby="tagCloud">
                                        <div class="accordion-body">
                                            <div class="side-title">
                                                <a href="javascript:void(0)" class="badge tag-cloud fs-13 mt-2">design</a>
                                                <a href="javascript:void(0)" class="badge tag-cloud fs-13 mt-2">marketing</a>
                                                <a href="javascript:void(0)" class="badge tag-cloud fs-13 mt-2">business</a>
                                                <a href="javascript:void(0)" class="badge tag-cloud fs-13 mt-2">developer</a>
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

    <!-- START SUBSCRIBE -->
    <section class="bg-subscribe">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div class="text-center text-lg-start">
                        <h4 class="text-white">Get New Jobs Notification!</h4>
                        <p class="text-white-50 mb-0">Subscribe & get all related jobs notification.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-4 mt-lg-0">
                        <form class="subscribe-form" action="#">
                            <div class="input-group justify-content-center justify-content-lg-end">
                                <input type="text" class="form-control" id="subscribe" placeholder="Enter your email">
                                <button class="btn btn-primary" type="button" id="subscribebtn">Subscribe</button>
                            </div>
                        </form><!--end form-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
        <div class="email-img d-none d-lg-block">
            <img src="{{ asset('assets/site/images/subscribe.png') }}" alt="" class="img-fluid">
        </div>
    </section>
    <!-- END SUBSCRIBE -->

    <!-- START FOOTER -->
    <section class="bg-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-item mt-4 mt-lg-0 me-lg-5">
                        <h4 class="text-white mb-4">Jobcy</h4>
                        <p class="text-white-50">It is a long established fact that a reader will be of a page reader
                            will be of at its layout.</p>
                        <p class="text-white mt-3">Follow Us on:</p>
                        <ul class="footer-social-menu list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="uil uil-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="uil uil-linkedin-alt"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="uil uil-google"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="uil uil-twitter"></i></a></li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-item mt-4 mt-lg-0">
                        <p class="fs-16 text-white mb-4">Company</p>
                        <ul class="list-unstyled footer-list mb-0">
                            <li><a href="about.html"><i class="mdi mdi-chevron-right"></i> About Us</a></li>
                            <li><a href="contact.html"><i class="mdi mdi-chevron-right"></i> Contact Us</a></li>
                            <li><a href="services.html"><i class="mdi mdi-chevron-right"></i> Services</a></li>
                            <li><a href="blog.html"><i class="mdi mdi-chevron-right"></i> Blog</a></li>
                            <li><a href="team.html"><i class="mdi mdi-chevron-right"></i> Team</a></li>
                            <li><a href="pricing.html"><i class="mdi mdi-chevron-right"></i> Pricing</a></li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-item mt-4 mt-lg-0">
                        <p class="fs-16 text-white mb-4">For Jobs</p>
                        <ul class="list-unstyled footer-list mb-0">
                            <li><a href="job-categories.html"><i class="mdi mdi-chevron-right"></i> Browser Categories</a></li>
                            <li><a href="job-list.html"><i class="mdi mdi-chevron-right"></i> Browser Jobs</a></li>
                            <li><a href="job-details.html"><i class="mdi mdi-chevron-right"></i> Job Details</a></li>
                            <li><a href="bookmark-jobs.html"><i class="mdi mdi-chevron-right"></i> Bookmark Jobs</a></li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-item mt-4 mt-lg-0">
                        <p class="text-white fs-16 mb-4">For Candidates</p>
                        <ul class="list-unstyled footer-list mb-0">
                            <li><a href="candidate-list.html"><i class="mdi mdi-chevron-right"></i> Candidate List</a></li>
                            <li><a href="candidate-grid.html"><i class="mdi mdi-chevron-right"></i> Candidate Grid</a></li>
                            <li><a href="candidate-details.html"><i class="mdi mdi-chevron-right"></i> Candidate Details</a></li>
                        </ul>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 col-6">
                    <div class="footer-item mt-4 mt-lg-0">
                        <p class="fs-16 text-white mb-4">Support</p>
                        <ul class="list-unstyled footer-list mb-0">
                            <li><a href="contact.html"><i class="mdi mdi-chevron-right"></i> Help Center</a></li>
                            <li><a href="faqs.html"><i class="mdi mdi-chevron-right"></i> FAQ'S</a></li>
                            <li><a href="privacy-policy.html"><i class="mdi mdi-chevron-right"></i> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- END FOOTER -->

    <!-- START FOOTER-ALT -->
    <div class="footer-alt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-white-50 text-center mb-0">
                        <script>document.write(new Date().getFullYear())</script> &copy; Jobcy - Job Listing Page
                        Template by <a href="https://themeforest.net/search/themesdesign" target="_blank"
                            class="text-reset text-decoration-underline">Themesdesign</a>
                    </p>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div>
    <!-- END FOOTER -->
    
    <!-- Style switcher -->
    <div id="style-switcher" onclick="toggleSwitcher()" style="left: -165px;">
        <div>
            <h6>Select your color</h6>
            <ul class="pattern list-unstyled mb-0">
                <li>
                    <a class="color-list color1" href="javascript: void(0);" onclick="setColorGreen()"></a>
                </li>
                <li>
                    <a class="color-list color2" href="javascript: void(0);" onclick="setColor('blue')"></a>
                </li>
                <li>
                    <a class="color-list color3" href="javascript: void(0);" onclick="setColor('green')"></a>
                </li>
            </ul>
            <div class="mt-3">
                <h6>Light/dark Layout</h6>
                <div class="text-center mt-3">
                    <!-- light-dark mode -->
                    <a href="javascript: void(0);" id="mode" class="mode-btn text-white rounded-3">
                        <i class="uil uil-brightness mode-dark mx-auto"></i>
                        <i class="uil uil-moon mode-light"></i>
                    </a>
                    <!-- END light-dark Mode -->
                </div>
            </div>
        </div>
        <div class="bottom d-none d-md-block" >
            <a href="javascript: void(0);" class="settings rounded-end"><i class="mdi mdi-cog mdi-spin"></i></a>
        </div>
    </div>
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