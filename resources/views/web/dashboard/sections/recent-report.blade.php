@if(isset($recent))
            <div class="report-container">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="me-4">
                  <h2 class="report-title">Recent Report</h2>
                </div>
                <div class="d-flex gap-2 me-n2">
                  <h1 type="button"><i class="bi bi-globe" style="font-size: 40px;"></i></h1>
                </div>
              </div>

              <div class="d-flex justify-content-between align-item-center mb-3">
                <table class="table table-bordered">
                    <tr class="">
                        <th class="text-align-center">Total Work Time:</th>
                        <th>{{$recent->total_work_time}}</th>
                    </tr>
                </table>
              </div>
    
              <h4 class="report-text text-center mb-4">Work Details of {{date('d M Y', strtotime($recent->date))}}</h4>
              <table class="table table-bordered work-details">
                <thead>
                  <tr>
                    <th>Work Detail</th>
                    <th>Time Start</th>
                    <th>Time End</th>
                    <th>Work Time</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($recent->details as $data)
                  <tr>
                    <td>{{$data->work}}</td>
                    <td>{{$data->from}}</td>
                    <td>{{$data->to}}</td>
                    <td>{{$data->work_time}}</td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
              
            </div>
          @endif