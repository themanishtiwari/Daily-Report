@extends('layouts.app')
@section('title', 'User Dashboard')
@section('description', 'User dashboard | We offer a user-friendly platform designed to simplify the creation,
management,
and sharing of daily reports.')
@section('keywords', "User dashboard, Online daily reports, Daily reporting software, Daily reporting website, Daily
reporting website free")

@section('content')

<div class="container">
  <main class="main">
    <div class="dashboard">

      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div>


      <div class="row">
        <!-- Left side columns -->
        
        @include('web.dashboard.sections.date-range-selector')
        <div class="col-lg-12">
          
          <div class="row">

            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total Working Hours </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h3 id="working_hour">0</h3>
                      <span
                        class="text-muted small pt-2 ps-1">In Selected </span><span class="text-success small pt-1 fw-bold">Date Range</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Average Day Work</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h3 id="average_day_work">0</h3>
                      <span
                        class="text-muted small pt-2 ps-1">In a </span><span class="text-success small pt-1 fw-bold">Day</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Package Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Work Percentage</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                      style="color: #bc00c4; background: #fadeff;">
                      <i class="bi bi-percent"></i>
                    </div>
                    <div class="ps-3">
                      <h3 id="work_percentage">0</h3>
                      <span
                        class="text-muted small pt-2 ps-1">Of the </span><span class="text-success small pt-1 fw-bold">Day</span>

                    </div>
                  </div>

                </div>
              </div>

            </div>
            <!-- End Customers Card -->
          </div>
        </div><!-- End Left side columns -->

      </div>
    </div>



    <!-- chart and table   -->
    <div class="mx-3 mb-5">

      <div class="row">
        <!--Chat -->
        <div class="col-md-10 mb-5">
          <canvas id="myChart"></canvas>
        </div>
        <!--Chat end -->
      </div>




      <div class="row mt-5">
        <div class="col-md-12 mb-5">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                  <h5 class="card-title">Daily Report</h5>
                </div>
                <div class="d-flex gap-2 me-n2">
                  <button class="btn btn-lg btn-text-primary btn-icon" type="button" id="add" data-bs-toggle="modal"
                    data-bs-target="#createStats"><i class="bi-plus-circle-fill" style="font-size: 25px;"></i></button>
                </div>
              </div>

              <table class="table data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Work Hours</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            </div>

          </div>
        </div>

        <div class="col-md-6 mb-5">
          @include('web.dashboard.sections.recent-report')
        </div>

      </div>
    </div>

  </main>
</div>














@include('web.dashboard.sections.create-report')
@include('web.dashboard.sections.update-report')
@include('web.dashboard.sections.view-report')
@include('web.dashboard.sections.custom-script')




<script type="text/javascript">
  $(function () {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
      var start_date = start.format('YYYY/MM/DD');
      var end_date = end.format('YYYY/MM/DD');

      // console.log([start_date, end_date]);

      document.getElementById('start_date').value = start_date;
      document.getElementById('end_date').value = end_date;
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

      //Fatch Data
      $('.data-table').DataTable().destroy(); 
      fatchData();

    }

    $('#reportrange').daterangepicker({
      startDate: start,
      endDate: end,
      ranges: {
        // 'Today': [moment(), moment()],
        // 'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        // 'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      }
    }, cb);

    cb(start, end);

  });

</script>

@endsection