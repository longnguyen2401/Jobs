@extends('site.layout')

@section('title', 'Job Detail')

@section('content')
@if (auth()->check())
<div class="main-content">

    <div class="page-content">

        <!-- Start home -->
        <section class="page-title-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center text-white">
                            <h3 class="mb-4">My Profile</h3>
                            <div class="page-next">
                                <nav class="d-inline-block" aria-label="breadcrumb text-center">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">My Profile</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> My Profile </li>
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

        

        <!-- START PROFILE -->
        <section class="section">
            <div class="container">
                {{-- message-profile-detail --}}
                @if(session()->has('message-profile-detail'))
                    <div class="row">
                        <div class="w-100 alert  bg-soft-success mb-4 text-center">
                            {{-- <h5 class="mt-1 mb-1"> --}}
                                
                                    {{ session()->get('message-profile-detail') }} 
                                
                            {{-- </h5> --}}
                        </div>
                    </div>

                    @php
                        session()->forget('message-profile-detail');
                    @endphp
                @endisset
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card profile-sidebar me-lg-4">
                            <div class="card-body p-4">
                                <div class="text-center pb-4 border-bottom">
                                    <img src="{{ isset(auth()->user()->profileUser->avatar) ? asset('storage/uploads/' . auth()->user()->profileUser->avatar) : asset('assets/site/images/profile.jpg') }}" alt=""
                                        class="avatar-lg img-thumbnail rounded-circle mb-4" />
                                    <h5 class="mb-0">{{ auth()->user()->name }}</h5>
                                    <p class="text-muted mt-2 mb-0">{{ (auth()->user()->profileUser->job_title) ?? 'Job Title' }}</p>
                                    {{-- <ul class="list-inline d-flex justify-content-center align-items-center ">
                                        <li class="list-inline-item text-warning fs-19">
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star-half-full"></i>
                                        </li>
                                    </ul> --}}
                                    {{-- <ul class="candidate-detail-social-menu list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="social-link rounded-3 btn-soft-primary"><i
                                                    class="uil uil-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="social-link rounded-3 btn-soft-info"><i
                                                    class="uil uil-twitter-alt"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="social-link rounded-3 btn-soft-success"><i
                                                    class="uil uil-whatsapp"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="social-link rounded-3 btn-soft-danger"><i
                                                    class="uil uil-phone-alt"></i></a>
                                        </li>
                                    </ul> --}}
                                </div>
                                <!--end profile-->
                                <div class="mt-4 border-bottom pb-4">
                                    <h5 class="fs-17 fw-bold mb-3">Documents</h5>
                                    <ul class="profile-document list-unstyled mb-0">
                                        <li>
                                            <div class="profile-document-list d-flex align-items-center mt-4 ">
                                                <div class="icon flex-shrink-0">
                                                    <i class="uil uil-file"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="fs-16 mb-0">Resume.pdf</h6>
                                                    <p class="text-muted mb-0">1.25 MB</p>
                                                </div>
                                                <div class="ms-auto">
                                                    <a href="assets/images/dark-logo.png" download class="fs-20 text-muted"><i class="uil uil-import"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="profile-document-list d-flex align-items-center mt-4 ">
                                                <div class="icon flex-shrink-0">
                                                    <i class="uil uil-file"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="fs-16 mb-0">Cover-letter.pdf</h6>
                                                    <p class="text-muted mb-0">1.25 MB</p>
                                                </div>
                                                <div class="ms-auto">
                                                    <a href="assets/images/dark-logo.png" download="dark-logo" class="fs-20 text-muted"><i class="uil uil-import"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!--end document-->
                                <div class="mt-4">
                                    <h5 class="fs-17 fw-bold mb-3">Contacts</h5>
                                    <div class="profile-contact">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <div class="d-flex">
                                                    <label>Website</label>
                                                    <div>
                                                        <p class="text-muted mb-0">
                                                            {{ (auth()->user()->profileUser->website) ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <label>Email</label>
                                                    <div>
                                                        <p class="text-muted text-break mb-0">
                                                            {{ (auth()->user()->email) ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <label>Địa Chỉ</label>
                                                    <div>
                                                        <p class="text-muted mb-0">
                                                            {{ (auth()->user()->profileUser->address) ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--end contact-details-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end profile-sidebar-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-8">
                        <div class="card profile-content-page mt-4 mt-lg-0">
                            <ul class="profile-content-nav nav nav-pills border-bottom mb-4" id="pills-tab"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ isset(auth()->user()->profileUser) ? 'active' : ''  }}" id="overview-tab" data-bs-toggle="pill"
                                            data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                                            aria-selected="{{ isset(auth()->user()->profileUser) ? '' : 'true'  }}">
                                            Overview
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ isset(auth()->user()->profileUser) ? '' : 'active'  }}" id="settings-tab" data-bs-toggle="pill"
                                            data-bs-target="#settings" type="button" role="tab" aria-controls="settings"
                                            @if (empty(auth()->user()->profileUser))
                                                aria-selected="{{ isset(auth()->user()->profileUser) ? '' : 'true'  }}"    
                                            @else
                                                aria-selected="false"
                                            @endif>
                                            Settings
                                        </button>
                                    </li>
                                </ul>
                                <!--end profile-content-nav-->
                            <div class="card-body p-4">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade {{ isset(auth()->user()->profileUser) ? 'show active' : '' }}" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                        <div>
                                            <h5 class="fs-18 fw-bold">Giới Thiệu Bản Thân</h5>
                                            <p class="text-muted mt-4">
                                                {{ (auth()->user()->profileUser->about) ?? '' }}
                                            </p>
                                        </div>
                                        <div class="candidate-education-details mt-4">
                                            <h6 class="fs-18 fw-bold mb-0">Education</h6>
                                            @isset(auth()->user()->profileUser->education)
                                                @foreach (auth()->user()->profileUser->education as $education)
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
                                        </div>
                                        <div class="candidate-education-details mt-4">
                                            <h6 class="fs-18 fw-bold mb-0">Experiences</h6>
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
                                        <div class="mt-4">
                                            <h5 class="fs-18 fw-bold">Skills</h5>
                                            <span class="badge fs-13 bg-soft-blue mt-2">Cloud Management</span>
                                            <span class="badge fs-13 bg-soft-blue mt-2">Responsive Design</span>
                                            <span class="badge fs-13 bg-soft-blue mt-2">Network Architecture</span>
                                            <span class="badge fs-13 bg-soft-blue mt-2">PHP</span>
                                            <span class="badge fs-13 bg-soft-blue mt-2">Bootstrap</span>
                                            <span class="badge fs-13 bg-soft-blue mt-2">UI & UX Designer</span>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="fs-18 fw-bold">Spoken languages</h5>
                                            <span class="badge fs-13 bg-soft-success mt-2">English</span>
                                            <span class="badge fs-13 bg-soft-success mt-2">German</span>
                                            <span class="badge fs-13 bg-soft-success mt-2">French</span>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade {{ (isset(auth()->user()->profileUser)) ? '' : 'show active' }}" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                        <form method="POST" action="{{ route('site.profile.save') }}" enctype="multipart/form-data">
                                            <input type="hidden" name="job_id" value="{{ isset($job_id) ? $job_id : false }}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <div>
                                                <h5 class="fs-17 fw-semibold mb-3 mb-0">Thông Tin Cơ Bản</h5>
                                                {{-- <div class="text-center">
                                                    <div class="mb-4 profile-user">
                                                        <img src="{{ asset('assets/site/images/user/img-02.jpg') }}" class="rounded-circle img-thumbnail profile-img" id="profile-img" alt="">
                                                        <div class="p-0 rounded-circle profile-photo-edit">
                                                            <input id="profile-img-file-input" type="file" class="profile-img-file-input" onchange="previewImg()" >
                                                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                                <i class="uil uil-edit"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Job Title</label>
                                                            <input type="text" class="form-control" 
                                                                name="job_title" 
                                                                placeholder="Nhập job title" 
                                                                value="{{ (auth()->user()->profileUser->job_title) ?? '' }}" 
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Họ và tên</label>
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên" value="{{ (auth()->user()->name) ?? '' }}" />
                                                        </div>
                                                     </div>
                                                     <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Địa Chỉ</label>
                                                            <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ" value="{{ (auth()->user()->profileUser->address) ?? '' }}" />
                                                        </div>
                                                     </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Website</label>
                                                            <input type="text" class="form-control" 
                                                                name="website" 
                                                                placeholder="Link website or Linked, Facebook,..." 
                                                                value="{{ (auth()->user()->profileUser->job_title) ?? '' }}" 
                                                            />
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email liên hệ (Phụ)</label>
                                                            <input type="email" class="form-control" 
                                                                name="preventive_email" 
                                                                placeholder="Nhập email (nếu có)" 
                                                                value="{{ (auth()->user()->profileUser->preventive_email) ?? '' }}" 
                                                            />
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end account-->
                                            <div class="mt-4">
                                                <h5 class="fs-17 fw-semibold mb-3">Profile</h5>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label">Introduce Yourself</label>
                                                            <textarea class="form-control text-start" id="exampleFormControlTextarea1"
                                                                name="about"
                                                                rows="5"> 
                                                                {{ (auth()->user()->profileUser->about) ?? 'I\'m a Full-stack developer ...' }}    
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="attachmentscv" class="form-label">Attachments
                                                                CV</label>
                                                            <input class="form-control" type="file" id="attachmentscv" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Ảnh Đại Diện</label>
                                                            <input type="file" class="form-control" name="file-avatar" />
                                                        </div>
                                                     </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>

                                            <div class="mt-4">
                                                <h5 class="fs-17 fw-semibold mb-3">Education</h5>
                                                <div class="row">
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            @php
                                                                if (isset(auth()->user()->profileUser->education)) {
                                                                    $education = auth()->user()->profileUser->education[0];
                                                                    $start = (isset($education->start)) ? substr($education->start, 0, 7) : '';
                                                                    $end = (isset($education->end)) ? substr($education->end, 0, 7) : '';
                                                                }
                                                            @endphp
                                                            <label for="firstName" class="form-label">School Name</label>
                                                            <input type="text" class="form-control" 
                                                                name="education[school_name]" 
                                                                placeholder="Nhập tên trường" 
                                                                value="{{ isset($education->school_name) ? $education->school_name : '' }}"
                                                            />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Major</label>
                                                            <input type="text" class="form-control" 
                                                                name="education[major]" 
                                                                placeholder="Nhập chuyên ngành học"
                                                                value="{{ isset($education->major) ? $education->major : '' }}" 
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Thời gian bắt đầu</label>
                                                            <input type="month" class="form-control" 
                                                                name="education[start]" 
                                                                placeholder="Nhập chuyên ngành học" 
                                                                value="{{ isset($education->start) ? $start : '' }}" 
                                                            />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Đến</label>
                                                            <input type="month" class="form-control" 
                                                                name="education[end]" 
                                                                placeholder="Nhập chuyên ngành học" 
                                                                value="{{ isset($education->end) ? $end : '' }}" 
                                                            />
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
                                        <!--end form-->
                                    </div>

                                    <!--end tab-pane-->
                                </div>
                                <!--end tab-content-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end profile-content-page-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end container-->
        </section>
        <!-- END PROFILE -->

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
@else
<div class="main-content">

    <div class="page-content">

        <!-- Start home -->
        <section class="page-title-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <a href="/login" class="primary-link">
                            Login To Overview
                            <i class="mdi mdi-chevron-double-right"></i>
                        </a>
                    </div>

                </div>


            </div>

        </section>

    </div>

</div>
@endif

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