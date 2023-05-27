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
        @if (isset(auth()->user()->company) && auth()->user()->company->active == config('constants.COMPANY.ACTIVE.BAN'))
            <section class="section">
                <div class="container">
                    <div class="w-100 alert  bg-soft-danger mb-4 text-center">
                        Tài khoảng danh nghiệp của bạn mạo danh đã bị ban
                    </div>
                </div><!--end container-->
            </section>
        @else
            <section class="section">
                <div class="container">
                    @if (isset(auth()->user()->company))
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card side-bar">
                                    <div class="card-body p-4">
                                        <div class="candidate-profile text-center">
                                            <img src="{{ asset('storage/uploads/' . auth()->user()->company->logo) }}" alt="" class="avatar-lg rounded-circle">
                                            <h6 class="fs-18 mb-1 mt-4">
                                                {{ auth()->user()->company->name }}
                                            </h6>
                                            <p class="text-muted mt-2 mb-0">{{ auth()->user()->company->slogan }}</p>

                                            <div>
                                                <div class="mt-2">
                                                    @isset(auth()->user()->company->technologies)
                                                        @foreach (auth()->user()->company->arr_tech as $tech)
                                                            <span class="badge fs-13 bg-primary ">{{ $tech }}</span>
                                                        @endforeach
                                                    @endisset
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end candidate-profile-->

                                    <div class="candidate-profile-overview  card-body border-top p-4">
                                        <h6 class="fs-17 fw-medium mb-3">Company Overview</h6>
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Tax</label>
                                                    <div>
                                                        <p class="text-muted mb-0">{{ auth()->user()->company->tax }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Employees</label>
                                                    <div>
                                                        <p class="text-muted mb-0">{{ auth()->user()->company->people }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Email</label>
                                                    <div>
                                                        <p class="text-muted text-break mb-0">{{ auth()->user()->company->email }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Website</label>
                                                    <div>
                                                        <p class="text-muted text-break mb-0">{{ auth()->user()->company->website }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Location</label>
                                                    <div>
                                                        <p class="text-muted mb-0">{{ auth()->user()->company->address }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @isset(auth()->user()->company->license)
                                            <li>
                                                <div class="d-flex">
                                                    <label class="text-dark">Location</label>
                                                    
                                                    <div class="profile-document-list d-flex justify-content-between w-100">
                                                        <div class="">
                                                            <h6 class="fs-16 mb-0">
                                                                {{ auth()->user()->company->license }}
                                                            </h6>
                                                        </div>
                                                        <div class="">
                                                            <a href="{{ asset('storage/uploads/' . auth()->user()->company->license) }}" download class="text-muted"><i class="uil uil-import"></i></a>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </li>
                                            @endisset
                                        </ul>
                                        <div class="mt-3">
                                            <a href="/profile/list" class="btn btn-danger btn-hover w-100"><i class="uil uil-envelope"></i> Find CV</a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="/company/profile/edit" class="btn btn-primary btn-hover w-100"><i class="uil uil-envelope"></i> Update Info</a>
                                        </div>
                                    </div>
                                    
                                </div><!--end card-->
                            </div><!--end col-->
                            
                            <div class="col-lg-8">
                                <div class="card ms-lg-4 mt-4 mt-lg-0">
                                    <div class="card-body p-4">

                                        <div class="mb-5">
                                            <h6 class="fs-17 fw-medium mb-4">About Company</h6>
                                            <div class="description">
                                                @php
                                                    echo auth()->user()->company->about;
                                                @endphp
                                            </div>
                                        </div>
                                    
                                        <div class="candidate-portfolio mb-5">
                                            <h6 class="fs-17 fw-medium mb-4">Gallery</h6>
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    @isset(auth()->user()->company->images)
                                                    <div class="swiper blogdetailSlider">
                                                        <div class="swiper-wrapper">
                                                            @foreach (auth()->user()->company->arr_image as $image)
                                                                <div class="swiper-slide">
                                                                    <img src="{{ asset('storage/uploads/' . $image) }}" alt="" class="img-fluid rounded-3">
                                                                </div>
                                                            @endforeach
                                                            
                                                        </div>
                                                    </div>
                                                    @endisset
                                                </div>
                                            </div><!-- end row -->
                                        </div>
                                        <div>
                                            <h6 class="fs-17 fw-medium mb-4">Current Opening</h6>
                                            @foreach (auth()->user()->company->jobs as $job)
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!--end row-->
                                                    <div class="favorite-icon" style="display: block;">
                                                        <a href="/job/delete/{{ $job->id }}"><i class="uil uil-trash-alt fs-18"></i></a>
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
                                                                @php
                                                                    $message = $job->active ? 'Can apply' : 'Pending';
                                                                @endphp
                                                                <span class="badge bg-primary">{{ $message }}</span>
                                                                <a href="/company/applys/{{ $job->id }}"><span class="badge bg-soft-success mt-1">{{ $job->number_request }} Apply</span></a>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                            </div>
                                            @endforeach
                                            <a href="/job/create" class="text-white btn btn-danger btn-hover w-100 mt-4">
                                                Đăng Tin Tuyển Dụng
                                            </a>
                                            @if (auth()->user()->company->active != config('constants.COMPANY.ACTIVE.ACTIVE'))
                                            <div class="mt-3">
                                                <div class="w-100 alert bg-soft-danger text-center">Company của bạn chưa được duyệt. Hãy update đúng mã số thuế và tên công ty <br>để được duyệt !</div>
                                            </div>
                                            @endif

                                        </div>
                                    </div><!-- card body end -->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div>
                    @else
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
                                                <label for="license" class="form-label">Giấy Phép Kinh Doanh</label>
                                                <input type="file" class="form-control" name="file-license" 
                                                value="{{ isset(auth()->user()->company) ? auth()->user()->company->license : '' }}"/>
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
                                                <input type="number" class="form-control" oninput="validateNumberInput(this)"
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
                                                    rows="5" maxlength="1000">About of company</textarea>
                                                <div class="mt-1">    
                                                    <small>
                                                        Length of text <span class="about-textarea-display"></span>
                                                    </small> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="languages" class="form-label">Technical Skill Keyword</label>
                                                <input type="text" class="form-control" id="input-skill" name="technologies"
                                                    value="{{ (auth()->user()->company->display_tech) ?? '' }}" 
                                                    
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
                    @endif
                </div><!--end container-->
            </section>
        @endif
        <!-- END CANDIDATE-DETAILS -->


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
    <link rel="stylesheet" href="{{ asset('assets/site/css/choices.min.css') }}">
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

    <script src="{{ asset('assets/site/js/choices.min.js') }}"></script>
@endsection

@section('js')
    <script>
        var swiper=new Swiper(".blogSlider",{loop:!0,pagination:{el:".swiper-pagination",clickable:!0},autoplay:{delay:2500,disableOnInteraction:!1},breakpoints:{200:{slidesPerView:1,spaceBetween:10},992:{slidesPerView:2,spaceBetween:20}}}),swiper=new Swiper(".blogdetailSlider",{loop:!0,spaceBetween:10,pagination:{el:".swiper-pagination",clickable:!0},autoplay:{delay:2500,disableOnInteraction:!1}});
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script>
        var choicesSkill = new Choices("#input-skill");
        var aboutTextareaDisplay = document.querySelector( '.about-textarea-display' )
        var aboutTextArea = document.querySelector( '#about-text-area' );
        
        let textLength = aboutTextArea.value.length;
        aboutTextareaDisplay.textContent = textLength + '/' + aboutTextArea.maxLength;

        if (textLength > aboutTextArea.maxLength) {
            aboutTextArea.value = aboutTextArea.value.slice(0, aboutTextArea.maxLength);
        }
                    
        ClassicEditor
            .create( aboutTextArea )
            .then( editor => {
                editor.editing.view.document.on( 'keyup', ( evt, data ) => {
                    let textLength = data.domTarget.innerText.length;
                    // console.log(aboutTextArea);
                    aboutTextareaDisplay.textContent = textLength + '/' + aboutTextArea.maxLength;

                    if (textLength > aboutTextArea.maxLength) {
                        aboutTextArea.value = aboutTextArea.value.slice(0, aboutTextArea.maxLength);
                    }
                });
            } )
            .catch( error => {
                console.error( error );
            } );    
    </script>
@endsection