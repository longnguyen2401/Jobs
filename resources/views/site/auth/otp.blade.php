@extends('site.auth.layout')

@section('title', 'Enter OTP')

@section('content')
<div class="page-content">

  <!-- START SIGN-IN -->
  <section class="bg-auth">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-6 col-lg-6 col-12">
                  <div class="card auth-box">
                      <div class="row g-0">
                          <div class="col-lg-12">
                            @if(session()->has('user_otp'))
                                @php
                                    $user = session()->get('user_otp');
                                @endphp
                                <div class="auth-content card-body p-5 h-100 text-white">
                                    <div class="w-100" style="
                                    position: relative;">
                                        <div class="text-center mb-2">
                                            <h5>Jobcy !</h5>
                                            <p class="text-white-70">Nhập số OTP được gửi vào số điện thoại</p>
                                        </div>

                                        <div class="mb-3">
                                            <span id="countdown"></span>
                                        </div>
                                        <form method="POST" action="{{ route('site.otp.check') }}" class="digit-group" data-group-name="digits" data-autosubmit="false"     autocomplete="off">
                                            @csrf
                                            <input type="hidden" name="phone" value="{{ $user->phone }}">

                                            <div class="d-flex justify-content-between">
                                                <input type="text" id="digit-1" name="digit-1" data-next="digit-2" class="{{ ($errors->has('digit-1') ? 'error' : '') }}"/>
                                                <input type="text" id="digit-2" name="digit-2" data-next="digit-3" class="{{ ($errors->has('digit-2') ? 'error' : '') }}" data-previous="digit-1" />
                                                <input type="text" id="digit-3" name="digit-3" data-next="digit-4" class="{{ ($errors->has('digit-3') ? 'error' : '') }}" data-previous="digit-2" />
                                                <input type="text" id="digit-4" name="digit-4" data-next="digit-5" class="{{ ($errors->has('digit-4') ? 'error' : '') }}" data-previous="digit-3" />
                                                <input type="text" id="digit-5" name="digit-5" data-next="digit-6" class="{{ ($errors->has('digit-5') ? 'error' : '') }}" data-previous="digit-4" />
                                                <input type="text" id="digit-6" name="digit-6" class="{{ ($errors->has('digit-6') ? 'error' : '') }}" data-previous="digit-5" />
                                                
                                            </div>

                                            @error('OTP')
                                                <div class="mt-3">{{ $message }}</div>
                                            @enderror
                                            
                                            <div class="mt-4 d-flex justify-content-between align-items-center">
                                                <button class="text-white btn btn-danger btn-hover" type="submit" style="text-decoration: underline;
                                                text-align: end;">
                                                    Gửi OTP
                                                </button>
                                            </div>
                                        </form>

                                        <form method="POST" action="{{ route('site.sms.send') }}">
                                            @csrf
                                            <input type="hidden" name="phone" value="{{ $user->phone }}">
    
                                            <div class="mt-3 d-flex justify-content-between align-items-center" style="
                                                position: absolute;
                                                bottom: 10px;
                                                right: 0;
                                            ">
                                                <button class="text-white" type="submit" style="
                                                text-decoration: underline;
                                                text-align: end;
                                                border: none;
                                                background: none;
                                                ">
                                                    Gửi lại SMS
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <div id="countdown"></div>
                                <div class="text-center mb-2">
                                    <h5>Jobcy !</h5>
                                    <div class="mt-4 d-flex justify-content-between align-items-center">
                                        <a href="/password/forgot" class="text-white btn btn-danger btn-hover" type="submit" style="text-decoration: underline;
                                        text-align: end;">
                                            Nhập số điện thoại
                                        </a>
                                    </div>
                                </div>
                            @else
                            
                            @endif

                              
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
    <script>
        $('.digit-group').find('input').each(function() {
            $(this).attr('maxlength', 1);
            $(this).on('keyup', function(e) {
                var parent = $($(this).parent());
                
                if(e.keyCode === 8 || e.keyCode === 37) {
                    var prev = parent.find('input#' + $(this).data('previous'));
                    
                    if(prev.length) {
                        $(prev).select();
                    }
                } else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                    var next = parent.find('input#' + $(this).data('next'));
                    
                    if(next.length) {
                        $(next).select();
                    } else {
                        if(parent.data('autosubmit')) {
                            parent.submit();
                        }
                    }
                }
            });
        });


        var expireOTP = "{{ session()->get('expire_otp') }}";
        if (expireOTP) {
            console.log(expireOTP)
            var end = new Date(expireOTP);
            console.log(end)
            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;

            timer = setInterval(showRemaining, 1000);
        } else {
            console.log('no')
        }

        

        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById('countdown').innerHTML = 'Mã OTP đã hết hạn, hãy gửi lại!';

                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            // document.getElementById('countdown').innerHTML = days + 'days ';
            // document.getElementById('countdown').innerHTML += hours + 'hrs ';
            // document.getElementById('countdown').innerHTML += minutes + 'mins ';
            document.getElementById('countdown').innerHTML = 'Mã OTP đã được gửi, mã tồn tại trong ' + seconds + 's';
        }

        
    </script>
@endsection
