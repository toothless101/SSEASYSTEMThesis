<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="{{  asset('css/pages-css/officers.css') }}">

<div class="modal fade" id="editOfficerModal" tabindex="-1" aria-labelledby="addOfficerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOfficerModalLabel">Edit Officer Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                    <!-- Left Side: Image Upload and Preview -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <!-- Image Preview Section -->
                        <div class="d-flex justify-content-center">
                          <div class="image-holder">
                            <img id="output" src="{{asset('img/no-image-available.png')}}" alt="Placeholder Image">
                          </div>
                          
                        </div>
                        <!-- File Upload Label 
                        <label for="customFile" class="control-label mt-3">Upload Image</label>-->
                        <!-- File Input -->
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="img" accept="image/*" onchange="loadFile(event)">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                    </div>

      <!-- Right Side: Fields -->
      <div class="col-md-6 mt-10">
        <div class="row g-3">
          <!-- Row 1 First Name -->
          <div class="col-md-12">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" placeholder="">
          </div>

          <!-- Row 2 Middle Name -->
          <div class="col-md-12">
            <label for="middlename" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middlename" placeholder="">
          </div>
          
        </div>
      </div>
    </div>

    <!-- Text Fields -->
    <div class="row mt-2 g-3">
      <div class="col-md-6">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username">
      </div>
      <div class="col-md-6">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastname">
      </div>

      <div class="col-md-6">
        <label for="password" class="form-label">Password</label>
        <input type="text" class="form-control" id="password">
      </div>
      <div class="col-md-6">
        <label for="position" class="form-label">Position</label>
        <input type="text" class="form-control" id="position">
      </div>

    </div>
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-submit">Submit</button>
            </div>
        </div>
    </div>
    
</div>   

<!--SUCCESS MODAL
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-4">
            <div class="modal-body">
                <!-- Success Icon 
                <div class="mb-3">
                    <div class="success-icon d-flex justify-content-center align-items-center mx-auto">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                </div>-->
                <!-- Success Message 
                <h3 class="fw-bold text-uppercase text-success">Success</h3>
                <p class="mt-2">Officer Successfully Added</p>-->
                <!-- OK Button
                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>-->

<script>
  function loadFile(event) {
    const output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src); // Free up memory
    }
  }
</script>