@extends('adminlte::page')

@section('title', 'Homepage')

@section('content_header')
    <h1>Daily Visit List</h1>
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
                                        <input type="text" class="form-control" id="name" name="name" required data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" required>
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
                                        <select class="hour-input" id="start_hour" required onchange="updateEndTime()" required>
                                            <option value="">Hour</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                        </select>
                                        <span>:</span>
                                        <select class="minute-input" id="start_minute" required onchange="updateEndTime()" required>
                                            <option value="">Minute</option>
                                            <option value="00">00</option>
                                            <option value="15">15</option>
                                            <option value="30">30</option>
                                            <option value="45">45</option>
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

    <div class="mx-auto mb-2 border" style="width: 1260px;height: 480px;overflow: auto;">
        <div class="row">
            <div class="col px-0" style="width: 200px; height: 460px;overflow: auto; border: 1px;">
                <div id='calendar'></div>
            </div>
            <div class="col-4 px-0">
                <p class="h4 mb-0 mt-3 px-3"><strong>List of Appointment</strong></p>
                <div class="col" style="height: 415px;overflow: auto;">
                    <div class="col" style="width: 380px; border: 1px;">
                        @foreach ($appointments as $appointment)
                            <div class="container my-3 border">
                                <div class="row mt-2" style="width: 380px;">
                                    <div class="col">
                                        <label><strong>Name: </strong></label> {{ $appointment->name }}<br>
                                        <label><strong>ID: </strong></label> {{ $appointment->school_id }}<br>
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
        document.addEventListener('DOMContentLoaded', function() {
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
                    name: '{{ $appointedones->name }}',
                    schoolId: '{{ $appointedones->school_id }}'
                }
                });
            @endif
        @endforeach
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
    
            // Disable minute options other than "00" and "15" if the selected hour is "17"
            if (selectedHour === "17") {
                var minuteSelect = document.getElementById("start_minute");
                for (var i = 0; i < minuteSelect.options.length; i++) {
                    var option = minuteSelect.options[i];
                    if (option.value !== "00" && option.value !== "15") {
                        option.disabled = true;
                    } else {
                        option.disabled = false;
                    }
                }
            } else {
                // Enable all minute options for other hours
                var minuteSelect = document.getElementById("start_minute");
                for (var i = 0; i < minuteSelect.options.length; i++) {
                    var option = minuteSelect.options[i];
                    option.disabled = false;
                }
            }
    
            var startTime = getSelectedTime();
            var endTime = new Date(new Date("1970-01-01T" + startTime + "Z").getTime() + (15 * 60000)).toISOString().substr(11, 5);
            document.getElementById("end_time").value = endTime;
            document.getElementById("start_time").value = startTime; // Save start time to the "start_time" input field
        }
    
        // Custom Picker
        function getSelectedTime() {
            var hour = document.getElementById("start_hour").value;
            var minute = document.getElementById("start_minute").value;
    
            // Format the time as desired (e.g., HH:mm)
            var formattedTime = hour.toString().padStart(2, "0") + ":" + minute.toString().padStart(2, "0");
    
            return formattedTime;
        }
    </script>
@stop