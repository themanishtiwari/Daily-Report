<div class="modal fade" id="createStats" tabindex="-1" aria-labelledby="exampleModalStaticLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalStaticLabel">Create Report</h5>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" onclick="closeModel()"></button>
          </div>
          <div class="modal-body" id="matchDataBody">
            <div class="p-3">

              <div id="showMessage"></div>

              <form method="post" id="createStatsForm">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label" name="name">Date</label>
                  <input type="date" class="form-control" name="date" value="{{date('Y-m-d')}}">
                </div>
                <div class="mb-3">                  
                  <div  id="createFeatureContainer">
                    <div class="feature-input mb-3">
                      <div class="row mb-3">
                        <div class="col-6">
                          <label class="form-label">Start Time</label>
                          <input type="time" class="form-control" name="start" required>
                        </div>
                        <div class="col-6">
                          <label class="form-label">End Time</label>
                          <input type="time" class="form-control" name="end" required>
                        </div>
                      </div>
                      <input type="text" class="form-control" name="work" placeholder="Enter Work Details"  required>
                    </div>
                  </div>
                  {{-- <button type="button" class="btn btn-secondary" onclick="addInclude()">Add work</button> --}}
                  <button type="button" class="btn btn-info" onclick="addInclude('createFeatureContainer')">Add More</button>

                </div>          

                <button type="submit" class=" btn btn-primary float-end" id="submitBtn" >Submit 
                  
                  <!-- <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"> </span> Loading... -->
                </button>
              </form>
          </div>
          </div>
          
      </div>
  </div>
</div>



