@extends('auth.authlayout')
@section('title')
<title>Sign In</title>
<meta name="DC.Title" content="Sign In">
<meta name="rating" content="general">
<meta name="description" content="Sign In">
<meta property="og:type" content="website">
<meta property="og:image" content="">
<meta property="og:title" content="Sign In">
<meta property="og:description" content="Sign In">
<meta property="og:site_name" content="Sign In">
<meta property="og:url" content="{{ url('') }}">
<meta property="og:locale" content="it_IT">
@endsection
@section('content')
<!-- <div id="preloader"></div> -->
<div id="wrapper" class="wrapper overflow-hidden">
    <div class="login-page-wrap">
        <div class="content-wrap">
            <div class="login-content">
                <div class="item-logo">
                    <a href="{{ url('') }}"><img src="{{ asset('public/images/') }}/{{ Cmf::get_store_value('header_logo') }}" alt="logo"></a>
                </div>
                <div class="login-form-wrap">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active"  href="{{ url('signin') }}"><i class="icofont-users-alt-4"></i> Sign In </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ url('signup') }}"><i class="icofont-download"></i> Registration</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane login-tab fade show active" id="login-tab" role="tabpanel">
                            <h3 class="item-title">Sign Into Your Account</h3>
                            @if(session()->has('activeerror'))
                            <div style="text-align: center;color: red;" id="result">{{ session()->get('activeerror') }}</div>
                            @endif
                            <div class="google-signin">
                                <a href="{{ url('auth/google') }}"><img src="{{ asset('public/front/media/figure/google-icon.png') }}" alt="Google">Google Sign in</a>
                            </div>
                            <div class="google-signin">
                                <a href="{{ url('auth/facebook') }}"><img src="{{ asset('public/front/media/figure/facebook.png') }}" alt="Google">Facebook Sign in</a>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12 text-center">
                                    <span>Or</span>
                                </div>
                            </div>
                            @if(session()->has('error'))
                                <div style="text-align: center;color: red;" id="result">{{ session()->get('error') }}</div>
                             @endif

                             
                            <form action="{{ route('user.login') }}" method="POST" id="form">
                                @csrf
                                <div class="form-group">
                                    <input id="email" autocomplete="off" value="@if(session()->has('email')){{ session()->get('email') }}  @endif" type="text" class="form-control" name="email" placeholder="Your E-mail">
                                    @if($errors->has('email'))
                                        <div style="color: red">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    @if($errors->has('password'))
                                        <div style="color: red">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="form-group reset-password">
                                    <a href="{{url('forgot-password')}}">* Reset Password</a>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="validationFormCheck2">
                                        <label class="form-check-label" for="validationFormCheck2">Keep me as signed in</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="login-btn" class="submit-btn" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="map-line">
                    <img src="{{ asset('public/front/media/banner/map_line2.png') }}" alt="map">
                    <ul class="map-marker">
                        <li><img src="{{ asset('public/front/media/banner/marker_1.png') }}" alt="marker"></li>
                        <li><img src="{{ asset('public/front/media/banner/marker_2.png') }}" alt="marker"></li>
                        <li><img src="{{ asset('public/front/media/banner/marker_3.png') }}" alt="marker"></li>
                        <li><img src="{{ asset('public/front/media/banner/marker_4.png') }}" alt="marker"></li>
                    </ul>
                </div>
        </div>
    </div>
</div>
@endsection