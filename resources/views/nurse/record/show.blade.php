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

    <div class="mx-auto" style="width: 1200px;">
        <div class="row">
            <!-- Date of specific item -->
            <div class="col-2 border">
                <div id="consultation-date" class="mini-date">
                    <p>Consultation Date Here</p>
                </div>
                <div id="medical-exam-date" class="mini-date">
                    @if(isset($record->medical_exam))
                        <a><strong>Created at:</strong> {{ $record->medical_exam->date_created }}</a>
                    @else
                        <p>No medical exam data available.</p>
                    @endif
                </div>
                <div id="dental-exam-date" class="mini-date">
                    <p>Dental Exam Date Here</p>
                </div>
                <div id="emergency-report-date" class="mini-date">
                    <p>Emergency Date Here</p>
                </div>
            </div>

            <!-- Content of specific item -->
            <div class="col border">
                <!-- Consultation -->
                <div id="consultation-content" class="mini-content pt-1">
                    @if(isset($record->consultation))
                        <!-- Consultation content -->
                    @else
                        <div class="text-center">
                            <p>No consultation has been made. <a href="{{ route('nurse.medExamCreate', $record->id) }}">Create now.</a></p>
                        </div>
                    @endif
                </div>

                <!-- Medical Exam -->
                <div id="medical-exam-content" class="mini-content pt-1">
                    @if(isset($record->medical_exam))
                    @if(isset($record) && !empty($record))
                            <div class="container" style="height: 275px; overflow: auto;">
                                <h3><strong>I. Medical History</strong></h3>
                                <div class="row row-cols-3">
                                    <!-- Past Medical History -->
                                    <div class="col">
                                        <div class="text-center">
                                            <h5><strong>A. Past Medical Exam</strong></h5>
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
                                            <h5><strong>B. Family History</strong></h5>
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

                                        <!-- Personal and Social History -->
                                        <div class="text-center">
                                            <h5><strong>C. Personal and Social History</strong></h5>
                                        </div>
                                        <div class="container border px-3">
                                            <div class="row my-3">
                                                <div class="col-0">
                                                    <p class="mr-1"><strong>Smoker:</strong></p>
                                                </div>
                                                @if($record->medical_exam->personal_and_social_history->smoker == "Yes")
                                                    <div class="col-0">
                                                        <p class="mr-3">{{ $record->medical_exam->personal_and_social_history->stick }} sticks/day</p>
                                                    </div>
                                                    <div class="col-0">
                                                        <p>{{ $record->medical_exam->personal_and_social_history->pack }} pack year/s</p>
                                                    </div>
                                                @else
                                                    <div class="col-0">
                                                        <p>
                                                            {{ $record->medical_exam->personal_and_social_history->smoker }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-0">
                                                    <p class="mr-1"><strong>Alcoholic:</strong></p>
                                                </div>
                                                @if($record->medical_exam->personal_and_social_history->alcoholic == "Yes")
                                                    <div class="col-0">
                                                        <p class="mr-3">{{ $record->medical_exam->personal_and_social_history->frequent }} bottles/shot</p>
                                                    </div>
                                                    <div class="col-0">
                                                        <p>{{ $record->medical_exam->personal_and_social_history->week }} /week</p>
                                                    </div>
                                                @else
                                                    <div class="col-0">
                                                        <p>
                                                            {{ $record->medical_exam->personal_and_social_history->alcoholic }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-0">
                                                    <p class="mr-1"><strong>Medication:</strong></p>
                                                </div>
                                                @if($record->medical_exam->personal_and_social_history->medication == "Yes")
                                                    <div class="col-0">
                                                        <p>{{ $record->medical_exam->personal_and_social_history->take }}</p>
                                                    </div>
                                                @else
                                                    <div class="col-0">
                                                        <p>
                                                            {{ $record->medical_exam->personal_and_social_history->medication }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- OB-GYNE History -->
                                    <div class="col">
                                        <div class="text-center">
                                            <h5><strong>D. OB-GYNE History</strong></h6>
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
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['1_positive1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>OB Score</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->ob_gyne_history->ob_score }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['2_positive1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Abnormal Pregnancies</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->ob_gyne_history->abnormal_pregnancies }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['3_positive1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Date of Last Delivery</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->ob_gyne_history->date_of_last_delivery }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['4_positive1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Breast/Uterus/Ovaries</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->ob_gyne_history->breast_uterus_ovaries }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['5_positive1'] }}</td>
                                                </tr>
                                            </table>

                                            <!-- Hospitalization and Operation -->
                                            <div class="container border mt-2 pt-2">
                                                <div class="row">
                                                    @if($record->medical_exam->personal_and_social_history->hospitalization == "Yes")
                                                        <div class="col-0 mb-3">
                                                            <p class="h5 mr-1"><strong>E. Hospitalization/s:</strong> {{ $record->medical_exam->personal_and_social_history->hospitalization }}</p>
                                                        </div>
                                                    @else
                                                        <div class="col-0 mb-3">
                                                            <p class="h5 mr-1"><strong>E. Hospitalization/s:</strong> {{ $record->medical_exam->personal_and_social_history->hosp_times }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    @if($record->medical_exam->personal_and_social_history->operation == "Yes")
                                                        <div class="col-0">
                                                            <p class="h5 mr-1"><strong>F. Operation/s:</strong> {{ $record->medical_exam->personal_and_social_history->operation }}</p>
                                                        </div>
                                                    @else
                                                        <div class="col-0">
                                                            <p class="h5 mr-1"><strong>F. Operation/s:</strong> {{ $record->medical_exam->personal_and_social_history->op_times }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Review of System -->
                                            <div class="text-center">
                                                <h5><strong>G. Review of System</strong></h5>
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
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['1_positive2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Opthalmologic</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->review_of_system->opthalmologic }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['2_positive2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ENT</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->review_of_system->ent }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['3_positive2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Cardiovascular</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->review_of_system->cardiovascular }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['4_positive2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Respiratory</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->review_of_system->respiratory }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['5_positive2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Gastro Intestinal</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->review_of_system->gastro_intestinal }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['6_positive2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Neuro-Psychiatric</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->review_of_system->neuro_psychiatric }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['7_positive2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Hematology</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->review_of_system->hematology }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['8_positive2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Genitourinary</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->review_of_system->genitourinary }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['9_positive2'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Musculo-Skeletal</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->review_of_system->musculo_skeletal }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->ob_gyne_history->ob_gyne_history_positive['10_positive2'] }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                            
                                    <h3><strong>II. Physical Examination</strong></h3>
                                    <div class="row mx-auto mb-3">
                                        <div class="col border">
                                            <p class="mb-1"><strong>Height:</strong></p>
                                            <div class="row">
                                                <div class="col-0 ml-2">
                                                    {{ $record->medical_exam->physical_examination->height }}
                                                </div>
                                                <div class="col-0">
                                                    <p>cm.</p>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col border">
                                            <p class="mb-1"><strong>Weight:</strong></p>
                                            <div class="row">
                                                <div class="col-0 ml-2">
                                                    {{ $record->medical_exam->physical_examination->weight }}
                                                </div>
                                                <div class="col-0">
                                                    <p>kg.</p>
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
                                                <div class="col">
                                                    {{ $record->medical_exam->physical_examination['bp2'] }}
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col border">
                                            <p class="mb-1"><strong>Cardiac Rate:</strong></p>
                                            {{ $record->medical_exam->physical_examination->cardiac_rate }}
                                        </div> 
                                        <div class="col border">
                                            <p class="mb-1"><strong>Respiratory Rate</strong></p>
                                            {{ $record->medical_exam->physical_examination->respiratory_rate }}
                                        </div> 
                                        <div class="col border">
                                            <p class="mb-1"><strong>BMI:</strong></p>
                                            {{ $record->medical_exam->physical_examination->bmi }}
                                        </div> 
                                    </div>

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
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['1_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Skin</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->skin1 }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['2_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Head and Scalp</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->head_and_scalp }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['3_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Eyes</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->eyes }}
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-0">
                                                                {{ $record->medical_exam->physical_examination->physical_examination_finding['od_findings1'] }}
                                                            </div>
                                                            <div class="col-0">
                                                                <p>/</p>
                                                            </div>
                                                            <div class="col-0">
                                                                {{ $record->medical_exam->physical_examination->physical_examination_finding['od1_findings1'] }}
                                                            </div>
                                                            <div class="col-0">
                                                                <p>OD</p>
                                                            </div>
                                                            <div class="col-0">
                                                                {{ $record->medical_exam->physical_examination->physical_examination_finding['os_findings1'] }}
                                                            </div>
                                                            <div class="col-0">
                                                                <p>/</p>
                                                            </div>
                                                            <div class="col-0">
                                                                {{ $record->medical_exam->physical_examination->physical_examination_finding['os1_findings1'] }}
                                                            </div>
                                                            <div class="col-0">
                                                                <p>OS</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Corrected</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->corrected }}
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-0">
                                                                {{ $record->medical_exam->physical_examination->physical_examination_finding['od_findings2'] }}
                                                            </div>
                                                            <div class="col-0">
                                                                <p>/</p>
                                                            </div>
                                                            <div class="col-0">
                                                                {{ $record->medical_exam->physical_examination->physical_examination_finding['od1_findings2'] }}
                                                            </div>
                                                            <div class="col-0">
                                                                <p>OD</p>
                                                            </div>
                                                            <div class="col-0">
                                                                {{ $record->medical_exam->physical_examination->physical_examination_finding['os_findings2'] }}
                                                            </div>
                                                            <div class="col-0">
                                                                <p>/</p>
                                                            </div>
                                                            <div class="col-0">
                                                                {{ $record->medical_exam->physical_examination->physical_examination_finding['os1_findings2'] }}
                                                            </div>
                                                            <div class="col-0">
                                                                <p>OS</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pupils</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->pupils }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['6_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ear, Eardrums</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->ear_eardrums }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['7_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nose, Sinuses</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->nose_sinuses }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['8_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mouth, Throat</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->mouth_throat }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['9_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Neck, Thyroid</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->neck_thyroid }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['10_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Chest, Breast, Axilla</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->chest_breast_axilla }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['11_findings1'] }}</td>
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
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['12_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Lungs-Respiratory</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->lungs_respiratory }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['13_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Abdomen</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->abdomen }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['14_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Back, Flanks</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->back_flanks }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['15_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Anus, Rectum</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->anus_rectum }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['16_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Genito-Urinary System</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->urinary_system }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['17_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Inguinal, Genitals</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->inguinal_genitals }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['18_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Musculo-Skeletal</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->musculo_skeletal1 }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['19_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Extremities</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->extremities }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['20_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Reflexes</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->reflexes }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['21_findings1'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Neurological</td>
                                                    <td class="text-center">
                                                        {{ $record->medical_exam->physical_examination->neurological }}
                                                    </td>
                                                    <td>{{ $record->medical_exam->physical_examination->physical_examination_finding['22_findings1'] }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <h4><strong>DIAGNOSIS:</strong></h4>
                                    <div class="row mx-auto mb-3">
                                        {{ $record->medical_exam->physical_examination->physical_examination_finding->diagnosis }}
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
                    @if(isset($dental_exam))
                        <!-- Dental exam content -->
                    @else
                        <div class="text-center">
                            <p>No dental exam has been made.</p>
                        </div>
                    @endif
                </div>

                <!-- Emergency Report -->
                <div id="emergency-report-content" class="mini-content pt-1">
                    @if(isset($record->medical_report))
                        <!-- Emergency report content -->
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

            // Hide all content and date divs on page load
            $('.mini-content').hide();
            $('.mini-date').hide();
        });
    </script>
@stop