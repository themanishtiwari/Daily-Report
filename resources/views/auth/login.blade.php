@extends('layouts.app')
@section('title', 'Login your Account')
@section('description', 'Login page | We offer a user-friendly platform designed to simplify the creation, management, and sharing of daily reports.')
@section('keywords', "login page, Online daily reports, Daily reporting software, Daily reporting website, Daily reporting website free")

@section('content')    
    
                        
    <main class="main">
    <section class="login-form" >

        

        <!-- Login area S t a r t  -->
        <div class="login-area section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">
                        <div class="login-card">
                            <!-- Title -->
                            <div class="mx-auto text-center my-3">
                                <h3>
                                    Login
                                </h3>
                            </div>
                            
                            @if ($errors->any())
                                <div class="mb-24">
                                    @foreach ($errors->all() as $error)
                                        <strong class="text-danger">{{$error}}</strong>
                                    @endforeach
                                </div>
                            @endif                        
                           
                            <!-- Form -->
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="position-relative contact-form mb-4">
                                    <label class="contact-label">Email </label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email">
                                </div>
                                
                                <div class="contact-form mb-4">
                                    <div class="position-relative ">
                                        <div class="d-flex justify-content-between aligin-items-center">
                                            <label class="contact-label">Password</label>
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request')}}"><span class="text-primary text-15"> Forgot
                                                    password? </span></a>
                                            @endif

                                        </div>
                                        <input type="password" class="form-control password-input" name="password" required autocomplete="current-password"
                                            id="password" placeholder="Enter Password">
                                        <i class="toggle-password ri-eye-line"></i>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
    
                                </div>
                                <div class="position-relative contact-form mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                </div>

                                <button type="submit" class="btn btn-primary justify-content-center w-100">
                                    <span class="d-flex justify-content-center gap-6">
                                        <span>Login</span>
                                    </span>
                                </button>
                            </form>

                            <div class="login-footer">
                                <div class="create-account">
                                    <p>
                                        Don’t have an account?
                                        <a href="{{ url('register')}}">
                                            <span class="text-primary">Register</span>
                                        </a>
                                    </p>
                                </div>
                                
                                <a href="{{url('google/login')}}"
                                    class="btn login-btn d-flex align-items-center justify-content-center gap-10">
                                    <img src="{{asset('assets/img/website/google-icon.png')}}" alt="img" class="m-0">
                                    <span>  &nbsp;  &nbsp;  login with Google</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End-of Login -->
    </section>
    </main>

@endsection
