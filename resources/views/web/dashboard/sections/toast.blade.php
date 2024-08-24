
<style>
  .toast {
    position: fixed;
    top: 120px;
    right: 15px;
    z-index: 100;
  }

  .toast-body {
    font-size: 15px;
    font-weight: 500;

  }

</style>

  <div id="successToast" class="toast text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true" >
    <div class="d-flex">
        <div class="toast-body" id="successToastBody">
          <span>
          <i class="bi bi-check-circle"></i>
            <span id="successMessageToast">Hello, world! This is a toast message.</span>
          </span>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>

  <div id="failToast" class="toast text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true" >
    <div class="d-flex">
        <div class="toast-body" id="failToastBody">
          <span><i class="bi bi-exclamation-octagon"></i>
            <span id="failureMessageToast">Hello, world! This is a toast message.</span>
          </span>
            
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>

  <div id="liveToast" class="toast text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true" >
    <div class="toast-header">
      {{-- <img src="{{asset('assets/img/seo.png')}}" class="rounded me-2" alt="Toast logo" style="height: 17px;"> --}}
      <strong class="me-auto">Daily Report</strong>
      <small>Just Now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>



<script>
  function showTost(type, message) {
    if(typeof type !== 'undefined'){
      if(type == 1){
        //Success message
        var myToast = document.getElementById('successToast');
        toastMessage = document.getElementById('successMessageToast');
      }
      else{
        //Failure message
        var myToast = document.getElementById('failToast');
        toastMessage = document.getElementById('failureMessageToast');
      }
      if (toastMessage) {
        toastMessage.textContent = message;
      }
    }
      var toast = new bootstrap.Toast(myToast);
      toast.show();



  var toast = new bootstrap.Toast(myToast, {
  autohide: true,
  delay: 5000
  });
  
  }

  
</script>
