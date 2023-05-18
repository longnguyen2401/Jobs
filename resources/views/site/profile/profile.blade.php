@extends('site.layout')

@section('title', 'Job Detail')

@section('content')

<div class="main-content">

    <div class="page-content">

        <!-- Start home -->
        <section class="page-title-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center text-white">
                            <h3 class="mb-4">Candidate Details</h3>
                            <div class="page-next">
                                <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        
                                        <li class="breadcrumb-item active" aria-current="page"> Candidate Details </li>
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
                                    <img src="{{ isset($detail->avatar) ? asset('storage/uploads/' . $detail->avatar) : asset('assets/site/images/profile.jpg') }}" alt="" style="
                                    object-fit: cover;
                                "
                                        class="avatar-lg img-thumbnail rounded-circle mb-4" />
                                    <h5 class="mb-0">{{ $detail->user->name }}</h5>
                                    <p class="text-muted mt-2 mb-0">{{ ($detail->job_title) ?? 'Job Title' }}</p>
                                </div>
                            </div><!--end candidate-profile-->
                            <div class="candidate-contact-details card-body p-4 border-top">
                                <h6 class="fs-17 fw-semibold mb-3">Contact Details</h6>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <div class="d-flex align-items-center mt-4">
                                            <div class="icon bg-soft-primary flex-shrink-0">
                                                <i class="uil uil-envelope-alt"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="fs-14 mb-1">Email</h6>
                                                <p class="text-muted mb-0">{{ $detail->user->email }}</p> 
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center mt-4">
                                            <div class="icon bg-soft-primary flex-shrink-0">
                                                <i class="uil uil-map-marker"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="fs-14 mb-1">Address</h6>
                                                <p class="text-muted mb-0">{{ $detail->address }}</p> 
                                            </div>
                                        </div>
                                    </li>
                                    {{-- <li>
                                        <div class="d-flex align-items-center mt-4">
                                            <div class="icon bg-soft-primary flex-shrink-0">
                                                <i class="uil uil-phone"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="fs-14 mb-1">Phone</h6>
                                                <p class="text-muted mb-0">+1(452) 125-6789</p> 
                                            </div>
                                        </div>
                                    </li> --}}
                                    <li>
                                        <div class="d-flex align-items-center mt-4">
                                            <div class="icon bg-soft-primary flex-shrink-0">
                                                <i class="uil uil-skype-alt"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="fs-14 mb-1">Website</h6>
                                                <p class="text-muted mb-0">{{ $detail->website }}</p> 
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div><!--end candidate-overview-->
                            <div class="candidate-profile-overview  card-body border-top p-4">
                                <h6 class="fs-17 fw-semibold mb-3">Document</h6>

                                <div class="mt-3">
                                    <a href="mailto: {{ $detail->user->email }}" class="btn btn-danger btn-hover w-100"><i class="uil uil-envelope"></i> Contact Me</a>
                                    @if ($detail->cv)
                                    <a href="{{ asset('storage/uploads/' . $detail->cv) }}" download class="btn btn-primary btn-hover w-100 mt-2"><i class="uil uil-import"></i> Download CV</a>    
                                    @endif
                                    
                                </div>
                                
                            </div><!--candidate-profile-overview-->
                            <div class="card-body p-4 border-top">
                                <h6 class="fs-17 fw-semibold mb-3">Professional Skills</h6>
                                <div>
                                    @if (is_array($detail->arr_skill))
                                        @foreach ($detail->arr_skill as $skill)
                                            <span class="badge bg-soft-success fs-13 mt-1">{{ $skill }}</span>
                                        @endforeach
                                        
                                    @else
                                    <span class="badge bg-soft-success fs-13 mt-1">{{ $detail->skill }}</span>
                                    @endif
                                </div>
                            </div><!--end card-body-->
                          
                        </div><!--end card-->
                    </div><!--end col-->
                    
                    <div class="col-lg-8">
                        <div class="card candidate-details ms-lg-4 mt-4 mt-lg-0">
                            <div class="card-body p-4 candidate-personal-detail">
                                <div>
                                    <h6 class="fs-17 fw-semibold mb-3">About Me</h6>
                                    <p class="text-muted mt-4">
                                        {{ ($detail->about) ?? '' }}
                                    </p>
                                </div>
                                <div class="candidate-education-details mt-4 pt-3">
                                    <h6 class="fs-17 fw-bold mb-0">Education</h6>
                                    @isset($detail->education)
                                        @foreach ($detail->education as $education)
                                        <div class="candidate-education-content mt-4 d-flex">
                                            <div class="circle flex-shrink-0 bg-soft-primary">
                                                B
                                            </div>
                                            <div class="ms-4">
                                                <h6 class="fs-16 mb-1">
                                                    {{ ($education->major) ?? '' }}
                                                </h6>
                                                <p class="mb-2 text-muted">
                                                    {{ ($education->school_name) ?? '' }} - ({{ ($education->start) ?? '' }} - {{ ($education->end) ?? '' }})
                                                </p>
                                                <p class="text-muted">
                                                    {{ ($education->description) ?? '' }}
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endisset
                                </div><!--end candidate-education-details-->
                                <div class="candidate-education-details mt-4 pt-3">
                                    <h6 class="fs-17 fw-bold mb-0">Experience</h6>
                                    <div class="candidate-education-content mt-4 d-flex">
                                        <div class="circle flex-shrink-0 bg-soft-primary"> W </div>
                                        <div class="ms-4">
                                            <h6 class="fs-16 mb-1">Web Design & Development Team Leader</h6>
                                            <p class="mb-2 text-muted">Creative Agency - (2013 - 2016)</p>
                                            <p class="text-muted">There are many variations of passages of available, but the majority alteration in some form. As a highly skilled and successfull product development and design specialist with more than 4 Years of My experience.</p>
                                        </div>
                                    </div>
                                    <div class="candidate-education-content mt-4 d-flex">
                                        <div class="circle flex-shrink-0 bg-soft-primary"> P </div>
                                        <div class="ms-4">
                                            <h6 class="fs-16 mb-1">Project Manager</h6>
                                            <p class="mb-2 text-muted">Jobcy Technology Pvt.Ltd - (Pressent)</p>
                                            <p class="text-muted mb-0">There are many variations of passages of available, but the majority alteration in some form. As a highly skilled and successfull product development and design specialist with more than 4 Years of My experience.</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
    </div>

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

@endsection

@section('after-main-js')
    <script src="{{ asset('assets/site/js/choices.min.js') }}"></script>

    <script src="{{ asset('assets/site/js/job-list.init.js') }}"></script>
@endsection

@section('js')
    
@endsection