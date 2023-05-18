@extends('site.layout')

@section('title', 'Company Detail')

@section('content')
<div class="main-content">

    <div class="page-content">

        <!-- Start home -->
        <section class="page-title-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center text-white">
                            <h3 class="mb-4">Company Details</h3>
                            <div class="page-next">
                                <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                    <ol class="breadcrumb justify-content-center">
                                        
                                        
                                        <li class="breadcrumb-item active" aria-current="page"> Company Details </li>
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


         <!-- START CANDIDATE-DETAILS -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card side-bar">
                            <div class="card-body p-4">
                                <div class="candidate-profile text-center">
                                    <img src="{{ asset('storage/uploads/' . $detail->logo) }}" alt="" class="avatar-lg rounded-circle">
                                    <h6 class="fs-18 mb-1 mt-4">
                                        {{ $detail->name }}
                                    </h6>
                                    <p class="text-muted mt-3 mb-0">{{ $detail->slogan }}</p>
                                </div>
                            </div><!--end candidate-profile-->

                            <div class="candidate-profile-overview  card-body border-top p-4">
                                <h6 class="fs-17 fw-medium mb-3">Company Overview</h6>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <div class="d-flex">
                                            <label class="text-dark">Employees</label>
                                            <div>
                                                <p class="text-muted mb-0">{{ $detail->people }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <label class="text-dark">Email</label>
                                            <div>
                                                <p class="text-muted text-break mb-0">{{ $detail->email }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <label class="text-dark">Website</label>
                                            <div>
                                                <p class="text-muted text-break mb-0">{{ $detail->website }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <label class="text-dark">Location</label>
                                            <div>
                                                <p class="text-muted mb-0">{{ $detail->address }}</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="mt-3">
                                    <a href="mailto: {{ $detail->email }}" class="btn btn-danger btn-hover w-100"><i class="uil uil-envelope"></i> Contact</a>
                                </div>
                            </div>

                            {{-- <div class="card-body p-4 border-top">
                                <h6 class="fs-17 fw-medium mb-4">Company Location</h6>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1628067715234!5m2!1sen!2sin" 
                                    style="width:100%"  height="250" allowfullscreen="" loading="lazy"></iframe>
                            </div> --}}
                        </div><!--end card-->
                    </div><!--end col-->
                    
                    <div class="col-lg-8">
                        <div class="card ms-lg-4 mt-4 mt-lg-0">
                            <div class="card-body p-4">

                                <div class="mb-5">
                                    <h6 class="fs-17 fw-medium mb-4">About Company</h6>
                                    <div class="description">
                                        {{ $detail->about }}
                                    </div>
                                </div>
                            
                                <div class="candidate-portfolio mb-5">
                                    <h6 class="fs-17 fw-medium mb-4">Gallery</h6>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            @isset($detail->images)
                                            <div class="swiper blogdetailSlider">
                                                <div class="swiper-wrapper">
                                                    @foreach ($detail->arr_image as $image)
                                                        <div class="swiper-slide">
                                                            <img src="{{ asset('storage/uploads/' . $image) }}" alt="" class="img-fluid rounded-3">
                                                        </div>
                                                    @endforeach
                                                    
                                                </div>
                                            </div>
                                            @endisset
                                        </div>
                                    </div><!-- end row -->
                                </div><!-- end portfolio -->  
                                
                                <div>
                                    <h6 class="fs-17 fw-medium mb-4">Current Opening</h6>
                                    @foreach ($detail->jobs as $job)
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
                            </div><!-- card body end -->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        <!-- END CANDIDATE-DETAILS -->

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
                            <label for="nameFormControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameFormControlInput" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="emailFormControlInput" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="emailFormControlInput" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Enter your message"></textarea>
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
            <img src="assets/images/subscribe.png" alt="" class="img-fluid">
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
    <!-- Swiper Css -->
    
    <link rel="stylesheet" href="{{ asset('assets/site/css/swiper-bundle.min.css') }}">
    
    <style>

        .swiper-slide img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
    </style>
@endsection

@section('after-main-js')
    <!-- Swiper Js -->
    
    <script src="{{ asset('assets/site/js/swiper-bundle.min.js') }}"></script>
@endsection

@section('js')
    <script>
        var swiper=new Swiper(".blogSlider",{loop:!0,pagination:{el:".swiper-pagination",clickable:!0},autoplay:{delay:2500,disableOnInteraction:!1},breakpoints:{200:{slidesPerView:1,spaceBetween:10},992:{slidesPerView:2,spaceBetween:20}}}),swiper=new Swiper(".blogdetailSlider",{loop:!0,spaceBetween:10,pagination:{el:".swiper-pagination",clickable:!0},autoplay:{delay:2500,disableOnInteraction:!1}});
    </script>
@endsection