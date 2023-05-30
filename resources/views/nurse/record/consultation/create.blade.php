@extends('adminlte::page')

@section('title', 'Creating Consultation')

@section('content_header')
    <h1>Creating Consultation</h1>
@stop

@section('content')
    <div class="container border mx-auto pb-4" style="height: 625px; overflow: auto;">
        <form method="POST" action="{{ route('nurse.consultationStore') }}">
            @csrf
            <!-- Date -->
            <div class="row position-right ml-auto mt-3" style="width: 175px;">
                <div class="col-0">
                    <p><strong>Date:</strong></p>
                </div>
                <div class="col">
                    <input type="date" name="date_created" id="date-input" style="width: 120px;" readonly>
                </div>
            </div>
            <!-- Record ID Created (Hidden) -->
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <!-- Complaint -->
            <div class="row mx-auto mt-1">
                <div class="col-0 ml-1">
                    <p class="h4"><strong>Complaint:</strong></p>
                </div>
                <div class="col">
                    <input type="text" name="complaint" id="complaint" style="width: 350px;">
                </div>
            </div>

            <div class="row mx-auto mt-1">
                <div class="col pt-2">
                    <h3><strong>Vital Signs:</strong></h3>
                </div>
            </div>
            <div class="row mx-auto">
                <div class="col border">
                    <div class="row">
                        <div class="col-0 ml-3 mt-2">
                            <p><strong>Pulse / Heart Rate:</strong></p>
                        </div>
                        <div class="col mt-2">
                            <input type="number" id="pulse" name="pulse" style="height: 25px; width: 50px;" required>
                        </div>
                    </div>
                </div>
                <div class="col border">
                    <div class="row">
                        <div class="col-0 ml-3 mt-2">
                            <p><strong>Oxygen:</strong></p>
                        </div>
                        <div class="col mt-2">
                            <input type="number" id="oxygen" name="oxygen" style="height: 25px; width: 50px;" required>
                        </div>
                    </div>
                </div>
                <div class="col border">
                    <div class="row">
                        <div class="col-0 ml-3 mt-2">
                            <p><strong>Respiratory Rate:</strong></p>
                        </div>
                        <div class="col mt-2 ">
                            <input type="number" id="respiratory_rate" name="respiratory_rate" style="height: 25px; width: 50px;" required>
                        </div>
                    </div>
                </div>
                <div class="col border">
                    <div class="row">
                        <div class="col-0 ml-3 mt-2" style="height: 25px;">
                            <p><strong>Blood Pressure:</strong></p>
                        </div>
                        <div class="row">
                            <div class="col-0" style="margin-left: 21px;">
                                <input type="number" name="bp1" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="bp1" required>
                            </div>
                            <div class="col-0 ml-2">
                                <p>/</p>
                            </div>
                            <div class="col">
                                <input type="number" name="bp2" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="bp2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col border">
                    <div class="row">
                        <div class="col-0 ml-3 mt-2">
                            <p><strong>Temperature:</strong></p>
                        </div>
                        <div class="col mt-2">
                            <input type="number" id="temperature" name="temperature" style="height: 25px; width: 50px;" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Treatment -->
            <div class="row mx-auto mt-3 border">
                <div class="col pt-2">
                    <h4><strong>Treatment: </strong></h4>
                    <textarea class="form-control mb-3" name="treatment" id="treatment" style="height: 85px;" required></textarea>
                </div>
            </div>

            <!-- Remarks -->
            <div class="row mx-auto mt-3 border">
                <div class="col pt-2">
                    <h4><strong>Nurse Remarks: </strong></h4>
                    <textarea class="form-control mb-3" name="remarks" id="remarks" style="height: 85px;" required></textarea>
                </div>
            </div>

            <!-- Submit -->
            <div class="position-right ml-auto mt-2" style="width: 75px;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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
@stop