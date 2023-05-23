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

    <!-- Genral Information -->
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
            <button type="button" class="col btn btn-danger ml-1 show-content show-date" data-content-target="#emergency-report-content" data-date-target="#emergency-report-date">Emergency Report</button>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="row">
            <div class="col-2 border">
                <div id="consultation-date" class="mini-date">
                    <p>Consultation Date Here</p>
                </div>
                <div id="medical-exam-date" class="mini-date">
                    <p>Medical Exam Date Here</p>
                </div>
                <div id="dental-exam-date" class="mini-date">
                    <p>Dental Exam Date Here</p>
                </div>
                <div id="emergency-report-date" class="mini-date">
                    <p>Emergency Date Here</p>
                </div>
            </div>
            <div class="col border">
                <!-- Consultation -->
                <div id="consultation-content" class="mini-content">
                    @if(isset($consultation))
                        
                    @else
                        
                        <div class="text-center">
                            <p>No consultation has been made.</p>
                        </div>
                    @endif
                </div>

                <!-- Medical Exam -->
                <div id="medical-exam-content" class="mini-content pt-1">
                    @if(isset($record->medical_exam))
                        @if(isset($record) && !empty($record))
                            <div class="container" style="height: 288px; overflow: auto;">
                                <div class="row row-cols-3">
                                    <!-- Past Medical History -->
                                    <div class="col mr-2">
                                        <div class="text-center">
                                            <h5><strong>Past Medical Exam</strong></h5>
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
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['1_findings'] }}</td>
                                            </tr>

                                            <tr>
                                                <td>Skin Disease</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->skin_disease }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['2_findings'] }}</td>
                                            </tr>

                                            <tr>
                                                <td>Opthalmologic Disorder</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->opthalmologic_disorder }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['3_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>ENT Disorder</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->ent_disorder }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['4_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Bronchial Asthma</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->bronchial_asthma }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['5_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Cardiac Disorder</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->cardiac_disorder }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['6_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Diabetes Melilitus</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->diabetes_melilitus }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['7_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Chronic Headache/Migraine</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->chronic_headache_or_migraine }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['8_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Hepatitis</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->hepatitis }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['9_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Hypertension</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->hypertension }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['10_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Thyroid Disorder</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->thyroid_disorder }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['11_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Blood Disorder</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->blood_disorder }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['12_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tuberculosis</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->tuberculosis }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['13_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Peptic Ulcer</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->peptic_ulcer }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['14_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Musculoskeletal Disorder</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->musculoskeletal_disorder }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['15_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Infectious Disease</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->past_medical_history->infectious_disease }}
                                                </td>
                                                <td>{{ $record->medical_exam->past_medical_history->past_medical_history_finding['16_findings'] }}</td>
                                            </tr>
                                            <tr>
                                                <td >Others</td>
                                                <td colspan="2">
                                                    {{ $record->medical_exam->past_medical_history->others }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!-- Family History -->
                                    <div class="col">
                                        <div class="text-center">
                                            <h5><strong>Family History</strong></h5>
                                        </div>
                                        <table class="table table-sm table-bordered">
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
                                                <td>{{ $record->medical_exam->family_history->family_history_positive['1_positive'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Diabetes Melilitus</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->family_history['diabetes_melilitus_1'] }}
                                                </td>
                                                <td>{{ $record->medical_exam->family_history->family_history_positive['2_positive'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Thyroid Disorder</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->family_history['thyroid_disorder_1'] }}
                                                </td>
                                                <td>{{ $record->medical_exam->family_history->family_history_positive['3_positive'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Opthalmologic Disease</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->family_history->opthalmologic_disease }}
                                                </td>
                                                <td>{{ $record->medical_exam->family_history->family_history_positive['4_positive'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Cancer</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->family_history->cancer }}
                                                </td>
                                                <td>{{ $record->medical_exam->family_history->family_history_positive['5_positive'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Cardiac Disorder</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->family_history['cardiac_disorder_1'] }}
                                                </td>
                                                <td>{{ $record->medical_exam->family_history->family_history_positive['6_positive'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Hypertension</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->family_history['hypertension_1'] }}
                                                </td>
                                                <td>{{ $record->medical_exam->family_history->family_history_positive['7_positive'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tuberculosis</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->family_history['tuberculosis_1'] }}
                                                </td>
                                                <td>{{ $record->medical_exam->family_history->family_history_positive['8_positive'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nervous Disorder</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->family_history->nervous_disorder }}
                                                </td>
                                                <td>{{ $record->medical_exam->family_history->family_history_positive['9_positive'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Musculoskeletal</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->family_history->musculoskeletal }}
                                                </td>
                                                <td>{{ $record->medical_exam->family_history->family_history_positive['10_positive'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Liver Disease</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->family_history->liver_disease }}
                                                </td>
                                                <td>{{ $record->medical_exam->family_history->family_history_positive['11_positive'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kidney Disease</td>
                                                <td class="text-center">
                                                    {{ $record->medical_exam->family_history->kidney_disease }}
                                                </td>
                                                <td>{{ $record->medical_exam->family_history->family_history_positive['12_positive'] }}</td>
                                            </tr>
                                            <tr>
                                                <td >Others</td>
                                                <td colspan="2">
                                                    {{ $record->medical_exam->family_history['others_1'] }}
                                                </td>
                                            </tr>
                                        </table>
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
                <div id="dental-exam-content" class="mini-content">
                    @if(isset($dental_exam))
                        
                    @else
                        <div class="text-center">
                            <p>No dental exam has been made.</p>
                        </div>
                    @endif
                </div>
                
                <!-- Emergency Report -->
                <div id="emergency-report-content" class="mini-content">
                    @if(isset($medical_report))
    
                    @else
                        <div class="text-center">
                            <p>No emergency report has been made.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
        });

        // Hide all content and date divs on page load
        $('.mini-content').hide();
        $('.mini-date').hide();
    </script>
@stop