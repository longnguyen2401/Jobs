@extends('site.layout')

@section('title', 'Portfolio List')

@section('content')
<div class="main-content">

    <div class="page-content">

        <!-- Start home -->
        <section class="page-title-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center text-white">
                            <h3 class="mb-4">Candidate List</h3>
                            <div class="page-next">
                                <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Portfolio list </li>
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


        <!-- START JOB-LIST -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="candidate-list-widgets mb-4">
                            <form action="/profile/filter">
                                <div class="row g-2">
                                    <div class="col-lg-9">
                                        <div class="filler-job-form">
                                            <i class="uil uil-briefcase-alt"></i>
                                            <input type="search" class="form-control filter-job-input-box" name="skill" placeholder="Search by skill... ">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <button href="javascript:void(0)" type="submit" class="btn btn-primary w-100"><i class="uil uil-filter"></i> 
                                                Fliter
                                            </button>
                                            {{-- <a href="javascript:void(0)" class="btn btn-success ms-2"><i class="uil uil-cog"></i> Advance</a> --}}
                                        </div>
                                    </div>
                                </div><!--end row-->
                            </form><!--end form-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                {{-- <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class=" mb-lg-0">
                            <h6 class="fs-16 mb-0"> Showing 1 – 8 of 11 results </h6>
                        </div>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-lg-12">
                        <div class="candidate-list">
                            @foreach ($list as $profile)
                            <div class="candidate-list-box card mt-4">
                                <div class="card-body p-4">
                                    <div class="row align-items-center">
                                        <div class="col-lg-1">
                                            <div class="candidate-list-images">
                                                <a href="javascript:void(0)"><img src="{{ asset('storage/uploads/' . $profile->avatar) }}" alt="" style="
                                                    object-fit: cover;
                                                " class="avatar-md img-thumbnail rounded-circle"></a>
                                            </div>
                                        </div><!--end col-->
                                        
                                        <div class="col-lg-6">
                                            <div class="candidate-list-content mt-3 mt-lg-0">
                                                <h5 class="fs-19 mb-0"><a href="/profile/detail-user/{{ $profile->user->id }}" class="primary-link">{{ $profile->user->name }} ({{ $profile->job_title }})</a> </h5>
                                                <ul class="list-inline mb-0 text-muted">
                                                    <li class="list-inline-item">
                                                        <i class="uil uil-envelope-alt"></i> {{ $profile->user->email }}
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="mdi mdi-map-marker"></i> {{ $profile->address }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!--end col-->

                                        @isset($profile->cv)
                                        <div class="col-lg-5 align-self-end">
                                            <ul class="list-inline text-end">
                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="File CV">
                                                    <a href="{{ asset('storage/uploads/' . $profile->cv) }}" download class="avatar-sm bg-soft-success d-inline-block text-center rounded-circle fs-18">
                                                        <i class="uil uil-edit"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!--end col-->
                                        @endisset
                                    </div>

                                    
                                </div>
                            </div>
                            <div class="p-3 bg-light">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-md-8">
                                        <div>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item"><i class="uil uil-tag"></i> Keywords :</li>
                                                @if (is_array($profile->arr_skill))
                                                    @foreach ($profile->arr_skill as $skill)
                                                        <li class="list-inline-item"><a href="javascript:void(0)" class="primary-link text-muted">{{ $skill }}</a>
                                                            @if(!$loop->last)
                                                                ,
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                   
                                                @else
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="primary-link text-muted">{{ $profile->skill }}</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-3">
                                        <div class="text-md-end">
                                            <a href="/profile/detail-user/{{ $profile->user->id }}"><button type="button" class="btn btn-primary">View detail profile</button></a>
                                          
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
                        {{ $list->appends(request()->input())->links('site.component.pagination') }}       
                       
                        
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

    <script src="{{ asset('assets/site/js/job-list.init.js') }}"></script>
@endsection

@section('js')
    
@endsection