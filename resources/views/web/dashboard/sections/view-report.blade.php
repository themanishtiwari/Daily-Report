<div class="modal fade" id="viewReport" tabindex="-1" aria-labelledby="exampleModalStaticLabel" aria-hidden="true"
  data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="report-container">
        <div class="d-flex justify-content-between align-items-center mb-5">
          <div class="me-4">
            <h2 class="report-title">Daily Report</h2>
          </div>
          <div class="d-flex gap-2 me-n2">
            <h1 type="button"><i class="bi bi-globe" style="font-size: 40px;"></i></h1>
          </div>
        </div>

        <div class="d-flex justify-content-between align-item-center mb-3">
          <table class="table table-bordered">
              <tr class="">
                  <th class="text-align-center">Total Work Time:</th>
                  <th id="total_work_time"></th>
              </tr>
          </table>
        </div>

        <h4 class="report-text text-center mb-4" >Work Details of <span id="myReportDate"></span></h4>
        <table class="table table-bordered table-responsive work-details" style="overflow-y: hidden">
          <thead>
            <tr>
              <th>Job Description</th>
              <th>Time Start</th>
              <th>Time End</th>
              <th>Work Time</th>
            </tr>
          </thead>
          <tbody id="showTableBody">
            <tr>
              <td>hggfj ffhhf fhfhj hhjfhj hjfhfjhfj jhhf jhf jhhf hjf</td>
              <td>12:00 AM</td>
              <td>01:00 PM</td>
              <td>01:00 PM</td>
            </tr>
          </tbody>
        </table>
        <div class="text-center">
          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>


    </div>
  </div>
</div>