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
        <div class="col-lg-12">
          <div class="row">

            <!-- Customers Card -->
            <div class="col-xxl-3 col-md-3">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Working Hours <span>| This Week</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h3>548</h3>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span
                        class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Sales Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Average Day Work <span>| This Week</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h3>587</h3>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span
                        class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Average Day Work <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h3>₹ 3,264</h3>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span
                        class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Package Card -->
            <div class="col-xxl-3 col-md-3">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Percent work/Day<span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                      style="color: #bc00c4; background: #fadeff;">
                      <i class="bi bi-airplane"></i>
                    </div>
                    <div class="ps-3">
                      <h3>8547</h3>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span
                        class="text-muted small pt-2 ps-1">decrease</span>

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
        <div class="col-md-8 mb-5">
          <canvas id="myChart"></canvas>
        </div>
        <!--Chat end -->
      </div>


      <div class="row">
        <!-- Recent Sales -->
        <!-- <div class="col-md-4">
          <div id="reportrange"
            style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <i class="bi bi-calendar"></i>&nbsp;
            <span></span> <i class="bi bi-caret-down-fill"></i>
          </div>
        </div> -->

      </div>

      <div class="row mt-5">
        <div class="col-md-6 mb-5">
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
              <div class="text-center">
                <div id="reportrange"
                  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                  <i class="bi bi-calendar"></i>&nbsp;
                  <span></span> <i class="bi bi-caret-down-fill"></i>
                </div>
              </div>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Working Hours</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>


                  <tr>
                    <th scope="row"><a href="#"><img src="ghdghd" alt="">1</a></th>
                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#viewReport" class="text-primary fw-bold">01
                        June 2024</a></td>
                    <td class="fw-bold">9 Hours</td>
                    <td><span class="badge text-bg-danger">Poor</span></td>
                  </tr>
                  <tr>
                    <th scope="row"><a href="#"><img src="ghdghd" alt="">1</a></th>
                    <td><a href="#" class="text-primary fw-bold">01 June 2024</a></td>
                    <td class="fw-bold">9 Hr</td>
                    <td><span class="badge text-bg-success">Good</span></td>
                  </tr>
                  <tr>
                    <th scope="row"><a href="#"><img src="ghdghd" alt="">1</a></th>
                    <td><a href="#" class="text-primary fw-bold">01 June 2024</a></td>
                    <td class="fw-bold">9 Hr</td>
                    <td><span class="badge text-bg-warning">Moderate</span></td>
                  </tr>
                  <tr>
                    <th scope="row"><a href="#"><img src="ghdghd" alt="">1</a></th>
                    <td><a href="#" class="text-primary fw-bold">01 June 2024</a></td>
                    <td class="fw-bold">9 Hours</td>
                    <td><span class="badge text-bg-danger">Poor</span></td>
                  </tr>
                  <tr>
                    <th scope="row"><a href="#"><img src="ghdghd" alt="">1</a></th>
                    <td><a href="#" class="text-primary fw-bold">01 June 2024</a></td>
                    <td class="fw-bold">9 Hr</td>
                    <td><span class="badge text-bg-success">Good</span></td>
                  </tr>
                  <tr>
                    <th scope="row"><a href="#"><img src="ghdghd" alt="">1</a></th>
                    <td><a href="#" class="text-primary fw-bold">01 June 2024</a></td>
                    <td class="fw-bold">9 Hr</td>
                    <td><span class="badge text-bg-warning">Moderate</span></td>
                  </tr>

                </tbody>
              </table>

            </div>

          </div>
        </div>

        <div class="col-md-6 mb-5">
          <div class="report-container">
            <div class="d-flex justify-content-between align-items-center mb-5">
              <div class="me-4">
                <h2 class="report-title">Recent Report</h2>
              </div>
              <div class="d-flex gap-2 me-n2">
                <h1 type="button"><i class="bi bi-globe" style="font-size: 40px;"></i></h1>
              </div>
            </div>
  
            <h4 class="report-text text-center mb-4">Work Details of 12 July 2024</h4>
            <table class="table table-bordered work-details">
              <thead>
                <tr>
                  <th>Work Detail</th>
                  <th>Time Start</th>
                  <th>Time End</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>hggfj ffhhf fhfhj hhjfhj hjfhfjhfj jhhf jhf jhhf hjf</td>
                  <td>12:00 AM</td>
                  <td>01:00 PM</td>
                </tr>
                <tr>
                  <td>hggfj ffhhf fhfhj hhjfhj hjfhfjhfj jhhf jhf jhhf hjf</td>
                  <td>12:00 AM</td>
                  <td>01:00 PM</td>
                </tr>
                <tr>
                  <td>hggfj ffhhf fhfhj hhjfhj hjfhfjhfj jhhf jhf jhhf hjf</td>
                  <td>12:00 AM</td>
                  <td>01:00 PM</td>
                </tr>
                <tr>
                  <td>hggf jffhhf fhfhj</td>
                  <td>12:00 AM</td>
                  <td>01:00 PM</td>
                </tr>
                <tr>
                  <td>hggfj ffhhf fhfhj hhjfhj</td>
                  <td>12:00 AM</td>
                  <td>01:00 PM</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- End Recent Sales -->
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


//date range piker
  $(function () {
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
      console.log(start.format('YYYY/MM/DD'));
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
      startDate: start,
      endDate: end,
      ranges: {
        // 'Today': [moment(), moment()],
        // 'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      }
    }, cb);

    cb(start, end);
    console.log([start]);

  });


//data chart

  var labels = ["1 Mar", "2 Mar", "3 Mar", "4 Mar", "5 Mar", "6 Mar", "7 Mar", "8 Mar", "9 Mar", "10 Mar", "11 Mar", "12 Mar", "13 Mar", "14 Mar", "15 Mar", "16 Mar", "17 Mar", "18 Mar", "19 Mar", "20 Mar", "21 Mar", "22 Mar", "23 Mar", "24 Mar", "25 Mar", "26 Mar", "27 Mar", "28 Mar", "29 Mar", "30 Mar"];
  var hours = [65, 59, 80, 81, 60, 55, 40, 50, 10, 20, 10, 30, 40, 20, 50, 30, 60, 40, 70, 50, 80, 60, 90, 50, 30, 60, 40, 70, 50, 80, 60, 90];

  const data = {
    labels: labels,
    datasets: [
      {
        label: 'Users',
        data: hours,
        borderColor: 'rgba(92, 96, 245)',
        backgroundColor: '#e6e6ff',
        fill: true,
        pointRadius: 1,
        hoverOffset: 4,
        responsive: true,
        lineTension: 0.1,
      }
    ]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
      scales: {
        x: {
          grid: {
            display: true
          },
          ticks: {
            font: {
              weight: 'bold'
            }
          }
        },
        y: {
          grid: {
            display: true
          },
          ticks: {
            font: {
              weight: 'bold'
            }
          }
        }
      },
      plugins: {
        legend: {
          display: false
        }
      }
    }
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

@endsection