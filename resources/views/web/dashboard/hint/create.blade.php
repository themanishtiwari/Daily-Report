@extends('admin.layouts.app')
@section('title', 'Create Tour Package')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Include and Exclude</h5>
              {{-- @if ($errors->any())
              <div class="alert alert-danger" role="alert" >
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
                @endif --}}
              <form method="post" id="createDataForm">
                @csrf
                
                <div class="row mb-3">
                    <div class="col-md-6">
                      <input type="hidden" name="id" value="{{$tour_id}}">
                        <label for="exampleInpu" class="form-label">Includes</label>
                        <div  id="featureContainer">
                          @if(isset($feature['include']) && count($feature['include']) > 0)
                            @foreach($feature['include'] as $include)
                              <div class="feature-input mb-3">
                                <input type="text" class="form-control" name="include" value="{{$include->feature}}">
                              </div>
                            @endforeach
                          @else
                          <div class="feature-input mb-3">
                            <input type="text" class="form-control" name="include" required>
                          </div>
                          @endif
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addInclude()">Add More Includes</button>
                    </div>
                
                
                  <div class="col-md-6">
                    <label for="exampleInpu" class="form-label">Exclude</label>
                    <div  id="excludeContainer">
                      @if(isset($feature['exclude']) && count($feature['exclude']) > 0)
                        @foreach($feature['exclude'] as $exclude)
                          <div class="feature-input mb-3">
                            <input type="text" class="form-control" name="exclude" value="{{$exclude->feature}}">
                          </div>
                        @endforeach
                      @else
                        <div class="feature-input mb-3">
                          <input type="text" class="form-control" name="exclude" required>
                        </div>
                      @endif
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addExclude()">Add More Exclude</button>
                </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                  <a href="{{url('admin/tour/view')}}" class="btn btn-secondary">Back</a>
                </div>
            </form>

            </div>
          </div>

          

        </div>

        
      </div>
    </section>

  </main>

    @include('admin.sections.toast')



<script type="text/javascript">       

  function addInclude(){
    const featureContainer = document.getElementById('featureContainer');
    const newFeatureInput = document.createElement('div');
    newFeatureInput.className = 'feature-input mb-3 d-flex';

    const inputElement = document.createElement('input');
    inputElement.type = 'text';
    inputElement.className = 'form-control';
    inputElement.name = 'include';

    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.className = 'btn btn-danger mx-2';
    removeButton.innerText = 'Remove';
    removeButton.onclick = function() {
        featureContainer.removeChild(newFeatureInput);
    };

    newFeatureInput.appendChild(inputElement);
    newFeatureInput.appendChild(removeButton);
    featureContainer.appendChild(newFeatureInput);
  }

  function addExclude() {
    const featureContainer = document.getElementById('excludeContainer');
    const newFeatureInput = document.createElement('div');
    newFeatureInput.className = 'feature-input mb-3 d-flex';

    const inputElement = document.createElement('input');
    inputElement.type = 'text';
    inputElement.className = 'form-control';
    inputElement.name = 'exclude';

    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.className = 'btn btn-danger mx-2';
    removeButton.innerText = 'Remove';
    removeButton.onclick = function() {
        featureContainer.removeChild(newFeatureInput);
    };

    newFeatureInput.appendChild(inputElement);
    newFeatureInput.appendChild(removeButton);
    featureContainer.appendChild(newFeatureInput);
}

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


$(document).ready(function(){
    $("#name").on("keyup",function(event) {
      var value=$(this).val();

      var trimmedValue = value.trim();
      var url = trimmedValue.toLowerCase().replace(/\s+/g, '-');
        // Remove hyphens at the start and end
        url = url.replace(/^-+/, '').replace(/-+$/, '');
    //   console.log(url);
      document.getElementById('url').value=url;
    });


    
    //create stats
    $("#createDataForm").submit(function (event) {
      event.preventDefault();
      $("#submitBtn").attr("disabled", true);
      event.preventDefault();
            
      const includeInputs = document.querySelectorAll('input[name="include"]');
      const excludeInputs = document.querySelectorAll('input[name="exclude"]');
      var data= new FormData();
      includeInputs.forEach(input => {
          data.append('include[]', input.value);
      });
      excludeInputs.forEach(input => {
          data.append('exclude[]', input.value);
      });
      var tour_id = `{!! $tour_id !!}`;
      data.append('id', tour_id);

      // console.log(data);

      $.ajax({
        type: "POST",
        url: "{{url('admin/tour/include-exclude')}}",
        headers: {
          "X-CSRF-TOKEN":"{{csrf_token()}}"
          },
        data: data,
        processData:false,
        contentType:false,
          
        success : function(data){
          if(data.status == 200){
              // $( '#createDataForm' ).each(function(){
              //     this.reset();
              // });
              
              $("#submitBtn").attr("disabled", false);
              showToast(data.message, 1);

              // redirect after 2 seconds
              window.setTimeout(function() {
                  window.location.href = "{{url('admin/tour/view-package')}}/"+{{$tour_id}};
                  }, 2000);
          }
          else if(data.status == 400){
            // console.log(data);
              $("#submitBtn").attr("disabled", false);
              showToast(data.message, 2);
          }
        },
        error : function(e){
          console.log(e.responseText);
        }
      });
        
    });


});


</script>



@endsection
