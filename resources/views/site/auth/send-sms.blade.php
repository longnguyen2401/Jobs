@extends('site.auth.layout')

@section('title', 'Check Acount')

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
                                        <div class="text-center mb-2">
                                            <h5>Jobcy !</h5>
                                            <p class="text-white-70">Kiểm tra tài khoản</p>
                                        </div>
                                    <form method="POST" action="{{ route('site.sms.send') }}">
                                        @csrf
                                        <input type="hidden" name="phone" value="{{ $user->phone }}">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Name</label>
                                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                                        </div>
                                        <div class="mb-4">
                                            <label for="" class="form-label">Email</label>
                                            <input type="text" class="form-control" value="{{ $user->email }}">
                                        </div>

                                        <div class="mt-3 d-flex justify-content-between align-items-center">
                                            <button class="text-white btn btn-danger btn-hover" type="submit" style="text-decoration: underline;
                                            text-align: end;">
                                                Gửi SMS xác nhận
                                            </button>
                                            <a class="text-white " href="/password/forgot" style="text-decoration: underline;
                                            text-align: end;">
                                                Nhập số điện thoại khác
                                            </a>
                                        </div>
                                    </form>
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