@extends('layouts.app')



@section('title', 'Empower your productivity')
@section('description', 'We offer a user-friendly platform designed to simplify the creation, management, and sharing of daily reports.')
@section('keyword', 'Online daily reports, Daily reporting software, Daily reporting website, Daily reporting website free')

@section('content')
<style>
    .avatar {
    height: 3rem;
    width: 3rem;
    position: relative;
    display: inline-block !important;
    }

    .avatar-img {
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
        object-fit: cover;
    }

    .avatar-group {
    padding: 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    }
    .avatar-group > li {
    position: relative;
    }
    .avatar-group > li:not(:last-child) {
    margin-right: -0.8rem;
    }

    .avatar .avatar-name {
    margin-left: 7px;
    }

    .avatar-xxs {
    height: 1.5rem;
    width: 1.5rem;
    }

    .avatar-xs {
    height: 2.1875rem;
    width: 2.1875rem;
    }

    .avatar-sm {
    height: 2.5rem;
    width: 2.5rem;
    }

    .avatar-lg {
    height: 4rem;
    width: 4rem;
    }

    .avatar-xl {
    height: 5.125rem;
    width: 5.125rem;
    }

    .avatar-xxl {
    height: 5.125rem;
    width: 5.125rem;
    }
    @media (min-width: 768px) {
    .avatar-xxl {
        width: 8rem;
        height: 8rem;
    }
    }

    .avatar-xxxl {
    height: 8rem;
    width: 8rem;
    }
    @media (min-width: 768px) {
    .avatar-xxxl {
        width: 11rem;
        height: 11rem;
    }
    }

    .my-card-header{
        font-size: 1.2rem;
        font-weight: 800;
    }

    .profile-header{
        padding: 1.25rem;
        background-color: white;
        
    
    }
    .profile-header h6{
        font-family: "Instrument Sans", sans-serif;
        font-weight: 700;
        line-height: 1.25;
    }
    
</style>
    <main>
        <section class="pt-sm-7">
            <div class="container pt-3 pt-xl-5">
                <div class="row">
                    <!-- Sidebar -->
                    <div class="col-lg-4 col-xl-3">
                        <!-- Responsive offcanvas body START -->
                        <div class="offcanvas-lg offcanvas-start h-100" tabindex="-1" id="offcanvasSidebar">
                            <!-- Offcanvas header -->
                            <div class="offcanvas-header bg-light">
                                <h5 class="my-title" id="offcanvasNavbarLabel">My profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
                            </div>
                            <!-- Offcanvas body -->
                            <div class="offcanvas-body p-0">
                                <div class="card border p-3 w-100">
                                    <!-- Card header -->
                                    <div class="card-header text-center border-bottom profile-header">
                                            <!-- Avatar -->
                                            @php
                                                if(isset($user->profile_pic)){
                                                    $profile_pic = asset($user->profile_pic);
                                                }
                                                elseif(isset($user->avatar)){
                                                    $profile_pic = $user->avatar;
                                                }
                                                else{
                                                    $profile_pic = asset('assets/img/profile/profile2.jpg');
                                                }
                                            @endphp
                                            <div class="avatar avatar-xl position-relative mb-2">
                                                <img class="avatar-img rounded-circle border border-2 border-white" id="profile_pic2" src="{{$profile_pic}}" alt="">
                                                {{-- <a href="#" class="btn btn-sm btn-round btn-dark position-absolute top-50 start-100 translate-middle mt-4 ms-n3" data-bs-toggle="tooltip" data-bs-title="Edit profile">
                                                        <i class="bi bi-pencil-square"></i>
                                                </a> --}}
                                            </div>
                                            <h6 class="mb-0">{{$user->name}}</h6>
                                            <a href="#" class="text-reset text-primary-hover small">{{$user->email}}</a>
                                    </div>
        
                                    <!-- Card body START -->
                                    <div class="card-body p-0 mt-4">
                                        <!-- Sidebar menu item START -->
                                        <ul class="nav nav-pills-primary-border-start flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="{{url('profile')}}"><i class="bi bi-person fa-fw me-2"></i>My profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{url('dashboard')}}"><i class="bi bi-grid fa-fw me-2"></i>Dashbaord</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{url('profile')}}#change_password"><i class="bi bi-shield-lock fa-fw me-2"></i>Change Password</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{url('/')}}"><i class="bi bi-house fa-fw me-2"></i>Home</a>
                                            </li>
                                            
                                            <li class="nav-item">
                                                <a class="nav-link text-danger" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                    <i class="bi bi-box-arrow-left me-2"></i>Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                        <!-- Sidebar menu item END -->
                                    </div>
                                    <!-- Card body END -->
                                </div>
                            </div>
                        </div>		
                    </div>
        
                    <!-- Main content -->
                    <div class="col-lg-8 col-xl-9 ps-lg-4 ps-xl-6">
                        <!-- Title and offcanvas button -->
                        <div class="d-flex justify-content-between align-items-center mb-5 mb-sm-6">
                            <!-- Title -->
                            <h1 class="my-title mb-0">My profile</h1>
        
                            <!-- Advanced filter responsive toggler START -->
                            <button class="btn btn-primary d-lg-none flex-shrink-0 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                                <i class="fas fa-sliders-h"></i> Menu
                            </button>
                            <!-- Advanced filter responsive toggler END -->
        
                        </div>

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endforeach
                        @endif
                        
        
                        <!-- Personal Information -->
                        <form method="POST" action="{{url('/profile/update')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card bg-transparent">
                                <!-- Card header -->
                                <div class="card-header bg-transparent border-bottom">
                                    <h6 class="my-card-header">Personal Information</h6>
                                </div>
        
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row g-4">
                                        <!-- Profile photo -->
                                        <div class="col-12">
                                            <label class="form-label">Profile picture</label>
                                            <div class="d-flex align-items-center">
                                                <label class="position-relative me-2" title="Replace this pic">
                                                    <!-- Avatar place holder -->
                                                    <span class="avatar avatar-xl">                                                        
                                                        <img class="avatar-img rounded-circle border border-white border-3 shadow" id="profile_pic" src="{{$profile_pic}}" alt="">
                                                    </span>
                                                </label>
                                                <!-- Upload button -->
                                                <!-- Upload button -->
                                                <label class="btn btn-sm btn-dark mb-0" for="profile_pic_input">Change</label>
                                                <input id="profile_pic_input" class="form-control d-none" type="file" name="profile_pic" accept="image/*">
                                                
                                            </div>
                                        </div>
                                        <!-- Full name -->
                                        <div class="col-12">
                                            <label class="form-label">Full name</label>
                                            
                                                
                                            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Enter your name">
                                        </div>
                
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <label class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Enter your email id">
                                        </div>
                
                                        <!-- Mobile -->
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile number</label>
                                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}" placeholder="Enter your mobile number">
                                        </div>
                
                
                                        <div class="col-md-12">Enter the hours for work of:</div>
                                        <!-- Level -->
                                        <div class="col-md-4">
                                            <label class="form-label">Good level</label>
                                            <input type="text" class="form-control" name="good_level" value="{{$user->good_level}}" placeholder="Enter the hour for good lavel work">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Moderate level</label>
                                            <input type="text" class="form-control" name="moderate_level" value="{{$user->moderate_level}}" placeholder="Enter the hour for moderate level work">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Poor level</label>
                                            <input type="text" class="form-control" name="poor_level" value="{{$user->poor_level}}" placeholder="Enter the hour for poor level work">
                                        </div>
                
                                        <!-- Button -->
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary mb-0">Save Changes</a>
                                        </div>
                
                                    </div>
                                </div>
                            </div>
                        </form>
        
                        <div class="text-center my-5" id="change_password"><i class="bi bi-three-dots"></i></div> <!-- Divider -->
        
                        <!-- Update password -->
                        <form method="post" action="{{ url('/profile/passowrd/update') }}">
                            @csrf
                            @method('put')
                            <div class="card bg-transparent">
                                <!-- Card header -->
                                <div class="card-header bg-transparent border-bottom">
                                    <h6 class="my-card-header">Update password</h6>
                                </div>
        
                                <!-- Card body -->
                                <div class="card-body">
                                    <!-- Current password -->
                                    <div class="mb-3">
                                        <label class="form-label">Current password</label>
                                        <input class="form-control" type="password" name="current_password" placeholder="Enter current password">
                                    </div>
                                    <!-- New password -->
                                    <div class="mb-3">
                                        <label class="form-label">Enter new password</label>
        
                                        <div class="position-relative">
                                            <input type="password" class="form-control fakepassword pe-6" id="psw-input" name="password" placeholder="Enter new password">
                                            <span class="position-absolute top-50 end-0 translate-middle-y p-0 me-2">
                                                <i class="fakepasswordicon fas fa-eye-slash cursor-pointer p-2"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Confirm password -->
                                    <div>
                                        <label class="form-label">Confirm new password</label>
                                        <input class="form-control" type="password" name="password_confirmation" placeholder="Re-enter new password">
                                    </div>
                                    <!-- Button -->
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn btn-primary mb-0">Change password</button>
                                       
                                    </div>
                                </div>
                            </div>
                        </form>
        
                    </div>
                </div>
        
            </div>
        </section>    
    </main>

    <script>
        profile_pic_input.onchange = evt => {
            const [file] = profile_pic_input.files
            if (file) {
                profile_pic.src = URL.createObjectURL(file);
                profile_pic2.src = URL.createObjectURL(file);
            }
        }
    </script>
@endsection
