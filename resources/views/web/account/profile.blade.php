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
                                            <div class="avatar avatar-xl position-relative mb-2">
                                                <img class="avatar-img rounded-circle border border-2 border-white" src="{{asset('assets/img/profile/profile2.jpg')}}" alt="">
                                                {{-- <a href="#" class="btn btn-sm btn-round btn-dark position-absolute top-50 start-100 translate-middle mt-4 ms-n3" data-bs-toggle="tooltip" data-bs-title="Edit profile">
                                                        <i class="bi bi-pencil-square"></i>
                                                </a> --}}
                                            </div>
                                            <h6 class="mb-0">Jacqueline Miller</h6>
                                            <a href="#" class="text-reset text-primary-hover small">hello@gmail.com</a>
                                    </div>
        
                                    <!-- Card body START -->
                                    <div class="card-body p-0 mt-4">
                                        <!-- Sidebar menu item START -->
                                        <ul class="nav nav-pills-primary-border-start flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="account-detail.html"><i class="bi bi-person fa-fw me-2"></i>My profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="account-security.html"><i class="bi bi-shield-lock fa-fw me-2"></i>Security</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="account-notification.html"><i class="bi bi-bell fa-fw me-2"></i>Notification</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="account-projects.html"><i class="bi bi-briefcase fa-fw me-2"></i>My projects</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="account-payment-details.html"><i class="bi bi-wallet fa-fw me-2"></i>Payment details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="account-order.html"><i class="bi bi-basket fa-fw me-2"></i>Order history</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="account-wishlist.html"><i class="bi bi-heart fa-fw me-2"></i>Wishlist</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="account-delete.html"><i class="bi bi-trash fa-fw me-2"></i>Delete profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-danger" href="#"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sign Out</a>
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
        
                        <!-- Personal Information -->
                        <form>
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
                                                        <img class="avatar-img rounded-circle border border-white border-3 shadow" src="{{asset('assets/img/profile/profile2.jpg')}}" alt="">
                                                    </span>
                                                </label>
                                                <!-- Upload button -->
                                                <label class="btn btn-sm btn-dark mb-0">Change</label>
                                                <input class="form-control d-none" type="file" name="image">
                                            </div>
                                        </div>
                                        <!-- Full name -->
                                        <div class="col-12">
                                            <label class="form-label">Full name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="Jacqueline" placeholder="First name">
                                                <input type="text" class="form-control" value="Miller" placeholder="Last name">
                                            </div>
                                        </div>
                
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <label class="form-label">Email address</label>
                                            <input type="email" class="form-control" value="hello@gmail.com" placeholder="Enter your email id">
                                        </div>
                
                                        <!-- Mobile -->
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile number</label>
                                            <input type="text" class="form-control" value="222 555 666" placeholder="Enter your mobile number">
                                        </div>
                
                
                                        <!-- Gender -->
                                        <div class="col-md-6">
                                            <label class="form-label">Select Gender</label>
                                            <div class="input-group">
                                                <div class="form-control">
                                                    <div class="form-check radio-bg-light">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked="">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Male
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="form-control">
                                                    <div class="form-check radio-bg-light">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>	
                
                                                <div class="form-control">
                                                    <div class="form-check radio-bg-light">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                                        <label class="form-check-label" for="flexRadioDefault3">
                                                            Others
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <!-- Address -->
                                        <div class="col-12">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control" rows="3" spellcheck="false">2119 N Division Ave, New Hampshire, York, United States</textarea>
                                        </div>
                
                                        <!-- Button -->
                                        <div class="col-12 text-end">
                                            <a href="#" class="btn btn-primary mb-0">Save Changes</a>
                                        </div>
                
                                    </div>
                                </div>
                            </div>
                        </form>
        
                        <div class="text-center my-5"><i class="bi bi-three-dots"></i></div> <!-- Divider -->
        
                        <!-- Update email -->
                        <form>
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header  bg-transparent">
                                    <h6 class="my-card-header">Update email</h6>
                                </div>
        
                                <!-- Card body -->
                                <div class="card-body">
                                    <!-- Full name -->
                                    <div class="mb-4">
                                        <p class="mb-4">Your current email address is <span class="text-primary">example@gmail.com</span></p>
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control" value="hello@gmail.com" placeholder="Enter your email id">
                                    </div>
        
                                    <!-- Button -->
                                    <div class="text-end">
                                        <a href="#" class="btn btn-primary mb-0">Save Changes</a>
                                    </div>
                                </div>
                            </div>
                        </form>
        
                        <div class="text-center my-5"><i class="bi bi-three-dots"></i></div> <!-- Divider -->
        
                        <!-- Update password -->
                        <form>
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
                                        <input class="form-control" type="password" placeholder="Enter current password">
                                    </div>
                                    <!-- New password -->
                                    <div class="mb-3">
                                        <label class="form-label">Enter new password</label>
        
                                        <div class="position-relative">
                                            <input type="password" class="form-control fakepassword pe-6" id="psw-input" placeholder="Enter new password">
                                            <span class="position-absolute top-50 end-0 translate-middle-y p-0 me-2">
                                                <i class="fakepasswordicon fas fa-eye-slash cursor-pointer p-2"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Confirm password -->
                                    <div>
                                        <label class="form-label">Confirm new password</label>
                                        <input class="form-control" type="password" placeholder="Re-enter new password">
                                    </div>
                                    <!-- Button -->
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="button" class="btn btn-primary mb-0">Change password</button>
                                    </div>
                                </div>
                            </div>
                        </form>
        
                    </div>
                </div>
        
            </div>
        </section>    
    </main>
@endsection
