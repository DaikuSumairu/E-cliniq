@extends('adminlte::page')

@section('title', 'Update Consultation')

@section('content_header')
    <h1>Updating Consultation</h1>
@stop

@section('content')
<div class="container border mx-auto pb-4" style="height: 525px; overflow: auto;">
        <form method="POST" action="{{ route('nurse.consultationUpdate', $consultation->id) }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="record_id" value="{{ $consultation->record->id }}">
            <!-- Date -->
            <div class="row position-right ml-auto mt-3" style="width: 175px;">
                <div class="col-0">
                    <p><strong>Date:</strong></p>
                </div>
                <div class="col">
                    <input type="date" name="date_updated" id="date-input" style="width: 120px;" readonly>
                </div>
            </div>

            <!-- Complaint -->
            <div class="row mx-auto mt-1">
                <div class="col-0 ml-1">
                    <p class="h4"><strong>Complaint:</strong></p>
                </div>
                <div class="col">
                    <input type="text" name="complaint" id="complaint" style="width: 350px;" value="{{ $consultation->consultation_response->complaint }}">
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
                            <p class="mb-1"><strong>Pulse / Heart Rate:</strong></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-0 ml-3">
                            <input type="number" id="pulse" name="pulse" style="height: 25px; width: 50px;" value="{{ $consultation->consultation_response->pulse }}" required> BPM
                        </div>
                        <div class="col-0">
                            <i class="fas fa-arrow-up mt-1 mx-1" id="arrowUpCR" style="display: none;"></i>
                            <i class="fas fa-arrow-down mt-1 mx-1" id="arrowDownCR" style="display: none;"></i>
                        </div>
                    </div>
                </div>
                <div class="col border">
                    <div class="row">
                        <div class="col-0 ml-3 mt-2">
                            <p><strong>02 Stat:</strong></p>
                        </div>
                        <div class="row mt-2">
                            <div class="col-0 mx-3 ">
                                <input type="number" id="oxygen" name="oxygen" style="height: 25px; width: 50px;" value="{{ $consultation->consultation_response->oxygen }}" required> %
                            </div>
                        <div class="col-0">
                            <i class="fas fa-arrow-up mt-1 mx-1" id="arrowUpOS" style="display: none;"></i>
                            <i class="fas fa-arrow-down mt-1 mx-1" id="arrowDownOS" style="display: none;"></i>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col border">
                    <div class="row">
                        <div class="col-0 ml-3 mt-2">
                            <p class="mb-1"><strong>Respiratory Rate:</strong></p>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-0 ml-3">
                            <input type="number" id="respiratory_rate" name="respiratory_rate" style="height: 25px; width: 50px;" value="{{ $consultation->consultation_response->respiratory_rate }}" required> BPM
                        </div>
                        <div class="col-0">
                            <i class="fas fa-arrow-up mt-1 mx-1" id="arrowUpRR" style="display: none;"></i>
                            <i class="fas fa-arrow-down mt-1 mx-1" id="arrowDownRR" style="display: none;"></i>
                        </div>
                    </div>
                </div>
                <div class="col border">
                    <div class="row">
                        <div class="col-0 ml-3 mt-2" style="height: 25px;">
                            <p><strong>Blood Pressure (mm/hg):</strong></p>
                        </div>
                        <div class="row">
                            <div class="col-0" style="margin-left: 21px;">
                                <input type="number" name="bp1" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="bp1" value="{{ $consultation->consultation_response['bp1'] }}" required>
                            </div>
                            <div class="col-0 ml-2">
                                <p>/</p>
                            </div>
                            <div class="col-0 mr-1">
                                <input type="number" name="bp2" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="bp2" value="{{ $consultation->consultation_response['bp2'] }}" required>
                            </div>
                            <div class="col-0">
                                <i class="fas fa-arrow-up mt-1 mx-1" id="arrowUpBP" style="display: none;"></i>
                                <i class="fas fa-arrow-down mt-1 mx-1" id="arrowDownBP" style="display: none;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col border">
                    <div class="row">
                        <div class="col-0 ml-3 mt-2">
                            <p><strong>Temperature:</strong></p>
                        </div>
                        <div class="row">
                            <div class="col-0 ml-3 mt-2">
                                <input type="number" id="temperature" name="temperature" style="height: 25px; width: 50px;" step="any" value="{{ $consultation->consultation_response->temperature }}" required> °C
                            </div>
                            <div class="col-0 mt-2">
                                <i class="fas fa-arrow-up mt-1 mx-1" id="arrowUpT" style="display: none;"></i>
                                <i class="fas fa-arrow-down mt-1 mx-1" id="arrowDownT" style="display: none;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Treatment -->
            <div class="row mx-auto mt-3 border">
                <div class="col pt-2">
                    <h4><strong>Treatment: </strong></h4>
                    <textarea class="form-control mb-3" name="treatment" id="treatment" style="height: 85px;" required>{{ $consultation->consultation_response->treatment }}</textarea>
                </div>
            </div>

            <!-- Remarks -->
            <div class="row mx-auto mt-3 border">
                <div class="col pt-2">
                    <div class="row">
                        <div class="col-2">
                            <h4><strong>Nurse Remarks: </strong></h4>
                        </div>
                        <div class="col-0" style="padding-top: 3px;">
                            <select name="remarks">
                                <option value="Monitoring Case" {{ $consultation->consultation_response->remarks == 'Monitoring Case' ? 'selected' : '' }}>Monitoring Case</option>
                                <option value="Resolved Case" {{ $consultation->consultation_response->remarks == 'Resolved Case' ? 'selected' : '' }}>Resolved Case</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="position-right ml-auto mt-2" style="width: 75px;">
                <button type="submit" class="btn btn-primary">Update</button>
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

    <!-- Restriction and Arrow determination of BP -->
    <script>
        const bp1Input = document.getElementById('bp1');
        const bp2Input = document.getElementById('bp2');
        const arrowUpBP = document.getElementById('arrowUpBP');
        const arrowDownBP = document.getElementById('arrowDownBP');

        bp1Input.addEventListener('input', validateBP);
        bp2Input.addEventListener('input', validateBP);

        function validateBP() {
            const bp1Value = parseFloat(bp1Input.value);
            const bp2Value = parseFloat(bp2Input.value);

            if (bp1Value <= bp2Value) {
                bp1Input.setCustomValidity("This area must be greater than hg");
                bp2Input.setCustomValidity("This area must be smaller than mm.");
            } else {
                bp1Input.setCustomValidity('');
                bp2Input.setCustomValidity('');
            }

            if (bp1Value < 90 && bp2Value < 60) {
                arrowUpBP.style.display = 'none';
                arrowDownBP.style.display = 'block';
            } else if (bp1Value > 120 && bp2Value > 80) {
                arrowUpBP.style.display = 'block';
                arrowDownBP.style.display = 'none';
            } else {
                arrowUpBP.style.display = 'none';
                arrowDownBP.style.display = 'none';
            }
        }
    </script>

    <!-- Restriction and Arrow determination of Cardiac Rate -->
    <script>
        const cardiacRateInput = document.getElementById('pulse');
        const arrowUpCR = document.getElementById('arrowUpCR');
        const arrowDownCR = document.getElementById('arrowDownCR');

        cardiacRateInput.addEventListener('input', validateCardiacRate);

        function validateCardiacRate() {
            const cardiacRateValue = parseFloat(cardiacRateInput.value);

            if (cardiacRateValue < 60) {
                arrowUpCR.style.display = 'none';
                arrowDownCR.style.display = 'block';
            } else if (cardiacRateValue > 100) {
                arrowUpCR.style.display = 'block';
                arrowDownCR.style.display = 'none';
            } else {
                arrowUpCR.style.display = 'none';
                arrowDownCR.style.display = 'none';
            }
        }
    </script>

    <!-- Restriction and Arrow determination of O2 Stat -->
    <script>
        const oxygenInput = document.getElementById('oxygen');
        const arrowUpOS = document.getElementById('arrowUpOS');
        const arrowDownOS = document.getElementById('arrowDownOS');

        oxygenInput.addEventListener('input', validateOxygen);

        function validateOxygen() {
            const oxygenValue = parseFloat(oxygenInput.value);

            if (oxygenValue < 95) {
                arrowUpOS.style.display = 'none';
                arrowDownOS.style.display = 'block';
            } else if (oxygenValue > 100) {
                arrowUpOS.style.display = 'block';
                arrowDownOS.style.display = 'none';
            } else {
                arrowUpOS.style.display = 'none';
                arrowDownOS.style.display = 'none';
            }
        }
    </script>

    <!-- Restriction and Arrow determination of Respiratory Rate -->
    <script>
        const respiratoryRateInput = document.getElementById('respiratory_rate');
        const arrowUpRR = document.getElementById('arrowUpRR');
        const arrowDownRR = document.getElementById('arrowDownRR');

        respiratoryRateInput.addEventListener('input', validateRespiratoryRate);

        function validateRespiratoryRate() {
            const respiratoryRateValue = parseFloat(respiratoryRateInput.value);

            if (respiratoryRateValue < 16) {
                arrowUpRR.style.display = 'none';
                arrowDownRR.style.display = 'block';
            } else if (respiratoryRateValue > 24) {
                arrowUpRR.style.display = 'block';
                arrowDownRR.style.display = 'none';
            } else {
                arrowUpRR.style.display = 'none';
                arrowDownRR.style.display = 'none';
            }
        }
    </script>

    <!-- Restriction and Arrow determination of Temperature -->
    <script>
        const temperatureInput = document.getElementById('temperature');
        const arrowUpT = document.getElementById('arrowUpT');
        const arrowDownT = document.getElementById('arrowDownT');

        temperatureInput.addEventListener('input', validateTemperature);

        function validateTemperature() {
            const temperatureValue = parseFloat(temperatureInput.value);

            if (temperatureValue < 36.5) {
                arrowUpT.style.display = 'none';
                arrowDownT.style.display = 'block';
            } else if (temperatureValue > 37.5) {
                arrowUpT.style.display = 'block';
                arrowDownT.style.display = 'none';
            } else {
                arrowUpT.style.display = 'none';
                arrowDownT.style.display = 'none';
            }
        }
    </script>
@stop