<!doctype html>
<html lang="en">
    <head>
    
        <meta charset="utf-8" />
        <title>@yield('title') | Jobcy</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content=" " />
        <meta name="keywords" content="" />
        <meta content="Themesdesign" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/site/images/favicon.ico') }}">

        @yield('after-main-css')

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/site/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/site/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/site/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <!--Custom Css-->

        <link rel="stylesheet" href="{{ asset('assets/site/css/custom.css') }}">
    </head>

    <body>
         <!--start page Loader -->
         <div id="preloader">
            <div id="status">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                  </ul>
            </div>
        </div>
        <div>

            <div class="top-bar">
                <div class="container-fluid custom-container">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-7">
                            <ul class="list-inline mb-0 text-center text-md-start">
                                <li class="list-inline-item">
                                    <p class="fs-13 mb-0"> <i class="mdi mdi-map-marker"></i> Your Location: <a href="javascript:void(0)" class="text-dark">New Caledonia</a></p>
                                </li>
                                <li class="list-inline-item">
                                    <ul class="topbar-social-menu list-inline mb-0">
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="social-link"><i
                                                    class="uil uil-whatsapp"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="social-link"><i
                                                    class="uil uil-facebook-messenger-alt"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="social-link"><i
                                                    class="uil uil-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="social-link"><i
                                                    class="uil uil-envelope"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" class="social-link"><i
                                                    class="uil uil-twitter-alt"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--end col-->
                        <div class="col-md-5">
                            <ul class="list-inline mb-0 text-center text-md-end">
                                <li class="list-inline-item py-2 me-2 align-middle">
                                    <a href="#signupModal" class="text-dark fw-medium fs-13" data-bs-toggle="modal"><i class="uil uil-lock"></i>
                                        Sign Up</a>
                                </li>
                                <li class="list-inline-item align-middle">
                                    <div class="dropdown d-inline-block language-switch">
                                        <button type="button" class="btn" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <img id="header-lang-img" src="{{ asset('assets/site/images/flags/us.jpg') }}" alt="Header Language" height="16" />
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="eng">
                                                <img src="{{ asset('assets/site/images/flags/us.jpg') }}" alt="user-image" class="me-1" height="12" />
                                                <span class="align-middle">English</span>
                                            </a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                                                <img src="{{ asset('assets/site/images/flags/spain.jpg') }}" alt="user-image" class="me-1" height="12" />
                                                <span class="align-middle">Spanish</span>
                                            </a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                                                <img src="{{ asset('assets/site/images/flags/germany.jpg') }}" alt="user-image" class="me-1" height="12" />
                                                <span class="align-middle">German</span>
                                            </a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                                                <img src="{{ asset('assets/site/images/flags/italy.jpg') }}" alt="user-image" class="me-1" height="12" />
                                                <span class="align-middle">Italian</span>
                                            </a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                                                <img src="{{ asset('assets/site/images/flags/russia.jpg') }}" alt="user-image" class="me-1" height="12" />
                                                <span class="align-middle">Russian</span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </div>
            <nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
                <div class="container-fluid custom-container">
                    <a class="navbar-brand text-dark fw-bold me-auto" href="/">
                        <img src="{{ asset('assets/site/images/logo-dark.png') }}" height="22" alt="" class="logo-dark" />
                        <img src="{{ asset('assets/site/images/logo-light.png') }}" height="22" alt="" class="logo-light" />
                    </a>
                    <div>
                        <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-label="Toggle navigation">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mx-auto navbar-center">
                            <li class="nav-item dropdown dropdown-hover">
                                <a class="nav-link" href="javascript:void(0)" id="homedrop" role="button" data-bs-toggle="dropdown">
                                    Home <div class="arrow-down"></div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="homedrop">
                                    <li><a class="dropdown-item" href="index.html">Home 1</a></li>
                                    <li><a class="dropdown-item" href="index-2.html">Home 2</a></li>
                                    <li><a class="dropdown-item" href="index-3.html">Home 3</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown dropdown-hover">
                                <a class="nav-link" href="javascript:void(0)" id="jobsdropdown" role="button" data-bs-toggle="dropdown">
                                    Company <div class="arrow-down"></div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="jobsdropdown">
                                    <li><a class="dropdown-item" href="about.html">About Us</a></li>
                                    <li><a class="dropdown-item" href="services.html">Services</a></li>
                                    <li><a class="dropdown-item" href="team.html">Team</a></li>
                                    <li><a class="dropdown-item" href="pricing.html">Pricing</a></li>
                                    <a class="dropdown-item" href="privacy-policy.html">Priacy & Policy</a>
                                    <li><a class="dropdown-item" href="faqs.html">Faqs</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown dropdown-hover">
                                <a class="nav-link" href="javascript:void(0)" id="pagesdoropdown" role="button" data-bs-toggle="dropdown">
                                    Pages
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center" aria-labelledby="pagesdoropdown">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <span class="dropdown-header">Jobs</span>
                                            <div>
                                                <a class="dropdown-item" href="job-list.html">Job List</a>
                                                <a class="dropdown-item" href="job-list-2.html">Job List-2</a>
                                                <a class="dropdown-item" href="job-grid.html">Job Grid</a>
                                                <a class="dropdown-item" href="job-grid-2.html">Job Grid-2</a>
                                                <a class="dropdown-item" href="job-details.html">Job Details</a>
                                                <a class="dropdown-item" href="job-categories.html">Jobs Categories</a>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-4">
                                            <span class="dropdown-header">Candidates / Companys</span>
                                            <div>
                                                <a class="dropdown-item" href="candidate-list.html">Candidate List</a>
                                                <a class="dropdown-item" href="candidate-grid.html">Candidate Grid</a>
                                                <a class="dropdown-item" href="candidate-details.html">Candidate Details</a>
                                                <a class="dropdown-item" href="company-list.html">Company List</a>
                                                <a class="dropdown-item" href="company-details.html">Company Details</a>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-4">
                                            <span class="dropdown-header">Extra Pages</span>
                                            <div>
                                                <a class="dropdown-item" href="sign-up.html">Sign Up</a>
                                                <a class="dropdown-item" href="sign-in.html">Sign In</a>
                                                <a class="dropdown-item" href="sign-out.html">Sign Out</a>
                                                <a class="dropdown-item" href="reset-password.html">Reset Password</a>
                                                <a class="dropdown-item" href="coming-soon.html">Coming Soon</a>
                                                <a class="dropdown-item" href="404-error.html">404 Error</a>
                                                <a class="dropdown-item" href="components.html">Components</a>
                                            </div>
                                        </div><!--end col-->
                                    </div>
                                </div>
                            </li><!--end dropdown-->
                            <li class="nav-item dropdown dropdown-hover">
                                <a class="nav-link" href="javascript:void(0)" id="productdropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Blog 
                                    <div class="arrow-down"></div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="productdropdown">
                                    <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                                    <li><a class="dropdown-item" href="blog-grid.html">Blog Grid</a></li>
                                    <li><a class="dropdown-item" href="blog-modern.html">Blog Modern</a></li>
                                    <li><a class="dropdown-item" href="blog-masonry.html">Blog Masonry</a></li>
                                    <li><a class="dropdown-item" href="blog-details.html">Blog details</a></li>
                                    <li><a class="dropdown-item" href="blog-author.html">Blog Author</a></li>
                                </ul>
                            </li><!--end dropdown-->
                            <li class="nav-item">
                                <a href="contact.html" class="nav-link">Contact</a>
                            </li>
                        </ul><!--end navbar-nav-->
                    </div>
                    <!--end navabar-collapse-->
                    <ul class="header-menu list-inline d-flex align-items-center mb-0">
                        <li class="list-inline-item dropdown me-4">
                            <a href="javascript:void(0)" class="header-item noti-icon position-relative" id="notification" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-bell fs-22"></i>
                                <div class="count position-absolute">3</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end p-0" aria-labelledby="notification">
                                <div class="notification-header border-bottom bg-light">
                                    <h6 class="mb-1"> Notification </h6>
                                    <p class="text-muted fs-13 mb-0">You have 4 unread Notification</p>
                                </div>
                                <div class="notification-wrapper dropdown-scroll">
                                    <a href="javascript:void(0)" class="text-dark notification-item d-block active">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-xs bg-primary text-white rounded-circle text-center">
                                                    <i class="uil uil-user-check"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mt-0 mb-1 fs-14">22 verified registrations</h6>
                                                <p class="mb-0 fs-12 text-muted"><i class="mdi mdi-clock-outline"></i> <span>3 min
                                                    ago</span></p>
                                            </div>
                                        </div>
                                    </a><!--end notification-item-->
                                    <a href="javascript:void(0)" class="text-dark notification-item d-block">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <img src="{{ asset('assets/site/images/user/img-02.jpg') }}" class="rounded-circle avatar-xs" alt="user-pic">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mt-0 mb-1 fs-14">James Lemire</h6>
                                                <p class="text-muted fs-12 mb-0"><i class="mdi mdi-clock-outline"></i> <span>15 min
                                                    ago</span></p>
                                            </div>
                                        </div>
                                    </a><!--end notification-item-->
                                    <a href="javascript:void(0)" class="text-dark notification-item d-block">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <img src="{{ asset('assets/site/images/featured-job/img-04.png') }}" class="rounded-circle avatar-xs"
                                                    alt="user-pic">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mt-0 mb-1 fs-14">Applications has been approved</h6>
                                                <p class="text-muted mb-0 fs-12"><i class="mdi mdi-clock-outline"></i> <span>45 min
                                                    ago</span></p>
                                            </div>
                                        </div>
                                    </a><!--end notification-item-->
                                    <a href="javascript:void(0)" class="text-dark notification-item d-block">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <img src="{{ asset('assets/site/images/user/img-01.jpg') }}" class="rounded-circle avatar-xs"
                                                    alt="user-pic">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mt-0 mb-1 fs-14">Kevin Stewart</h6>
                                                <p class="text-muted mb-0 fs-12"><i class="mdi mdi-clock-outline"></i> <span>1 hour
                                                    ago</span></p>
                                            </div>
                                        </div>
                                    </a><!--end notification-item-->
                                    <a href="javascript:void(0)" class="text-dark notification-item d-block">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <img src="{{ asset('assets/site/images/featured-job/img-01.png') }}" class="rounded-circle avatar-xs"
                                                    alt="user-pic">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mt-0 mb-1 fs-15">Creative Agency</h6>
                                                <p class="text-muted mb-0 fs-12"><i class="mdi mdi-clock-outline"></i> <span>2 hour
                                                    ago</span></p>
                                            </div>
                                        </div>
                                    </a><!--end notification-item-->
                                </div><!--end notification-wrapper-->
                                <div class="notification-footer border-top text-center">
                                    <a class="primary-link fs-13" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item dropdown">
                            @if (auth()->check())
                                <a href="javascript:void(0)" class="header-item" id="userdropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('assets/site/images/profile.jpg') }}" alt="mdo" width="35" height="35" class="rounded-circle me-1"> <span class="d-none d-md-inline-block fw-medium">
                                        Hi, {{ auth()->user()->name }}
                                    </span>
                                </a>
                            @else
                                <a href="/login" class="header-item">
                                    <img src="{{ asset('assets/site/images/profile.jpg') }}" alt="mdo" width="35" height="35" class="rounded-circle me-1"> <span class="d-none d-md-inline-block fw-medium">
                                        Login                                       
                                    </span>
                                </a>
                            @endif
                            
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown">
                                <li><a class="dropdown-item" href="manage-jobs.html">Manage Jobs</a></li>
                                <li><a class="dropdown-item" href="bookmark-jobs.html">Bookmarks Jobs</a></li>
                                <li><a class="dropdown-item" href="/profile/detail">My Profile</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul><!--end header-menu-->
                </div>
                <!--end container-->
            </nav>
            <div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-5">
                            <div class="position-absolute end-0 top-0 p-3">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="auth-content">
                                <div class="w-100">
                                    <div class="text-center mb-4">
                                        <h5>Sign Up</h5>
                                        <p class="text-muted">Sign Up and get access to all the features of Jobcy</p>
                                    </div>
                                    <form action="#" class="auth-form">
                                        <div class="mb-3">
                                            <label for="usernameInput" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="usernameInput" placeholder="Enter your username">
                                        </div>
                                        <div class="mb-3">
                                            <label for="passwordInput" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="emailInput" placeholder="Enter your email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="passwordInput" placeholder="Password">
                                        </div>
                                        <div class="mb-4">
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">I agree to the <a href="javascript:void(0)" class="text-primary form-text text-decoration-underline">Terms and conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                                        </div>
                                    </form>
                                    <div class="mt-3 text-center">
                                        <p class="mb-0">Already a member ? <a href="sign-in.html" class="form-text text-primary text-decoration-underline"> Sign-in </a></p>
                                    </div>
                                </div>
                            </div>
                        </div><!--end modal-body-->
                    </div><!--end modal-content-->
                </div><!--end modal-dialog-->
            </div>
            
            @yield('content')
            

        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/site/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js"></script>

        @yield('after-main-js')

        <!-- Switcher Js -->
        <script src="{{ asset('assets/site/js/switcher.init.js') }}"></script>

        <!-- App Js -->
        <script src="{{ asset('assets/site/js/app.js') }}"></script>

        @yield('js')
    </body>
</html>
