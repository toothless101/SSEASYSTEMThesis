@extends('layout.app')
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/pages-css/event.css') }}">

<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Create New Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="addEvent" action="{{route('event_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Success and Error Messages -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row mt-1">
                        <!-- Event Name -->
                        <div class="form-group col-md-6">
                            <input type="text" id="eventName" name="event_name" class="form-control" value="{{ old('event_name') }}">
                            <label for="eventName" class="form-label">Event Name</label>

                            @error('event_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Event Type -->
                        <div class="form-group col-md-6 mb-3">
                            <select id="eventType" name="event_type" class="form-select" required>
                                <option value="" disabled selected>Select an Event Type</option>
                                <option value="1" {{ old('event_type') == 1 ? 'selected' : '' }}>Wholeday</option>
                                <option value="2" {{ old('event_type') == 2 ? 'selected' : '' }}>Half-Day Morning</option>
                                <option value="3" {{ old('event_type') == 3 ? 'selected' : '' }}>Half-Day Afternoon</option>
                            </select>
                            <label for="eventType" class="form-label">Event Type</label>
                        
                            @error('event_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Event Place -->
                        <div class="form-group col-md-6 mb-3">
                            <input type="text" id="eventPlace" name="event_place" class="form-control" value="{{ old('event_place') }}">
                            <label for="eventPlace" class="form-label">Event Venue</label>
                            @error('event_place')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Date of Event -->
                        <div class="form-group col-md-6 mb-3">
                            <div class="input-group">
                                <input type="date" id="dateofEvent" name="event_date" class="form-control" value="{{ old('event_date') }}">
                            </div>
                            <label for="dateofEvent" class="form-label" id="eventDate">Event Date</label>
                            @error('event_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- Assigned Officers -->
                    <div class="assigned-officers mt-2">
                        <div class="ass-div-title">
                            <h6>Assign Officers</h6>
                        </div>
                        <div class="container-border border rounded border-dark">
                            <div class="officer-icon">
                                <img src="{{asset('img/officer-icon.png')}}" alt="">
                            </div>
                            <div class="form-group col-md-4">
                                <select name="user_id[]" id="user_id" placeholder="Select Officer" multiple>
                                    @foreach($users as $user) 
                                        <option value="{{ $user->id }}" {{ old('user_id') && in_array($user->id, old('user_id')) ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('user_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="addOfficer">
                                <button class="btn btn-new-officer">
                                    Add Officer
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Time Schedule -->
                    <div class="container mt-4 mb-4">
                        <div class="row">
                            <!-- Morning Schedule -->
                            <div class="col-md-6 schedule-section" id="morningSchedule" style="display:none;">
                                <div class="div-title">Morning Schedule</div>
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="checkInLabel">Check In</h6>
                                        <div class="startEndLabel">Start Time</div>
                                        <div class="input-group">
                                            <input type="time" id="morning-checkin" name="morning_in_start" class="form-control" value="{{ old('morning_in_start') }}">
                                        </div>
                                        <div class="startEndLabel">End Time</div>
                                        <div class="input-group">
                                            <input type="time" id="morning-checkin-end" name="morning_in_end" class="form-control" value="{{ old('morning_in_end') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="checkInLabel">Check Out</h6>
                                        <div class="startEndLabel">Start Time</div>
                                        <div class="input-group">
                                            <input type="time" id="morning-checkout" name="morning_out_start" class="form-control" value="{{ old('morning_out_start') }}">
                                        </div>
                                        <div class="startEndLabel">End Time</div>
                                        <div class="input-group">
                                            <input type="time" id="morning-checkout-end" name="morning_out_end" class="form-control" value="{{ old('morning_out_end') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Afternoon Schedule -->
                            <div class="col-md-6 schedule-section" id="afternoonSchedule" style="display:none;">
                                <div class="div-title">Afternoon Schedule</div>
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="checkInLabel">Check In</h6>
                                        <div class="startEndLabel">Start Time</div>
                                        <div class="input-group">
                                            <input type="time" id="afternoon-checkin-start" name="afternoon_in_start" class="form-control" value="{{ old('afternoon_in_start') }}">
                                        </div>
                                        <div class="startEndLabel">End Time</div>
                                        <div class="input-group">
                                            <input type="time" id="afternoon-checkin-end" name="afternoon_in_end" class="form-control" value="{{ old('afternoon_in_end') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="checkInLabel">Check Out</h6>
                                        <div class="startEndLabel">Start Time</div>
                                        <div class="input-group">
                                            <input type="time" id="afternoon-checkout-start" name="afternoon_out_start" class="form-control" value="{{ old('afternoon_out_start') }}">
                                        </div>
                                        <div class="startEndLabel">End Time</div>
                                        <div class="input-group">
                                            <input type="time" id="afternoon-checkout-end" name="afternoon_out_end" class="form-control" value="{{ old('afternoon_out_end') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-submit">Create Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<!--MULTISELECT DROPDOWN-->
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get references to the DOM elements
    const eventType = document.getElementById("eventType");
    const morningSchedule = document.getElementById("morningSchedule");
    const afternoonSchedule = document.getElementById("afternoonSchedule");

    // Function to update the layout based on selected event type
    function updateLayout() {
        const selectedType = parseInt(eventType.value, 10); // Get the selected value as an integer

        // Handle the different schedule types
        switch (selectedType) {
            case 1: // Whole day
                morningSchedule.style.display = 'block'; // Show morning schedule
                afternoonSchedule.style.display = 'block'; // Show afternoon schedule
                break;
            case 2: // Half-Day Morning
                morningSchedule.style.display = 'block'; // Show morning schedule
                afternoonSchedule.style.display = 'none'; // Hide afternoon schedule
                break;
            case 3: // Half-Day Afternoon
                morningSchedule.style.display = 'none'; // Hide morning schedule
                afternoonSchedule.style.display = 'block'; // Show afternoon schedule
                break;
            default: // None selected
                morningSchedule.style.display = 'none';
                afternoonSchedule.style.display = 'none';
                break;
        }
    }

    // Attach event listener to the dropdown to call updateLayout on change
    eventType.addEventListener('change', updateLayout);

    // Initialize layout when the page loads
    updateLayout();
});

// Initialize the multi-select dropdown
new MultiSelectTag("user_id", {
    rounded: true,
    shadow: false,
    placeholder: 'Select Officer',
    tagColor:{
        textColor: '#550000',
        borderColor: '#550000',
        bgColor: 'transparent',
    },
    onChange:function(values){
        console.log(values);
    }
});
</script> 
