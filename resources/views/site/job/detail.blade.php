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
                            <h3 class="mb-4">Job Details</h3>
                            <div class="page-next">
                                <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        
                                        <li class="breadcrumb-item active" aria-current="page"> Job Details </li>
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


        <!-- START JOB-DEATILS -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card job-detail overflow-hidden">
                            <div>
                                @isset($detail->company->images)
                                <div class="swiper blogdetailSlider">
                                    <div class="swiper-wrapper">
                                        @foreach ($detail->company->arr_image as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/uploads/' . $image) }}" alt="" class="img-fluid rounded-3">
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                @endisset
                                <div class="job-details-compnay-profile index-1" >
                                    <img src="{{ asset('storage/uploads/' . $detail->company->logo) }}" alt="" class="img-fluid rounded-3 rounded-3" style="border: 1px solid #c4c4c4;height: 70px;width: 70px;object-fit: contain;background: white;padding: 5px;">
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="mb-1">{{ $detail->title }}</h5>
                                            <ul class="list-inline text-muted mb-0">
                                                <li class="list-inline-item">
                                                    <i class="mdi mdi-account"></i> {{ $detail->quantity }} Vacancy
                                                </li>
                                                
                                            </ul>
                                        </div><!--end col-->
                                        <div class="col-lg-4">
                                            <ul class="list-inline mb-0 text-lg-end mt-3 mt-lg-0">
                                                <li class="list-inline-item">
                                                    <div class="favorite-icon">
                                                        {{-- <a href="javascript:void(0)"><i class="uil uil-heart-alt"></i></a> --}}
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="favorite-icon">
                                                        {{-- <a href="javascript:void(0)"><i class="uil uil-setting"></i></a> --}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!--end col-->
                                    </div><!--end row-->    
                                </div>

                                <div class="mt-4">
                                    <div class="row g-2">
                                        <div class="col-lg-3">
                                            <div class="border rounded-start p-3">
                                                <p class="text-muted mb-0 fs-13">Experience</p>
                                                <p class="fw-medium fs-15 mb-0">{{ $detail->year }} Year</p> 
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="border p-3">
                                                <p class="text-muted fs-13 mb-0">Employee type</p>
                                                <p class="fw-medium mb-0">
                                                    @if (is_array($detail->arr_type))
                                                        @foreach ($detail->arr_type as $type)
                                                            <span class="badge bg-primary mt-1">{{ $type }}</span>
                                                        @endforeach
                                                    @else
                                                        <span class="badge bg-primary mt-1">{{ $detail->type }}</span>                                                                    
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="border p-3">
                                            <p class="text-muted fs-13 mb-0">Level</p>
                                                <p class="fw-medium mb-0">
                                                    @if (is_array($detail->arr_level))
                                                        @foreach ($detail->arr_level as $level)
                                                            <span class="badge bg-soft-success mt-1">{{ $level }}</span>
                                                        @endforeach                                                        
                                                    @else
                                                        <span class="badge bg-soft-success mt-1">{{ $detail->level }}</span>                                                        
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="border rounded-end p-3">
                                                <p class="text-muted fs-13 mb-0">Offer Salary</p>
                                                <p class="fw-medium mb-0">
                                                    @if ($detail->is_negotiate)
                                                        Negotiate
                                                    @else 
                                                        @if (empty($detail->min_salary))
                                                            up to {{ $detail->max_salary }}$
                                                        @elseif (empty($detail->max_salary))
                                                            {{ $detail->min_salary }}$+
                                                        @else
                                                            {{ $detail->min_salary }}$ - {{ $detail->max_salary }}$
                                                        @endif
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end Experience-->

                                <div class="mt-4 job-description">
                                    @php
                                        echo $detail->description;
                                    @endphp 
                                </div>

                                <div class="mt-4">
                                    <h5 class="mb-2">Technical Skill</h5>
                                    <div class="job-details-desc">                                        
                                        <div class="mt-0 mb-2">
                                            @if (is_array($detail->arr_skill))
                                                @foreach ($detail->arr_skill as $skill)
                                                    <span class="badge bg-primary">{{ $skill }}</span>  
                                                @endforeach
                                                
                                            @else
                                                <span class="badge bg-primary">{{ $detail->skill }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end job-detail-->

                        <div class="mt-4">
                            <h5>Related Jobs</h5>
                            @foreach ($detail->related as $job)
                                @if ($job->id != $detail->id)
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
                                                {{-- <a href="javascript:void(0)"><i class="uil uil-heart-alt fs-18"></i></a> --}}
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
                                @endif
                            @endforeach
                            

                        </div>

                        {{-- <div class="text-center mt-4">
                            <a href="job-list.html" class="primary-link form-text">View More <i class="mdi mdi-arrow-right"></i></a>
                        </div> --}}

                    </div><!--end col-->

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <!--start side-bar-->
                        <div class="side-bar ms-lg-4">
                            <div class="card job-overview">
                                <div class="card-body p-4">
                                    <h6 class="fs-17">Job Overview</h6>
                                    <ul class="list-unstyled mt-4 mb-0">
                                        <li>
                                            <div class="d-flex mt-4">
                                                <i class="uil uil-user icon bg-soft-primary"></i>
                                                <div class="ms-3">
                                                    <h6 class="fs-14 mb-2">Job Title</h6>
                                                    <p class="text-muted mb-0">{{ $detail->title }}</p> 
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex mt-4">
                                                <i class="uil uil-star-half-alt icon bg-soft-primary"></i>
                                                <div class="ms-3">
                                                    <h6 class="fs-14 mb-2">Experience</h6>
                                                    <p class="text-muted mb-0"> {{ $detail->year }} Years</p> 
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex mt-4">
                                                <i class="uil uil-usd-circle icon bg-soft-primary"></i>
                                                <div class="ms-3">
                                                    <h6 class="fs-14 mb-2">Offered Salary</h6>
                                                    <p class="text-muted mb-0">
                                                        @if ($detail->is_negotiate)
                                                            Negotiate
                                                        @else 
                                                            @if (empty($detail->min_salary))
                                                                up to {{ $detail->max_salary }}$
                                                            @elseif (empty($detail->max_salary))
                                                                {{ $detail->min_salary }}$+
                                                            @else
                                                                {{ $detail->min_salary }}$ - {{ $detail->max_salary }}$
                                                            @endif
                                                        @endif
                                                    </p> 
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="d-flex mt-4">
                                                <i class="uil uil-history icon bg-soft-primary"></i>
                                                <div class="ms-3">
                                                    <h6 class="fs-14 mb-2">Expired Date</h6>
                                                    <p class="text-muted mb-0">
                                                        {{ $detail->expired_date }}    
                                                    </p> 
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="d-flex mt-4">
                                                <i class="uil uil-history icon bg-soft-primary"></i>
                                                <div class="ms-3">
                                                    <h6 class="fs-14 mb-2">Thời Bian Bắt Đầu</h6>
                                                    <p class="text-muted mb-0">
                                                        {{ $detail->from_date }}    
                                                    </p> 
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="mt-3 text-center">
                                        @if ($detail->can_apply)
                                            @if (auth()->check() && auth()->user()->type == config('constants.USER.TYPE.USER'))
                                                <form method="POST" action="{{ route('site.request.apply') }}">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="job_id" value="{{ $detail->id }}">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary btn-hover w-100 mt-2">
                                                            Apply Now
                                                            <i class="mdi mdi-chevron-double-right"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            @elseif (auth()->check() && auth()->user()->type != config('constants.USER.TYPE.USER'))
                                                Just User Can To Apply
                                            @else
                                                <a href="/login" class="btn btn-primary btn-hover w-100 mt-2">
                                                    Login To Apply
                                                    <i class="mdi mdi-chevron-double-right"></i>
                                                </a>
                                            @endif
                                        @else 
                                            Was apply !
                                        @endif
                                        {{-- <a href="#applyNow" data-bs-toggle="modal" class="btn btn-primary btn-hover w-100 mt-2">Apply Now <i class="uil uil-arrow-right"></i></a> --}}
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end job-overview-->

                            <div class="card company-profile mt-4">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <img src="{{ asset('storage/uploads/' . $detail->company->logo) }}" alt="" class="img-fluid rounded-3">

                                        <div class="mt-4">
                                            <h6 class="fs-17 mb-1">{{ $detail->company->name }}</h6>
                                            {{-- <p class="text-muted">Since July 2017</p> --}}
                                        </div>
                                    </div>
                                    <ul class="list-unstyled mt-4">
                                        <li class="mt-3">
                                            <div class="d-flex">
                                                <i class="uil uil-envelope text-primary fs-4"></i>
                                                <div class="ms-3">
                                                    <h6 class="fs-14 mb-2">Email</h6>
                                                    <p class="text-muted fs-14 mb-0">{{ $detail->company->email }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mt-3">
                                            <div class="d-flex">
                                                <i class="uil uil-globe text-primary fs-4"></i>
                                                <div class="ms-3">
                                                    <h6 class="fs-14 mb-2">Website</h6>
                                                    <p class="text-muted fs-14 text-break mb-0">{{ $detail->company->website }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mt-3">
                                            <div class="d-flex">
                                                <i class="uil uil-map-marker text-primary fs-4"></i>
                                                <div class="ms-3">
                                                    <h6 class="fs-14 mb-2">Location</h6>
                                                    <p class="text-muted fs-14 mb-0">{{ $detail->company->address }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="mt-4">
                                        <a href="/company/detail/{{ $detail->company->id }}" class="btn btn-primary btn-hover w-100 rounded"><i class="mdi mdi-eye"></i> View Profile</a>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="mt-4">
                                <h6 class="fs-16 mb-3">Job location</h6>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1628067715234!5m2!1sen!2sin" style="width:100%"  height="250" allowfullscreen="" loading="lazy"></iframe>
                            </div> --}}
                        </div>
                        <!--end side-bar-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        <!-- START JOB-DEATILS -->

    </div>

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
    <!-- Swiper Css -->
    
    <link rel="stylesheet" href="{{ asset('assets/site/css/swiper-bundle.min.css') }}">
    
    <style>
        .index-1 {
            position: relative;
            z-index: 1;
        }

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