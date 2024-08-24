@extends("admin.layouts.app")

@section("title", "Users")

  @section("content")

  <main id="main" class="main">

    <div class="pagetitle mb-5">
      <h1>Category</h1>
      
      
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h5 class="card-title">Category Table</h5>
                </div>
                <div class="d-flex gap-2 me-n2">
                    <button class="btn btn-lg btn-text-primary btn-icon" type="button" id="add" data-bs-toggle="modal" data-bs-target="#createStats"><i class="bi-plus-circle-fill" style="font-size: 25px;"></i></button>
                </div>
            </div>

              <!-- Default Table -->

              <table class="table data-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Tags</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
              <!-- End Default Table Example -->
            </div>
          </div>

        </div>

        
      </div>
    </section>

  </main><!-- End #main -->

  @include('admin.category.create-category')
  @include('admin.category.update-category')
  @include('admin.sections.toast')

  <script type="text/javascript">


function showToast(message, type) {
    if(type == 1){
      var x = document.getElementById("successToast");
      x.textContent = message;
      x.className = "show";
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
      
    }
    else if(type == 2){
      var x = document.getElementById("failToast");
      x.textContent = message;
      x.className = "show";
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
  }


  $(function () {
    fatchData();
  });
      function fatchData(){
        var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{url('admin/category')}}",
        columns: [
            {data: 'DT_RowIndex' , orderable: false, searchable: false},
            {data: 'image', name: 'image'},
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'tags', name: 'tags'},
            {data: 'actions', name: 'actions'},
        ]
    });
  };



  function deleteStats(id){
    if(confirm("Are you sure you want to delete this?")){
        // console.log(id);
        $.ajax({
            url : `{{url('admin/category/${id}')}}`,
            method : 'DELETE',
            data : {"_token": `{{csrf_token()}}`},
            success : function(data){
                if(data.status == 200){
                    $('.data-table').DataTable().destroy(); 
                    fatchData();
                    showToast(data.message, 1);
                }
            },
            error: function(e){
                console.log(e.responseText);
            }
        });
    }
    else{
        console.log('Fail')
    }
  }

  function editStats(id){
    // console.log(id);
    $.ajax({
        url : `{{url('admin/category/${id}')}}`,
        method : 'GET',
        data : {"_token": `{{csrf_token()}}`},
        success : function(data){
        // console.log(data);
        if(data.image){
          var im="storage/"+data.image;
          img=`{{asset('${im}')}}`;
          $('#img').attr("src", img);

        }
            $("#id").val(data.id);
            $("#name1").val(data.name);
            $("#description").val(data.description);
            $("#url1").val(data.url);
            $("#tags").val(data.tags);
            
            if(data.tranding == 1){
                $('#flexSwitch').attr('checked', true);
            }
            else{
                $('#flexSwitch').attr('checked', false);
            }
            $("#updateStats").modal('show');
        },
        error:function(e){
            console.log(e.responseText);
            }
      });
  }


  $(document).ready(function () {
    //create stats
    $("#createStatsForm").submit(function (event) {
      event.preventDefault();
      // $("#submitBtn").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"> </span> &nbsp;&nbsp;Loading...`);
      $("#submitBtn").attr("disabled", true);
      
      
      var form=$("#createStatsForm")[0];
      var data= new FormData(form);
      // console.log(data);

      $.ajax({
        type: "POST",
        url: "{{url('admin/category')}}",
        headers: {
          "X-CSRF-TOKEN":"{{csrf_token()}}"
          },
        data: data,
        processData:false,
          contentType:false,
          
        success : function(data){
          // console.log(data);
          if(data.status == 200){
              $( '#createStatsForm' ).each(function(){
                  this.reset();
              });
              imgjh.src ="";
              $("#submitBtn").attr("disabled", false);
              $("#createStats").modal('hide');
              $('.data-table').DataTable().destroy(); 
              fatchData();

              showToast(data.message, 1);
          }
          else if(data.status == 400){
              $("#submitBtn").attr("disabled", false);
              imgjh.src ="";
              var message= `<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                    ${data.message}
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
              document.getElementById('showMessage').innerHTML=message;
              // showToast(data.message, 2);
          }
        },
        error : function(e){
          console.log(e.responseText);
        }
        });
        



      });



    //update stats
    $("#updateStatsForm").submit(function (event) {
      event.preventDefault();
      // $("#submitBtn").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"> </span> &nbsp;&nbsp;Loading...`);
      $("#submitBtn").attr("disabled", true);
      
      
      // var form = $(this);
      // var formData = form.serialize();
      var form=$("#updateStatsForm")[0];
      var data= new FormData(form);


      $.ajax({
          type: "POST",
          url: "{{url('admin/category')}}",
          headers: {
          "X-CSRF-TOKEN":"{{csrf_token()}}"
          },
          data: data,
          processData:false,
          contentType:false,
        success: function (data){
          if(data.status == 200){
              $( '#updateStatsForm' ).each(function(){
                  this.reset();
              });
              imgjh.src ="";
              $("#submitBtn").attr("disabled", false);
              $("#updateStats").modal('hide');
              $('.data-table').DataTable().destroy(); 
              fatchData();

              showToast(data.message, 1);
          }
          else if(data.status == 400){
            // console.log(data);
              $("#submitBtn").attr("disabled", false);
              var message1= `<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                    ${data.message}
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
                document.getElementById('updateShowMessage').innerHTML=message1;
          }
          else{
              console.log(data);  
          }
      },
      error:function(e){
              console.log(e.responseText);
              }
      });

      });
  });



  function closeModel(){
        $("#matchTableBody").html(`<tr><th colspan="4">No Record Found</th></tr>`);
    }

</script>


  @endsection