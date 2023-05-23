@extends('adminlte::page')

@section('title', 'Creating Medical Exam')

@section('content_header')
    <h1>Creating Medical Exam</h1>
@stop

@section('content')
    <div class="container mx-auto pb-4">
        <form method="POST" action="{{ route('nurse.medExamStore') }}">
            @csrf
            <!-- Record ID Created (Hidden) -->
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <input type="hidden" name="date_created" value="{{ now() }}">
            <div class="row row-cols-3">
                <div class="col">
                    <!-- Past Medical History -->
                    <div class="text-center">
                        <h3><strong>Past Medical Exam</strong></h3>
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
                                <input type="checkbox" id="allergies" name="allergies" value="Yes" onchange="toggleTextarea('allergies')" checked>
                            </td>
                            <td><textarea class="form-control" name="1_findings" id="findingsTextarea_allergies" onchange="clearInput('allergies')" disabled></textarea></td>
                        </tr>

                        <tr>
                            <td>Skin Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="skin_disease" name="skin_disease" value="Yes" onchange="toggleTextarea('skin_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="2_findings" id="findingsTextarea_skin_disease" onchange="clearInput('skin_disease')" disabled></textarea></td>
                        </tr>

                        <tr>
                            <td>Opthalmologic Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="opthalmologic_disorder" name="opthalmologic_disorder" value="Yes" onchange="toggleTextarea('opthalmologic_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="3_findings" id="findingsTextarea_opthalmologic_disorder" onchange="clearInput('opthalmologic_disorder')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>ENT Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="ent_disorder" name="ent_disorder" value="Yes" onchange="toggleTextarea('ent_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="4_findings" id="findingsTextarea_ent_disorder" onchange="clearInput('ent_disorder')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Bronchial Asthma</td>
                            <td class="text-center">
                                <input type="checkbox" id="bronchial_asthma" name="bronchial_asthma" value="Yes" onchange="toggleTextarea('bronchial_asthma')" checked>
                            </td>
                            <td><textarea class="form-control" name="5_findings" id="findingsTextarea_bronchial_asthma" onchange="clearInput('bronchial_asthma')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Cardiac Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="cardiac_disorder" name="cardiac_disorder" value="Yes" onchange="toggleTextarea('cardiac_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="6_findings" id="findingsTextarea_cardiac_disorder" onchange="clearInput('cardiac_disorder')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Diabetes Melilitus</td>
                            <td class="text-center">
                                <input type="checkbox" id="diabetes_melilitus" name="diabetes_melilitus" value="Yes" onchange="toggleTextarea('diabetes_melilitus')" checked>
                            </td>
                            <td><textarea class="form-control" name="7_findings" id="findingsTextarea_diabetes_melilitus" onchange="clearInput('diabetes_melilitus')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Chronic Headache/Migraine</td>
                            <td class="text-center">
                                <input type="checkbox" id="chronic_headache_or_migraine" name="chronic_headache_or_migraine" value="Yes" onchange="toggleTextarea('chronic_headache_or_migraine')" checked>
                            </td>
                            <td><textarea class="form-control" name="8_findings" id="findingsTextarea_chronic_headache_or_migraine" onchange="clearInput('chronic_headache_or_migraine')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Hepatitis</td>
                            <td class="text-center">
                                <input type="checkbox" id="hepatitis" name="hepatitis" value="Yes" onchange="toggleTextarea('hepatitis')" checked>
                            </td>
                            <td><textarea class="form-control" name="9_findings" id="findingsTextarea_hepatitis" onchange="clearInput('hepatitis')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Hypertension</td>
                            <td class="text-center">
                                <input type="checkbox" id="hypertension" name="hypertension" value="Yes" onchange="toggleTextarea('hypertension')" checked>
                            </td>
                            <td><textarea class="form-control" name="10_findings" id="findingsTextarea_hypertension" onchange="clearInput('hypertension')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Thyroid Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="thyroid_disorder" name="thyroid_disorder" value="Yes" onchange="toggleTextarea('thyroid_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="11_findings" id="findingsTextarea_thyroid_disorder" onchange="clearInput('thyroid_disorder')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Blood Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="blood_disorder" name="blood_disorder" value="Yes" onchange="toggleTextarea('blood_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="12_findings" id="findingsTextarea_blood_disorder" onchange="clearInput('blood_disorder')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Tuberculosis</td>
                            <td class="text-center">
                                <input type="checkbox" id="tuberculosis" name="tuberculosis" value="Yes" onchange="toggleTextarea('tuberculosis')" checked>
                            </td>
                            <td><textarea class="form-control" name="13_findings" id="findingsTextarea_tuberculosis" onchange="clearInput('tuberculosis')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Peptic Ulcer</td>
                            <td class="text-center">
                                <input type="checkbox" id="peptic_ulcer" name="peptic_ulcer" value="Yes" onchange="toggleTextarea('peptic_ulcer')" checked>
                            </td>
                            <td><textarea class="form-control" name="14_findings" id="findingsTextarea_peptic_ulcer" onchange="clearInput('peptic_ulcer')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Musculoskeletal Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="musculoskeletal_disorder" name="musculoskeletal_disorder" value="Yes" onchange="toggleTextarea('musculoskeletal_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="15_findings" id="findingsTextarea_musculoskeletal_disorder" onchange="clearInput('musculoskeletal_disorder')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Infectious Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="infectious_disease" name="infectious_disease" value="Yes" onchange="toggleTextarea('infectious_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="16_findings" id="findingsTextarea_infectious_disease" onchange="clearInput('infectious_disease')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td >Others</td>
                            <td colspan="2">
                                <textarea class="form-control" name="others"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Family History -->
                <div class="col">
                    <div class="text-center">
                        <h3><strong>Family History</strong></h3>
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
                                <input type="checkbox" id="bronchial_asthma_1" name="bronchial_asthma_1" value="Yes" onchange="toggleTextarea('bronchial_asthma_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="1_positive" id="findingsTextarea_bronchial_asthma_1" onchange="clearInput('bronchial_asthma_1')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Diabetes Melilitus</td>
                            <td class="text-center">
                                <input type="checkbox" id="diabetes_melilitus_1" name="diabetes_melilitus_1" value="Yes" onchange="toggleTextarea('diabetes_melilitus_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="2_positive" id="findingsTextarea_diabetes_melilitus_1" onchange="clearInput('diabetes_melilitus_1')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Thyroid Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="thyroid_disorder_1" name="thyroid_disorder_1" value="Yes" onchange="toggleTextarea('thyroid_disorder_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="3_positive" id="findingsTextarea_thyroid_disorder_1" onchange="clearInput('thyroid_disorder_1')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Opthalmologic Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="opthalmologic_disease" name="opthalmologic_disease" value="Yes" onchange="toggleTextarea('opthalmologic_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="4_positive" id="findingsTextarea_opthalmologic_disease" onchange="clearInput('opthalmologic_disease')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Cancer</td>
                            <td class="text-center">
                                <input type="checkbox" id="cancer" name="cancer" value="Yes" onchange="toggleTextarea('cancer')" checked>
                            </td>
                            <td><textarea class="form-control" name="5_positive" id="findingsTextarea_cancer" onchange="clearInput('cancer')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Cardiac Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="cardiac_disorder_1" name="cardiac_disorder_1" value="Yes" onchange="toggleTextarea('cardiac_disorder_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="6_positive" id="findingsTextarea_cardiac_disorder_1" onchange="clearInput('cardiac_disorder_1')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Hypertension</td>
                            <td class="text-center">
                                <input type="checkbox" id="hypertension_1" name="hypertension_1" value="Yes" onchange="toggleTextarea('hypertension_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="7_positive" id="findingsTextarea_hypertension_1" onchange="clearInput('hypertension_1')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Tuberculosis</td>
                            <td class="text-center">
                                <input type="checkbox" id="tuberculosis_1" name="tuberculosis_1" value="Yes" onchange="toggleTextarea('tuberculosis_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="8_positive" id="findingsTextarea_tuberculosis_1" onchange="clearInput('tuberculosis_1')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Nervous Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="nervous_disorder" name="nervous_disorder" value="Yes" onchange="toggleTextarea('nervous_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="9_positive" id="findingsTextarea_nervous_disorder" onchange="clearInput('nervous_disorder')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Musculoskeletal</td>
                            <td class="text-center">
                                <input type="checkbox" id="musculoskeletal" name="musculoskeletal" value="Yes" onchange="toggleTextarea('musculoskeletal')" checked>
                            </td>
                            <td><textarea class="form-control" name="10_positive" id="findingsTextarea_musculoskeletal" onchange="clearInput('musculoskeletal')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Liver Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="liver_disease" name="liver_disease" value="Yes" onchange="toggleTextarea('liver_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="11_positive" id="findingsTextarea_liver_disease" onchange="clearInput('liver_disease')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td>Kidney Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="kidney_disease" name="kidney_disease" value="Yes" onchange="toggleTextarea('kidney_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="12_positive" id="findingsTextarea_kidney_disease" onchange="clearInput('kidney_disease')" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td >Others</td>
                            <td colspan="2">
                                <textarea class="form-control" name="others_1"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="position-right ml-auto" style="width: 75px;">
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
        function toggleTextarea(checkboxId) {
            var textarea = document.getElementById("findingsTextarea_" + checkboxId);
            var checkbox = document.getElementById(checkboxId);
            textarea.disabled = checkbox.checked;
            if (!checkbox.checked) {
                textarea.value = ""; // Clear input text
            }
        }

        function clearInput(checkboxId) {
            var textarea = document.getElementById("findingsTextarea_" + checkboxId);
            var checkbox = document.getElementById(checkboxId);
            if (!checkbox.checked) {
                textarea.value = ""; // Clear input text
            }
        }
    </script>
@stop