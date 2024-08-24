<script>
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

  function fatchData1(){
    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      // ajax: "{{url('dashboard')}}",
      ajax: {
        url: "{{url('dashboard')}}",
        data: function(d){
          d.start = $('#start_date').val();
          d.end = $('#end_date').val();
        }
      },
      columns: [
          {data: 'DT_RowIndex' , orderable: false, searchable: false},
          {data: 'report_date', name: 'report_date'},
          {data: 'work_time', name: 'work_time'},
          {data: 'status', name: 'status'},
          {data: 'action', name: 'action'},
      ],
      success: function(response){
        console.log(response.chart);
      }
    });
  };

  function fatchData(){

    // var form = $('#dateRangeForm')[0];
    // var data = new FormData(form);
   
  //  $.ajax({
  //    url: "{{url('dashboard/get-data')}}",
  //    data: data,
  //    success: function(data){
  //      console.log(data);

  //      var table = $('.data-table').DataTable({
  //          processing: true,
  //          serverSide: true,
  //          data: response.data,
  //          columns: [
  //            {data: 'DT_RowIndex' , orderable: false, searchable: false},
  //            {data: 'report_date', name: 'report_date'},
  //            {data: 'work_time', name: 'work_time'},
  //            {data: 'status', name: 'status'},
  //            {data: 'action', name: 'action'},
  //          ]
  //        });
  //    }
  //  });

  $.ajax({
    url: "{{url('get-data')}}",
    data: {
        start: $('#start_date').val(),
        end: $('#end_date').val(),
    },
    success: function(response) {
        
        console.log(response.chart);

        // Initialize DataTable with the received data
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: false,
            data: response.data.datatable.original.data, // Use the 'data' property for DataTable
            columns: [
                {data: 'DT_RowIndex' , orderable: false, searchable: false},
                {data: 'report_date', name: 'report_date'},
                {data: 'work_hour', name: 'work_hour'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action'},
            ]
        });
    }
  });
   
  }


  $(document).ready(function(){
    //Create Form
    $('#createStatsForm').submit(function(event){
      event.preventDefault();
      $("#submitBtn").attr('disabled', true);

      var form=$("#createStatsForm")[0];
      var data= new FormData(form);

      const startInputs = form.querySelectorAll('input[name="start"]');
      const endInputs = form.querySelectorAll('input[name="end"]');
      const workInputs = form.querySelectorAll('input[name="work"]');

      startInputs.forEach(input => {
        data.append('start[]', input.value);
      });
      endInputs.forEach(input => {
        data.append('end[]', input.value);
      });
      workInputs.forEach(input => {
          data.append('work[]', input.value);
      });      

      
      $.ajax({
        type: "POST",
        url: "{{url('dashboard')}}",
        headers: {
          "X-CSRF-TOKEN": "{{csrf_token()}}"
        },
        data: data,
        processData: false,
        contentType: false,
        success: function(data){
          if(data.status == 200){
            closeModel();
            showTost(1, data.message);
            $('.data-table').DataTable().destroy(); 
            fatchData();
          }
          else if(data.status == 400){
            showError(data.message, "showMessage");

            if($("#submitBtn").length) {
              $("#submitBtn").attr('disabled', false);
            }
          }
          else{
            console.log(data);
          }
        },
        error: function(e){
          console.log(e.responseText);
        }

      });
    });



    //Update Form
    $("#updateForm").submit(function (event) {
      event.preventDefault();
      $("#submitBtn").attr("disabled", true);   
      
      var form=$("#updateForm")[0];
      var data= new FormData(form);

      const reportDetailIdInputs  = form.querySelectorAll('input[name="report_detail_id"]');
      const startInputs           = form.querySelectorAll('input[name="start"]');
      const endInputs             = form.querySelectorAll('input[name="end"]');
      const workInputs            = form.querySelectorAll('input[name="work"]');

      reportDetailIdInputs.forEach(input => {
        data.append('report_detail_id[]', input.value);
      });
      startInputs.forEach(input => {
        data.append('start[]', input.value);
      });
      endInputs.forEach(input => {
        data.append('end[]', input.value);
      });
      workInputs.forEach(input => {
          data.append('work[]', input.value);
      });     

      $.ajax({
        type: "POST",
        url: "{{url('dashboard')}}",
        headers: {
          "X-CSRF-TOKEN": "{{csrf_token()}}"
        },
        data: data,
        processData: false,
        contentType: false,
        success: function(data){
           if(data.status == 200){
            closeModel();
            showTost(1, data.message);
            $('.data-table').DataTable().destroy(); 
            fatchData();
          }
          else if(data.status == 400){
            showError(data.message, "showUpdateMessage");
            
            if($("#submitBtn").length) {
              $("#submitBtn").attr('disabled', false);
            }
          }
          else{
            console.log(data);
          }
        },
        error: function(e){
          console.log(e.responseText);
        }
        
      });

    });



  });

  function editData(id){

    $.ajax({
        url : `{{url('dashboard/${id}')}}`,
        method : 'GET',
        data : {"_token": `{{csrf_token()}}`},
        success : function(data){
            $("#id").val(data.id);
            $("#date").val(data.date);
            
            var html = ``;

            data.details.forEach(detail => {
              html = html + 
                        `<div class="feature-input mb-3">
                            <div class="row mb-3">
                              <input type="hidden" name="report_detail_id" value="${detail.id}">
                              <div class="col-6">
                                <label class="form-label">Start Time</label>
                                <input type="time" class="form-control" name="start" value="${detail.from}" required>
                              </div>
                              <div class="col-6">
                                <label class="form-label">End Time</label>
                                <input type="time" class="form-control" name="end" value="${detail.to}" required>
                              </div>
                            </div>
                            <input type="text" class="form-control" name="work" value="${detail.work}"  required>
                            <button type="button" class="btn btn-danger mx-2 mt-2" onclick="removeFeature(this)">Remove</button>
                          </div>`;
            });

            document.getElementById('updateFeatureContainer').innerHTML = html;

            $("#updateStats").modal('show');
        },
        error:function(e){
            console.log(e.responseText);
            }
      });
  }

  function showData(id){

    $.ajax({
      type: "GET",
      url: `{{url('dashboard/${id}')}}`,
      processData: false,
      success: function(data){

        var element = document.getElementById('total_work_time');
        if(element){
          element.textContent = data.total_work_time;
        }

        var element = document.getElementById('myReportDate');
        if(element){
          let dateObj = new Date(data.date);
          // Define options for formatting
          let options = { day: '2-digit', month: 'short', year: 'numeric' };
          // Format the date
          let formattedDate = dateObj.toLocaleDateString('en-GB', options);
          element.textContent = formattedDate;
        }

        html='';
        data.details.forEach(detail => {
          html = html+ 
              `<tr>
                <td>${detail.work}</td>
                <td>${detail.from}</td>
                <td>${detail.to}</td>
                <td>${detail.work_time}</td>
              </tr>`;
        });
        document.getElementById('showTableBody').innerHTML = html;
        $("#viewReport").modal('show');
      },
      error: function(e){
        console.log(e.responseText);
      }
    })
  }

  function removeFeature(button) {
    button.closest('.feature-input').remove();
  }

  function deleteData(id){
    if(confirm("Are you sure you want to delete this?")){
        
        $.ajax({
            url : `{{url('dashboard/${id}')}}`,
            method : 'DELETE',
            data : {"_token": `{{csrf_token()}}`},
            success : function(data){
                if(data.status == 200){
                    $('.data-table').DataTable().destroy(); 
                    fatchData();
                    showTost(1, data.message);
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

  function closeModel(){
    if ($("#submitBtn").length) {
      $("#submitBtn").attr('disabled', false);
    }
    //reset errors
    var element2 = document.getElementById('showUpdateMessage');
    if(element2){
      element2.innerHTML ="";
    }
    var element1 = document.getElementById('showMessage');
    if(element1){
      element1.innerHTML ="";
    }

    //reset form input
    $( '#createStatsForm' ).each(function(){
        this.reset();
    });
    $( '#updateStatsForm' ).each(function(){
        this.reset();
    });

    if ($("#createStats").length) {
      $('#createStats').modal('hide');
    }
    if ($("#updateStats").length) {
      $('#updateStats').modal('hide');
    }
  }

  function addInclude(elementId) {
      const featureContainer = document.getElementById(elementId);
      const newFeatureInput = document.createElement('div');
      newFeatureInput.className = 'feature-input mb-3';
  
      const rowDiv = document.createElement('div');
      rowDiv.className = 'row mb-3';
  
      const colStartDiv = document.createElement('div');
      colStartDiv.className = 'col-6';
  
      const labelStart = document.createElement('label');
      labelStart.className = 'form-label';
      labelStart.innerText = 'Start Time';
  
      const inputStart = document.createElement('input');
      inputStart.type = 'time';
      inputStart.className = 'form-control';
      inputStart.name = 'start';
      inputStart.required = true;
  
      colStartDiv.appendChild(labelStart);
      colStartDiv.appendChild(inputStart);
  
      const colEndDiv = document.createElement('div');
      colEndDiv.className = 'col-6';
  
      const labelEnd = document.createElement('label');
      labelEnd.className = 'form-label';
      labelEnd.innerText = 'End Time';
  
      const inputEnd = document.createElement('input');
      inputEnd.type = 'time';
      inputEnd.className = 'form-control';
      inputEnd.name = 'end';
      inputEnd.required = true;
  
      colEndDiv.appendChild(labelEnd);
      colEndDiv.appendChild(inputEnd);
  
      rowDiv.appendChild(colStartDiv);
      rowDiv.appendChild(colEndDiv);
  
      const inputWorkDetails = document.createElement('input');
      inputWorkDetails.type = 'text';
      inputWorkDetails.className = 'form-control';
      inputWorkDetails.name = 'work';
      inputWorkDetails.placeholder = 'Enter Work Details';
      inputWorkDetails.required = true;
  
      const removeButton = document.createElement('button');
      removeButton.type = 'button';
      removeButton.className = 'btn btn-danger mx-2 mt-2';
      removeButton.innerText = 'Remove';
      removeButton.onclick = function() {
          featureContainer.removeChild(newFeatureInput);
      };
  
      newFeatureInput.appendChild(rowDiv);
      newFeatureInput.appendChild(inputWorkDetails);
      newFeatureInput.appendChild(removeButton);
      featureContainer.appendChild(newFeatureInput);
  }
    

  function removeBtn(event){
            featureContainer.removeChild(newFeatureInput);
  }

  function showError(message, selector){
    var error= `<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                    ${message}
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
    document.getElementById(selector).innerHTML = error;
  }
</script>
