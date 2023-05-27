@extends('site.layout')

@section('title', 'Company Job Create')

@section('content')
<div class="main-content">

    <div class="page-content">

        <!-- Start home -->
        <section class="page-title-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center text-white">
                            <h3 class="mb-4">Company Create Job</h3>
                            <div class="page-next">
                                <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        
                                        <li class="breadcrumb-item active" aria-current="page"> Create Job </li>
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
        
        <section class="section">
            <div class="container">
                @if (auth()->user()->company->active == 0)
                <div class="my-5">
                    <h2 class="text-center">Công ty của bạn chưa được duyệt !</h2>
                    <div class="mt-4 text-center">
                        <a href="/company/profile/edit" class="btn btn-primary">Update Info Của Bạn</a>
                    </div>
                </div>
                @else
                <div class="row bg-1">
                    <form method="POST" action="/job/save">
                        @csrf
                        <input type="hidden" name="company_id" value="{{ auth()->user()->company->id }}">
                        <div>
                            <h5 class="fs-17 fw-semibold mb-3 mb-0">Job Requirement</h5>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" 
                                            name="title" 
                                            placeholder="Job title"
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" oninput="validateNumberInput(this)"
                                            name="quantity" 
                                            placeholder="Quantity" 
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="year" class="form-label">Year</label>
                                        <input type="number" class="form-control" value="0" oninput="validateNumberInput(this)"
                                            name="year" 
                                            placeholder="Number of year" 
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="level" class="form-label">Level</label>
                                        <div id="jobtype" class="accordion-collapse collapse show" aria-labelledby="jobType">
                                            <div class="accordion-body pt-0">
                                                <div class="side-title">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value='Intern' name="level[]" id="level1">
                                                        <label class="form-check-label ms-2 text-muted" for="level1">
                                                            Intern
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value='Fresher' name="level[]" id="level2">
                                                        <label class="form-check-label ms-2 text-muted" for="level2">
                                                            Fresher
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value='Junior' name="level[]" id="level3">
                                                        <label class="form-check-label ms-2 text-muted" for="level3">
                                                            Junior
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value='Middle' name="level[]" id="level6">
                                                        <label class="form-check-label ms-2 text-muted" for="level6">
                                                            Middle
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value='Senior' name="level[]" id="level4">
                                                        <label class="form-check-label ms-2 text-muted" for="level4">
                                                            Senior
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value='' checked name="level[]" id="level5">
                                                        <label class="form-check-label ms-2 text-muted" for="level5">
                                                            None
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <input type="text" class="form-control" 
                                            name="level" 
                                            placeholder="Enter by format Fresher|Junior|Middle|..."
                                        /> --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Type</label>
                                        <div id="jobtype" class="accordion-collapse collapse show" aria-labelledby="jobType">
                                            <div class="accordion-body pt-0">
                                                <div class="side-title">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value='Freelance' name="type[]" id="type1">
                                                        <label class="form-check-label ms-2 text-muted" for="type1">
                                                            Freelance
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value='Partime' name="type[]" id="type7">
                                                        <label class="form-check-label ms-2 text-muted" for="type7">
                                                            Part Time
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value='FullTime' name="type[]" id="type2">
                                                        <label class="form-check-label ms-2 text-muted" for="type2">
                                                            Full Time
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value='Internship' name="type[]" id="type3">
                                                        <label class="form-check-label ms-2 text-muted" for="type3">
                                                            Internship
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value='Remote' name="type[]" id="type4">
                                                        <label class="form-check-label ms-2 text-muted" for="type4">
                                                            Remote
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value='' checked name="type[]" id="type5">
                                                        <label class="form-check-label ms-2 text-muted" for="type5">
                                                            None
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <input type="text" class="form-control" 
                                            name="type" 
                                            placeholder="Enter by format Fulltime|Remote|..." 
                                        /> --}}
                                    </div>
                                </div>
                                <h5 class="fs-17 fw-semibold mb-3 mb-0">Salary</h5>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Negotiate</label>
                                        <input type="checkbox"
                                            name="negotiate" checked
                                        />
                                    </div>
                                </div>   
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="min_salary" class="form-label">Min Salary</label>
                                        <input type="number" class="form-control" oninput="validateNumberInput(this)"
                                            name="min_salary" 
                                            placeholder="Enter $" 
                                        />
                                    </div>
                                </div>       
                                
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="max_salary" class="form-label">Max Salary</label>
                                        <input type="number" class="form-control" oninput="validateNumberInput(this)"
                                            name="max_salary" 
                                            placeholder="Enter $" 
                                        />
                                    </div>
                                </div>    
                                
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="skill" class="form-label">Skill Requirement</label>
                                        <input type="text" class="form-control" id="input-skill"
                                            name="skill" 
                                            placeholder="Enter by format PHP|Laravel|..." 
                                        />
                                    </div>
                                </div>  
                                
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="from_date" class="form-label" >Thời gian bắt đầu làm việc</label>
                                        <input type="date" class="form-control" min='{{ $now }}' id="from_date"
                                            name="from_date" 
                                        />
                                    </div>
                                </div>  
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="expired_date" class="form-label" >Expired date</label>
                                        <input type="date" class="form-control" min='{{ $now }}' onchange="updateMinDate()" id="expired_date"
                                            name="expired_date" 
                                        />
                                    </div>
                                </div>  
                            </div>
                            <!--end row-->
                        </div>
                        <!--end account-->
                        <div class="mt-0">
                            <h5 class="fs-17 fw-semibold mb-3">Job Description</h5>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <textarea class="form-control " id="about-job-textarea" onkeyup="textAreaKeyup()" name="description"
                                            rows="5" maxlength="1000">About of job</textarea>
                                        <div class="mt-1">    
                                            <small>
                                                Length of text <span class="about-textarea-display"></span>
                                            </small> 
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!--end row-->
                        </div>
                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">Create Job</button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
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
<style>
    .bg-1 {
        border: 1px solid rgb(220, 220, 220);
        border-radius: 8px;
        padding: 2em 1.5em;
    }
</style>
<link rel="stylesheet" href="{{ asset('assets/site/css/choices.min.css') }}">
@endsection
@section('after-main-js')
    <script src="{{ asset('assets/site/js/choices.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script>
        var aboutTextareaDisplay = document.querySelector( '.about-textarea-display' )
        var aboutTextArea = document.querySelector( '#about-job-textarea' );
        
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
                    aboutTextareaDisplay.textContent = textLength + '/' + aboutTextArea.maxLength;

                    if (textLength > aboutTextArea.maxLength) {
                        aboutTextArea.value = aboutTextArea.value.slice(0, aboutTextArea.maxLength);
                    }
                });
            } )
            .catch( error => {
                console.error( error );
            } );

        var choicesSkill = new Choices("#input-skill");

        function updateMinDate() {
            // const fromDateInput = document.getElementById('from_date');
            // const expiredDateInput = document.getElementById('expired_date');
                
            // // Handle min date value
            // const fromDate = new Date(expiredDateInput.value);
            // fromDate.setDate(fromDate.getDate() + 1);
            // const minDate = fromDate.toISOString().split('T')[0];
            // fromDateInput.min = minDate;
        }
       
    </script>
@endsection

@section('js')
@endsection