@extends('adminlte::page')

@section('title', 'Update Medical Examination Record')

@section('content_header')
    <h1>Updating Medical Examination Record</h1>
@stop

@section('content')
    <div class="container mx-auto pb-4" style="height: 625px; overflow: auto;">
        <form method="POST" action="{{ route('doctor.medExamUpdate', $medical_exam->id) }}">
            @csrf
            @method('PUT')
            <!-- Record ID Created (Hidden) -->
            <input type="hidden" name="record_id" value="{{ $medical_exam->record->id }}">
            <input type="hidden" name="date_updated" value="{{ now() }}">

            <!-- Medical History -->
            <h2><strong>I. Medical History</strong></h2>
            <div class="row row-cols-3">
                <div class="col">
                    <!-- Past Medical History -->
                    <div class="text-center">
                        <h3><strong>A. Past Medical Exam</strong></h3>
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
                                @if($medical_exam->past_medical_history->allergies == "Yes")
                                    <input type="checkbox" id="allergies" name="allergies" value="Yes" onchange="toggleTextareaAndHidden('allergies', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="allergiesHidden" name="allergies" value="Yes">
                                @else
                                    <input type="checkbox" id="allergies" name="allergies" value="Yes" onchange="toggleTextareaAndHidden('allergies', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->allergies == "No")
                                    <textarea class="form-control" name="1_pm_respond" id="findingsTextarea_allergies" required>{{ $medical_exam->past_medical_history->medical_exam_response['1_pm_respond'] }}</textarea>
                                    <input type="hidden" id="allergiesRepHidden" name="1_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="1_pm_respond" id="findingsTextarea_allergies" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Skin Disease</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->skin_disease == "Yes")
                                    <input type="checkbox" id="skin_disease" name="skin_disease" value="Yes" onchange="toggleTextareaAndHidden('skin_disease', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="skin_diseaseHidden" name="skin_disease" value="Yes">
                                @else
                                    <input type="checkbox" id="skin_disease" name="skin_disease" value="Yes" onchange="toggleTextareaAndHidden('skin_disease', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->skin_disease == "No")
                                    <textarea class="form-control" name="2_pm_respond" id="findingsTextarea_skin_disease" required>{{ $medical_exam->past_medical_history->medical_exam_response['2_pm_respond'] }}</textarea>
                                    <input type="hidden" id="skin_diseaseRepHidden" name="2_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="2_pm_respond" id="findingsTextarea_skin_disease" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Opthalmologic Disorder</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->opthalmologic_disorder == "Yes")
                                    <input type="checkbox" id="opthalmologic_disorder" name="opthalmologic_disorder" value="Yes" onchange="toggleTextareaAndHidden('opthalmologic_disorder', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="opthalmologic_disorderHidden" name="opthalmologic_disorder" value="Yes">
                                @else
                                    <input type="checkbox" id="opthalmologic_disorder" name="opthalmologic_disorder" value="Yes" onchange="toggleTextareaAndHidden('opthalmologic_disorder', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->opthalmologic_disorder == "No")
                                    <textarea class="form-control" name="3_pm_respond" id="findingsTextarea_opthalmologic_disorder" required>{{ $medical_exam->past_medical_history->medical_exam_response['3_pm_respond'] }}</textarea>
                                    <input type="hidden" id="opthalmologic_disorderRepHidden" name="3_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="3_pm_respond" id="findingsTextarea_opthalmologic_disorder" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>ENT Disorder</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->ent_disorder == "Yes")
                                    <input type="checkbox" id="ent_disorder" name="ent_disorder" value="Yes" onchange="toggleTextareaAndHidden('ent_disorder', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="ent_disorderHidden" name="ent_disorder" value="Yes">
                                @else
                                    <input type="checkbox" id="ent_disorder" name="ent_disorder" value="Yes" onchange="toggleTextareaAndHidden('ent_disorder', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->ent_disorder == "No")
                                    <textarea class="form-control" name="4_pm_respond" id="findingsTextarea_ent_disorder" required>{{ $medical_exam->past_medical_history->medical_exam_response['4_pm_respond'] }}</textarea>
                                    <input type="hidden" id="ent_disorderRepHidden" name="4_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="4_pm_respond" id="findingsTextarea_ent_disorder" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Bronchial Asthma</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->bronchial_asthma == "Yes")
                                    <input type="checkbox" id="bronchial_asthma" name="bronchial_asthma" value="Yes" onchange="toggleTextareaAndHidden('bronchial_asthma', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="bronchial_asthmaHidden" name="bronchial_asthma" value="Yes">
                                @else
                                    <input type="checkbox" id="bronchial_asthma" name="bronchial_asthma" value="Yes" onchange="toggleTextareaAndHidden('bronchial_asthma', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->bronchial_asthma == "No")
                                    <textarea class="form-control" name="5_pm_respond" id="findingsTextarea_bronchial_asthma" required>{{ $medical_exam->past_medical_history->medical_exam_response['5_pm_respond'] }}</textarea>
                                    <input type="hidden" id="bronchial_asthmaRepHidden" name="5_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="5_pm_respond" id="findingsTextarea_bronchial_asthma" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Cardiac Disorder</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->cardiac_disorder == "Yes")
                                    <input type="checkbox" id="cardiac_disorder" name="cardiac_disorder" value="Yes" onchange="toggleTextareaAndHidden('cardiac_disorder', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="cardiac_disorderHidden" name="cardiac_disorder" value="Yes">
                                @else
                                    <input type="checkbox" id="cardiac_disorder" name="cardiac_disorder" value="Yes" onchange="toggleTextareaAndHidden('cardiac_disorder', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->cardiac_disorder == "No")
                                    <textarea class="form-control" name="6_pm_respond" id="findingsTextarea_cardiac_disorder" required>{{ $medical_exam->past_medical_history->medical_exam_response['6_pm_respond'] }}</textarea>
                                    <input type="hidden" id="cardiac_disorderRepHidden" name="6_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="6_pm_respond" id="findingsTextarea_cardiac_disorder" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Diabetes Melilitus</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->diabetes_melilitus == "Yes")
                                    <input type="checkbox" id="diabetes_melilitus" name="diabetes_melilitus" value="Yes" onchange="toggleTextareaAndHidden('diabetes_melilitus', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="diabetes_melilitusHidden" name="diabetes_melilitus" value="Yes">
                                @else
                                    <input type="checkbox" id="diabetes_melilitus" name="diabetes_melilitus" value="Yes" onchange="toggleTextareaAndHidden('diabetes_melilitus', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->diabetes_melilitus == "No")
                                    <textarea class="form-control" name="7_pm_respond" id="findingsTextarea_diabetes_melilitus" required>{{ $medical_exam->past_medical_history->medical_exam_response['7_pm_respond'] }}</textarea>
                                    <input type="hidden" id="diabetes_melilitusRepHidden" name="7_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="7_pm_respond" id="findingsTextarea_diabetes_melilitus" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Chronic Headache/Migraine</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->chronic_headache_or_migraine == "Yes")
                                    <input type="checkbox" id="chronic_headache_or_migraine" name="chronic_headache_or_migraine" value="Yes" onchange="toggleTextareaAndHidden('chronic_headache_or_migraine', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="chronic_headache_or_migraineHidden" name="chronic_headache_or_migraine" value="Yes">
                                @else
                                    <input type="checkbox" id="chronic_headache_or_migraine" name="chronic_headache_or_migraine" value="Yes" onchange="toggleTextareaAndHidden('chronic_headache_or_migraine', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->chronic_headache_or_migraine == "No")
                                    <textarea class="form-control" name="8_pm_respond" id="findingsTextarea_chronic_headache_or_migraine" required>{{ $medical_exam->past_medical_history->medical_exam_response['8_pm_respond'] }}</textarea>
                                    <input type="hidden" id="chronic_headache_or_migraineRepHidden" name="8_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="8_pm_respond" id="findingsTextarea_chronic_headache_or_migraine" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Hepatitis</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->hepatitis == "Yes")
                                    <input type="checkbox" id="hepatitis" name="hepatitis" value="Yes" onchange="toggleTextareaAndHidden('hepatitis', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="hepatitisHidden" name="hepatitis" value="Yes">
                                @else
                                    <input type="checkbox" id="hepatitis" name="hepatitis" value="Yes" onchange="toggleTextareaAndHidden('hepatitis', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->hepatitis == "No")
                                    <textarea class="form-control" name="9_pm_respond" id="findingsTextarea_hepatitis" required>{{ $medical_exam->past_medical_history->medical_exam_response['9_pm_respond'] }}</textarea>
                                    <input type="hidden" id="hepatitisRepHidden" name="9_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="9_pm_respond" id="findingsTextarea_hepatitis" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Hypertension</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->hypertension == "Yes")
                                    <input type="checkbox" id="hypertension" name="hypertension" value="Yes" onchange="toggleTextareaAndHidden('hypertension', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="hypertensionHidden" name="hypertension" value="Yes">
                                @else
                                    <input type="checkbox" id="hypertension" name="hypertension" value="Yes" onchange="toggleTextareaAndHidden('hypertension', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->hypertension == "No")
                                    <textarea class="form-control" name="10_pm_respond" id="findingsTextarea_hypertension" required>{{ $medical_exam->past_medical_history->medical_exam_response['10_pm_respond'] }}</textarea>
                                    <input type="hidden" id="hypertensionRepHidden" name="10_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="10_pm_respond" id="findingsTextarea_hypertension" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Thyroid Disorder</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->thyroid_disorder == "Yes")
                                    <input type="checkbox" id="thyroid_disorder" name="thyroid_disorder" value="Yes" onchange="toggleTextareaAndHidden('thyroid_disorder', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="thyroid_disorderHidden" name="thyroid_disorder" value="Yes">
                                @else
                                    <input type="checkbox" id="thyroid_disorder" name="thyroid_disorder" value="Yes" onchange="toggleTextareaAndHidden('thyroid_disorder', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->thyroid_disorder == "No")
                                    <textarea class="form-control" name="11_pm_respond" id="findingsTextarea_thyroid_disorder" required>{{ $medical_exam->past_medical_history->medical_exam_response['11_pm_respond'] }}</textarea>
                                    <input type="hidden" id="thyroid_disorderRepHidden" name="11_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="11_pm_respond" id="findingsTextarea_thyroid_disorder" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Blood Disorder</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->blood_disorder == "Yes")
                                    <input type="checkbox" id="blood_disorder" name="blood_disorder" value="Yes" onchange="toggleTextareaAndHidden('blood_disorder', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="blood_disorderHidden" name="blood_disorder" value="Yes">
                                @else
                                    <input type="checkbox" id="blood_disorder" name="blood_disorder" value="Yes" onchange="toggleTextareaAndHidden('blood_disorder', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->blood_disorder == "No")
                                    <textarea class="form-control" name="12_pm_respond" id="findingsTextarea_blood_disorder" required>{{ $medical_exam->past_medical_history->medical_exam_response['12_pm_respond'] }}</textarea>
                                    <input type="hidden" id="blood_disorderRepHidden" name="12_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="12_pm_respond" id="findingsTextarea_blood_disorder" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Tuberculosis</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->tuberculosis == "Yes")
                                    <input type="checkbox" id="tuberculosis" name="tuberculosis" value="Yes" onchange="toggleTextareaAndHidden('tuberculosis', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="tuberculosisHidden" name="tuberculosis" value="Yes">
                                @else
                                    <input type="checkbox" id="tuberculosis" name="tuberculosis" value="Yes" onchange="toggleTextareaAndHidden('tuberculosis', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->tuberculosis == "No")
                                    <textarea class="form-control" name="13_pm_respond" id="findingsTextarea_tuberculosis" required>{{ $medical_exam->past_medical_history->medical_exam_response['13_pm_respond'] }}</textarea>
                                    <input type="hidden" id="tuberculosisRepHidden" name="13_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="13_pm_respond" id="findingsTextarea_tuberculosis" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Peptic Ulcer</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->peptic_ulcer == "Yes")
                                    <input type="checkbox" id="peptic_ulcer" name="peptic_ulcer" value="Yes" onchange="toggleTextareaAndHidden('peptic_ulcer', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="peptic_ulcerHidden" name="peptic_ulcer" value="Yes">
                                @else
                                    <input type="checkbox" id="peptic_ulcer" name="peptic_ulcer" value="Yes" onchange="toggleTextareaAndHidden('peptic_ulcer', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->peptic_ulcer == "No")
                                    <textarea class="form-control" name="14_pm_respond" id="findingsTextarea_peptic_ulcer" required>{{ $medical_exam->past_medical_history->medical_exam_response['14_pm_respond'] }}</textarea>
                                    <input type="hidden" id="peptic_ulcerRepHidden" name="14_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="14_pm_respond" id="findingsTextarea_peptic_ulcer" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Musculoskeletal Disorder</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->musculoskeletal_disorder == "Yes")
                                    <input type="checkbox" id="musculoskeletal_disorder" name="musculoskeletal_disorder" value="Yes" onchange="toggleTextareaAndHidden('musculoskeletal_disorder', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="musculoskeletal_disorderHidden" name="musculoskeletal_disorder" value="Yes">
                                @else
                                    <input type="checkbox" id="musculoskeletal_disorder" name="musculoskeletal_disorder" value="Yes" onchange="toggleTextareaAndHidden('musculoskeletal_disorder', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->musculoskeletal_disorder == "No")
                                    <textarea class="form-control" name="15_pm_respond" id="findingsTextarea_musculoskeletal_disorder" required>{{ $medical_exam->past_medical_history->medical_exam_response['15_pm_respond'] }}</textarea>
                                    <input type="hidden" id="musculoskeletal_disorderRepHidden" name="15_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="15_pm_respond" id="findingsTextarea_musculoskeletal_disorder" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Infectious Disease</td>
                            <td class="text-center">
                                @if($medical_exam->past_medical_history->infectious_disease == "Yes")
                                    <input type="checkbox" id="infectious_disease" name="infectious_disease" value="Yes" onchange="toggleTextareaAndHidden('infectious_disease', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="infectious_diseaseHidden" name="infectious_disease" value="Yes">
                                @else
                                    <input type="checkbox" id="infectious_disease" name="infectious_disease" value="Yes" onchange="toggleTextareaAndHidden('infectious_disease', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->past_medical_history->infectious_disease == "No")
                                    <textarea class="form-control" name="16_pm_respond" id="findingsTextarea_infectious_disease" required>{{ $medical_exam->past_medical_history->medical_exam_response['16_pm_respond'] }}</textarea>
                                    <input type="hidden" id="infectious_diseaseRepHidden" name="16_pm_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="16_pm_respond" id="findingsTextarea_infectious_disease" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td >Others</td>
                            <td colspan="2">
                                <textarea class="form-control" name="others_pm_respond">{{ $medical_exam->past_medical_history->medical_exam_response['others_pm_respond'] }}</textarea>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Family History -->
                <div class="col">
                    <div class="text-center">
                        <h3><strong>B. Family History</strong></h3>
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
                                @if($medical_exam->family_history['bronchial_asthma_1'] == "Yes")
                                    <input type="checkbox" id="bronchial_asthma_1" name="bronchial_asthma_1" value="Yes" onchange="toggleTextareaAndHidden('bronchial_asthma_1', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="bronchial_asthma_1Hidden" name="bronchial_asthma_1" value="Yes">
                                @else
                                    <input type="checkbox" id="bronchial_asthma_1" name="bronchial_asthma_1" value="Yes" onchange="toggleTextareaAndHidden('bronchial_asthma_1', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->family_history['bronchial_asthma_1'] == "No")
                                    <textarea class="form-control" name="1_fh_respond" id="findingsTextarea_bronchial_asthma_1" required>{{ $medical_exam->family_history->medical_exam_response['1_fh_respond'] }}</textarea>
                                    <input type="hidden" id="bronchial_asthma_1RepHidden" name="1_fh_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="1_fh_respond" id="findingsTextarea_bronchial_asthma_1" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Diabetes Melilitus</td>
                            <td class="text-center">
                                @if($medical_exam->family_history['diabetes_melilitus_1'] == "Yes")
                                    <input type="checkbox" id="diabetes_melilitus_1" name="diabetes_melilitus_1" value="Yes" onchange="toggleTextareaAndHidden('diabetes_melilitus_1', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="diabetes_melilitus_1Hidden" name="diabetes_melilitus_1" value="Yes">
                                @else
                                    <input type="checkbox" id="diabetes_melilitus_1" name="diabetes_melilitus_1" value="Yes" onchange="toggleTextareaAndHidden('diabetes_melilitus_1', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->family_history['diabetes_melilitus_1'] == "No")
                                    <textarea class="form-control" name="2_fh_respond" id="findingsTextarea_diabetes_melilitus_1" required>{{ $medical_exam->family_history->medical_exam_response['2_fh_respond'] }}</textarea>
                                    <input type="hidden" id="diabetes_melilitus_1RepHidden" name="2_fh_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="2_fh_respond" id="findingsTextarea_diabetes_melilitus_1" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Thyroid Disorder</td>
                            <td class="text-center">
                                @if($medical_exam->family_history['thyroid_disorder_1'] == "Yes")
                                    <input type="checkbox" id="thyroid_disorder_1" name="thyroid_disorder_1" value="Yes" onchange="toggleTextareaAndHidden('thyroid_disorder_1', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="thyroid_disorder_1Hidden" name="thyroid_disorder_1" value="Yes">
                                @else
                                    <input type="checkbox" id="thyroid_disorder_1" name="thyroid_disorder_1" value="Yes" onchange="toggleTextareaAndHidden('thyroid_disorder_1', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->family_history['thyroid_disorder_1'] == "No")
                                    <textarea class="form-control" name="3_fh_respond" id="findingsTextarea_thyroid_disorder_1" required>{{ $medical_exam->family_history->medical_exam_response['3_fh_respond'] }}</textarea>
                                    <input type="hidden" id="thyroid_disorder_1RepHidden" name="3_fh_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="3_fh_respond" id="findingsTextarea_thyroid_disorder_1" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Opthalmologic Disease</td>
                            <td class="text-center">
                                @if($medical_exam->family_history->opthalmologic_disease == "Yes")
                                    <input type="checkbox" id="opthalmologic_disease" name="opthalmologic_disease" value="Yes" onchange="toggleTextareaAndHidden('opthalmologic_disease', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="opthalmologic_diseaseHidden" name="opthalmologic_disease" value="Yes">
                                @else
                                    <input type="checkbox" id="opthalmologic_disease" name="opthalmologic_disease" value="Yes" onchange="toggleTextareaAndHidden('opthalmologic_disease', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->family_history->opthalmologic_disease == "No")
                                    <textarea class="form-control" name="4_fh_respond" id="findingsTextarea_opthalmologic_disease" required>{{ $medical_exam->family_history->medical_exam_response['4_fh_respond'] }}</textarea>
                                    <input type="hidden" id="opthalmologic_diseaseRepHidden" name="4_fh_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="4_fh_respond" id="findingsTextarea_opthalmologic_disease" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Cancer</td>
                            <td class="text-center">
                                @if($medical_exam->family_history->cancer == "Yes")
                                    <input type="checkbox" id="cancer" name="cancer" value="Yes" onchange="toggleTextareaAndHidden('cancer', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="cancerHidden" name="cancer" value="Yes">
                                @else
                                    <input type="checkbox" id="cancer" name="cancer" value="Yes" onchange="toggleTextareaAndHidden('cancer', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->family_history->cancer == "No")
                                    <textarea class="form-control" name="5_fh_respond" id="findingsTextarea_cancer" required>{{ $medical_exam->family_history->medical_exam_response['5_fh_respond'] }}</textarea>
                                    <input type="hidden" id="cancerRepHidden" name="5_fh_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="5_fh_respond" id="findingsTextarea_cancer" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Cardiac Disorder</td>
                            <td class="text-center">
                                @if($medical_exam->family_history['cardiac_disorder_1'] == "Yes")
                                    <input type="checkbox" id="cardiac_disorder_1" name="cardiac_disorder_1" value="Yes" onchange="toggleTextareaAndHidden('cardiac_disorder_1', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="cardiac_disorder_1Hidden" name="cardiac_disorder_1" value="Yes">
                                @else
                                    <input type="checkbox" id="cardiac_disorder_1" name="cardiac_disorder_1" value="Yes" onchange="toggleTextareaAndHidden('cardiac_disorder_1', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->family_history['cardiac_disorder_1'] == "No")
                                    <textarea class="form-control" name="6_fh_respond" id="findingsTextarea_cardiac_disorder_1" required>{{ $medical_exam->family_history->medical_exam_response['6_fh_respond'] }}</textarea>
                                    <input type="hidden" id="cardiac_disorder_1RepHidden" name="6_fh_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="6_fh_respond" id="findingsTextarea_cardiac_disorder_1" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Hypertension</td>
                            <td class="text-center">
                                @if($medical_exam->family_history['hypertension_1'] == "Yes")
                                    <input type="checkbox" id="hypertension_1" name="hypertension_1" value="Yes" onchange="toggleTextareaAndHidden('hypertension_1', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="hypertension_1Hidden" name="hypertension_1" value="Yes">
                                @else
                                    <input type="checkbox" id="hypertension_1" name="hypertension_1" value="Yes" onchange="toggleTextareaAndHidden('hypertension_1', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->family_history['hypertension_1'] == "No")
                                    <textarea class="form-control" name="7_fh_respond" id="findingsTextarea_hypertension_1" required>{{ $medical_exam->family_history->medical_exam_response['7_fh_respond'] }}</textarea>
                                    <input type="hidden" id="hypertension_1RepHidden" name="7_fh_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="7_fh_respond" id="findingsTextarea_hypertension_1" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Tuberculosis</td>
                            <td class="text-center">
                                @if($medical_exam->family_history['tuberculosis_1'] == "Yes")
                                    <input type="checkbox" id="tuberculosis_1" name="tuberculosis_1" value="Yes" onchange="toggleTextareaAndHidden('tuberculosis_1', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="tuberculosis_1Hidden" name="tuberculosis_1" value="Yes">
                                @else
                                    <input type="checkbox" id="tuberculosis_1" name="tuberculosis_1" value="Yes" onchange="toggleTextareaAndHidden('tuberculosis_1', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->family_history['tuberculosis_1'] == "No")
                                    <textarea class="form-control" name="8_fh_respond" id="findingsTextarea_tuberculosis_1" required>{{ $medical_exam->family_history->medical_exam_response['8_fh_respond'] }}</textarea>
                                    <input type="hidden" id="tuberculosis_1RepHidden" name="8_fh_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="8_fh_respond" id="findingsTextarea_tuberculosis_1" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Nervous Disorder</td>
                            <td class="text-center">
                                @if($medical_exam->family_history->nervous_disorder == "Yes")
                                    <input type="checkbox" id="nervous_disorder" name="nervous_disorder" value="Yes" onchange="toggleTextareaAndHidden('nervous_disorder', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="nervous_disorderHidden" name="nervous_disorder" value="Yes">
                                @else
                                    <input type="checkbox" id="nervous_disorder" name="nervous_disorder" value="Yes" onchange="toggleTextareaAndHidden('nervous_disorder', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->family_history->nervous_disorder == "No")
                                    <textarea class="form-control" name="9_fh_respond" id="findingsTextarea_nervous_disorder" required>{{ $medical_exam->family_history->medical_exam_response['9_fh_respond'] }}</textarea>
                                    <input type="hidden" id="nervous_disorderRepHidden" name="9_fh_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="9_fh_respond" id="findingsTextarea_nervous_disorder" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Musculoskeletal</td>
                            <td class="text-center">
                                @if($medical_exam->family_history->musculoskeletal == "Yes")
                                    <input type="checkbox" id="musculoskeletal" name="musculoskeletal" value="Yes" onchange="toggleTextareaAndHidden('musculoskeletal', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="musculoskeletalHidden" name="musculoskeletal" value="Yes">
                                @else
                                    <input type="checkbox" id="musculoskeletal" name="musculoskeletal" value="Yes" onchange="toggleTextareaAndHidden('musculoskeletal', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->family_history->musculoskeletal == "No")
                                    <textarea class="form-control" name="10_fh_respond" id="findingsTextarea_musculoskeletal" required>{{ $medical_exam->family_history->medical_exam_response['10_fh_respond'] }}</textarea>
                                    <input type="hidden" id="musculoskeletalRepHidden" name="10_fh_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="10_fh_respond" id="findingsTextarea_musculoskeletal" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Liver Disease</td>
                            <td class="text-center">
                                @if($medical_exam->family_history->liver_disease == "Yes")
                                    <input type="checkbox" id="liver_disease" name="liver_disease" value="Yes" onchange="toggleTextareaAndHidden('liver_disease', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="liver_diseaseHidden" name="liver_disease" value="Yes">
                                @else
                                    <input type="checkbox" id="liver_disease" name="liver_disease" value="Yes" onchange="toggleTextareaAndHidden('liver_disease', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->family_history->liver_disease == "No")
                                    <textarea class="form-control" name="11_fh_respond" id="findingsTextarea_liver_disease" required>{{ $medical_exam->family_history->medical_exam_response['11_fh_respond'] }}</textarea>
                                    <input type="hidden" id="liver_diseaseRepHidden" name="11_fh_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="11_fh_respond" id="findingsTextarea_liver_disease" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Kidney Disease</td>
                            <td class="text-center">
                                @if($medical_exam->family_history->kidney_disease == "Yes")
                                    <input type="checkbox" id="kidney_disease" name="kidney_disease" value="Yes" onchange="toggleTextareaAndHidden('kidney_disease', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="kidney_diseaseHidden" name="kidney_disease" value="Yes">
                                @else
                                    <input type="checkbox" id="kidney_disease" name="kidney_disease" value="Yes" onchange="toggleTextareaAndHidden('kidney_disease', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->family_history->kidney_disease == "No")
                                    <textarea class="form-control" name="12_fh_respond" id="findingsTextarea_kidney_disease" required>{{ $medical_exam->family_history->medical_exam_response['12_fh_respond'] }}</textarea>
                                    <input type="hidden" id="kidney_diseaseRepHidden" name="12_fh_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="12_fh_respond" id="findingsTextarea_kidney_disease" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td >Others</td>
                            <td colspan="2">
                                <textarea class="form-control" name="others_fh_respond">{{ $medical_exam->family_history->medical_exam_response->others_fh_respond }}</textarea>
                            </td>
                        </tr>
                    </table>

                    <!-- Personal and Social History -->
                    <div class="text-center">
                        <h4><strong>C. Personal and Social History</strong></h4>
                    </div>
                    <div class="container border">
                        <div class="row my-3">
                            @if($medical_exam->personal_and_social_history->smoker == "Yes")
                                <input type="checkbox" id="smoker" name="smoker" value="Yes" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'smoker')" checked>
                                <input type="hidden" id="smokerHidden" name="smoker" value="Yes">
                            @else
                                <input type="checkbox" id="smoker" name="smoker" value="No" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'smoker')">
                            @endif    
                            <div class="col-0">
                                <p class="mr-1"><strong>Smoker:</strong></p>
                            </div>
                            @if($medical_exam->personal_and_social_history->smoker == "Yes")
                                <input type="number" name="stick" class="col-0 mx-1" style="height: 25px; width: 50px;" id="stick" value="{{ $medical_exam->personal_and_social_history->stick }}" required>
                                <input type="hidden" id="smokerValHidden1" name="stick" value=" " disabled>
                            @else
                                <input type="number" name="stick" class="col-0 mx-1" style="height: 25px; width: 50px;" id="stick" disabled>
                            @endif
                            <div class="col-0">
                                <p>sticks/day</p>
                            </div>
                            @if($medical_exam->personal_and_social_history->smoker == "Yes")
                                <input type="number" name="pack" class="col-0 mx-1" style="height: 25px; width: 50px;" id="pack" value="{{ $medical_exam->personal_and_social_history->pack }}" required>
                                <input type="hidden" id="smokerValHidden2" name="pack" value=" " disabled>    
                            @else
                                <input type="number" name="pack" class="col-0 mx-1" style="height: 25px; width: 50px;" id="pack" disabled>
                            @endif
                            <div class="col-0">
                                <p>pack year/s</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            @if($medical_exam->personal_and_social_history->alcoholic == "Yes")
                                <input type="checkbox" id="alcoholic" name="alcoholic" value="Yes" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'alcoholic')" checked>
                                <input type="hidden" id="alcoholicHidden" name="alcoholic" value="Yes">
                            @else
                                <input type="checkbox" id="alcoholic" name="alcoholic" value="No" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'alcoholic')">
                            @endif
                            <div class="col-0">
                                <p class="mr-1"><strong>Alcoholic:</strong></p>
                            </div>
                            @if($medical_exam->personal_and_social_history->alcoholic == "Yes")
                                <input type="number" name="frequent" class="col-0 mx-1" style="height: 25px; width: 50px;" id="frequent" value="{{ $medical_exam->personal_and_social_history->frequent }}" required>
                                <input type="hidden" id="alcoholicValHidden1" name="frequent" value=" " disabled>    
                            @else
                                <input type="number" name="frequent" class="col-0 mx-1" style="height: 25px; width: 50px;" id="frequent" disabled>
                            @endif
                            <div class="col-0">
                                <p>bottles/shot</p>
                            </div>
                            @if($medical_exam->personal_and_social_history->alcoholic == "Yes")
                                <input type="number" name="week" class="col-0 mx-1" style="height: 25px; width: 50px;" id="week" value="{{ $medical_exam->personal_and_social_history->week }}" required>
                                <input type="hidden" id="alcoholicValHidden2" name="week" value=" " disabled>    
                            @else
                                <input type="number" name="week" class="col-0 mx-1" style="height: 25px; width: 50px;" id="week" disabled>
                            @endif
                            <div class="col-0">
                                <p>/week</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            @if($medical_exam->personal_and_social_history->medication == "Yes")
                                <input type="checkbox" id="medication" name="medication" value="Yes" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'medication')" checked>
                                <input type="hidden" id="medicationHidden" name="medication" value="Yes">   
                            @else
                                <input type="checkbox" id="medication" name="medication" value="No" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'medication')">
                            @endif
                            <div class="col">
                                <p><strong>Medication:</strong></p>
                                @if($medical_exam->personal_and_social_history->medication == "Yes")
                                    <textarea class="form-control" name="take" id="take" required>{{ $medical_exam->personal_and_social_history->take }}</textarea>
                                    <input type="hidden" id="medicationValHidden" name="take" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="take" id="take" disabled>Not Applicable</textarea>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- OB-GYNE History -->
                <div class="col">
                    <div class="text-center">
                        <h3><strong>D. OB-GYNE History</strong></h3>
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
                                @if($medical_exam->ob_gyne_history->lnmp == "Yes")
                                    <input type="checkbox" id="lnmp" name="lnmp" value="Yes" onchange="toggleTextareaAndHidden('lnmp', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="lnmpHidden" name="lnmp" value="Yes">    
                                @else
                                    <input type="checkbox" id="lnmp" name="lnmp" value="Yes" onchange="toggleTextareaAndHidden('lnmp', 'toggleTextarea', 'toggleHidden')">
                                @endif    
                            </td>
                            <td>
                                @if($medical_exam->ob_gyne_history->lnmp == "No")
                                    <textarea class="form-control" name="1_ob_respond" id="findingsTextarea_lnmp" required>{{ $medical_exam->ob_gyne_history->medical_exam_response['1_ob_respond'] }}</textarea>
                                    <input type="hidden" id="lnmpRepHidden" name="1_ob_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="1_ob_respond" id="findingsTextarea_lnmp" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>OB Score</td>
                            <td class="text-center">
                                @if($medical_exam->ob_gyne_history->ob_score == "Yes")
                                    <input type="checkbox" id="ob_score" name="ob_score" value="Yes" onchange="toggleTextareaAndHidden('ob_score', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="ob_scoreHidden" name="ob_score" value="Yes">    
                                @else
                                    <input type="checkbox" id="ob_score" name="ob_score" value="Yes" onchange="toggleTextareaAndHidden('ob_score', 'toggleTextarea', 'toggleHidden')">
                                @endif    
                            </td>
                            <td>
                                @if($medical_exam->ob_gyne_history->ob_score == "No")
                                    <textarea class="form-control" name="2_ob_respond" id="findingsTextarea_ob_score" required>{{ $medical_exam->ob_gyne_history->medical_exam_response['2_ob_respond'] }}</textarea>
                                    <input type="hidden" id="ob_scoreRepHidden" name="2_ob_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="2_ob_respond" id="findingsTextarea_ob_score" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Abnormal Pregnancies</td>
                            <td class="text-center">
                                @if($medical_exam->ob_gyne_history->abnormal_pregnancies == "Yes")
                                    <input type="checkbox" id="abnormal_pregnancies" name="abnormal_pregnancies" value="Yes" onchange="toggleTextareaAndHidden('abnormal_pregnancies', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="abnormal_pregnanciesHidden" name="abnormal_pregnancies" value="Yes">    
                                @else
                                    <input type="checkbox" id="abnormal_pregnancies" name="abnormal_pregnancies" value="Yes" onchange="toggleTextareaAndHidden('abnormal_pregnancies', 'toggleTextarea', 'toggleHidden')">
                                @endif    
                            </td>
                            <td>
                                @if($medical_exam->ob_gyne_history->abnormal_pregnancies == "No")
                                    <textarea class="form-control" name="3_ob_respond" id="findingsTextarea_abnormal_pregnancies" required>{{ $medical_exam->ob_gyne_history->medical_exam_response['3_ob_respond'] }}</textarea>
                                    <input type="hidden" id="abnormal_pregnanciesRepHidden" name="3_ob_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="3_ob_respond" id="findingsTextarea_abnormal_pregnancies" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Date of Last Delivery</td>
                            <td class="text-center">
                                @if($medical_exam->ob_gyne_history->date_of_last_delivery == "Yes")
                                    <input type="checkbox" id="date_of_last_delivery" name="date_of_last_delivery" value="Yes" onchange="toggleTextareaAndHidden('date_of_last_delivery', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="date_of_last_deliveryHidden" name="date_of_last_delivery" value="Yes">    
                                @else
                                    <input type="checkbox" id="date_of_last_delivery" name="date_of_last_delivery" value="Yes" onchange="toggleTextareaAndHidden('date_of_last_delivery', 'toggleTextarea', 'toggleHidden')">
                                @endif    
                            </td>
                            <td>
                                @if($medical_exam->ob_gyne_history->date_of_last_delivery == "No")
                                    <textarea class="form-control" name="4_ob_respond" id="findingsTextarea_date_of_last_delivery" required>{{ $medical_exam->ob_gyne_history->medical_exam_response['4_ob_respond'] }}</textarea>
                                    <input type="hidden" id="date_of_last_deliveryRepHidden" name="4_ob_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="4_ob_respond" id="findingsTextarea_date_of_last_delivery" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Breast/Uterus/Ovaries</td>
                            <td class="text-center">
                                @if($medical_exam->ob_gyne_history->breast_uterus_ovaries == "Yes")
                                    <input type="checkbox" id="breast_uterus_ovaries" name="breast_uterus_ovaries" value="Yes" onchange="toggleTextareaAndHidden('breast_uterus_ovaries', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="breast_uterus_ovariesHidden" name="breast_uterus_ovaries" value="Yes">    
                                @else
                                    <input type="checkbox" id="breast_uterus_ovaries" name="breast_uterus_ovaries" value="Yes" onchange="toggleTextareaAndHidden('breast_uterus_ovaries', 'toggleTextarea', 'toggleHidden')">
                                @endif    
                            </td>
                            <td>
                                @if($medical_exam->ob_gyne_history->breast_uterus_ovaries == "No")
                                    <textarea class="form-control" name="5_ob_respond" id="findingsTextarea_breast_uterus_ovaries" required>{{ $medical_exam->ob_gyne_history->medical_exam_response['5_ob_respond'] }}</textarea>
                                    <input type="hidden" id="breast_uterus_ovariesRepHidden" name="5_ob_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="5_ob_respond" id="findingsTextarea_breast_uterus_ovaries" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                    </table>
                
                    <!-- Hospitalization and Operation -->
                    <div class="container border my-3 pt-2">
                        <div class="row">
                            @if($medical_exam->personal_and_social_history->hospitalization == "Yes")
                                <input type="checkbox" id="hospitalization" name="hospitalization" value="Yes" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'hospitalization')" checked>
                                <input type="hidden" id="hospitalizationHidden" name="hospitalization" value="Yes">
                            @else
                                <input type="checkbox" id="hospitalization" name="hospitalization" value="No" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'hospitalization')">
                            @endif
                            <div class="col-0 mb-3">
                                <p class="h5 mr-1"><strong>E. Hospitalization/s:</strong></p>
                            </div>
                            @if($medical_exam->personal_and_social_history->hospitalization == "Yes")
                                <input type="number" name="hosp_times" class="col-0 mx-1" style="height: 25px; width: 138px;" id="hosp_times" value="{{ $medical_exam->personal_and_social_history->hosp_times }}" required>
                                <input type="hidden" id="hospitalizationValHidden" name="hosp_times" value=" " disabled>
                            @else
                                <input type="number" name="hosp_times" class="col-0 mx-1" style="height: 25px; width: 138px;" id="hosp_times" disabled>
                            @endif
                        </div>
                        <div class="row">
                            @if($medical_exam->personal_and_social_history->operation == "Yes")
                                <input type="checkbox" id="operation" name="operation" value="Yes" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'operation')" checked>
                                <input type="hidden" id="operationHidden" name="operation" value="Yes">
                            @else
                                <input type="checkbox" id="operation" name="operation" value="No" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'operation')">
                            @endif
                            <div class="col-0">
                                <p class="h5 mr-1"><strong>F. Operation/s:</strong></p>
                            </div>
                            @if($medical_exam->personal_and_social_history->operation == "Yes")
                                <input type="number" name="op_times" class="col-0 mx-1" style="height: 25px; width: 185px;" id="op_times" value="{{ $medical_exam->personal_and_social_history->op_times }}" required>
                                <input type="hidden" id="operationValHidden" name="op_times" value=" " disabled>
                            @else
                                <input type="number" name="op_times" class="col-0 mx-1" style="height: 25px; width: 185px;" id="op_times" disabled>
                            @endif
                        </div>
                    </div>

                    <!-- Review of System -->
                    <div class="text-center">
                        <h3><strong>G. Review of System</strong></h3>
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
                                @if($medical_exam->review_of_system->skin == "Yes")
                                    <input type="checkbox" id="skin" name="skin" value="Yes" onchange="toggleTextareaAndHidden('skin', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="skinHidden" name="skin" value="Yes">
                                @else
                                    <input type="checkbox" id="skin" name="skin" value="Yes" onchange="toggleTextareaAndHidden('skin', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->review_of_system->skin == "No")
                                    <textarea class="form-control" name="1_rs_respond" id="findingsTextarea_skin" required>{{ $medical_exam->review_of_system->medical_exam_response['1_rs_respond'] }}</textarea>
                                    <input type="hidden" id="skinRepHidden" name="1_rs_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="1_rs_respond" id="findingsTextarea_skin" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Opthalmologic</td>
                            <td class="text-center">
                                @if($medical_exam->review_of_system->opthalmologic == "Yes")
                                    <input type="checkbox" id="opthalmologic" name="opthalmologic" value="Yes" onchange="toggleTextareaAndHidden('opthalmologic', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="opthalmologicHidden" name="opthalmologic" value="Yes">
                                @else
                                    <input type="checkbox" id="opthalmologic" name="opthalmologic" value="Yes" onchange="toggleTextareaAndHidden('opthalmologic', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->review_of_system->opthalmologic == "No")
                                    <textarea class="form-control" name="2_rs_respond" id="findingsTextarea_opthalmologic" required>{{ $medical_exam->review_of_system->medical_exam_response['2_rs_respond'] }}</textarea>
                                    <input type="hidden" id="opthalmologicRepHidden" name="2_rs_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="2_rs_respond" id="findingsTextarea_opthalmologic" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>ENT</td>
                            <td class="text-center">
                                @if($medical_exam->review_of_system->ent == "Yes")
                                    <input type="checkbox" id="ent" name="ent" value="Yes" onchange="toggleTextareaAndHidden('ent', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="entHidden" name="ent" value="Yes">
                                @else
                                    <input type="checkbox" id="ent" name="ent" value="Yes" onchange="toggleTextareaAndHidden('ent', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->review_of_system->ent == "No")
                                    <textarea class="form-control" name="3_rs_respond" id="findingsTextarea_ent" required>{{ $medical_exam->review_of_system->medical_exam_response['3_rs_respond'] }}</textarea>
                                    <input type="hidden" id="entRepHidden" name="3_rs_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="3_rs_respond" id="findingsTextarea_ent" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Cardiovascular</td>
                            <td class="text-center">
                                @if($medical_exam->review_of_system->cardiovascular == "Yes")
                                    <input type="checkbox" id="cardiovascular" name="cardiovascular" value="Yes" onchange="toggleTextareaAndHidden('cardiovascular', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="cardiovascularHidden" name="cardiovascular" value="Yes">
                                @else
                                    <input type="checkbox" id="cardiovascular" name="cardiovascular" value="Yes" onchange="toggleTextareaAndHidden('cardiovascular', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->review_of_system->cardiovascular == "No")
                                    <textarea class="form-control" name="4_rs_respond" id="findingsTextarea_cardiovascular" required>{{ $medical_exam->review_of_system->medical_exam_response['4_rs_respond'] }}</textarea>
                                    <input type="hidden" id="cardiovascularRepHidden" name="4_rs_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="4_rs_respond" id="findingsTextarea_cardiovascular" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Respiratory</td>
                            <td class="text-center">
                                @if($medical_exam->review_of_system->respiratory == "Yes")
                                    <input type="checkbox" id="respiratory" name="respiratory" value="Yes" onchange="toggleTextareaAndHidden('respiratory', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="respiratoryHidden" name="respiratory" value="Yes">
                                @else
                                    <input type="checkbox" id="respiratory" name="respiratory" value="Yes" onchange="toggleTextareaAndHidden('respiratory', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->review_of_system->respiratory == "No")
                                    <textarea class="form-control" name="5_rs_respond" id="findingsTextarea_respiratory" required>{{ $medical_exam->review_of_system->medical_exam_response['5_rs_respond'] }}</textarea>
                                    <input type="hidden" id="respiratoryRepHidden" name="5_rs_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="5_rs_respond" id="findingsTextarea_respiratory" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Gastro Intestinal</td>
                            <td class="text-center">
                                @if($medical_exam->review_of_system->gastro_intestinal == "Yes")
                                    <input type="checkbox" id="gastro_intestinal" name="gastro_intestinal" value="Yes" onchange="toggleTextareaAndHidden('gastro_intestinal', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="gastro_intestinalHidden" name="gastro_intestinal" value="Yes">
                                @else
                                    <input type="checkbox" id="gastro_intestinal" name="gastro_intestinal" value="Yes" onchange="toggleTextareaAndHidden('gastro_intestinal', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->review_of_system->gastro_intestinal == "No")
                                    <textarea class="form-control" name="6_rs_respond" id="findingsTextarea_gastro_intestinal" required>{{ $medical_exam->review_of_system->medical_exam_response['6_rs_respond'] }}</textarea>
                                    <input type="hidden" id="gastro_intestinalRepHidden" name="6_rs_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="6_rs_respond" id="findingsTextarea_gastro_intestinal" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Neuro-Psychiatric</td>
                            <td class="text-center">
                                @if($medical_exam->review_of_system->neuro_psychiatric == "Yes")
                                    <input type="checkbox" id="neuro_psychiatric" name="neuro_psychiatric" value="Yes" onchange="toggleTextareaAndHidden('neuro_psychiatric', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="neuro_psychiatricHidden" name="neuro_psychiatric" value="Yes">
                                @else
                                    <input type="checkbox" id="neuro_psychiatric" name="neuro_psychiatric" value="Yes" onchange="toggleTextareaAndHidden('neuro_psychiatric', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->review_of_system->neuro_psychiatric == "No")
                                    <textarea class="form-control" name="7_rs_respond" id="findingsTextarea_neuro_psychiatric" required>{{ $medical_exam->review_of_system->medical_exam_response['7_rs_respond'] }}</textarea>
                                    <input type="hidden" id="neuro_psychiatricRepHidden" name="7_rs_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="7_rs_respond" id="findingsTextarea_neuro_psychiatric" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Hematology</td>
                            <td class="text-center">
                                @if($medical_exam->review_of_system->hematology == "Yes")
                                    <input type="checkbox" id="hematology" name="hematology" value="Yes" onchange="toggleTextareaAndHidden('hematology', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="hematologyHidden" name="hematology" value="Yes">
                                @else
                                    <input type="checkbox" id="hematology" name="hematology" value="Yes" onchange="toggleTextareaAndHidden('hematology', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->review_of_system->hematology == "No")
                                    <textarea class="form-control" name="8_rs_respond" id="findingsTextarea_hematology" required>{{ $medical_exam->review_of_system->medical_exam_response['8_rs_respond'] }}</textarea>
                                    <input type="hidden" id="hematologyRepHidden" name="8_rs_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="8_rs_respond" id="findingsTextarea_hematology" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Genitourinary</td>
                            <td class="text-center">
                                @if($medical_exam->review_of_system->genitourinary == "Yes")
                                    <input type="checkbox" id="genitourinary" name="genitourinary" value="Yes" onchange="toggleTextareaAndHidden('genitourinary', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="genitourinaryHidden" name="genitourinary" value="Yes">
                                @else
                                    <input type="checkbox" id="genitourinary" name="genitourinary" value="Yes" onchange="toggleTextareaAndHidden('genitourinary', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->review_of_system->genitourinary == "No")
                                    <textarea class="form-control" name="9_rs_respond" id="findingsTextarea_genitourinary" required>{{ $medical_exam->review_of_system->medical_exam_response['9_rs_respond'] }}</textarea>
                                    <input type="hidden" id="genitourinaryRepHidden" name="9_rs_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="9_rs_respond" id="findingsTextarea_genitourinary" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Musculo-Skeletal</td>
                            <td class="text-center">
                                @if($medical_exam->review_of_system->musculo_skeletal == "Yes")
                                    <input type="checkbox" id="musculo_skeletal" name="musculo_skeletal" value="Yes" onchange="toggleTextareaAndHidden('musculo_skeletal', 'toggleTextarea', 'toggleHidden')" checked>
                                    <input type="hidden" id="musculo_skeletalHidden" name="musculo_skeletal" value="Yes">
                                @else
                                    <input type="checkbox" id="musculo_skeletal" name="musculo_skeletal" value="Yes" onchange="toggleTextareaAndHidden('musculo_skeletal', 'toggleTextarea', 'toggleHidden')">
                                @endif
                            </td>
                            <td>
                                @if($medical_exam->review_of_system->musculo_skeletal == "No")
                                    <textarea class="form-control" name="10_rs_respond" id="findingsTextarea_musculo_skeletal" required>{{ $medical_exam->review_of_system->medical_exam_response['10_rs_respond'] }}</textarea>
                                    <input type="hidden" id="musculo_skeletalRepHidden" name="10_rs_respond" value=" " disabled>
                                @else
                                    <textarea class="form-control" name="10_rs_respond" id="findingsTextarea_musculo_skeletal" disabled>Not Applicable</textarea>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

                <!-- Physical Examination -->
                <h2><strong>II. Physical Examination</strong></h2>
                <div class="row mb-3">
                    <div class="col border">
                        <p class="mb-1"><strong>Height:</strong></p>
                        <div class="row">
                            <div class="col-0 ml-2">
                                <input type="number" name="height" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="height" value="{{ $medical_exam->physical_examination->height }}" required>cm.
                            </div>
                        </div>
                    </div> 
                    <div class="col border">
                        <p class="mb-1"><strong>Weight:</strong></p>
                        <div class="row">
                            <div class="col-0 ml-2">
                                <input type="number" name="weight" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="weight" value="{{ $medical_exam->physical_examination->weight }}" required>kg.
                            </div>
                        </div>
                    </div> 
                    <div class="col border">
                        <p class="mb-1"><strong>BP (mm/hg):</strong></p>
                        <div class="row">
                            <div class="col-0" style="margin-left: 1px;">
                                <input type="number" name="bp1" class="col-0 mx-1 mb-1" style="height: 25px; width: 50px;" id="bp1" value="{{ $medical_exam->physical_examination['bp1'] }}" required>
                            </div>
                            <div class="col-0">
                                <p>/</p>
                            </div>
                            <div class="col-0">
                                <input type="number" name="bp2" class="col-0 mx-1 mb-1" style="height: 25px; width: 50px;" id="bp2" value="{{ $medical_exam->physical_examination['bp2'] }}" required>
                            </div>
                            <div class="col-0 mb-1 ml-1">
                                <i class="fas fa-arrow-up mt-1 mx-1" id="arrowUpBP" style="display: none;"></i>
                                <i class="fas fa-arrow-down mt-1 mx-1" id="arrowDownBP" style="display: none;"></i>
                            </div>
                        </div>
                    </div> 
                    <div class="col border">
                        <p class="mb-1"><strong>Cardiac Rate:</strong></p>
                        <div class="row">
                            <div class="col-0 ml-1">
                                <input type="number" name="cardiac_rate" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="cardiac_rate" value="{{ $medical_exam->physical_examination->cardiac_rate }}" required>
                            </div>
                            <div class="col-0">
                                <i class="fas fa-arrow-up mt-1 mx-1" id="arrowUpCR" style="display: none;"></i>
                                <i class="fas fa-arrow-down mt-1 mx-1" id="arrowDownCR" style="display: none;"></i>
                            </div>
                            <div class="col-0">
                                BPM
                            </div>
                        </div>
                    </div> 
                    <div class="col border">
                        <p class="mb-1"><strong>Respiratory Rate</strong></p>
                        <div class="row">
                            <div class="col-0 ml-1">
                                <input type="number" name="respiratory_rate" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="respiratory_rate" value="{{ $medical_exam->physical_examination->respiratory_rate }}" required>
                            </div>
                            <div class="col-0">
                                <i class="fas fa-arrow-up mt-1 mx-1" id="arrowUpRR" style="display: none;"></i>
                                <i class="fas fa-arrow-down mt-1 mx-1" id="arrowDownRR" style="display: none;"></i>
                            </div>
                            <div class="col-0">
                                BPM
                            </div>
                        </div>
                    </div> 
                    <div class="col border">
                        <p class="mb-1"><strong>BMI:</strong></p>
                        <div class="row">
                            <div class="col-0 ml-1">
                                <input type="number" name="bmi" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="bmi" value="{{ $medical_exam->physical_examination->bmi }}" readonly>
                            </div>
                            <div class="col-0">
                                <p id="weightCategory"></p>
                            </div>
                        </div>
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
                                    @if($medical_exam->physical_examination->general_appearance == "Yes")
                                        <input type="checkbox" id="general_appearance" name="general_appearance" value="Yes" onchange="toggleTextareaAndHidden('general_appearance', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="general_appearanceHidden" name="general_appearance" value="Yes">
                                    @else
                                        <input type="checkbox" id="general_appearance" name="general_appearance" value="Yes" onchange="toggleTextareaAndHidden('general_appearance', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->general_appearance == "No")
                                        <textarea class="form-control" name="1_pe_respond" id="findingsTextarea_general_appearance" required>{{ $medical_exam->physical_examination->medical_exam_response['1_pe_respond'] }}</textarea>
                                        <input type="hidden" id="general_appearanceRepHidden" name="1_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="1_pe_respond" id="findingsTextarea_general_appearance" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Skin</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination['skin1'] == "Yes")
                                        <input type="checkbox" id="skin1" name="skin1" value="Yes" onchange="toggleTextareaAndHidden('skin1', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="skin1Hidden" name="skin1" value="Yes">
                                    @else
                                        <input type="checkbox" id="skin1" name="skin1" value="Yes" onchange="toggleTextareaAndHidden('skin1', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination['skin1'] == "No")
                                        <textarea class="form-control" name="2_pe_respond" id="findingsTextarea_skin1" required>{{ $medical_exam->physical_examination->medical_exam_response['2_pe_respond'] }}</textarea>
                                        <input type="hidden" id="skin1RepHidden" name="2_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="2_pe_respond" id="findingsTextarea_skin1" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Head and Scalp</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->head_and_scalp == "Yes")
                                        <input type="checkbox" id="head_and_scalp" name="head_and_scalp" value="Yes" onchange="toggleTextareaAndHidden('head_and_scalp', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="head_and_scalpHidden" name="head_and_scalp" value="Yes">
                                    @else
                                        <input type="checkbox" id="head_and_scalp" name="head_and_scalp" value="Yes" onchange="toggleTextareaAndHidden('head_and_scalp', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->head_and_scalp == "No")
                                        <textarea class="form-control" name="3_pe_respond" id="findingsTextarea_head_and_scalp" required>{{ $medical_exam->physical_examination->medical_exam_response['3_pe_respond'] }}</textarea>
                                        <input type="hidden" id="head_and_scalpRepHidden" name="3_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="3_pe_respond" id="findingsTextarea_head_and_scalp" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Eyes</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->eyes == "Yes")
                                        <input type="checkbox" id="eyes" name="eyes" value="Yes" onchange="updateCheckboxValue(this, 'eyes')" checked>
                                        <input type="hidden" id="eyesHidden" name="eyes" value="Yes">
                                    @else
                                        <input type="checkbox" id="eyes" name="eyes" value="Yes" onchange="updateCheckboxValue(this, 'eyes')">
                                        <input type="hidden" id="eyesHidden" name="eyes" value="No">
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-0">
                                            @if($medical_exam->physical_examination->eyes == "No")
                                                <input type="number" name="od_pe_respond" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od_pe_respond" value="{{ $medical_exam->physical_examination->medical_exam_response->od_pe_respond }}">
                                                <input type="hidden" id="eyesValHidden1" name="od_pe_respond" value=" " disabled>
                                            @else
                                                <input type="number" name="od_pe_respond" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od_pe_respond" disabled>
                                            @endif
                                        </div>
                                        <div class="col-0">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0">
                                            @if($medical_exam->physical_examination->eyes == "No")
                                                <input type="number" name="od1_pe_respond" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od1_pe_respond" value="{{ $medical_exam->physical_examination->medical_exam_response['od1_pe_respond'] }}">
                                                <input type="hidden" id="eyesValHidden2" name="od1_pe_respond" value=" " disabled>    
                                            @else
                                                <input type="number" name="od1_pe_respond" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od1_pe_respond" disabled>
                                            @endif
                                        </div>
                                        <div class="col-0">
                                            <p>OD</p>
                                        </div>
                                        <div class="col-0">
                                            @if($medical_exam->physical_examination->eyes == "No")
                                                <input type="number" name="os_pe_respond" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os_pe_respond" value="{{ $medical_exam->physical_examination->medical_exam_response->os_pe_respond }}">
                                                <input type="hidden" id="eyesValHidden3" name="os_pe_respond" value=" " disabled>    
                                            @else
                                                <input type="number" name="os_pe_respond" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os_pe_respond" disabled>
                                            @endif
                                        </div>
                                        <div class="col-0">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0">
                                            @if($medical_exam->physical_examination->eyes == "No")
                                                <input type="number" name="os1_pe_respond" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os1_pe_respond" value="{{ $medical_exam->physical_examination->medical_exam_response['os1_pe_respond'] }}">
                                                <input type="hidden" id="eyesValHidden4" name="os1_pe_respond" value=" " disabled>
                                            @else
                                                <input type="number" name="os1_pe_respond" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os1_pe_respond" disabled>
                                            @endif
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
                                    @if($medical_exam->physical_examination->corrected == "Yes")
                                        <input type="checkbox" id="corrected" name="corrected" value="Yes" onchange="updateCheckboxValue(this, 'corrected')" checked>
                                        <input type="hidden" id="correctedHidden" name="corrected" value="Yes">
                                    @else
                                        <input type="checkbox" id="corrected" name="corrected" value="Yes" onchange="updateCheckboxValue(this, 'corrected')">
                                        <input type="hidden" id="correctedHidden" name="corrected" value="No">
                                    @endif
                                </td>
                                <td>
                                <div class="row">
                                        <div class="col-0">
                                            @if($medical_exam->physical_examination->corrected == "No")
                                                <input type="number" name="od_pe_respond1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od_pe_respond1" value="{{ $medical_exam->physical_examination->medical_exam_response['od_pe_respond1'] }}">
                                                <input type="hidden" id="correctedValHidden1" name="od_pe_respond1" value=" " disabled>
                                            @else
                                                <input type="number" name="od_pe_respond1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od_pe_respond1" disabled>
                                            @endif
                                        </div>
                                        <div class="col-0">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0">
                                            @if($medical_exam->physical_examination->corrected == "No")
                                                <input type="number" name="od1_pe_respond1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od1_pe_respond1" value="{{ $medical_exam->physical_examination->medical_exam_response['od1_pe_respond1'] }}">
                                                <input type="hidden" id="correctedValHidden2" name="od1_pe_respond1" value=" " disabled>    
                                            @else
                                                <input type="number" name="od1_pe_respond1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od1_pe_respond1" disabled>
                                            @endif
                                        </div>
                                        <div class="col-0">
                                            <p>OD</p>
                                        </div>
                                        <div class="col-0">
                                            @if($medical_exam->physical_examination->corrected == "No")
                                                <input type="number" name="os_pe_respond1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os_pe_respond1" value="{{ $medical_exam->physical_examination->medical_exam_response['os_pe_respond1'] }}">
                                                <input type="hidden" id="correctedValHidden3" name="os_pe_respond1" value=" " disabled>    
                                            @else
                                                <input type="number" name="os_pe_respond1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os_pe_respond1" disabled>
                                            @endif
                                        </div>
                                        <div class="col-0">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0">
                                            @if($medical_exam->physical_examination->corrected == "No")
                                                <input type="number" name="os1_pe_respond1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os1_pe_respond1" value="{{ $medical_exam->physical_examination->medical_exam_response['os1_pe_respond1'] }}">
                                                <input type="hidden" id="correctedValHidden4" name="os1_pe_respond1" value=" " disabled>
                                            @else
                                                <input type="number" name="os1_pe_respond1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os1_pe_respond1" disabled>
                                            @endif
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
                                    @if($medical_exam->physical_examination->pupils == "Yes")
                                        <input type="checkbox" id="pupils" name="pupils" value="Yes" onchange="toggleTextareaAndHidden('pupils', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="pupilsHidden" name="pupils" value="Yes">
                                    @else
                                        <input type="checkbox" id="pupils" name="pupils" value="Yes" onchange="toggleTextareaAndHidden('pupils', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->pupils == "No")
                                        <textarea class="form-control" name="6_pe_respond" id="findingsTextarea_pupils" required>{{ $medical_exam->physical_examination->medical_exam_response['6_pe_respond'] }}</textarea>
                                        <input type="hidden" id="pupilsRepHidden" name="6_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="6_pe_respond" id="findingsTextarea_pupils" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Ear, Eardrums</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->ear_eardrums == "Yes")
                                        <input type="checkbox" id="ear_eardrums" name="ear_eardrums" value="Yes" onchange="toggleTextareaAndHidden('ear_eardrums', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="ear_eardrumsHidden" name="ear_eardrums" value="Yes">
                                    @else
                                        <input type="checkbox" id="ear_eardrums" name="ear_eardrums" value="Yes" onchange="toggleTextareaAndHidden('ear_eardrums', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->ear_eardrums == "No")
                                        <textarea class="form-control" name="7_pe_respond" id="findingsTextarea_ear_eardrums" required>{{ $medical_exam->physical_examination->medical_exam_response['7_pe_respond'] }}</textarea>
                                        <input type="hidden" id="ear_eardrumsRepHidden" name="7_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="7_pe_respond" id="findingsTextarea_ear_eardrums" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Nose, Sinuses</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->nose_sinuses == "Yes")
                                        <input type="checkbox" id="nose_sinuses" name="nose_sinuses" value="Yes" onchange="toggleTextareaAndHidden('nose_sinuses', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="nose_sinusesHidden" name="nose_sinuses" value="Yes">
                                    @else
                                        <input type="checkbox" id="nose_sinuses" name="nose_sinuses" value="Yes" onchange="toggleTextareaAndHidden('nose_sinuses', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->nose_sinuses == "No")
                                        <textarea class="form-control" name="8_pe_respond" id="findingsTextarea_nose_sinuses" required>{{ $medical_exam->physical_examination->medical_exam_response['8_pe_respond'] }}</textarea>
                                        <input type="hidden" id="nose_sinusesRepHidden" name="8_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="8_pe_respond" id="findingsTextarea_nose_sinuses" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Mouth, Throat</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->mouth_throat == "Yes")
                                        <input type="checkbox" id="mouth_throat" name="mouth_throat" value="Yes" onchange="toggleTextareaAndHidden('mouth_throat', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="mouth_throatHidden" name="mouth_throat" value="Yes">
                                    @else
                                        <input type="checkbox" id="mouth_throat" name="mouth_throat" value="Yes" onchange="toggleTextareaAndHidden('mouth_throat', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->mouth_throat == "No")
                                        <textarea class="form-control" name="9_pe_respond" id="findingsTextarea_mouth_throat" required>{{ $medical_exam->physical_examination->medical_exam_response['9_pe_respond'] }}</textarea>
                                        <input type="hidden" id="mouth_throatRepHidden" name="9_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="9_pe_respond" id="findingsTextarea_mouth_throat" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Neck, Thyroid</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->neck_thyroid == "Yes")
                                        <input type="checkbox" id="neck_thyroid" name="neck_thyroid" value="Yes" onchange="toggleTextareaAndHidden('neck_thyroid', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="neck_thyroidHidden" name="neck_thyroid" value="Yes">
                                    @else
                                        <input type="checkbox" id="neck_thyroid" name="neck_thyroid" value="Yes" onchange="toggleTextareaAndHidden('neck_thyroid', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->neck_thyroid == "No")
                                        <textarea class="form-control" name="10_pe_respond" id="findingsTextarea_neck_thyroid" required>{{ $medical_exam->physical_examination->medical_exam_response['10_pe_respond'] }}</textarea>
                                        <input type="hidden" id="neck_thyroidRepHidden" name="10_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="10_pe_respond" id="findingsTextarea_neck_thyroid" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Chest, Breast, Axilla</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->chest_breast_axilla == "Yes")
                                        <input type="checkbox" id="chest_breast_axilla" name="chest_breast_axilla" value="Yes" onchange="toggleTextareaAndHidden('chest_breast_axilla', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="chest_breast_axillaHidden" name="chest_breast_axilla" value="Yes">
                                    @else
                                        <input type="checkbox" id="chest_breast_axilla" name="chest_breast_axilla" value="Yes" onchange="toggleTextareaAndHidden('chest_breast_axilla', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->chest_breast_axilla == "No")
                                        <textarea class="form-control" name="11_pe_respond" id="findingsTextarea_chest_breast_axilla" required>{{ $medical_exam->physical_examination->medical_exam_response['11_pe_respond'] }}</textarea>
                                        <input type="hidden" id="chest_breast_axillaRepHidden" name="11_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="11_pe_respond" id="findingsTextarea_chest_breast_axilla" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
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
                                    @if($medical_exam->physical_examination->heart_cardiovascular == "Yes")
                                        <input type="checkbox" id="heart_cardiovascular" name="heart_cardiovascular" value="Yes" onchange="toggleTextareaAndHidden('heart_cardiovascular', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="heart_cardiovascularHidden" name="heart_cardiovascular" value="Yes">
                                    @else
                                        <input type="checkbox" id="heart_cardiovascular" name="heart_cardiovascular" value="Yes" onchange="toggleTextareaAndHidden('heart_cardiovascular', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->heart_cardiovascular == "No")
                                        <textarea class="form-control" name="12_pe_respond" id="findingsTextarea_heart_cardiovascular" required>{{ $medical_exam->physical_examination->medical_exam_response['12_pe_respond'] }}</textarea>
                                        <input type="hidden" id="heart_cardiovascularRepHidden" name="12_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="12_pe_respond" id="findingsTextarea_heart_cardiovascular" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Lungs-Respiratory</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->lungs_respiratory == "Yes")
                                        <input type="checkbox" id="lungs_respiratory" name="lungs_respiratory" value="Yes" onchange="toggleTextareaAndHidden('lungs_respiratory', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="lungs_respiratoryHidden" name="lungs_respiratory" value="Yes">
                                    @else
                                        <input type="checkbox" id="lungs_respiratory" name="lungs_respiratory" value="Yes" onchange="toggleTextareaAndHidden('lungs_respiratory', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->lungs_respiratory == "No")
                                        <textarea class="form-control" name="13_pe_respond" id="findingsTextarea_lungs_respiratory" required>{{ $medical_exam->physical_examination->medical_exam_response['13_pe_respond'] }}</textarea>
                                        <input type="hidden" id="lungs_respiratoryRepHidden" name="13_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="13_pe_respond" id="findingsTextarea_lungs_respiratory" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Abdomen</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->abdomen == "Yes")
                                        <input type="checkbox" id="abdomen" name="abdomen" value="Yes" onchange="toggleTextareaAndHidden('abdomen', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="abdomenHidden" name="abdomen" value="Yes">
                                    @else
                                        <input type="checkbox" id="abdomen" name="abdomen" value="Yes" onchange="toggleTextareaAndHidden('abdomen', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->abdomen == "No")
                                        <textarea class="form-control" name="14_pe_respond" id="findingsTextarea_abdomen" required>{{ $medical_exam->physical_examination->medical_exam_response['14_pe_respond'] }}</textarea>
                                        <input type="hidden" id="abdomenRepHidden" name="14_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="14_pe_respond" id="findingsTextarea_abdomen" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Back, Flanks</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->back_flanks == "Yes")
                                        <input type="checkbox" id="back_flanks" name="back_flanks" value="Yes" onchange="toggleTextareaAndHidden('back_flanks', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="back_flanksHidden" name="back_flanks" value="Yes">
                                    @else
                                        <input type="checkbox" id="back_flanks" name="back_flanks" value="Yes" onchange="toggleTextareaAndHidden('back_flanks', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->back_flanks == "No")
                                        <textarea class="form-control" name="15_pe_respond" id="findingsTextarea_back_flanks" required>{{ $medical_exam->physical_examination->medical_exam_response['15_pe_respond'] }}</textarea>
                                        <input type="hidden" id="back_flanksRepHidden" name="15_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="15_pe_respond" id="findingsTextarea_back_flanks" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Anus, Rectum</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->anus_rectum == "Yes")
                                        <input type="checkbox" id="anus_rectum" name="anus_rectum" value="Yes" onchange="toggleTextareaAndHidden('anus_rectum', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="anus_rectumHidden" name="anus_rectum" value="Yes">
                                    @else
                                        <input type="checkbox" id="anus_rectum" name="anus_rectum" value="Yes" onchange="toggleTextareaAndHidden('anus_rectum', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->anus_rectum == "No")
                                        <textarea class="form-control" name="16_pe_respond" id="findingsTextarea_anus_rectum" required>{{ $medical_exam->physical_examination->medical_exam_response['16_pe_respond'] }}</textarea>
                                        <input type="hidden" id="anus_rectumRepHidden" name="16_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="16_pe_respond" id="findingsTextarea_anus_rectum" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Genito-Urinary System</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->genito_urinary_system == "Yes")
                                        <input type="checkbox" id="genito_urinary_system" name="genito_urinary_system" value="Yes" onchange="toggleTextareaAndHidden('genito_urinary_system', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="genito_urinary_systemHidden" name="genito_urinary_system" value="Yes">
                                    @else
                                        <input type="checkbox" id="genito_urinary_system" name="genito_urinary_system" value="Yes" onchange="toggleTextareaAndHidden('genito_urinary_system', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->genito_urinary_system == "No")
                                        <textarea class="form-control" name="17_pe_respond" id="findingsTextarea_genito_urinary_system" required>{{ $medical_exam->physical_examination->medical_exam_response['17_pe_respond'] }}</textarea>
                                        <input type="hidden" id="genito_urinary_systemRepHidden" name="17_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="17_pe_respond" id="findingsTextarea_genito_urinary_system" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Inguinal, Genitals</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->inguinal_genitals == "Yes")
                                        <input type="checkbox" id="inguinal_genitals" name="inguinal_genitals" value="Yes" onchange="toggleTextareaAndHidden('inguinal_genitals', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="inguinal_genitalsHidden" name="inguinal_genitals" value="Yes">
                                    @else
                                        <input type="checkbox" id="inguinal_genitals" name="inguinal_genitals" value="Yes" onchange="toggleTextareaAndHidden('inguinal_genitals', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->inguinal_genitals == "No")
                                        <textarea class="form-control" name="18_pe_respond" id="findingsTextarea_inguinal_genitals" required>{{ $medical_exam->physical_examination->medical_exam_response['18_pe_respond'] }}</textarea>
                                        <input type="hidden" id="inguinal_genitalsRepHidden" name="18_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="18_pe_respond" id="findingsTextarea_inguinal_genitals" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Musculo-Skeletal</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination['musculo_skeletal1'] == "Yes")
                                        <input type="checkbox" id="musculo_skeletal1" name="musculo_skeletal1" value="Yes" onchange="toggleTextareaAndHidden('musculo_skeletal1', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="musculo_skeletal1Hidden" name="musculo_skeletal1" value="Yes">
                                    @else
                                        <input type="checkbox" id="musculo_skeletal1" name="musculo_skeletal1" value="Yes" onchange="toggleTextareaAndHidden('musculo_skeletal1', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination['musculo_skeletal1'] == "No")
                                        <textarea class="form-control" name="19_pe_respond" id="findingsTextarea_musculo_skeletal1" required>{{ $medical_exam->physical_examination->medical_exam_response['19_pe_respond'] }}</textarea>
                                        <input type="hidden" id="musculo_skeletal1RepHidden" name="19_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="19_pe_respond" id="findingsTextarea_musculo_skeletal1" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Extremities</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->extremities == "Yes")
                                        <input type="checkbox" id="extremities" name="extremities" value="Yes" onchange="toggleTextareaAndHidden('extremities', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="extremitiesHidden" name="extremities" value="Yes">
                                    @else
                                        <input type="checkbox" id="extremities" name="extremities" value="Yes" onchange="toggleTextareaAndHidden('extremities', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->extremities == "No")
                                        <textarea class="form-control" name="20_pe_respond" id="findingsTextarea_extremities" required>{{ $medical_exam->physical_examination->medical_exam_response['20_pe_respond'] }}</textarea>
                                        <input type="hidden" id="extremitiesRepHidden" name="20_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="20_pe_respond" id="findingsTextarea_extremities" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Reflexes</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->reflexes == "Yes")
                                        <input type="checkbox" id="reflexes" name="reflexes" value="Yes" onchange="toggleTextareaAndHidden('reflexes', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="reflexesHidden" name="reflexes" value="Yes">
                                    @else
                                        <input type="checkbox" id="reflexes" name="reflexes" value="Yes" onchange="toggleTextareaAndHidden('reflexes', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->reflexes == "No")
                                        <textarea class="form-control" name="21_pe_respond" id="findingsTextarea_reflexes" required>{{ $medical_exam->physical_examination->medical_exam_response['21_pe_respond'] }}</textarea>
                                        <input type="hidden" id="reflexesRepHidden" name="21_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="21_pe_respond" id="findingsTextarea_reflexes" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Neurological</td>
                                <td class="text-center">
                                    @if($medical_exam->physical_examination->neurological == "Yes")
                                        <input type="checkbox" id="neurological" name="neurological" value="Yes" onchange="toggleTextareaAndHidden('neurological', 'toggleTextarea', 'toggleHidden')" checked>
                                        <input type="hidden" id="neurologicalHidden" name="neurological" value="Yes">
                                    @else
                                        <input type="checkbox" id="neurological" name="neurological" value="Yes" onchange="toggleTextareaAndHidden('neurological', 'toggleTextarea', 'toggleHidden')">
                                    @endif
                                </td>
                                <td>
                                    @if($medical_exam->physical_examination->neurological == "No")
                                        <textarea class="form-control" name="22_pe_respond" id="findingsTextarea_neurological" required>{{ $medical_exam->physical_examination->medical_exam_response['22_pe_respond'] }}</textarea>
                                        <input type="hidden" id="neurologicalRepHidden" name="22_pe_respond" value=" " disabled>
                                    @else
                                        <textarea class="form-control" name="22_pe_respond" id="findingsTextarea_neurological" disabled>Not Applicable</textarea>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <h4><strong>DIAGNOSIS:</strong></h4>
                <div class="row mx-auto mb-3">
                    <textarea class="form-control" name="diagnosis" id="diagnosis">{{ $medical_exam->physical_examination->medical_exam_response->diagnosis }}</textarea>
                </div>

                <div class="position-right ml-auto" style="width: 75px;">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        function toggleTextareaAndHidden(checkboxId, function1, function2) {
            window[function1](checkboxId); // Call the first function dynamically
            window[function2](checkboxId); // Call the second function dynamically
        }

        function toggleTextarea(checkboxId) {
            var textarea = document.getElementById("findingsTextarea_" + checkboxId);
            var hidden = document.getElementById(checkboxId + "Hidden");
            var checkbox = document.getElementById(checkboxId);

            if (textarea) {
                textarea.disabled = checkbox.checked;
                if (!checkbox.checked) {
                    textarea.value = ""; // Clear input text
                    textarea.required = true;
                } else {
                    textarea.value = "Not Applicable";
                    textarea.required = false;
                }
            }

            if (hidden) {
                hidden.value = checkbox.checked ? "Yes" : "No";
            }
        }


        function toggleHidden(checkboxId) {
            var checkbox = document.getElementById(checkboxId);
            var repHidden = document.getElementById(checkboxId + "RepHidden");
                
            if (!checkbox.checked) {
                repHidden.disabled = true;
            } else {
                repHidden.disabled = false;
            }
        }

        function updateCheckboxValue(checkbox, type) {
            var medicationText = document.getElementById("take");
            var medicationHidden = document.getElementById("medicationHidden");
            var medicationValHidden = document.getElementById("medicationValHidden");
            var eyesHidden = document.getElementById("eyesHidden")
            var correctedHidden = document.getElementById("correctedHidden")
            var hospitalizationHidden = document.getElementById("hospitalizationHidden")
            var hospitalizationValHidden = document.getElementById("hospitalizationValHidden")
            var operationHidden = document.getElementById("operationHidden")
            var operationValHidden = document.getElementById("operationValHidden")
            const smokerHidden = document.getElementById("smokerHidden")
            const smokerValHidden1 = document.getElementById("smokerValHidden1")
            const smokerValHidden2 = document.getElementById("smokerValHidden2")
            const alcoholicHidden = document.getElementById("alcoholicHidden")
            const alcoholicValHidden1 = document.getElementById("alcoholicValHidden1")
            const alcoholicValHidden2 = document.getElementById("alcoholicValHidden2")
            const eyesValHidden1 = document.getElementById("eyesValHidden1")
            const eyesValHidden2 = document.getElementById("eyesValHidden2")
            const eyesValHidden3 = document.getElementById("eyesValHidden3")
            const eyesValHidden4 = document.getElementById("eyesValHidden4")
            const correctedValHidden1 = document.getElementById("correctedValHidden1")
            const correctedValHidden2 = document.getElementById("correctedValHidden2")
            const correctedValHidden3 = document.getElementById("correctedValHidden3")
            const correctedValHidden4 = document.getElementById("correctedValHidden4")
            const stickInput = document.getElementById("stick");
            const packInput = document.getElementById("pack");
            const frequentInput = document.getElementById("frequent");
            const weekInput = document.getElementById("week");
            const hospInput = document.getElementById("hosp_times");
            const opInput = document.getElementById("op_times");
            const odInput = document.getElementById("od_pe_respond");
            const od1Input = document.getElementById("od1_pe_respond");
            const osInput = document.getElementById("os_pe_respond");
            const os1Input = document.getElementById("os1_pe_respond");
            const od12Input = document.getElementById("od_pe_respond1");
            const od123Input = document.getElementById("od1_pe_respond1");
            const os12Input = document.getElementById("os_pe_respond1");
            const os123Input = document.getElementById("os1_pe_respond1");

            if (checkbox.checked) {
                checkbox.value = "Yes";
                if (type === 'smoker') {
                    stickInput.disabled = false;
                    packInput.disabled = false;
                    stickInput.required = true;
                    packInput.required = true;
                    smokerHidden.value = 'Yes';
                    smokerValHidden1.disabled = true;
                    smokerValHidden2.disabled = true;
                } else if (type === 'alcoholic') {
                    frequentInput.disabled = false;
                    weekInput.disabled = false;
                    frequentInput.required = true;
                    weekInput.required = true;
                    alcoholicHidden.value = 'Yes';
                    alcoholicValHidden1.disabled = true;
                    alcoholicValHidden2.disabled = true;
                } else if (type === 'medication'){
                    medicationText.disabled = false;
                    medicationText.required = true;
                    medicationText.value = "";
                    medicationHidden.value = 'Yes';
                    medicationValHidden.disabled = true;
                } else if (type === 'hospitalization'){
                    hospInput.disabled = false;
                    hospInput.required = true;
                    hospitalizationHidden.value = "Yes";
                    hospitalizationValHidden.disabled = true;
                } else if (type === 'operation'){
                    opInput.disabled = false;
                    opInput.required = true;
                    operationHidden.value = "Yes";
                    operationValHidden.disabled = true;
                } else if (type === 'eyes'){
                    odInput.disabled = true;
                    od1Input.disabled = true;
                    osInput.disabled = true;
                    os1Input.disabled = true;
                    odInput.required = false;
                    od1Input.required = false;
                    osInput.required = false;
                    os1Input.required = false;
                    odInput.value = '';
                    od1Input.value = '';
                    osInput.value = '';
                    os1Input.value = '';
                    eyesHidden.value = 'Yes';
                    eyesValHidden1.disabled = false;
                    eyesValHidden2.disabled = false;
                    eyesValHidden3.disabled = false;
                    eyesValHidden4.disabled = false;
                } else if (type === 'corrected'){
                    od12Input.disabled = true;
                    od123Input.disabled = true;
                    os12Input.disabled = true;
                    os123Input.disabled = true;
                    od12Input.required = false;
                    od123Input.required = false;
                    os12Input.required = false;
                    os123Input.required = false;
                    od12Input.value = '';
                    od123Input.value = '';
                    os12Input.value = '';
                    os123Input.value = '';
                    correctedHidden.value = 'Yes';
                    correctedValHidden1.disabled = false;
                    correctedValHidden2.disabled = false;
                    correctedValHidden3.disabled = false;
                    correctedValHidden4.disabled = false;
                } 
            } else {
                checkbox.value = "No";
                if (type === 'smoker') {
                    stickInput.disabled = true;
                    packInput.disabled = true;
                    stickInput.required = false;
                    packInput.required = false;
                    stickInput.value = '';
                    packInput.value = '';
                    smokerHidden.value = 'No';
                    smokerValHidden1.disabled = false;
                    smokerValHidden2.disabled = false;
                } else if (type === 'alcoholic') {
                    frequentInput.disabled = true;
                    weekInput.disabled = true;
                    frequentInput.required = false;
                    weekInput.required = false;
                    frequentInput.value = '';
                    weekInput.value = '';
                    alcoholicHidden.value = 'No';
                    alcoholicValHidden1.disabled = false;
                    alcoholicValHidden2.disabled = false;
                } else if (type === 'medication'){
                    medicationText.disabled = true;
                    medicationText.required = false;
                    medicationText.value = 'Not Applicable';
                    medicationHidden.value = 'No';
                    medicationValHidden.disabled = false;
                } else if (type === 'hospitalization'){
                    hospInput.disabled = true;
                    hospInput.required = false;
                    hospInput.value = '';
                    hospitalizationHidden.value = "No";
                    hospitalizationValHidden.disabled = false;
                } else if (type === 'operation'){
                    opInput.disabled = true;
                    opInput.required = false;
                    opInput.value = '';
                    operationHidden.value = "No";
                    operationValHidden.disabled = false;
                } else if (type === 'eyes'){
                    odInput.disabled = false;
                    od1Input.disabled = false;
                    osInput.disabled = false;
                    os1Input.disabled = false;
                    odInput.required = true;
                    od1Input.required = true;
                    osInput.required = true;
                    os1Input.required = true;
                    eyesHidden.value = 'No';
                    eyesValHidden1.disabled = true;
                    eyesValHidden2.disabled = true;
                    eyesValHidden3.disabled = true;
                    eyesValHidden4.disabled = true;
                } else if (type === 'corrected'){
                    od12Input.disabled = false;
                    od123Input.disabled = false;
                    os12Input.disabled = false;
                    os123Input.disabled = false;
                    od12Input.required = true;
                    od123Input.required = true;
                    os12Input.required = true;
                    os123Input.required = true;
                    correctedHidden.value = 'No';
                    correctedValHidden1.disabled = true;
                    correctedValHidden2.disabled = true;
                    correctedValHidden3.disabled = true;
                    correctedValHidden4.disabled = true;
                } 
            }
        }
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
        const cardiacRateInput = document.getElementById('cardiac_rate');
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

    <!-- BMI Formula -->
    <script>
        const heightInput = document.getElementById('height');
        const weightInput = document.getElementById('weight');
        const bmiInput = document.getElementById('bmi');
        const weightCategory = document.getElementById('weightCategory');

        heightInput.addEventListener('input', calculateBMI);
        weightInput.addEventListener('input', calculateBMI);

        function calculateBMI() {
            const height = parseFloat(heightInput.value) / 100; // Convert cm to meters
            const weight = parseFloat(weightInput.value);
        
            if (isNaN(height) || isNaN(weight)) {
                bmiInput.value = ''; // Clear the BMI if either height or weight is not a number
                weightCategory.textContent = '';
                return;
            }
        
            const bmi = weight / (height * height);
            bmiInput.value = bmi.toFixed(2); // Display BMI with two decimal places
        
            if (bmi < 18.5) {
                weightCategory.textContent = 'Underweight';
            } else if (bmi >= 18.5 && bmi <= 24.99) {
                weightCategory.textContent = 'Normal weight';
            } else if (bmi >= 25 && bmi <= 29.9) {
                weightCategory.textContent = 'Overweight';
            } else {
                weightCategory.textContent = 'Obesity';
            }
        }
    </script>
@stop