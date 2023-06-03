@extends('site.auth.layout')

@section('title', 'Get Password')

@section('content')
<div class="page-content">

  <!-- START SIGN-IN -->
  <section class="bg-auth">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-7 col-lg-7 col-12">
                  <div class="card auth-box">
                      <div class="row g-0">
                          <div class="col-lg-12">
                              <div class="auth-content card-body p-5 h-100 text-white">
                                  <div class="w-100">
                                      <div class="text-center mb-4">
                                          <h5>Jobcy !</h5>
                                          <p class="text-white-70">Nhập Số Điện Thoại</p>
                                      </div>
										@error('type')
											<div class="alert alert-danger mt-3">{{ $message }}</div>
										@enderror
                                      <form method="POST" action="{{ route('site.password.forgot.check') }}">
                                            @csrf
                                            <input type="number" class="form-control" name="phone" required placeholder="0965 *** ***">
                                            @error('phone')
                                                <div class=" mt-3  ">{{ $message }}</div>
                                            @enderror
                                          <div class="text-center mb-4 mt-4">
                                              <button type="submit" class="btn btn-danger btn-hover w-100">Gửi</button>
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