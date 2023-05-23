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
                            @if (auth()->check())
                                @if (auth()->user()->type == config('constants.USER.TYPE.USER'))
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/" id="" role="button" >
                                            Job List 
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/apply/list/{{ auth()->user()->id }}" id="" role="button" >
                                            My Job Apply 
                                        </a>
                                    </li>
                                @else
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/profile/list" id="" role="button" >
                                            Portfolio List 
                                        </a>
                                    </li>
                                @endif
                            @endif
                        </ul><!--end navbar-nav-->
                    </div>


                    <!--end navabar-collapse-->
                    <ul class="header-menu list-inline d-flex align-items-center mb-0">
                        @if (auth()->check() && auth()->user()->type == config('constants.USER.TYPE.COMPANY'))
                            <li class="list-inline-item dropdown me-4">
                                <a href="javascript:void(0)" class="header-item noti-icon position-relative" id="notification" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-bell fs-22"></i>
                                    <div class="count position-absolute">{{ $jobs['countAll'] }}</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end p-0" aria-labelledby="notification">
                                    <div class="notification-header border-bottom bg-light">
                                        <h6 class="mb-1"> Notification </h6>
                                        <p class="text-muted fs-13 mb-0">You have {{ $jobs['countAll'] }} CV Apply</p>
                                    </div>
                                    <div class="notification-wrapper dropdown-scroll">
                                        @foreach ($jobs['items'] as $item)
                                        <a href="/company/applys/{{ $item->id }}" class="text-dark notification-item d-block active">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs bg-primary text-white rounded-circle text-center">
                                                        {{-- <i class="uil uil-user-check"></i> --}}
                                                        {{ $item->number_request }}
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mt-0 mb-1 fs-14">{{ $item->title }}</h6>
                                                    <p class="mb-0 fs-12 text-muted">
                                                        {{-- <a href="javascript:void(0)"> --}}
                                                            <i class="mdi mdi-clock-outline"></i> <span>
                                                            Show list CV</span>
                                                        {{-- </a> --}}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                        
                                    
                                    </div><!--end notification-wrapper-->
                                    {{-- <div class="notification-footer border-top text-center">
                                        <a class="primary-link fs-13" href="javascript:void(0)">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                                        </a>
                                    </div> --}}
                                </div>
                            </li>
                        @endif
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
                                |
                                <a href="/register" class="header-item">
                                    <span class="d-none d-md-inline-block fw-medium">
                                        Register                                  
                                    </span>
                                </a>
                            @endif
                            
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown">
                                <li><a class="dropdown-item" href="/profile/detail">My Profile</a></li>
                                @if (auth()->check() && auth()->user()->type == config('constants.USER.TYPE.USER'))
                                    <li><a class="dropdown-item" href="/apply/list/{{ auth()->user()->id }}">My Job Apply</a></li>
                                @endif
                                <li><a class="dropdown-item" href="/password/change">Đổi Password</a></li>
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
            
            <section class="bg-footer">
                <div class="container">
                    <div class="row justify-content-center">
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
                        </div>
                        @if (auth()->check() && auth()->user()->type == config('constants.USER.TYPE.COMPANY'))
                            <div class="col-lg-2 col-6">
                                <div class="footer-item mt-4 mt-lg-0">
                                    <p class="fs-16 text-white mb-4">For Company</p>
                                    <ul class="list-unstyled footer-list mb-0">
                                        <li><a href="/profile/list"><i class="mdi mdi-chevron-right"></i> Browser Portfolio</a></li>
                                        <li><a href="/profile/list"><i class="mdi mdi-chevron-right"></i> Portfolio Details</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                        

                        <div class="col-lg-2 col-6">
                            <div class="footer-item mt-4 mt-lg-0">
                                <p class="fs-16 text-white mb-4">For Jobs</p>
                                <ul class="list-unstyled footer-list mb-0">
                                    <li><a href="/"><i class="mdi mdi-chevron-right"></i> Browser Jobs</a></li>
                                    <li><a href="/"><i class="mdi mdi-chevron-right"></i> Job Details</a></li>
                                    @if (auth()->check() && auth()->user()->type == config('constants.USER.TYPE.USER'))
                                    <li><a href="{{ auth()->check() && auth()->user()->type == config('constants.USER.TYPE.USER') ? '/apply/list/' . auth()->user()->id : '/login'}}"
                                        
                                        ><i class="mdi mdi-chevron-right"></i> Apply Jobs</a></li>
                                    @endif
                                    
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-6">
                            <div class="footer-item mt-4 mt-lg-0">
                                <p class="fs-16 text-white mb-4">For Account</p>
                                <ul class="list-unstyled footer-list mb-0">
                                    <li><a href="/register"><i class="mdi mdi-chevron-right"></i> Register</a></li>
                                    <li><a href="/password/change"><i class="mdi mdi-chevron-right"></i> Change Password</a></li>
                                    <li><a href="/profile/detail"><i class="mdi mdi-chevron-right"></i> Profile Details</a></li>
                                    @if (auth()->check())
                                        <li><a href="/logout"><i class="mdi mdi-chevron-right"></i> Logout</a></li>    
                                    @else
                                        <li><a href="/login"><i class="mdi mdi-chevron-right"></i> Login</a></li>
                                    @endif
                                    
                                </ul>
                            </div>
                        </div>
                        
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


