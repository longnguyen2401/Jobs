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
                            <h3 class="mb-4">Company Profile</h3>
                            <div class="page-next">
                                <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        
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
               
                <div class="row bg-1">
                    <form method="POST" action="/company/profile/save" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div>
                            <h5 class="fs-17 fw-semibold mb-3 mb-0">Company infomation</h5>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Logo Company</label>
                                        <input type="file" class="form-control" name="file-logo" 
                                        value="{{ isset(auth()->user()->company) ? auth()->user()->company->logo : '' }}"/>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" 
                                            name="name" 
                                            placeholder="Company name" 
                                            value="{{ (auth()->user()->company->name) ?? '' }}" 
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tax Identification Number</label>
                                        <input type="number" class="form-control" 
                                            name="tax" 
                                            placeholder="Enter tax" 
                                            value="{{ (auth()->user()->company->tax) ?? '' }}" 
                                        />
                                        @if($errors->has('tax'))
                                            <div class="alert bg-soft-danger mt-3">
                                                {{ $errors->first('tax') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="slogan" class="form-label">Slogan</label>
                                        <input type="text" class="form-control" 
                                            name="slogan" 
                                            placeholder="Slogan" 
                                            value="{{ (auth()->user()->company->slogan) ?? '' }}" 
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="people" class="form-label">Employees</label>
                                        <input type="text" class="form-control" 
                                            name="people" 
                                            placeholder="Number of employees" 
                                            value="{{ (auth()->user()->company->people) ?? '' }}" 
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" 
                                            name="email" 
                                            placeholder="Email" 
                                            value="{{ (auth()->user()->company->email) ?? '' }}" 
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" 
                                            name="address" 
                                            placeholder="Address" 
                                            value="{{ (auth()->user()->company->address) ?? '' }}" 
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="website" class="form-label">Website</label>
                                        <input type="text" class="form-control" 
                                            name="website" 
                                            placeholder="Url of website" 
                                            value="{{ (auth()->user()->company->website) ?? '' }}" 
                                        />
                                    </div>
                                </div>                                    <!--end col-->
                                
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end account-->
                        <div class="mt-4">
                            <h5 class="fs-17 fw-semibold mb-3">About Company</h5>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <textarea class="form-control" id="about-text-area" name="about"
                                            rows="5">
                                            @php
                                            echo auth()->user()->company->about;
                                        @endphp
                                        </textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="languages" class="form-label">Technical Skill Keyword</label>
                                        <input type="text" class="form-control" name="technologies"
                                            value="{{ (auth()->user()->company->technologies) ?? '' }}" 
                                            placeholder="Enter with format PHP|Javascript|Python"
                                        />
                                    </div>
                                </div>

                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="attachmentscv" class="form-label">Library</label>
                                        <input class="form-control" type="file" name="file-images[]" multiple/>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
              
            </div><!--end container-->
        </section>
        <!-- END CANDIDATE-DETAILS -->


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
    
    <style>
        .bg-1 {
            border: 1px solid rgb(220, 220, 220);
            border-radius: 8px;
            padding: 2em 1.5em;
        }
    </style>
    <script src="{{ asset('assets/site/js/swiper-bundle.min.js') }}"></script>
@endsection

@section('js')
    <script>
        var swiper=new Swiper(".blogSlider",{loop:!0,pagination:{el:".swiper-pagination",clickable:!0},autoplay:{delay:2500,disableOnInteraction:!1},breakpoints:{200:{slidesPerView:1,spaceBetween:10},992:{slidesPerView:2,spaceBetween:20}}}),swiper=new Swiper(".blogdetailSlider",{loop:!0,spaceBetween:10,pagination:{el:".swiper-pagination",clickable:!0},autoplay:{delay:2500,disableOnInteraction:!1}});
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#about-text-area' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection