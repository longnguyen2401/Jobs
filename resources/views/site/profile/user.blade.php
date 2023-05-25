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
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                                   
                                </div>
                                <!--end profile-->
                                <div class="mt-4 border-bottom pb-4">
                                    <h5 class="fs-17 fw-bold mb-3">Documents</h5>
                                    <ul class="profile-document list-unstyled mb-0">
                                        @isset(auth()->user()->profileUser->cv)
                                        <li>
                                            <div class="profile-document-list d-flex align-items-center mt-4 ">
                                                <div class="icon flex-shrink-0">
                                                    <i class="uil uil-file"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="fs-16 mb-0">
                                                        {{ auth()->user()->profileUser->cv }}
                                                    </h6>
                                                </div>
                                                <div class="ms-auto">
                                                    <a href="{{ asset('storage/uploads/' . auth()->user()->profileUser->cv) }}" download class="fs-20 text-muted"><i class="uil uil-import"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        @else
                                        <li>
                                            <div class="profile-document-list d-flex align-items-center mt-4 ">
                                                <div class="icon flex-shrink-0">
                                                    <i class="uil uil-file"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="fs-16 mb-0">
                                                        No CV upload
                                                    </h6>
                                                </div>
                                                <div class="ms-auto">
                                                    <a href="#" download class="fs-20 text-muted"><i class="uil uil-import"></i></a>
                                                </div>
                                            </div>
                                        </li>

                                        @endisset
                                        
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
                                                    <a class="text-break mb-0" href="{{ (auth()->user()->profileUser->website) ?? '' }}">
                                                        {{ (auth()->user()->profileUser->website) ?? '' }}
                                                    </a>
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
                                                @php
                                                    $start = (isset($education->start)) ? substr($education->start, 0, 7) : '';
                                                    $end = (isset($education->end)) ? substr($education->end, 0, 7) : '';
                                                @endphp
                                                <div class="candidate-education-content mt-4 d-flex">
                                                    <div class="circle flex-shrink-0 bg-soft-primary">
                                                        {{ $education->first_keyword_name }}
                                                    </div>
                                                    <div class="ms-4">
                                                        <h6 class="fs-16 mb-1">
                                                            {{ ($education->major) ?? '' }}
                                                        </h6>
                                                        <p class="mb-2 text-muted">
                                                            {{ ($education->school_name) ?? '' }} - ({{ ($education->fm_start) ?? '' }} - {{ ($education->fm_end) ?? '' }})
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
                                            @isset(auth()->user()->profileUser->experiences)
                                                @foreach (auth()->user()->profileUser->experiences as $experiences)
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
                                            @isset(auth()->user()->profileUser->project)
                                                @foreach (auth()->user()->profileUser->project as $project)
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
                                            @isset(auth()->user()->profileUser->certification)
                                                @foreach (auth()->user()->profileUser->certification as $certification)
                                                <div class="candidate-education-content mt-4 d-flex">
                                                    <div class="circle flex-shrink-0 bg-soft-primary">{{ $certification->first_keyword_name }}</div>
                                                    <div class="ms-4">
                                                        <h6 class="fs-16 mb-1">{{ $certification->name }}</h6>
                                                        <p class="mb-2 text-muted">{{ $certification->organize_name }} {{ ($certification->fm_time) ? '- ' . $certification->fm_time : '' }}</p>
                                                        <p class="text-muted">
                                                            {{ ($certification->description) ?? '' }}    
                                                        </p>
                                                        @if ($certification->file != '') 
                                                            
                                                        
                                                            @php
                                                                if (strstr($certification->file, '.png') || strstr($certification->file, '.jpg') || strstr($certification->file, '.jpeg')) { @endphp
                                                                    
                                                                    <a href="{{ asset('storage/uploads/' . $certification->file) }}" target="_blank"><img style="height: 300px;" src='{{ asset('storage/uploads/' . $certification->file) }}' alt="" class="img-fluid rounded-3"></a>
                                                                @php } else { @endphp
                                                                    <a href="{{ asset('storage/uploads/' . $certification->file) }}" target="_blank">Link Certificate</a>
                                                                @php
                                                                
                                                            }
                                                            @endphp
                                                        @endif
                                                        <div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                @endforeach
                                            @endisset
                                        </div>
                                        
                                        <div class="mt-4">
                                            @isset(auth()->user()->profileUser->arr_skill)
                                                <h5 class="fs-18 fw-bold">Skills</h5>
                                                @foreach (auth()->user()->profileUser->arr_skill as $skill)
                                                    <span class="badge fs-13 bg-soft-blue mt-2">{{ $skill }}</span>
                                                @endforeach
                                            @endisset
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
                                                            <label for="" class="form-label">Job Title</label>
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
                                                            <input type="text" class="form-control" name="user[name]" placeholder="Nhập họ và tên" value="{{ (auth()->user()->name) ?? '' }}" />
                                                        </div>
                                                     </div>
                                                    
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Địa Chỉ</label>
                                                            <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{ (auth()->user()->profileUser->address) ?? '' }}" />
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
                                                            <textarea class="form-control text-start textarea-count" id="exampleFormControlTextarea1"
                                                                name="about"
                                                                rows="5"
                                                                maxlength="1000">{{ (auth()->user()->profileUser->about) ?? 'I\'m a Full-stack developer ...' }}</textarea>
                                                            <div class="mt-1">    
                                                                <small>
                                                                    Length of text <span class="textarea-display"></span>
                                                                </small> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="attachmentscv" class="form-label">Attachments
                                                                CV</label>
                                                            <input class="form-control" type="file" id="attachmentscv" name="file-cv"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Avatar</label>
                                                            <input type="file" class="form-control" name="file-avatar" />
                                                        </div>
                                                     </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Technical Skills</label>
                                                    <input type="text" class="form-control" id="input-skill" name="skill" 
                                                    value="{{ (auth()->user()->profileUser->display_skill) ?? '' }}" 
                                                    value="long,hai"
                                                    />
                                                </div>
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

                                            <div class="mt-4">
                                                <h5 class="fs-17 fw-semibold mb-3">Experiences</h5>
                                                <div class="row">
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            @php
                                                                if (isset(auth()->user()->profileUser->experiences)) {
                                                                    $experience = auth()->user()->profileUser->experiences[0];
                                                                    $start = (isset($experience->start)) ? substr($experience->start, 0, 7) : '';
                                                                    $end = (isset($experience->end)) ? substr($experience->end, 0, 7) : '';
                                                                }
                                                            @endphp
                                                            <label for="firstName" class="form-label">Company Name</label>
                                                            <input type="text" class="form-control" 
                                                                name="experience[company_name]" 
                                                                placeholder="Enter company name" 
                                                                value="{{ isset($experience->company_name) ? $experience->company_name : '' }}"
                                                            />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Position</label>
                                                            <input type="text" class="form-control" 
                                                                name="experience[position]" 
                                                                placeholder="Vị trí trong công ty"
                                                                value="{{ isset($experience->position) ? $experience->position : '' }}" 
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Thời gian bắt đầu</label>
                                                            <input type="month" class="form-control" 
                                                                name="experience[start]" 
                                                                
                                                                value="{{ isset($experience->start) ? $start : '' }}" 
                                                            />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Đến</label>
                                                            <input type="month" class="form-control" 
                                                                name="experience[end]" 
                                                                
                                                                value="{{ isset($experience->end) ? $end : '' }}" 
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Vai trò</label>
                                                            <textarea class="form-control text-start textarea-count" 
                                                                name="experience[description]"
                                                                rows="3"
                                                                maxlength="1000">{{ isset($experience->description) ? $experience->description : '' }}</textarea>
                                                            <div class="mt-1">    
                                                                <small>
                                                                    Length of text <span class="textarea-display"></span>
                                                                </small> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>

                                            <div class="mt-4">
                                                <h5 class="fs-17 fw-semibold mb-3">Project</h5>
                                                <div class="row">
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            @php
                                                                if (isset(auth()->user()->profileUser->project)) {
                                                                    $project = auth()->user()->profileUser->project[0];
                                                                }
                                                            @endphp
                                                            <label for="firstName" class="form-label">Name Project</label>
                                                            <input type="text" class="form-control" 
                                                                name="project[name]" 
                                                                placeholder="Enter company name" 
                                                                value="{{ isset($project->name) ? $project->name : '' }}"
                                                            />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Position</label>
                                                            <input type="text" class="form-control" 
                                                                name="project[position]" 
                                                                placeholder="Vị trí trong công ty"
                                                                value="{{ isset($project->position) ? $project->position : '' }}" 
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Thời gian bắt đầu</label>
                                                            <input type="month" class="form-control" 
                                                                name="project[start]" 
                                                                
                                                                value="{{ isset($project->start) ? $start : '' }}" 
                                                            />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Đến</label>
                                                            <input type="month" class="form-control" 
                                                                name="project[end]" 
                                                                
                                                                value="{{ isset($project->end) ? $end : '' }}" 
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Mô tả dự án</label>
                                                            <textarea class="form-control text-start textarea-count" 
                                                                name="project[description]"
                                                                rows="3"
                                                                maxlength="1000">{{ isset($project->description) ? $project->description : '' }}</textarea>
                                                            <div class="mt-1">    
                                                                <small>
                                                                    Length of text <span class="textarea-display"></span>
                                                                </small> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>

                                            <div class="mt-4">
                                                <h5 class="fs-17 fw-semibold mb-3">Certificate</h5>
                                                <div class="row">
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            @php
                                                                if (isset(auth()->user()->profileUser->certification)) {
                                                                    $certification = auth()->user()->profileUser->certification[0];
                                                                    $time = (isset($certification->time)) ? substr($certification->time, 0, 7) : '';
                                                                }
                                                            @endphp
                                                            <label for="firstName" class="form-label">Name</label>
                                                            <input type="text" class="form-control" 
                                                                name="certification[name]" 
                                                                placeholder="Chứng chỉ" 
                                                                value="{{ isset($certification->name) ? $certification->name : '' }}"
                                                            />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Organizer</label>
                                                            <input type="text" class="form-control" 
                                                                name="certification[organize_name]" 
                                                                placeholder="Tên tổ chức"
                                                                value="{{ isset($certification->organize_name) ? $certification->organize_name : '' }}" 
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Thời gian bắt đầu</label>
                                                            <input type="month" class="form-control" 
                                                                name="certification[time]" 
                                                                value="{{ isset($certification->time) ? $time : '' }}" 
                                                            />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="file_certificate" class="form-label">File đính kèm</label>
                                                            <input class="form-control" type="file" id="file_certificate" name="file-certification-file"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="firstName" class="form-label">Mô tả dự án</label>
                                                            <textarea class="form-control text-start textarea-count" maxlength="1000"
                                                                name="certification[description]"
                                                                rows="3">{{ isset($certification->description) ? $certification->description : '' }}</textarea>
                                                            <div class="mt-1">    
                                                                <small>
                                                                    Length of text <span class="textarea-display"></span>
                                                                </small> 
                                                            </div>
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
    
    <!-- END SUBSCRIBE -->

    <!-- START FOOTER -->
    
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
    <script>
        var choicesSkill = new Choices("#input-skill");

        
        
    </script>
@endsection