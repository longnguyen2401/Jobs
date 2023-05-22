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
                                    <a href="mailto:{{ $detail->user->email }}" class="btn btn-danger btn-hover w-100"><i class="uil uil-envelope"></i> Contact Me</a>
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
                                    @isset($detail->experiences)
                                        @foreach ($detail->experiences as $experiences)
                                        <div class="candidate-education-content mt-4 d-flex">
                                            <div class="circle flex-shrink-0 bg-soft-primary">{{ $experiences->first_keyword_name }}</div>
                                            <div class="ms-4">
                                                <h6 class="fs-16 mb-1">{{ $experiences->position }}</h6>
                                                <p class="mb-2 text-muted">{{ $experiences->company_name }} - ({{ ($experiences->fm_start) ?? '' }} - {{ ($experiences->fm_end) ?? '' }})</p>
                                                <p class="text-muted">
                                                    {{ ($experiences->description) ?? '' }}    
                                                </p>
                                            </div>
                                        </div>

                                        @endforeach
                                    @endisset
                                </div>

                                <div class="candidate-education-details mt-4">
                                    <h6 class="fs-18 fw-bold mb-0">Project</h6>
                                    @isset($detail->project)
                                        @foreach ($detail->project as $project)
                                        <div class="candidate-education-content mt-4 d-flex">
                                            <div class="circle flex-shrink-0 bg-soft-primary">{{ $project->first_keyword_name }}</div>
                                            <div class="ms-4">
                                                <h6 class="fs-16 mb-1">{{ $project->name }}</h6>
                                                <p class="mb-2 text-muted">{{ $project->position }} - ({{ ($project->fm_start) ?? '' }} - {{ ($project->fm_end) ?? '' }})</p>
                                                <p class="text-muted">
                                                    {{ ($project->description) ?? '' }}    
                                                </p>
                                            </div>
                                        </div>

                                        @endforeach
                                    @endisset
                                </div>

                                <div class="candidate-education-details mt-4">
                                    <h6 class="fs-18 fw-bold mb-0">Certificate</h6>
                                    @isset($detail->certification)
                                        @foreach ($detail->certification as $certification)
                                        <div class="candidate-education-content mt-4 d-flex">
                                            <div class="circle flex-shrink-0 bg-soft-primary">{{ $certification->first_keyword_name }}</div>
                                            <div class="ms-4">
                                                <h6 class="fs-16 mb-1">{{ $certification->name }}</h6>
                                                <p class="mb-2 text-muted">{{ $certification->organize_name }} - {{ ($certification->fm_time) ?? '' }}</p>
                                                <p class="text-muted">
                                                    {{ ($certification->description) ?? '' }}    
                                                </p>
                                                @php
                                                    if (strstr($certification->file, '.png') || strstr($certification->file, '.jpg')) { @endphp
                                                        
                                                        <a href="{{ asset('storage/uploads/' . $certification->file) }}" target="_blank"><img style="height: 300px;" src='{{ asset('storage/uploads/' . $certification->file) }}' alt="" class="img-fluid rounded-3"></a>
                                                    @php } else { @endphp
                                                        <a href="{{ asset('storage/uploads/' . $certification->file) }}" target="_blank">Link Certificate</a>
                                                    @php
                                                        
                                                    }
                                                @endphp
                                                <div>
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>

                                        @endforeach
                                    @endisset
                                </div>
                                
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
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
    <!-- Choise Css -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/choices.min.css') }}">

@endsection

@section('after-main-js')
    <script src="{{ asset('assets/site/js/choices.min.js') }}"></script>

    <script src="{{ asset('assets/site/js/job-list.init.js') }}"></script>
@endsection

@section('js')
    
@endsection