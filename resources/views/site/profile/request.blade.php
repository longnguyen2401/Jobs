@extends('site.layout')

@section('title', 'Job Apply')

@section('content')
<div class="main-content">

    <div class="page-content">

        <!-- Start home -->
        <section class="page-title-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center text-white">
                            <h3 class="mb-4">Manage Jobs</h3>
                            <div class="page-next">
                                <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item"><a href="/profile/detail">Profile</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Manage Jobs </li>
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


        <!-- START MANAGE-JOBS -->
        <section class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="mb-4 mb-lg-0">
                            <h6 class="mb-0"> My Job Listings </h6>
                        </div>
                    </div><!--end col-->
                    {{-- <div class="col-lg-4">
                        <div class="candidate-list-widgets">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="selection-widget">
                                        <select class="form-select" data-trigger name="choices-single-filter-orderby" id="choices-single-filter-orderby" aria-label="Default select example">
                                            <option value="df">Default</option>
                                            <option value="ne">Newest</option>
                                            <option value="od">Oldest</option>
                                            <option value="rd">Random</option>
                                        </select>
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-6">
                                    <div class="selection-widget mt-2 mt-lg-0">
                                        <select class="form-select" data-trigger name="choices-candidate-page" id="choices-candidate-page" aria-label="Default select example">
                                            <option value="df">All</option>
                                            <option value="ne">Last 2 Month</option>
                                            <option value="ne">Last 6 Month</option>
                                            <option value="ne">Last 12 Month</option>
                                            <option value="ne">Last 2 Year</option>
                                        </select>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end candidate-list-widgets-->
                    </div><!--end col--> --}}
                </div><!--end row-->
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($data as $request)
                        <div class="job-box card mt-5">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-lg-1">
                                        {{-- {{ $detail->company->id }} --}}
                                        <a href="/company/detail/"><img src="{{ asset('storage/uploads/' . $request->job->company->logo) }}" alt="" class="img-fluid rounded-3"></a>
                                    </div><!--end col-->
                                    <div class="col-lg-9">
                                        <div class="mt-3 mt-lg-0">
                                            <h5 class="fs-17 mb-1"><a href="/job/detail/{{ $request->job->id }}" class="text-dark">{{ $request->job->title }}</a></h5>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <p class="text-muted fs-14 mb-0">{{ $request->job->company->name }}</p>
                                                </li>
                                                <li class="list-inline-item">
                                                    @if (is_array($request->job->arr_level))
                                                        <p class="text-muted fs-14 mb-0">
                                                            @foreach ($request->job->arr_level as $level)
                                                                <span class="badge bg-soft-success mt-1">{{ $level }}</span>
                                                            @endforeach
                                                        </p>
                                                    @else
                                                        <p class="text-muted fs-14 mb-0">
                                                            <span class="badge bg-soft-success mt-1">{{ $request->job->level }}</span>
                                                            
                                                        </p>
                                                    @endif
                                                </li>
                                                <li class="list-inline-item">
                                                    <p class="text-muted fs-14 mb-0"><i class="uil uil-wallet"></i> 
                                                        @if ($request->job->is_negotiate)
                                                            Negotiate
                                                        @else 
                                                            @if (empty($request->job->min_salary))
                                                                up to {{ $request->job->max_salary }}$
                                                            @elseif (empty($job->max_salary))
                                                                {{ $request->job->min_salary }}$+
                                                            @else
                                                                {{ $request->job->min_salary }}$ - {{ $request->job->max_salary }}$
                                                            @endif
                                                        @endif
                                                    </p>
                                                </li>
                                            </ul>
                                            <div class="mt-2">
                                                @if (is_array($request->job->arr_type))
                                                    <p class="text-muted fs-14 mb-0">
                                                        @foreach ($request->job->arr_type as $type)
                                                            <span class="badge bg-primary mt-1">{{ $type }}</span>
                                                        @endforeach
                                                    </p>
                                                @else
                                                    <p class="text-muted fs-14 mb-0">
                                                        <span class="badge bg-primary mt-1">{{ $request->job->type }}</span>                                                                    
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-2 align-self-center">
                                        <ul class="list-inline mt-3 mb-0 text-end">
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="top" title="File CV">
                                                <a href="{{ asset('storage/uploads/' . $request->file_cv) }}" download class="avatar-sm bg-soft-success d-inline-block text-center rounded-circle fs-18">
                                                    <i class="uil uil-edit"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!--end col-->
                                    
                                </div><!--end row-->
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    {{-- <div class="p-3 bg-light">
                                        <div class="row justify-content-center ">
                                            <li class="list-inline-item">
                                                @php
                                                    $message = config('constants.REQUEST.MESSAGE')[$request->status];
                                                    $class = config('constants.REQUEST.CLASS')[$request->status];
                                                @endphp
                                                <button type="button" class="btn btn-{{ $class }} rounded-pill">{{ $message }}</button>
                                            </li>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div> --}}
                                </div>
                            </div>
                        </div><!--end job-box-->
                        @endforeach
                    </div><!--end col-->    
                </div><!--end row-->

                
            </div><!--end container-->
        </section>
        <!-- END MANAGE-JOBS -->

        <!-- DELETE Modal -->

        <!-- END DELETE MODAL -->

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