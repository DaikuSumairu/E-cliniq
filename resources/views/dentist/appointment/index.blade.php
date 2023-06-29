@extends('adminlte::page')

@section('title', 'Appointment')

@section('content_header')
    <h1>Appointment</h1>
@stop

@section('content')
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
                                    <a class="btn btn-info" href="#">Done</a>
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
@stop