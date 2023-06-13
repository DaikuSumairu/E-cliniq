@extends('adminlte::page')

@section('title', "Patient's Records")

@section('content_header')
    <h1>Patient's Record</h1>
@stop

@section('content')
    <div class="position-relative">
        <!-- Going Back to Patient's Record -->
        <div class="position-left">
            <a class="btn btn-primary" href="{{ route('nurse.recordIndex') }}">Go Back</a>
        </div>
    </div>

    <!-- General Information -->
    <div class="container shadow mt-4 px-4 py-3 mx-auto mb-3" style="border-style: solid; border-color: #bfbfbf;">
        <div class="row">
            <!-- Right Side -->
            <div class=col>
                <!-- Name -->
                <p class="h5 mb-3"><strong>Name: </strong> {{ $record->user->name }}</p>
                
                @if($record->user->role == 'faculty')
                    <!-- Department -->
                    <p class="h5 mb-3"><strong>Department: </strong> {{ $record->user->department }}</p>
                @else
                    <!-- Course -->
                    <p class="h5 mb-3"><strong>Course: </strong> {{ $record->user->course }}</p>
                    
                    @if ($record->user->year && is_null($record->user->grade))
                        <!-- Year -->
                        <p class="h5 mb-3"><strong>Year: </strong> {{ $record->user->year }}</p>
                    @elseif($record->user->grade && is_null($record->user->year))
                        <!-- Grade -->
                        <p class="h5 mb-3"><strong>Grade: </strong> {{ $record->user->grade }}</p>
                    @endif
                    <!-- Section -->
                    <p class="h5 mb-3"><strong>Section: </strong> {{ $record->user->section }}</p>
                @endif
                <!-- ID -->
                <p class="h5"><strong>School ID: </strong> {{ $record->user->school_id }}</p>
            </div>

            <!-- Left Side -->
            <div class=col>
                <!-- Firts Line -->
                <ul class="list-inline mb-3">
                    <!-- Birth Date -->
                    <li class="list-inline-item h5 mr-4"><strong>Birth Date: </strong> {{ $record->birth_date }}</li>
                    <!-- Age -->
                    <li class="list-inline-item h5 mr-4"><strong>Age: </strong> {{ $record->age }}</li>
                    <!-- Sex -->
                    <li class="list-inline-item h5"><strong>Sex: </strong> {{ $record->sex }}</li>  
                </ul>
                
                <!-- Second Line -->
                <ul class="list-inline mb-3">
                    <!-- Civil Status -->
                    <li class="list-inline-item h5 mr-5"><strong>Civil Status: </strong> {{ $record->civil_status }}</li>
                    <!-- Mobile Number -->
                    <li class="list-inline-item h5"><strong>Mobile #: </strong> +63{{ $record->mobile_number }}</li>
                </ul>
                <!-- Contact Person Name -->
                <p class="h5 mb-2"><strong>Contact Person Name: </strong> {{ $record->contact_person }}</p>
                <!-- Contact Person Mobile Number -->
                @if($record->contact_person_mobile != 'null')
                    <p class="h5 mb-3"><strong>Contact Person Mobile #: </strong> +63{{ $record->contact_person_number }}</p>
                @else
                    <p class="h5 mb-3"><strong>Contact Person Mobile #: </strong></p>
                @endif
                <!-- Address -->
                <p class="h5"><strong>Address: </strong> {{ $record->address }}</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="row">
            <button type="button" class="col btn btn-secondary mx-1 show-content show-date" data-content-target="#consultation-content" data-date-target="#consultation-date">Consultation</button>
            <button type="button" class="col btn btn-info mr-1 show-content show-date" data-content-target="#medical-exam-content" data-date-target="#medical-exam-date">Medical Exam</button>
            <button type="button" class="col btn btn-info mx-1 show-content show-date" data-content-target="#dental-exam-content" data-date-target="#dental-exam-date">Dental Exam</button>
        </div>
    </div>

    <div class="mx-auto" style="width: 1200px;">
        <div class="row">
            <!-- Date of specific item -->
            <div class="col-2 pt-2 border">
                <div id="consultation-date" class="text-center mini-date">
                    @if(isset($record->consultation))
                        <a><strong>Created at:</strong> {{ $record->consultation->date_created }}</a>
                    @else
                        <p>No consultation has been made.</p>
                    @endif
                </div>
                <div id="medical-exam-date" class="text-center mini-date">
                    @if(isset($record->medical_exam))
                        <a><strong>Created at:</strong> {{ $record->medical_exam->date_created }}</a>
                    @else
                        <p>No medical exam has been made.</p>
                    @endif
                </div>
                <div id="dental-exam-date" class="text-center mini-date">
                    @if(isset($record->dental_exam))
                        <a><strong>Created at:</strong> {{ $record->dental_exam->date_created }}</a>
                    @else
                        <p>No dental exam has been made.</p>
                    @endif
                </div>
            </div>

            <!-- Content of specific item -->
            <div class="col border">
                <!-- Consultation -->
                <div id="consultation-content" class="mini-content pt-1">
                    @if(isset($record->consultation))
                        @if(isset($record) && !empty($record))
                            <div class="container" style="height: 265px; overflow: auto;">
                                <!-- Complaint -->
                                <div class="row mx-auto mt-1">
                                    <div class="col-0 ml-1">
                                        <p class="h5"><strong>Complaint:</strong></p>
                                    </div>
                                    <div class="col">
                                        {{ $record->consultation->consultation_response->complaint }}
                                    </div>
                                    <div class="col text-right">
                                        <a class="btn btn-primary px-4" href="{{ route('nurse.consultationEdit', $record->consultation->id) }}">Update</a>
                                    </div>
                                </div>
                                <div class="row mx-auto mt-1">
                                    <div class="col pt-2">
                                        <h4><strong>Vital Signs:</strong></h4>
                                    </div>
                                </div>
                                <div class="row mx-auto">
                                    <div class="col border">
                                        <div class="row">
                                            <div class="col-0 ml-3 mt-2">
                                                <p class="mb-1"><strong>Pulse / Heart Rate:</strong></p>
                                            </div>
                                            <div class="row">
                                                <div class="col-0 ml-4 mB-2">
                                                    {{ $record->consultation->consultation_response->pulse }} BPM
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col border">
                                        <div class="row">
                                            <div class="col-0 ml-3 mt-2">
                                                <p><strong>Oxygen:</strong></p>
                                            </div>
                                            <div class="col mt-2">
                                                {{ $record->consultation->consultation_response->oxygen }}%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col border">
                                        <div class="row">
                                            <div class="col-0 ml-3 mt-2">
                                                <p class="mb-1"><strong>Respiratory Rate:</strong></p>
                                            </div>
                                            <div class="row">
                                                <div class="col-0 ml-4 mB-2">
                                                    {{ $record->consultation->consultation_response->respiratory_rate }} BPM
                                                </div>
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
                                                    {{ $record->consultation->consultation_response['bp1'] }}
                                                </div>
                                                <div class="col-0 ml-2">
                                                    <p>/</p>
                                                </div>
                                                <div class="col">
                                                    {{ $record->consultation->consultation_response['bp2'] }} (mm/hg)
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
                                                {{ $record->consultation->consultation_response->temperature }}°C
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Treatment -->
                                <div class="row mx-auto mt-3 border">
                                    <div class="col pt-2">
                                        <h4><strong>Treatment: </strong></h4>
                                        <textarea class="form-control mb-2" readonly>{{ $record->consultation->consultation_response->treatment }}</textarea>
                                    </div>
                                </div>

                                <!-- Remarks -->
                                <div class="row mx-auto my-3 border">
                                    <div class="col pt-2">
                                        <h4><strong>Nurse Remarks: </strong> {{ $record->consultation->consultation_response->remarks }}</h4>
                                    </div>
                                </div>
                            </div>    
                        @endif
                    @else
                        <div class="text-center">
                            <p>No consultation has been made. <a href="{{ route('nurse.consultationCreate', $record->id) }}">Create now.</a></p>
                        </div>
                    @endif
                </div>

                <!-- Medical Exam -->
                <div id="medical-exam-content" class="mini-content pt-1">
                    @if(isset($record->medical_exam))
                        @if(isset($record) && !empty($record))
                        <div class="container" style="height: 265px; overflow: auto;">
                            <div class="row mx-auto mt-1">
                                <!-- Medical History -->
                                <div class="col-0 ml-1">                    
                                    <h3 class="my-2"><strong>I. Medical History</strong></h3>
                                </div>
                                <div class="col text-right">
                                    <a class="btn btn-primary px-4" href="{{ route('nurse.medExamEdit', $record->medical_exam->id) }}">Update</a>
                                </div>
                            </div>
                            <div class="row row-cols-3">
                                <!-- Past Medical History -->
                                <div class="col">
                                    <div class="text-center">
                                        <h4><strong>A. Past Medical Exam</strong></h4>
                                    </div>
                                    <table class="table table-sm table-bordered">
                                        <tr>
                                            <th></th>
                                            <th class="text-center">Normal</th>
                                            <th class="text-center" width="250px">Findings</th>
                                            </tr>

                                        <tr>
                                            <td>Allergies</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->allergies }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['1_pm_respond'] }}</textarea></td>
                                            </tr>

                                        <tr>
                                            <td>Skin Disease</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->skin_disease }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['2_pm_respond'] }}</textarea></td>
                                            </tr>

                                        <tr>
                                            <td>Opthalmologic Disorder</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->opthalmologic_disorder }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['3_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>ENT Disorder</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->ent_disorder }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['4_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Bronchial Asthma</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->bronchial_asthma }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['5_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Cardiac Disorder</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->cardiac_disorder }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['6_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Diabetes Melilitus</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->diabetes_melilitus }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['7_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Chronic Headache/Migraine</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->chronic_headache_or_migraine }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['8_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Hepatitis</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->hepatitis }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['9_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Hypertension</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->hypertension }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['10_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Thyroid Disorder</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->thyroid_disorder }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['11_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Blood Disorder</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->blood_disorder }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['12_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Tuberculosis</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->tuberculosis }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['13_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Peptic Ulcer</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->peptic_ulcer }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['14_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Musculoskeletal Disorder</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->musculoskeletal_disorder }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['15_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Infectious Disease</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->past_medical_history->infectious_disease }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response['16_pm_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td >Others</td>
                                            <td colspan="2">
                                                <textarea class="form-control" readonly>{{ $record->medical_exam->past_medical_history->medical_exam_response->others_pm_respond }}</textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <!-- Family History -->
                                <div class="col">
                                    <div class="text-center">
                                        <h4><strong>B. Family History</strong></h4>
                                    </div>
                                    <table class="table table-sm table-bordered mb-2">
                                        <tr>
                                            <th></th>
                                            <th class="text-center">(-)</th>
                                            <th class="text-center" width="250px">(+)</th>
                                        </tr>

                                        <tr>
                                            <td>Bronchial Asthma</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->family_history['bronchial_asthma_1'] }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response['1_fh_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Diabetes Melilitus</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->family_history['diabetes_melilitus_1'] }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response['2_fh_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Thyroid Disorder</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->family_history['thyroid_disorder_1'] }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response['3_fh_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Opthalmologic Disease</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->family_history->opthalmologic_disease }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response['4_fh_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Cancer</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->family_history->cancer }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response['5_fh_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Cardiac Disorder</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->family_history['cardiac_disorder_1'] }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response['6_fh_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Hypertension</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->family_history['hypertension_1'] }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response['7_fh_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Tuberculosis</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->family_history['tuberculosis_1'] }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response['8_fh_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Nervous Disorder</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->family_history->nervous_disorder }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response['9_fh_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Musculoskeletal</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->family_history->musculoskeletal }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response['10_fh_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Liver Disease</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->family_history->liver_disease }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response['11_fh_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Kidney Disease</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->family_history->kidney_disease }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response['12_fh_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td >Others</td>
                                            <td colspan="2">
                                                <textarea class="form-control" readonly>{{ $record->medical_exam->family_history->medical_exam_response->others_fh_respond }}</textarea>
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Personal and Social History -->
                                    <div class="text-center">
                                        <h4><strong>C. Personal and Social History</strong></h4>
                                    </div>
                                    <div class="container border">
                                        <div class="row my-3 mx-1">
                                            @if($record->medical_exam->personal_and_social_history->smoker == 'No')
                                                <div class="col-0">
                                                    <p class="mr-1"><strong>Smoker:</strong></p>
                                                </div>
                                                <div class="col-0 ml-2">
                                                    <p class="mr-1">{{ $record->medical_exam->personal_and_social_history->smoker }}</p>
                                                </div>
                                            @else
                                                <div class="col-0">
                                                    <p class="mr-1"><strong>Smoker:</strong></p>
                                                </div>
                                                <div class="col-0 mx-1">
                                                    {{ $record->medical_exam->personal_and_social_history->stick }}
                                                </div>
                                                <div class="col-0">
                                                    <p>sticks/day</p>
                                                </div>
                                                <div class="col-0 mx-1">
                                                    {{ $record->medical_exam->personal_and_social_history->pack }}
                                                </div>
                                                <div class="col-0">
                                                    <p>pack year/s</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row mb-3 mx-1">
                                            @if($record->medical_exam->personal_and_social_history->alcoholic == 'No')
                                                <div class="col-0">
                                                    <p class="mr-1"><strong>Alcoholic:</strong></p>
                                                </div>
                                                <div class="col-0 ml-2">
                                                    <p class="mr-1">{{ $record->medical_exam->personal_and_social_history->alcoholic }}</p>
                                                </div>
                                            @else
                                                <div class="col-0">
                                                    <p class="mr-1"><strong>Alcoholic:</strong></p>
                                                </div>
                                                <div class="col-0 mx-1">
                                                    {{ $record->medical_exam->personal_and_social_history->frequent }}
                                                </div>
                                                <div class="col-0">
                                                    <p>bottles/shot</p>
                                                </div>
                                                <div class="col-0 mx-1">
                                                    {{ $record->medical_exam->personal_and_social_history->week }}
                                                </div>
                                                <div class="col-0">
                                                    <p>/week</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row mb-3 mx-1">
                                            @if($record->medical_exam->personal_and_social_history->medication == 'No')
                                                <div class="col-0">
                                                    <p><strong>Medication:</strong></p>
                                                </div>
                                                <div class="col-0 ml-2">
                                                    <p class="mr-1">{{ $record->medical_exam->personal_and_social_history->medication }}</p>
                                                </div>
                                            @else
                                                <div class="col-0">
                                                    <p><strong>Medication:</strong></p>
                                                </div>
                                                <div class="col">
                                                    <p>{{ $record->medical_exam->personal_and_social_history->take }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- OB-GYNE History -->
                                <div class="col">
                                    <div class="text-center">
                                        <h4><strong>D. OB-GYNE History</strong></h4>
                                    </div>
                                    <table class="table table-sm table-bordered mb-2">
                                        <tr>
                                            <th></th>
                                            <th class="text-center">(-)</th>
                                            <th class="text-center" width="250px">(+)</th>
                                        </tr>

                                        <tr>
                                            <td>LNMP</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->ob_gyne_history->lnmp }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['1_ob_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>OB Score</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->ob_gyne_history->ob_score }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['2_ob_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Abnormal Pregnancies</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->ob_gyne_history->abnormal_pregnancies }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['3_ob_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Last Delivery</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->ob_gyne_history->date_of_last_delivery }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['4_ob_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Breast/Uterus/Ovaries</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->ob_gyne_history->breast_uterus_ovaries }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['5_ob_respond'] }}</textarea></td>
                                        </tr>
                                    </table>

                                    <!-- Hospitalization and Operation -->
                                    <div class="container border my-3 pt-2">
                                        <div class="row mx-1">
                                            @if($record->medical_exam->personal_and_social_history->hospitalization == 'No')
                                                <div class="col-0 mb-3">
                                                    <p class="h5 mr-1"><strong>E. Hospitalization/s:</strong></p>
                                                </div>
                                                <div class="col-0 ml-2">
                                                    <p class="mr-1">{{ $record->medical_exam->personal_and_social_history->hospitalization }}</p>
                                                </div>
                                            @else
                                                <div class="col-0 mb-3">
                                                    <p class="h5 mr-1"><strong>E. Hospitalization/s:</strong></p>
                                                </div>
                                                <div class="col-0 ml-2">
                                                    <p class="mr-1">{{ $record->medical_exam->personal_and_social_history->hosp_times }}</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row mx-1">
                                            @if($record->medical_exam->personal_and_social_history->operation == 'No')
                                                <div class="col-0">
                                                    <p class="h5 mr-1"><strong>F. Operation/s:</strong></p>
                                                </div>
                                                <div class="col-0 ml-2">
                                                    <p class="mr-1">{{ $record->medical_exam->personal_and_social_history->operation }}</p>
                                                </div>
                                            @else
                                                <div class="col-0 mb-3">
                                                    <p class="h5 mr-1"><strong>F. Operation/s:</strong></p>
                                                </div>
                                                <div class="col-0 ml-2">
                                                    <p class="mr-1">{{ $record->medical_exam->personal_and_social_history->op_times }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Review of System -->
                                    <div class="text-center">
                                        <h4><strong>G. Review of System</strong></h4>
                                    </div>
                                    <table class="table table-sm table-bordered mb-2">
                                        <tr>
                                            <th></th>
                                            <th class="text-center">(-)</th>
                                            <th class="text-center" width="250px">(+)</th>
                                        </tr>

                                        <tr>
                                            <td>Skin</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->review_of_system->skin }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['1_rs_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Opthalmologic</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->review_of_system->opthalmologic }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['2_rs_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>ENT</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->review_of_system->ent }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['3_rs_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Cardiovascular</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->review_of_system->cardiovascular }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['4_rs_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Respiratory</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->review_of_system->respiratory }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['5_rs_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Gastro Intestinal</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->review_of_system->gastro_intestinal }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['6_rs_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Neuro-Psychiatric</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->review_of_system->neuro_psychiatric }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['7_rs_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Hematology</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->review_of_system->hematology }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['8_rs_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Genitourinary</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->review_of_system->genitourinary }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['9_rs_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Musculo-Skeletal</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->review_of_system->musculo_skeletal }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->ob_gyne_history->medical_exam_response['10_rs_respond'] }}</textarea></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- Physical Examination -->
                            <h3 class="my-1"><strong>II. Physical Examination</strong></h3>
                            <div class="row mx-auto mb-3">
                                <div class="col border">
                                    <p class="mb-1"><strong>Height:</strong></p>
                                    <div class="row">
                                        <div class="col-0 ml-2">
                                            {{ $record->medical_exam->physical_examination->height }} cm.
                                        </div>
                                    </div>
                                </div> 
                                <div class="col border">
                                    <p class="mb-1"><strong>Weight:</strong></p>
                                    <div class="row">
                                        <div class="col-0 ml-2">
                                            {{ $record->medical_exam->physical_examination->weight }} kg.
                                        </div>
                                    </div>
                                </div> 
                                <div class="col border">
                                    <p class="mb-1"><strong>BP:</strong></p>
                                    <div class="row">
                                        <div class="col-0 ml-2">
                                            {{ $record->medical_exam->physical_examination['bp1'] }}
                                        </div>
                                        <div class="col-0 ml-2">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0 ml-2">
                                            {{ $record->medical_exam->physical_examination['bp2'] }} (mm/hg)
                                        </div>
                                    </div>
                                </div> 
                                <div class="col border">
                                    <p class="mb-1"><strong>Cardiac Rate:</strong></p>
                                    {{ $record->medical_exam->physical_examination->cardiac_rate }} BPM
                                </div> 
                                <div class="col border">
                                    <p class="mb-1"><strong>Respiratory Rate</strong></p>
                                    {{ $record->medical_exam->physical_examination->respiratory_rate }} BPM
                                </div> 
                                <div class="col border">
                                    <p class="mb-1"><strong>BMI:</strong></p>
                                    @if ($record->medical_exam->physical_examination->bmi < 18.5)
                                        {{ $record->medical_exam->physical_examination->bmi }} Underweight
                                    @elseif ($record->medical_exam->physical_examination->bmi >= 18.5 && $record->medical_exam->physical_examination->bmi <= 24.9)
                                        {{ $record->medical_exam->physical_examination->bmi }} Normal weight
                                    @elseif ($record->medical_exam->physical_examination->bmi >= 25 && $record->medical_exam->physical_examination->bmi <= 29.9)
                                        {{ $record->medical_exam->physical_examination->bmi }} Overweight
                                    @else 
                                        {{ $record->medical_exam->physical_examination->bmi }} Obesity
                                    @endif
                                </div> 
                            </div>

                            <!-- 2 tables -->
                            <div class="row">
                                <div class="col">
                                    <table class="table table-sm table-bordered mb-2">
                                        <tr>
                                            <th></th>
                                            <th class="text-center">Normal</th>
                                            <th class="text-center" width="250px">Findings</th>
                                        </tr>

                                        <tr>
                                            <td>General Appearance</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->general_appearance }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['1_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Skin</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination['skin1'] }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['2_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Head and Scalp</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->head_and_scalp }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['3_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Eyes</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->eyes }}
                                            </td>
                                            <td>
                                                @if($record->medical_exam->physical_examination->eyes == 'Yes')
                                                @else
                                                    <div class="row">
                                                        <div class="col-0 ml-4 mr-1">
                                                            {{ $record->medical_exam->physical_examination->medical_exam_response['od_pe_respond'] }}
                                                        </div>
                                                        <div class="col-0">
                                                            <p>/</p>
                                                        </div>
                                                        <div class="col-0 mx-1">
                                                            {{ $record->medical_exam->physical_examination->medical_exam_response['od1_pe_respond'] }}
                                                        </div>
                                                        <div class="col-0">
                                                            <p>OD</p>
                                                        </div>
                                                        <div class="col-0 ml-4 mr-1">
                                                            {{ $record->medical_exam->physical_examination->medical_exam_response['os_pe_respond'] }}
                                                        </div>
                                                        <div class="col-0">
                                                            <p>/</p>
                                                        </div>
                                                        <div class="col-0 mx-1">
                                                            {{ $record->medical_exam->physical_examination->medical_exam_response['os1_pe_respond'] }}
                                                        </div>
                                                        <div class="col-0">
                                                            <p>OS</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">Corrected</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->corrected }}
                                            </td>
                                            <td>
                                                @if($record->medical_exam->physical_examination->corrected == 'Yes')
                                                @else
                                                    <div class="row">
                                                        <div class="col-0 ml-4 mr-1">
                                                            {{ $record->medical_exam->physical_examination->medical_exam_response['od_pe_respond1'] }}
                                                        </div>
                                                        <div class="col-0">
                                                            <p>/</p>
                                                        </div>
                                                        <div class="col-0 mx-1">
                                                            {{ $record->medical_exam->physical_examination->medical_exam_response['od1_pe_respond1'] }}
                                                        </div>
                                                        <div class="col-0">
                                                            <p>OD</p>
                                                        </div>
                                                        <div class="col-0 ml-4 mr-1">
                                                            {{ $record->medical_exam->physical_examination->medical_exam_response['os_pe_respond1'] }}
                                                        </div>
                                                        <div class="col-0">
                                                            <p>/</p>
                                                        </div>
                                                        <div class="col-0 mx-1">
                                                            {{ $record->medical_exam->physical_examination->medical_exam_response['os1_pe_respond1'] }}
                                                        </div>
                                                        <div class="col-0">
                                                            <p>OS</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pupils</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->pupils }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['6_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Ear, Eardrums</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->ear_eardrums }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['7_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Nose, Sinuses</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->nose_sinuses }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['8_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Mouth, Throat</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->mouth_throat }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['9_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Neck, Thyroid</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->neck_thyroid }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['10_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Chest, Breast, Axilla</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->chest_breast_axilla }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['11_pe_respond'] }}</textarea></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col">
                                    <table class="table table-sm table-bordered mb-2">
                                        <tr>
                                            <th></th>
                                            <th class="text-center">Normal</th>
                                            <th class="text-center" width="250px">Findings</th>
                                        </tr>

                                        <tr>
                                            <td>Heart-Cardiovascular</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->heart_cardiovascular }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['12_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Lungs-Respiratory</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->lungs_respiratory }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['13_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Abdomen</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->abdomen }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['14_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Back, Flanks</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->back_flanks }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['15_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Anus, Rectum</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->anus_rectum }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['16_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Genito-Urinary System</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->genito_urinary_system }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['17_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Inguinal, Genitals</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->inguinal_genitals }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['18_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Musculo-Skeletal</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination['musculo_skeletal1'] }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['19_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Extremities</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->extremities }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['20_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Reflexes</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->reflexes }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['21_pe_respond'] }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Neurological</td>
                                            <td class="text-center">
                                                {{ $record->medical_exam->physical_examination->neurological }}
                                            </td>
                                            <td><textarea class="form-control" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response['22_pe_respond'] }}</textarea></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- Diagnosis -->
                            <h4 class="my-1"><strong>DIAGNOSIS:</strong></h4>
                            <div class="container border mb-3">
                                <div class="row">
                                    <div class="col pt-3">
                                        <textarea class="form-control mb-2" readonly>{{ $record->medical_exam->physical_examination->medical_exam_response->diagnosis }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @else
                        <div class="text-center">
                            <p>No medical exam has been made. <a href="{{ route('nurse.medExamCreate', $record->id) }}">Create now.</a></p>
                        </div>
                    @endif
                </div>

                <!-- Dental Exam -->
                <div id="dental-exam-content" class="mini-content pt-1">
                    @if(isset($record->dental_exam))
                        @if(isset($record) && !empty($record))
                            <div class="container" style="height: 265px; overflow: auto;">
                            <div class="row">
                                <div class="col">
                                    <h3 class="mt-2"><strong>INTRAORAL EXAMINATION</strong></h3>
                                </div>
                                <div class="col text-right">
                                    <a class="btn btn-primary px-4" href="{{ route('nurse.dentalExamEdit', $record->dental_exam->id) }}">Update</a>
                                </div>
                            </div>

                                <!-- Oral Hygiene -->
                                <div class="row mx-auto">
                                    <div class="col-0" style="margin-right: 387px;margin-left: 85px;">
                                        <p class="h5">Oral Hygiene</p>
                                    </div>
                                    <div class="col-2 mx-auto text-center pt-1">
                                        {{ $record->dental_exam->dental_exam_response->oral_hygiene }}
                                    </div>
                                </div>

                                <!-- Gingival Color -->
                                <div class="row mx-auto">
                                    <div class="col-0" style="margin-right: 387px;margin-left: 75px;">
                                        <p class="h5">Gingival Color</p>
                                    </div>
                                    <div class="col-2 mx-auto text-center pt-1">
                                        {{ $record->dental_exam->dental_exam_response->gingival_color }}
                                    </div>
                                </div>

                                <!-- Consistency of the Gingival -->
                                <div class="row mx-auto">
                                    <div class="col-0" style="margin-right: 335px;margin-left: 25px;">
                                        <p class="h5">Consistency of the Gingival</p>
                                    </div>
                                    <div class="col-2 mx-auto text-center pt-1">
                                        {{ $record->dental_exam->dental_exam_response->consistency_of_the_gingival }}
                                    </div>
                                </div>

                                <!-- Oral Prophylaxis -->
                                <div class="row mx-auto">
                                    <div class="col-0" style="margin-right: 387px;margin-left: 25px;">
                                        <p class="ml-5 h5">Oral Prophylaxis</p>
                                    </div>
                                    <div class="col-2 mx-auto text-center pt-1">
                                        {{ $record->dental_exam->dental_exam_response->oral_prophylaxis }}
                                    </div>
                                </div>

                                <!-- Restoration of: -->
                                <div class="row mt-1 my-2">
                                    @if($record->dental_exam->dental_exam_response->restoration == 'No')
                                        <div class="row">
                                            <div class="col-0" style="margin-left: 25px;">
                                                <p class="h5" style="margin-left: 55px; width: 165px;">Restoration of:</p>
                                            </div>
                                            <div class="col-0" style="margin-left: 485px;">
                                                <p class="h5" style="margin-left: 55px; width: 165px;">{{ $record->dental_exam->dental_exam_response->restoration }}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row" style="width: 155px; padding-top: 65px;">
                                            <div class="col-0" style="margin-right: 370px;margin-left: 25px;">
                                                <p class="h5" style="margin-left: 78px; width: 125px;">Restoration of:</p>
                                            </div>
                                        </div>
                                        
                                        <div class="row-0">
                                            <!-- Numbers -->
                                            <div class="row" style="margin-left: 265px;">
                                                <!-- Left -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                                        <div class="col-0" style="margin-left: 15px;">
                                                            <p>8</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>7</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 28px;">
                                                            <p>6</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>5</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>4</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>3</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>2</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>1</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                                        <div class="col-0" style="margin-left: 22px;">
                                                            <p>1</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>2</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 28px;">
                                                            <p>3</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>4</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>5</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>6</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>7</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>8</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Top -->
                                            <div class="row" style="margin-left: 265px;">
                                                <!-- Left -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-right: 5px; border-right: 1px solid; border-bottom: 1px solid;">
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lt8'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lt7'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lt6'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lt5'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lt4'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lt3'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lt2'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lt1'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-left: 5px; border-left: 1px solid; border-bottom: 1px solid;">
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rt1'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rt2'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rt3'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rt4'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rt5'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rt6'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rt7'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rt8'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Bottom -->
                                            <div class="row" style="margin-left: 265px;">
                                                <!-- Left -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px; border-right: 1px solid; border-top: 1px solid;">
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lb8'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lb7'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lb6'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lb5'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lb4'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lb3'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lb2'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_lb1'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-left: 5px; padding-top: 5px; border-left: 1px solid; border-top: 1px solid;">
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rb1'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rb2'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rb3'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rb4'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rb5'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rb6'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rb7'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_restoration['restoration_rb8'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Numbers -->
                                            <div class="row" style="margin-left: 265px;">
                                                <!-- Left -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                                        <div class="col-0" style="margin-left: 15px;">
                                                            <p>8</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>7</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 28px;">
                                                            <p>6</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>5</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>4</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>3</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>2</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>1</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                                        <div class="col-0" style="margin-left: 22px;">
                                                            <p>1</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>2</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 28px;">
                                                            <p>3</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>4</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>5</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>6</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>7</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>8</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                <!-- Tooth Extraction of: -->
                                <div class="row mt-3">
                                    @if($record->dental_exam->dental_exam_response->extraction == 'No')
                                        <div class="row">
                                            <div class="col-0" style="margin-left: 25px;">
                                                <p class="h5" style="margin-left: 55px; width: 165px;">Tooth Extraction of:</p>
                                            </div>
                                            <div class="col-0" style="margin-left: 485px;">
                                                <p class="h5" style="margin-left: 55px; width: 165px;">{{ $record->dental_exam->dental_exam_response->extraction }}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row" style="width: 203px; padding-top: 65px;">
                                            <div class="col-0" style="margin-right: 370px;margin-left: 25px;">
                                                <p class="h5" style="margin-left: 55px; width: 165px;">Tooth Extraction of:</p>
                                            </div>
                                        </div>
                                        
                                        <div class="row-0">
                                            <!-- Numbers -->
                                            <div class="row" style="margin-left: 217px;">
                                                <!-- Left -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                                        <div class="col-0" style="margin-left: 15px;">
                                                            <p>8</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>7</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 28px;">
                                                            <p>6</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>5</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>4</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>3</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>2</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>1</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                                        <div class="col-0" style="margin-left: 22px;">
                                                            <p>1</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>2</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 28px;">
                                                            <p>3</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>4</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>5</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>6</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>7</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>8</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Top -->
                                            <div class="row" style="margin-left: 217px;">
                                                <!-- Left -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-right: 5px; border-right: 1px solid; border-bottom: 1px solid;">
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lt8'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lt7'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lt6'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lt5'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lt4'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lt3'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lt2'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lt1'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-left: 5px; border-left: 1px solid; border-bottom: 1px solid;">
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rt1'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rt2'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rt3'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rt4'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rt5'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rt6'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rt7'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rt8'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Bottom -->
                                            <div class="row" style="margin-left: 217px;">
                                                <!-- Left -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px; border-right: 1px solid; border-top: 1px solid;">
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lb8'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lb7'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lb6'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lb5'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lb4'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lb3'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lb2'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_lb1'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-left: 5px; padding-top: 5px; border-left: 1px solid; border-top: 1px solid;">
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rb1'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rb2'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rb3'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rb4'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rb5'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rb6'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rb7'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                        <div class="col-0">
                                                            @if($record->dental_exam->dental_exam_response->dental_exam_extraction['extraction_rb8'] == 'Yes')
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" checked disabled>
                                                            @else
                                                                <input type="checkbox" class="custom-checkbox col-0 ml-1" disabled>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Numbers -->
                                            <div class="row" style="margin-left: 217px;">
                                                <!-- Left -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                                        <div class="col-0" style="margin-left: 15px;">
                                                            <p>8</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>7</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 28px;">
                                                            <p>6</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>5</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>4</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>3</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>2</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>1</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Right -->
                                                <div class="col">
                                                    <div class="row" style="width: 278px; padding-right: 5px; padding-top: 5px;">
                                                        <div class="col-0" style="margin-left: 22px;">
                                                            <p>1</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>2</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 28px;">
                                                            <p>3</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 25px;">
                                                            <p>4</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>5</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>6</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>7</p>
                                                        </div>
                                                        <div class="col-0" style="margin-left: 26px;">
                                                            <p>8</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Prosthodontic Restoration -->
                                <div class="row mt-1">
                                    <div class="col-0" style="margin-right: 370px;margin-left: 54px;">
                                        <p class="h5">Prosthodontic Restoration</p>
                                    </div>
                                    <div class="col-1 mx-auto pt-1">
                                        {{ $record->dental_exam->dental_exam_response->prosthodontic_restoration }}
                                    </div>
                                </div>

                                <!-- See an Orthodontist -->
                                <div class="row my-3">
                                    <div class="col-0" style="margin-right: 400px;margin-left: 75px;">
                                        <p class="h5">See an Orthodontist</p>
                                    </div>
                                    <div class="col-1 mx-auto pt-1">
                                        {{ $record->dental_exam->dental_exam_response->orthodontist }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="text-center">
                            <p>No dental exam has been made. <a href="{{ route('nurse.dentalExamCreate', $record->id) }}">Create now.</a></p></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .custom-checkbox {
            height: 25px;
            width: 30px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 1px solid #ccc;
            border-radius: 3px;
            outline: none;
            background-color: #fff;
        }

        .custom-checkbox:checked {
            background-color: #e9ecef;
        }

        .custom-checkbox:disabled {
            opacity: 1;
            cursor: not-allowed;
            height: 25px;
            width: 30px;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.show-content').click(function() {
                // Hide all content divs
                $('.mini-content').hide();
            
                // Show the selected content div
                var target = $(this).data('content-target');
                $(target).show();
            
                // Add 'active' class to the clicked content button and remove it from others
                $('.show-content').removeClass('active');
                $(this).addClass('active');
            });

            $('.show-date').click(function() {
                // Hide all date divs
                $('.mini-date').hide();
            
                // Show the selected date div
                var target = $(this).data('date-target');
                $(target).show();
            
                // Add 'active' class to the clicked date button and remove it from others
                $('.show-date').removeClass('active');
                $(this).addClass('active');
            });

            // Hide all content and date divs on page load
            $('.mini-content').hide();
            $('.mini-date').hide();
        });
    </script>
@stop