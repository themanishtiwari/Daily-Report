<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Toast</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <style>
        
        .toast {
          position: fixed;
          top: 100px;
          right: 15px;
          z-index: 100;
        }

      </style>
    
</head>
<body>

    <div class="toast" id="myToast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Notification</strong>
            <small>Just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            This is a sample toast message.
        </div>
      </div>
      
      
      <button type="button" class="btn btn-primary" id="toastBtn" onclick="showTost()">Show Toast</button>
      
      <script>
          function showTost() {
              var myToast = document.getElementById('myToast');
              var toast = new bootstrap.Toast(myToast);
              toast.show();
          }
      
          var toast = new bootstrap.Toast(myToast, {
          autohide: true,
          delay: 3000 // Time in milliseconds
          });
      </script>
      

</body>
</html>