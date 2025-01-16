@extends('layout.app')
@section('title', 'SSEA | Profile')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/student-officer-css/std_pages.css') }}">

@include('student-officers/stud-partials.nav-bottom')

@include('student-officers/stud-partials.std-sidebar')

<x-header-section>
    Profile
</x-header-section>

<section id="main" class="main">
    <div class="d-flex flex-column align-items-center mb-3">
        <div class="officerprofile_img">
            <img src="{{asset('img/no-image-available.png')}}" alt="Profile Image">
        </div>

        <div class="officer-name-top mt-3">
            <h4 for="officerprofile_name">Hilary</h4>
        </div>

        <div class="align-items-center mt-4 mb-3" style="max-width: 800px; margin: auto;"> <!-- Centralized and wider container -->
            <!-- Name -->
            <div class="d-flex align-items-center mb-3 editable-field gap-4" style="width: 100%;">
                <div>
                    <i class="bi bi-person-circle fs-5" style="color:#550000"></i>
                </div>
                <div class="fw-light me-3" style="color:#550000; min-width: 100px;">
                    Name:
                </div>
                <div class="flex-grow-1 d-flex align-items-center">
                    <input type="text" class="form-control d-none" id="name-input" value="Hilary Mae Poralan" style="width: 100%; max-width: 300px;">
                    <span class="officer-name fw-light ms-2" id="name-display">Hilary Mae Poralan</span>
                </div>
                <button class="btn btn-link p-0 ms-2" id="edit-name-btn">
                    <i class="bi bi-pencil-fill" style="color:#550000"></i>
                </button>
        
                <!-- Save Button -->
                <button class="btn btn-link p-0 ms-2 d-none" id="save-name-btn">
                    <i class="bi bi-check-circle-fill text-success" style="color:#550000"></i>
                </button>
            </div>
        
            <!-- Username -->
            <div class="d-flex align-items-center mb-3 editable-field gap-4" style="width: 100%;">
                <div>
                    <i class="bi bi-person-circle fs-5" style="color:#550000"></i>
                </div>
                <div class="fw-light me-3" style="color:#550000; min-width: 100px;">
                    Username:
                </div>
                <div class="flex-grow-1 d-flex align-items-center">
                    <input type="text" class="form-control d-none" id="username-input" value="admin_sample" style="width: 100%; max-width: 300px;">
                    <span class="officer-username fw-light ms-2" id="username-display">admin_sample</span>
                </div>
                <button class="btn btn-link p-0 ms-2" id="edit-username-btn">
                    <i class="bi bi-pencil-fill" style="color:#550000"></i>
                </button>
        
                <!-- Save Button -->
                <button class="btn btn-link p-0 ms-2 d-none" id="save-username-btn">
                    <i class="bi bi-check-circle-fill text-success" style="color:#550000"></i>
                </button>
            </div>
        
            <!-- Password -->
            <div class="d-flex align-items-center mb-3 editable-field gap-4" style="width: 100%;">
                <div>
                    <i class="bi bi-lock-fill fs-5" style="color:#550000"></i>
                </div>
                <div class="fw-light me-3" style="color:#550000; min-width: 100px;">
                    Password:
                </div>
                <div class="flex-grow-1 d-flex align-items-center">
                    <input type="password" class="form-control d-none" id="password-input" value="password123" style="width: 100%; max-width: 300px;">
                    <span class="officer-password fw-light ms-2" id="password-display">********</span>
                </div>
                <button class="btn btn-link p-0 ms-2" id="edit-password-btn">
                    <i class="bi bi-pencil-fill" style="color:#550000"></i>
                </button>
        
                <!-- Save Button -->
                <button class="btn btn-link p-0 ms-2 d-none" id="save-password-btn">
                    <i class="bi bi-check-circle-fill text-success" style="color:#550000"></i>
                </button>
            </div>
        </div>
    </div>


    <!----ASSIGNED EVENTS--->
    <div class="assigned-events d-flex justify-content-between align-items-center mb-3">
        <h5 id="assigned-events" class="fw-light fs-6" style="color:#550000;">Assigned Events</h5>
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Search">
            <button class="search-btn">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div> 
    <div class="assigned-event-table">
        <table id="officer-assigned-event-table">
        <thead>
            <tr>
                <th>Event</th>
                <th>Date</th>
                <th>Event Type</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody id="assigned-event">
            <tr>
                <td>2024001</td>
                <td>Hilary Mae Poralan</td>
                <td>College</td>
                <td>4th Year</td>
            </tr>
            <tr>
                <td>2024001</td>
                <td>Hilary Mae Poralan</td>
                <td>College</td>
                <td>4th Year</td>
            </tr>
        </tbody>
    </table>
    </div>
</section>

<script>
    //function to handle edit 
    function editableField(editBtnId, saveBtnId, displayId, inputId){
        const editBtn = document.getElementById(editBtnId);
        const saveBtn = document.getElementById(saveBtnId);
        const displayEl = document.getElementById(displayId);
        const inputEl = document.getElementById(inputId);

        //to edit
        editBtn.addEventListener('click', function(){
            displayEl.classList.add('d-none'); //hide static text
            inputEl.classList.remove('d-none'); //show the input field
            editBtn.classList.add('d-none'); //Hide edit Button
            saveBtn.classList.remove('d-none'); //show save button
            inputEl.focus();
        });

        //save changes and toggle back to display mode
        saveBtn.addEventListener('click', function(){
            displayEl.textContent = inputEl.value;
            displayEl.classList.remove('d-none'); //Show static field
            inputEl.classList.add('d-none');//Hide input field
            editBtn.classList.remove('d-none'); //Show edit button
            saveBtn.classList.add('d-none'); //hide save button
        });

        //save changes using Enter
        inputEl.addEventListener('keypress', function(event){
            if(event.key === 'Enter'){
                saveBtn.click(); //triggers the save button through click
            }
        });

    }
    
    //apply the function to all editable fields
    editableField('edit-name-btn', 'save-name-btn', 'name-display', 'name-input');
    editableField('edit-username-btn', 'save-username-btn', 'username-display', 'username-input');
    editableField('edit-password-btn', 'save-password-btn', 'password-display', 'password-input');

    $(document).ready(function () {
        $('#officer-assigned-event-table').DataTable({
            dom: '<"mb-2"<"table-list"l>><"table-responsive"t><"d-flex justify-content-between mt-2"<"table-info"i><"table-pagination"p>>r',
            language: {
                lengthMenu: "Show _MENU_ entries"
            }
        });

        $('.search-input').on('keyup', function(){
            $('#officer-assigned-event-table').DataTable().search(this.value).draw();
        });

    });
</script>
@endsection
