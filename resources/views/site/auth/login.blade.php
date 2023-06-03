@extends('site.auth.layout')

@section('title', 'Đăng Nhập')

@section('content')
<div class="page-content">

    <!-- START SIGN-IN -->
    <section class="bg-auth">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12">
                    <div class="card auth-box">
                        <div class="row g-0">
                            <div class="col-lg-6 text-center">
                                <div class="card-body p-4">
                                    <a href="/">
                                        <img src="{{ asset('assets/site/images/logo-light.png') }}" alt="" class="logo-light">
                                        <img src="{{ asset('assets/site/images/logo-dark.png') }}" alt="" class="logo-dark">
                                    </a>
                                    <div class="mt-5">
                                        <img src="{{ asset('assets/site/images/sign-in.png') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <div class="auth-content card-body p-5 h-100 text-white">
                                    <div class="w-100">
                                        <div class="text-center mb-4">
                                            <h5>Jobcy !</h5>
                                            <p class="text-white-70">Đăng Nhập Để Tiếp Tục.</p>
                                        </div>
                                        <form method="POST" action="{{ route('site.auth') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="usernameInput" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email" required>
                                                
                                                @error('email')
                                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="passwordInput" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập password" required>

                                                @error('password')
                                                    <div class="alert alert-danger mt-3">{{ $password }}</div>
                                                @enderror
                                            </div>
                                            
                                            <div class="text-center mb-3">
                                                <button type="submit" class="btn btn-danger btn-hover w-100">Đăng nhập</button>
                                            </div>
                                            <div class="text-center">
                                                <a id="login-goolge" class="btn btn-white btn-hover w-100" href="">
                                                    Đăng nhập bằng google
                                                </a>
                                            </div>
                                            <div class="mt-3 d-flex justify-content-between">
                                                <a class="text-white " href="/register" style="text-decoration: underline;
                                                text-align: end;">
                                                    Đăng ký tài khoản?
                                                </a>
                                                <a class="text-white " href="/password/forgot" style="text-decoration: underline;
                                                text-align: end;">
                                                    Quên mật khẩu
                                                </a>
                                            </div>
                                        </form>
                                        {{-- <div class="mt-4 text-center">
                                            <p class="mb-0">Don't have an account ? <a href="sign-up.html" class="fw-medium text-white text-decoration-underline"> Sign Up </a></p>
                                        </div> --}}
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end auth-box-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- END SIGN-IN -->
    
</div>
@endsection

@section('js')
    <script src="{{ asset('assets/site/js/login-google.js') }}"></script>
@endsection