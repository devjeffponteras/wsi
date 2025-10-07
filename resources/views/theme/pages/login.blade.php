@extends('theme.main')

@section('pagecss')
<style>
    #slider {
        display: none;
    }

    .btns {
        display: inline-flex;
        align-items: center;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        padding: 1rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        transition: 0.3s;
        border-width: 1px;
        border-style: solid;
        border-color: rgb(255, 255, 255);
        border-image: initial;
    }

    .btn-primary1 {
        color: white;
        backdrop-filter: blur(10px);
        background: linear-gradient(135deg, rgb(30, 64, 175), rgb(59, 130, 246));
    }

    .btn-primary1:hover {
        color: white;
        transform: translateY(-3px);
        background: linear-gradient(135deg, rgb(255, 86, 0));
    }

    .login-page-container .input-group-append .hide-unhide-btn {
        position: absolute;
        transform: translate(-32px, 9px);
        color: #2b5ecf;
    }

    .text-btn-like {
        color: #2b5ecf;
    }

</style>
@endsection

@section('content')
    <div class="d-flex login-page-container" style="margin-top: 60px">
        <div class="col-6" style="background-color: #e4effb; padding-top: 80px; min-height: 70vh;">
            <div class="login-hero d-flex flex-column align-items-center justify-content-center">
                <img src="{{ asset('/images/login-hero.png') }}" style="max-width: 40%;">
                <h3 class="text-center mt-4">Ultrafast PHP <br /> For Extra Speed & Security</h3>
                <small class="text-center">
                    Our ultrafast PHP implementation makes your pages load 30% faster. <br />
                    Enable ultrafast PHP in the PHP Manager of Site Tools.
                </small>

            </div>
        </div>
        <div class="col-6 d-flex flex-column justify-content-between">

                <div class="d-flex flex-row align-items-center justify-content-center" style="padding-top: 80px; padding-bottom: 100px;">
                    
                    @if($message = Session::get('error'))
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i data-feather="alert-circle" class="mg-r-10"></i> {{ $message }}
                        </div>
                    @endif

                    @if($message = Session::get('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i data-feather="alert-circle" class="mg-r-10"></i> {{ $message }}
                        </div>
                    @endif

                    <div class="card shadow rounded-5" style="max-width: 50%; min-width: 50%;">
                        <div class="card-body" style="padding: 40px;">
                            <form id="login-form" name="login-form" class="nobottommargin" action="{{ route('login') }}" method="post">
                                @csrf
                                <h3 class="text-center">Login</h3>

                                <div class="col_full mb-4">
                                    <small for="login-form-username">Username or Email:</small>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control py-2 rounded-5" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/>
                                </div>

                                <div class="col_full mb-4">
                                    <div class="col_full">
                                        <small for="formGroupExampleInput">Password:</small>
                                        <div class="input-group show_hide_password" id="show_hide_password">
                                            <input class="form-control py-2 rounded-5" type="password" id="password" name="password" placeholder="********">
                                            <div class="input-group-append">
                                                <span class="hide-unhide-btn cursor-pointer">
                                                    <i class="icon icon-eye-slash" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col_full nobottommargin text-center">
                                    <button type="submit" class="btns btn-primary1" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                                </div>

                                <div class="d-flex flex-row align-items-center py-3">
                                    <div class="divider pe-2" style="margin-top: 10px; margin-bottom: 10px;"></div><small style="opacity: .7">or</small><div class="divider ps-2" style="margin-top: 10px; margin-bottom: 10px;"></div>
                                </div>

                                <div class="col_full nobottommargin text-center">
                                    <button type="button" class="form-control btn border px-4 py-3 bg-white" id="google-login" name="google-login" style="border-radius: 100px;">
                                        <img src="{{ asset('/images/logos/google-logo.png') }}" width="22px" class="me-2">
                                        Continue with Google
                                    </button>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <div>
                                        <input type="checkbox" name="">
                                        <small>Stay logged in</small>
                                    </div>
                                    <a href="{{ route('customer-front.forgot_password') }}" class="fright"><small>Can't login?</small></a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col_full text-center pb-4">
                    <small class="note-footer">Google reCAPTCHA used. <a href="#"><span class="text-btn-like">Privacy Policy</span></a> and <a href="#"><span class="text-btn-like">Terms of Service</span></a> apply</small>
                </div>
        </div>
    </div>
@endsection

@section('pagejs')
    <script>
        /** form validations **/
        $(document).ready(function () {
            //called when key is pressed in textbox
            $('#mobile').keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                var charCode = (e.which) ? e.which : event.keyCode
                if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;

            });
        });

        $(".hide-unhide-btn").on('click', function(event) {
            event.preventDefault();
            if($(this).parent().siblings('input').attr("type") == "text"){
                $(this).parent().siblings('input').attr('type', 'password');
                $(this).children('i').addClass( "icon-eye-slash" );
                $(this).children('i').removeClass( "icon-eye" );
            }else if($(this).parent().siblings('input').attr("type") == "password"){
                $(this).parent().siblings('input').attr('type', 'text');
                $(this).children('i').removeClass( "icon-eye-slash" );
                $(this).children('i').addClass( "icon-eye" );
            }
        });
    </script>
@endsection

