@extends('site.auth.layout')

@section('title', 'Chọn CV')

@section('content')
<div class="page-content">
    <section class="bg-auth">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-7 col-12">
                    <div class="card auth-box">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="auth-content card-body p-5 h-100 text-black" style="
                                        background-color: #fff;
                                        background-clip: padding-box;
                                        border: 1px solid #eff0f2;
                                    ">
                                    <div class="w-100">
                                        <form method="POST" action="{{ route('site.request.apply') }}" enctype="multipart/form-data"> 
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="job_id" value="{{ $job_id }}">
                                            <input type="hidden" name="file_cv" value="handle">
                                            <div class="text-center mb-4">
                                                <h5 class="modal-title primary" id="staticBackdropLabel">Choice CV For Job</h5>
                                            </div>
                                            <div class="position-absolute end-0 top-0 p-3">
                                                <a href="/"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="inputGroupFile01">Resume Upload</label>
                                                <input type="file" class="form-control" id="inputGroupFile01" name="file-file_cv">
                                            </div>
                                            @isset(auth()->user()->profileUser->cv)
                                            <div class="mb-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="is_use_profile_cv">
                                                    <span class="float-end text-black">
                                                        {{ auth()->user()->profileUser->cv }}
                                                    </span>
                                                    <label class="form-check-label" for="flexCheckDefault">Dùng CV đã lưu</label>
                                                </div>
                                            </div>
                                            @endisset
                                            <button type="submit" class="btn btn-primary w-100">Send Application</button>
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

    
</div>
@endsection