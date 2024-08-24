@extends('layouts.app')



@section('title', 'Empower your productivity')
@section('description', 'We offer a user-friendly platform designed to simplify the creation, management, and sharing of daily reports.')
@section('keyword', 'Online daily reports, Daily reporting software, Daily reporting website, Daily reporting website free')

@section('content')
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="{{asset('assets/img/hero-bg-light.webp')}}" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Welcome to <span>DailyReport</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">Empower your productivity with our daily report website!<br></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#about" class="btn-get-started">Get Started</a>
            <a href="https://www.youtube.com/watch?v=WD7Vc-x6HQA" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
          <img src="{{asset('assets/img/website/report.png')}}" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section light-background">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Maximum Efficiency</a></h4>
                <p class="description">Daily reports provide a clear picture of progress, completed tasks, and upcoming deadlines</p>
              </div>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-rocket-takeoff"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Boost Accountability</a></h4>
                <p class="description">Daily reports foster a culture of openness and responsibility.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Progress Tracking</a></h4>
                <p class="description">These reports provide a clear record of progress over time, making it easier to track</p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section>
    <!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us</h2>
        <p>benefits of a daily report, here are four benefits of reporting</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row justify-content-between">

          <div class="col-lg-5 d-flex align-items-center">

            <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                  <i class="bi bi-graph-up"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Enhanced Accountability</h4>
                    <p>
                      By documenting daily activities and outcomes, team members are held accountable for their tasks. This encourages responsibility and ensures that everyone is contributing to the project's success.
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                  <i class="bi bi-box-seam"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Progress Tracking</h4>
                    <p>
                      These reports provide a clear record of progress over time, making it easier to track milestones and measure performance against goals. This can be particularly useful for project reviews and future planning.
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                  <i class="bi bi-brightness-high"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Maximum Efficiency</h4>
                    <p>
                      Ditch the paper and time-consuming manual entries. Our website streamlines the reporting process, allowing you to quickly capture progress, tasks, and goals. Free up valuable time to focus on what matters most!
                    </p>
                  </div>
                </a>
              </li>
            </ul><!-- End About us -->

          </div>

          <div class="col-lg-5">

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

              <div class="tab-pane fade active show" id="features-tab-1">
                <img src="{{asset('assets/img/website/daily-report.webp')}}" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->

            </div>

          </div>

        </div>

      </div>

    </section><!-- /Benefites Section -->

    <!-- Features Details Section -->
    <section id="features" class="features-details section">

      <div class="container">

        <div class="row gy-4 justify-content-between features-item">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="{{asset('assets/img/website/accountibility1.jpg')}}" class="img-fluid" alt="">
          </div>

          <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Take Control of Your Time: Time Management</h3>
              <p>
                Feeling overwhelmed by to-do lists and looming deadlines? Take back control of your day with our time management website! We offer a comprehensive suite of tools and resources designed to help you
              </p>
              <a href="#" class="btn more-btn">Learn More</a>
            </div>
          </div>

        </div><!-- Features Item -->

        <div class="row gy-4 justify-content-between features-item">

          <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">

            <div class="content">
              <h3>Unlock your full Potential</h3>
              <p>
                Effective time management sets you up for success. By prioritizing tasks and optimizing your workflow, you'll be well on your way to achieving your goals, both big and small.
              </p>
              <ul>
                <li><i class="bi bi-easel flex-shrink-0"></i> Prioritize Effectively</li>
                <li><i class="bi bi-patch-check flex-shrink-0"></i> Boost Productivity</li>
                <li><i class="bi bi-brightness-high flex-shrink-0"></i> Develop Healthy Habits</li>
                <li><i class="bi bi-graph-up flex-shrink-0"></i> Achieve Work-Life Balance</li>
              </ul>
              <p></p>
            </div>

          </div>

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
            <img src="{{asset('assets/img/website/accountibility.jpg')}}" class="img-fluid" alt="">
          </div>

        </div><!-- Features Item -->

      </div>

    </section><!-- /Features Details Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Effortlessly manage and share daily reports with our user-friendly platform</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row g-5">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <i class="bi bi-globe icon"></i>
              <div>
                <h3>Online Functionality</h3>
                <p>Capture information on the go, even without an internet connection. Reports automatically sync when you reconnect.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
              <i class="bi bi-graph-up-arrow icon"></i>
              <div>
                <h3>Data Visualization</h3>
                <p>Transform daily reports into insightful visuals like charts and graphs. Gain a clear picture of progress, identify trends, and make data-driven decisions.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item item-indigo position-relative">
              <i class="bi bi-hand-index icon"></i>
              <div>
                <h3>Customizable Filters</h3>
                <p>Drill down into specific details with customizable filters. Analyze reports by project, team member, or any other relevant category.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item item-pink position-relative">
              <i class="bi bi-box-arrow-down icon"></i>
              <div>
                <h3>Export Options</h3>
                <p>Export reports in various formats like PDF or CSV for further analysis or sharing with external parties.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-cyan position-relative">
              <i class="bi bi-columns icon"></i>
              <div>
                <h3>Intuitive Interface</h3>
                <p>Our website boasts a  user-friendly interface that makes creating daily reports a breeze.  Quickly capture progress, tasks, goals, and any relevant details.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
              <i class="bi bi-layout-text-window-reverse icon"></i>
              <div>
                <h3>Pre-built Templates</h3>
                <p>Save time with pre-built templates tailored to various industries and needs. Customize them further to perfectly fit your workflow.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->


  </main>
@endsection
