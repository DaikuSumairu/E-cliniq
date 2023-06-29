@extends('adminlte::page')

@section('title', 'Appointment')

@section('content_header')
    <h1>Appointment</h1>
@stop

@section('content')
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#create-appointment-modal">Create Appointment</button>

    <!-- Create Modal -->
    <div class="modal fade" id="create-appointment-modal" tabindex="-1" role="dialog" aria-labelledby="create-appointment-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-appointment-modal-label">Creating an Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('nurse.appointmentStore') }}" onsubmit="return confirm('Are you sure you want to create an appointment?');">
                        @csrf
                        <!-- User ID Created (Hidden) -->
                        <input type="hidden" id="user_id" name="user_id">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <div class="dropdown">
                                        <input type="text" class="form-control" id="name" name="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" required>
                                        <div class="dropdown-menu" aria-labelledby="name" id="dropdown-menu">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="school_id">ID:</label>
                                    <input type="text" class="form-control" id="school_id" name="school_id" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                                <div class="form-group">
                                    <label for="start_time">Start Time:</label>
                                    <input type="hidden" name="start_time" id="start_time">
                                    <div class="custom-time-picker">
                                        <select class="hour-input" id="start_hour" onchange="updateEndTime()" required>
                                            <option value="">Hour</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <span>:</span>
                                        <select class="minute-input" id="start_minute" onchange="updateEndTime()" required>
                                            <option value="">Minute</option>
                                            <option value="00">00</option>
                                            <option value="15">15</option>
                                            <option value="30" disabled>30</option>
                                            <option value="45" disabled>45</option>
                                        </select>
                                        <select class="ampm-input" id="start_ampm" readonly>
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="end_time">End Time:</label>
                                    <input type="time" class="form-control" id="end_time" name="end_time" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reason" required>Reason:</label>
                            <textarea type="time" class="form-control" id="reason" name="reason" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ session('error') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto mb-2 border" style="width: 1260px;height: 480px;overflow: auto;">
        <div class="row">
            <div class="col px-0" style="width: 200px; height: 460px; overflow: auto; border: 1px;">
                <div id='calendar'></div>
            </div>
            <div class="col-4 px-0">
                <p class="h4 mb-0 mt-3 px-3"><strong>List of Appointment</strong></p>
                <div class="col" style="height: 415px;overflow: auto;">
                    <div class="col" style="width: 380px; border: 1px;">
                        @foreach ($appointments as $appointment)
                        @if($appointment->status == 'Pending')
                        <div id="appointment-{{ $appointment->id }}" class="container my-3 border">
                            <!-- Add the id attribute to the appointment container -->
                            <div class="row mt-2" style="width: 380px;">
                                <div class="col">
                                    <label><strong>Name: </strong></label> {{ $appointment->name }}<br>
                                    <label><strong>ID: </strong></label> {{ $appointment->school_id }}<br>
                                    <label><strong>Status: </strong></label> {{ $appointment->status }}<br>
                                </div>
                                <div class="col">
                                    <label><strong>Date: </strong></label> {{ $appointment->date }}<br>
                                    <label><strong>Start Time: </strong></label> {{ $appointment->start_time }}<br>
                                    <label><strong>End Time: </strong></label> {{ $appointment->end_time }}
                                </div>
                            </div>
                            <div class="row mt-1 mb-2">
                                <div class="col">
                                    <label><strong>Reason:</strong></label>
                                    <textarea class="form-control" readonly>{{ $appointment->reason }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col text-right">
                                    <form method="POST" action="{{ route('nurse.appointmentUpdate', $appointment->id) }}" onsubmit="return confirm('Are you sure you want to accept this appointment?');">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="Accept">
                                        <button type="submit" class="btn btn-success">Accept</button>
                                    </form>
                                </div>
                                <div class="col-0 text-right">
                                    <form method="POST" action="{{ route('nurse.appointmentDestroy', $appointment->id) }}" onsubmit="return confirm('Are you sure you want to decline this appointment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-2">Decline</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                        <div id="appointment-{{ $appointment->id }}" class="container my-3 border">
                            <!-- Add the id attribute to the appointment container -->
                            <div class="row mt-2" style="width: 380px;">
                                <div class="col">
                                    <label><strong>Name: </strong></label> {{ $appointment->name }}<br>
                                    <label><strong>ID: </strong></label> {{ $appointment->school_id }}<br>
                                    <label><strong>Status: </strong></label><span style="color: green;"> {{ $appointment->status }}</span><br>
                                </div>
                                <div class="col">
                                    <label><strong>Date: </strong></label> {{ $appointment->date }}<br>
                                    <label><strong>Start Time: </strong></label> {{ $appointment->start_time }}<br>
                                    <label><strong>End Time: </strong></label> {{ $appointment->end_time }}
                                </div>
                            </div>
                            <div class="row mt-1 mb-2">
                                <div class="col">
                                    <label><strong>Reason:</strong></label>
                                    <textarea class="form-control" readonly>{{ $appointment->reason }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col text-right">
                                    <a class="btn btn-info" data-toggle="modal" data-target="#create-visit-modal">Done</a>
                                </div>
                                <div class="modal fade" id="create-visit-modal" tabindex="-1" role="dialog" aria-labelledby="create-visit-modal-label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="create-visit-modal-label">Visit Record</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" id="myForm" action="{{ route('nurse.visitCreateDestroy', $appointment->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="row mt-3">
                                                        <div class="col text-right">
                                                            <label>Date: </label>
                                                            <input type="date" name="day" id="date-input" style="width: 120px;" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="name">Name:</label>
                                                                <div class="dropdown">
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $appointment->name }}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="school_id">ID:</label>
                                                                <input type="text" class="form-control" id="school_id" name="user_school_id" value="{{ $appointment->school_id }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="name">Main Complaint:</label>
                                                                <select class="form-control hour-input" id="main_complaint" name="" value="" required>
                                                                    <option disabled selected>-- Select Main Complaint --</option>
                                                                    <option id="cardiology" name="cardiology" value="Yes">Cardiology</option>
                                                                    <option id="pulmonology" name="pulmonology" value="Yes">Pulmonology</option>
                                                                    <option id="gastroenterology" name="gastroenterology" value="Yes">Gastroenterology</option>
                                                                    <option id="musculo_skeletal" name="musculo_skeletal" value="Yes">Musculo Skeletal</option>
                                                                    <option id="opthalmology" name="opthalmology" value="Yes">Opthalmology</option>
                                                                    <option id="ent" name="ent" value="Yes">ENT</option>
                                                                    <option id="neurology" name="neurology" value="Yes">Neurology</option>
                                                                    <option id="dermatology" name="dermatology" value="Yes">Dermatology</option>
                                                                    <option id="nephrology" name="nephrology" value="Yes">Nephrology</option>
                                                                    <option id="endocrinology" name="endocrinology" value="Yes">Endocrinology</option>
                                                                    <option id="ob_gyne" name="ob_gyne" value="Yes">OB-Gyne</option>
                                                                    <option id="hematologic" name="hematologic" value="Yes">Hematologic</option>
                                                                    <option id="surgery" name="surgery" value="Yes">Surgery</option>
                                                                    <option id="allergology" name="allergology" value="Yes">Allergology</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="name">Sub Complaint:</label>
                                                                <select class="form-control hour-input" id="sub_complaint" name="" value="" required>
                                                                    <option disabled selected>-- Select First in the Main Complaint --</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="checkbox" id="meds" name="meds" value="Yes">
                                                            <label class="h5">Take A Medicine</label>
                                                        </div>
                                                        <div class="col" style="overflow: auto; height: 250px; display: none;" id="medicine-col">
                                                            <a class="btn btn-info mt-2 add-medicine">+</a>
                                                            <div id="medicine-container">
                                                                <div class="medicine-row">
                                                                    <select class="form-control hour-input" id="med" disabled>
                                                                        <option disabled selected>-- Select Medicine --</option>
                                                                        @foreach ($inventory as $inventoryItem)
                                                                            <option value="{{ $inventoryItem->name }}" data-quantity="{{ $inventoryItem->quantity }}">{{ $inventoryItem->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="number" class="form-control" id="med_quantity" name="quantity" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $appointments->links('custom.pagination', ['paginator' => $appointments]) !!}
@stop

@section('footer')
    <p class="mb-0 h6">Asia Pacific College Data Privacy Act</p>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        #calendar {
          height: 550px;
        }
    </style>
@stop

@section('js')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

    <!-- script for calendar -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek', // Change to timeGridWeek for vertical week view
                nowIndicator: true, // Enable the now indicator to track the current time
                hiddenDays: [0, 6], // Hide Sunday (0) and Saturday (6)
                allDaySlot: false, // Disable the "all-day" section
                slotMinTime: '09:00:00', // Set the minimum time to 9:00 AM
                slotMaxTime: '17:30:00', // Set the maximum time to 5:30 PM
                slotDuration: '00:15:00', // Set the slot duration to 15 minutes (adjust as needed)
                slotLabelInterval: '01:00', // Show slot labels every hour
                businessHours: [
                    {
                        daysOfWeek: [1, 2, 3, 4, 5], // Monday - Friday
                        startTime: '09:00', // 9:00 AM
                        endTime: '12:00' // 12:00 PM
                    },
                    {
                        daysOfWeek: [1, 2, 3, 4, 5], // Monday - Friday
                        startTime: '13:00', // 1:00 PM
                        endTime: '17:30' // 5:30 PM
                    }
                ]
            });
            calendar.render();

            @foreach ($appointed as $appointedones)
            @if($appointedones->status == "Pending")
            calendar.addEvent({
                title: '{{ $appointedones->reason }}',
                start: '{{ $appointedones->date }}T{{ $appointedones->start_time }}',
                end: '{{ $appointedones->date }}T{{ $appointedones->end_time }}',
                color: 'gray',
                extendedProps: {
                    id: '{{ $appointedones->id }}', // Add the appointment's id as an extended property
                    name: '{{ $appointedones->name }}',
                    schoolId: '{{ $appointedones->school_id }}'
                }
            });
            @else
            calendar.addEvent({
                title: '{{ $appointedones->reason }}',
                start: '{{ $appointedones->date }}T{{ $appointedones->start_time }}',
                end: '{{ $appointedones->date }}T{{ $appointedones->end_time }}',
                color: 'green',
                extendedProps: {
                    id: '{{ $appointedones->id }}', // Add the appointment's id as an extended property
                    name: '{{ $appointedones->name }}',
                    schoolId: '{{ $appointedones->school_id }}'
                }
            });
            @endif
            @endforeach

            calendar.on('eventClick', function (info) {
                var appointmentId = info.event.extendedProps.id; // Get the appointment's id
                var appointmentContainer = document.getElementById('appointment-' + appointmentId); // Locate the corresponding appointment container in the list

                if (!appointmentContainer) {
                    // Appointment container not found on the current page
                    var currentPage = {{ $appointments->currentPage() }}; // Get the current page number
                    var targetPage = {{ $appointments->lastPage() }}; // Get the last page number

                    if (currentPage !== targetPage) {
                        var url = '{{ $appointments->url(0) }}'; // Get the base URL for the pagination links
                        var targetUrl = url.replace(/page=\d+/, 'page=' + targetPage); // Replace the page number in the URL with the target page

                        // Navigate to the target page
                        window.location.href = targetUrl;
                    } else {
                        // Navigate to the first page
                        window.location.href = '{{ $appointments->url(1) }}';
                    }
                } else {
                    appointmentContainer.scrollIntoView({ behavior: 'smooth' }); // Scroll to the appointment container
                    appointmentContainer.style.backgroundColor = 'yellow'; // Highlight the appointment container
                    setTimeout(function () {
                        appointmentContainer.style.backgroundColor = ''; // Remove the highlighting after a short delay
                    }, 2000);
                }
            });
        });
    </script>

    <!-- Restrict user on scheduling saturday and sunday -->
    <script>
    var dateInput = document.getElementById('date');

    dateInput.addEventListener('input', function() {
        var selectedDate = new Date(dateInput.value);
        var today = new Date();
        today.setHours(0, 0, 0, 0); // Set today's time to midnight for accurate comparison

        var dayOfWeek = selectedDate.getDay(); // Sunday is 0, Saturday is 6

        if (selectedDate < today) {
            dateInput.setCustomValidity("Please select a date from today onwards.");
        } else if (dayOfWeek === 0 || dayOfWeek === 6) {
            dateInput.setCustomValidity("Please select a date other than Saturday or Sunday.");
        } else {
            dateInput.setCustomValidity('');
        }
    });
    </script>

    <!-- Pop-up Form -->
    <script>
        $(document).ready(function() {
            $('#add-item-modal').on('shown.bs.modal', function() {
                $('#name').focus();
            });
        });
    </script>

    <!-- live Search -->
    <script>
        var dropdownMenu = document.getElementById('dropdown-menu');
        var nameInput = document.getElementById('name');
        var schoolIdInput = document.getElementById('school_id');
        var userIdInput = document.getElementById('user_id');
    
        document.getElementById('name').addEventListener('input', function() {
            var name = this.value.trim();
    
            if (name.length > 0) {
                // Make an AJAX request to the server
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/search?name=' + encodeURIComponent(name), true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var users = JSON.parse(xhr.responseText);
    
                            // Update the dropdown menu with the retrieved users
                            dropdownMenu.innerHTML = '';
    
                            users.forEach(function(user) {
                                var userElement = document.createElement('a');
                                userElement.classList.add('dropdown-item');
                                userElement.textContent = user.name;
                                userElement.href = '#';
                                userElement.addEventListener('click', function(event) {
                                    event.preventDefault();
                                    nameInput.value = user.name;
                                    schoolIdInput.value = user.school_id; // Populate the school ID input
                                    userIdInput.value = user.id; // Populate the user ID input
                                    dropdownMenu.innerHTML = '';
                                });
                                dropdownMenu.appendChild(userElement);
                            });
                        } else {
                            console.error('Error: ' + xhr.status);
                            dropdownMenu.innerHTML = '';
                        }
                    }
                };
                xhr.send();
            } else {
                // Clear the dropdown menu if the input is empty
                dropdownMenu.innerHTML = '';
            }
        });
    
        // Close the dropdown menu if the user clicks outside
        document.addEventListener('click', function(event) {
            var isClickedInside = dropdownMenu.contains(event.target) || nameInput.contains(event.target);
            if (!isClickedInside) {
                dropdownMenu.innerHTML = '';
            }
        });
    </script>

    <!-- No add or less button on the right side of input number type -->
    <style>
        /* Hide the up and down buttons */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }
      
        input[type="number"] {
            /* Adjust the padding to maintain the input's size */
            padding-right: 0;
            /* Optionally, you can disable resizing the input */
            resize: none;
        }
    </style>

    <!-- Date restriction -->
    <script>
        // Get today's date
        var today = new Date().toISOString().split('T')[0];
    
        // Set the minimum date attribute to today
        document.getElementById("date").setAttribute("min", today);
    
        // Handle input change event
        document.getElementById("date").addEventListener("change", function() {
            var selectedDate = this.value;
            
            // Get yesterday's date
            var yesterday = new Date();
            yesterday.setDate(yesterday.getDate() - 1);
            var yesterdayFormatted = yesterday.toISOString().split('T')[0];
    
            // Check if selected date is before yesterday
            if (selectedDate < yesterdayFormatted) {
                this.value = today; // Set the value to today's date
            }
        });
    </script>

    <!-- Auto-filled end time after start time has been selected -->
    <script>
        function updateEndTime() {
            var selectedHour = document.getElementById("start_hour").value;
            var selectedMinute = document.getElementById("start_minute").value;

            // Get the current date and time
            var currentDate = new Date();
            var currentHour = currentDate.getHours();
            var currentMinute = currentDate.getMinutes();

            // Automatically set AM if the selected hour is between 9 and 11
            if (selectedHour >= 9 && selectedHour <= 11) {
                document.getElementById("start_ampm").value = "AM";
            }

            // Automatically set PM if the selected hour is between 1 and 5
            if (selectedHour >= 1 && selectedHour <= 5) {
                document.getElementById("start_ampm").value = "PM";
            }

            // Enable/disable minute options based on the selected hour
            var minuteSelect = document.getElementById("start_minute");
            if (selectedHour == 5) {
                minuteSelect.options[1].disabled = false;   // Enable "00"
                minuteSelect.options[2].disabled = false;   // Enable "15"
                minuteSelect.options[3].disabled = true;    // Disable "30"
                minuteSelect.options[4].disabled = true;    // Disable "45"
            } else {
                minuteSelect.options[1].disabled = false;   // Enable all options
                minuteSelect.options[2].disabled = false;
                minuteSelect.options[3].disabled = false;
                minuteSelect.options[4].disabled = false;
            }

            // Check if the selected time is in the past or the current time
            if (
                (selectedHour < currentHour && selectedAmPm === "AM") || // Past time (AM)
                (selectedHour == currentHour && selectedMinute < currentMinute) || // Past time (same hour, AM/PM)
                (selectedHour == currentHour && selectedAmPm === "AM" && selectedMinute == currentMinute) // Current time (AM)
            ) {
                document.getElementById("end_time").value = ""; // Clear the end time field
                return; // Exit the function
            }

            // Calculate and set end time based on the selected start time
            var selectedAmPm = document.getElementById("start_ampm").value;
            var startTime = getSelectedTime(selectedHour, selectedMinute, selectedAmPm);
            var endTime = calculateEndTime(startTime);
            document.getElementById("end_time").value = endTime;

            // Save start time to the "start_time" input field
            document.getElementById("start_time").value = startTime;
        }

        // Custom Picker
        function getSelectedTime(hour, minute, amPm) {
            hour = parseInt(hour);
            if (amPm === "PM" && hour !== 12) {
                hour += 12;
            } else if (amPm === "AM" && hour === 12) {
                hour = 0;
            }

            // Format the time as desired (e.g., HH:mm)
            var formattedTime = hour.toString().padStart(2, "0") + ":" + minute.toString().padStart(2, "0");

            return formattedTime;
        }

        // Calculate end time based on start time
        function calculateEndTime(startTime) {
            var hour = parseInt(startTime.substring(0, 2));
            var minute = parseInt(startTime.substring(3, 5));

            // Add 15 minutes to the start time
            minute += 15;
            if (minute >= 60) {
                minute -= 60;
                hour += 1;
            }

            // Format the time as desired (e.g., HH:mm)
            var formattedTime = hour.toString().padStart(2, "0") + ":" + minute.toString().padStart(2, "0");

            return formattedTime;
        }
    </script>

    <!-- Error script for modal -->
    @if (session('error'))
        <script>
            $(function() {
                $('#errorModal').modal('show');
            });
        </script>
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Main Complaint and Sub Complaint -->
    <script>
        const mainComplaintSelect = document.getElementById("main_complaint");
        const subComplaintSelect = document.getElementById("sub_complaint");

        mainComplaintSelect.addEventListener("change", function() {
            // Set "Yes" or "No" value for main complaint options
            const options = mainComplaintSelect.getElementsByTagName("option");
            for (let i = 0; i < options.length; i++) {
            const option = options[i];
            if (option.selected) {
                mainComplaintSelect.setAttribute("name", option.id);
                mainComplaintSelect.setAttribute("value", "Yes");
            }
            }

            // Clear existing options
            subComplaintSelect.innerHTML = '<option value=" ">-- Select Sub Complaint --</option>';

            // Get the selected value and ID of the main complaint
            const selectedMainComplaint = mainComplaintSelect.value;
            const selectedMainComplaintId = mainComplaintSelect.options[mainComplaintSelect.selectedIndex].id;

            // Populate sub complaint options based on the selected main complaint's ID
            if (selectedMainComplaintId === "cardiology") {
                subComplaintSelect.innerHTML += `
                    <option id="hypertension" name="hypertension" value="Yes">Hypertension</option>
                    <option id="bp_monitoring" name="bp_monitoring" value="Yes">BP Monitoring</option>
                    <option id="bradycardia" name="bradycardia" value="Yes">Bradycardia</option>
                    <option id="hypotension" name="hypotension" value="Yes">Hypotension</option>
                `;
            } else if (selectedMainComplaintId === "pulmonology") {
                subComplaintSelect.innerHTML += `
                    <option id="urti" name="urti" value="Yes">URTI</option>
                    <option id="pneumonia" name="pneumonia" value="Yes">Pneumonia</option>
                    <option id="ptb" name="ptb" value="Yes">PTB</option>
                    <option id="bronchitis" name="bronchitis" value="Yes">Bronchitis</option>
                    <option id="lung_pathology" name="lung_pathology" value="Yes">Lung Pathology</option>
                    <option id="acute_bronchitis" name="acute_bronchitis" value="Yes">Acute Bronchitis</option>
                `;
            } else if (selectedMainComplaintId === "gastroenterology") {
                subComplaintSelect.innerHTML += `
                    <option id="acute_gastroenteritis" name="acute_gastroenteritis" value="Yes">Acute Gastroenteritis</option>
                    <option id="gerd" name="gerd" value="Yes">GERD</option>
                    <option id="hemorrhoids" name="hemorrhoids" value="Yes">Hemorrhoids</option>
                    <option id="anorexia" name="anorexia" value="Yes">Anorexia</option>
                `;
            } else if (selectedMainComplaintId === "musculo_skeletal") {
                subComplaintSelect.innerHTML += `
                    <option id="ligament_sprain" name="ligament_sprain" value="Yes">Ligament Sprain</option>
                    <option id="muscle_strain" name="muscle_strain" value="Yes">Muscle Strain</option>
                    <option id="costrochondritis" name="costrochondritis" value="Yes">Costrochondritis</option>
                    <option id="soft_tissue_contusion" name="soft_tissue_contusion" value="Yes">Soft Tissue Contusion</option>
                    <option id="fracture" name="fracture" value="Yes">Fracture</option>
                    <option id="gouty_arthritis" name="gouty_arthritis" value="Yes">Gouty Arthritis</option>
                    <option id="plantar_fasciitis" name="plantar_fasciitis" value="Yes">Plantar Fasciitis</option>
                    <option id="dislocation" name="dislocation" value="Yes">Dislocation</option>
                `;
            } else if (selectedMainComplaintId === "opthalmology") {
                subComplaintSelect.innerHTML += `
                    <option id="conjunctivitis" name="conjunctivitis" value="Yes">Conjunctivitis</option>
                    <option id="stye" name="stye" value="Yes">Stye</option>
                    <option id="foreign_body" name="foreign_body" value="Yes">Foreign Body</option>
                `;
            } else if (selectedMainComplaintId === "ent") {
                subComplaintSelect.innerHTML += `
                    <option id="stomatitis" name="stomatitis" value="Yes">Stomatitis</option>
                    <option id="epistaxis" name="epistaxis" value="Yes">Epistaxis</option>
                    <option id="otitis_media" name="otitis_media" value="Yes">Otitis Media</option>
                    <option id="foreign_body_removal" name="foreign_body_removal" value="Yes">Foreign Body Removal</option>
                `;
            } else if (selectedMainComplaintId === "neurology") {
                subComplaintSelect.innerHTML += `
                    <option id="tension_headache" name="tension_headache" value="Yes">Tension Headache</option>
                    <option id="migraine" name="migraine" value="Yes">Migraine</option>
                    <option id="vertigo" name="vertigo" value="Yes">Vertigo</option>
                    <option id="hyperventilation_syndrome" name="hyperventilation_syndrome" value="Yes">Hyperventilation Syndrome</option>
                    <option id="insomnia" name="insomnia" value="Yes">Insomnia</option>
                    <option id="seizure" name="seizure" value="Yes">Seizure</option>
                    <option id="bell_palsy" name="bell_palsy" value="Yes">Bell's Palsy</option>
                `;
            } else if (selectedMainComplaintId === "dermatology") {
                subComplaintSelect.innerHTML += `
                    <option id="folliculitis" name="folliculitis" value="Yes">Folliculitis</option>
                    <option id="carbuncle" name="carbuncle" value="Yes">Carbuncle</option>
                    <option id="burn" name="burn" value="Yes">Burn</option>
                    <option id="wound_dressing" name="wound_dressing" value="Yes">Wound Dressing</option>
                    <option id="infected_wound" name="infected_wound" value="Yes">Infected Wound</option>
                    <option id="blister_wound" name="blister_wound" value="Yes">Blister Wound</option>
                    <option id="seborrheic_dermatitis" name="seborrheic_dermatitis" value="Yes">Seborrheic Dermatitis</option>
                    <option id="bruise" name="bruise" value="Yes">Bruise / Hematoma</option>
                `;
            } else if (selectedMainComplaintId === "nephrology") {
                subComplaintSelect.innerHTML += `
                    <option id="urinary_tract_infection" name="urinary_tract_infection" value="Yes">Urinary Tract Infection</option>
                    <option id="renal_disease" name="renal_disease" value="Yes">Renal Disease</option>
                    <option id="urolithiasis" name="urolithiasis" value="Yes">Urolithiasis</option>
                `;
            } else if (selectedMainComplaintId === "endocrinology") {
                subComplaintSelect.innerHTML += `
                    <option id="hypoglycemia" name="hypoglycemia" value="Yes">Hypoglycemia</option>
                    <option id="dyslipidemia" name="dyslipidemia" value="Yes">Dyslipidemia</option>
                    <option id="diabetes_mellitus" name="diabetes_mellitus" value="Yes">Diabetes Mellitus</option>
                `;
            } else if (selectedMainComplaintId === "ob_gyne") {
                subComplaintSelect.innerHTML += `
                    <option id="dysmenorrhea" name="dysmenorrhea" value="Yes">Dysmenorrhea</option>
                    <option id="hormonal_imbalance" name="hormonal_imbalance" value="Yes">Hormonal Imbalance</option>
                    <option id="pregnancy" name="pregnancy" value="Yes">Pregnancy</option>
                `;
            } else if (selectedMainComplaintId === "hematologic") {
                subComplaintSelect.innerHTML += `
                    <option id="leukemia" name="leukemia" value="Yes">Leukemia</option>
                    <option id="blood_dyscrasia" name="blood_dyscrasia" value="Yes">Blood Dyscrasia</option>
                    <option id="anemia" name="anemia" value="Yes">Anemia</option>
                `;
            } else if (selectedMainComplaintId === "surgery") {
                subComplaintSelect.innerHTML += `
                    <option id="lacerated_wound" name="lacerated_wound" value="Yes">Lacerated Wound</option>
                    <option id="punctured_wound" name="punctured_wound" value="Yes">Punctured Wound</option>
                    <option id="animal_bite" name="animal_bite" value="Yes">Animal Bite</option>
                    <option id="superfacial_abrasions" name="superfacial_abrasions" value="Yes">Superfacial Abrasions</option>
                    <option id="foreign_body_removal1" name="foreign_body_removal1" value="Yes">Foreign Body Removal</option>
                `;
            } else if (selectedMainComplaintId === "allergology") {
                subComplaintSelect.innerHTML += `
                    <option id="contact_dermatitis" name="contact_dermatitis" value="Yes">Contact Dermatitis</option>
                    <option id="allergic_rhinitis" name="allergic_rhinitis" value="Yes">Allergic Rhinitis</option>
                    <option id="bronchial_asthma" name="bronchial_asthma" value="Yes">Bronchial Asthma</option>
                    <option id="hypersensitivity" name="hypersensitivity" value="Yes">Hypersensitivity</option>
                `;
            }

            subComplaintSelect.addEventListener("change", function() {
            // Set "Yes" or "No" value for sub complaint options
            const options = subComplaintSelect.getElementsByTagName("option");
            for (let i = 0; i < options.length; i++) {
                const option = options[i];
                if (option.selected) {
                    subComplaintSelect.setAttribute("name", option.id);
                    subComplaintSelect.setAttribute("value", "Yes");
                }
            }

            const selectedSubComplaint = subComplaintSelect.value;

            });
        });

        // Trigger the change event initially to populate sub complaint options if a default option is selected
        mainComplaintSelect.dispatchEvent(new Event('change'));
    </script>

    <!-- Adding medicine if the patient take more than one -->
    <script>
        $(document).ready(function() {
            $('#meds').change(function() {
                var isChecked = $(this).is(':checked');
                $('#medicine-col').toggle(isChecked); // Show/hide the medicine column

                // Enable/disable the input and select elements based on the checkbox status
                $('#medicine-container .medicine-row').each(function() {
                    $(this).find('select, input').prop('disabled', !isChecked);
                    $(this).find('select').prop('required', isChecked);
                    $(this).find('input').prop('required', isChecked);
                });

                if (!isChecked) {
                    clearMedicineRows(); // Clear additional rows when unchecked
                }
            });

            $('.add-medicine').click(function() {
                var $medicineRow = $('.medicine-row').first().clone(); // Clone the first medicine row
                $medicineRow.find('select').prop('selectedIndex', 0); // Reset the selected option
                $medicineRow.find('input').val(''); // Reset the input value
                $('#medicine-container').append($medicineRow); // Append the cloned row to the container
            });

            function clearMedicineRows() {
                $('#medicine-container .medicine-row').not(':first').remove(); // Remove additional rows
            }
        });
    </script>

    <!-- Today's date -->
    <script>
        // Get the current date
        var currentDate = new Date();

        // Format the date as "YYYY-MM-DD" for the input field
        var year = currentDate.getFullYear();
        var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
        var day = currentDate.getDate().toString().padStart(2, '0');
        var formattedDate = year + '-' + month + '-' + day;

        // Set the value of the input field
        document.getElementById('date-input').value = formattedDate;
    </script>
@stop