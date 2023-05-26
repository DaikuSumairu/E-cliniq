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
                                <input type="checkbox" id="allergies" name="allergies" value="Yes" onchange="toggleTextarea('allergies')" checked>
                            </td>
                            <td><textarea class="form-control" name="1_findings" id="findingsTextarea_allergies" onchange="clearInput('allergies')" disabled>Not Applicable</textarea></td>
                        </tr>

                        <tr>
                            <td>Skin Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="skin_disease" name="skin_disease" value="Yes" onchange="toggleTextarea('skin_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="2_findings" id="findingsTextarea_skin_disease" onchange="clearInput('skin_disease')" disabled>Not Applicable</textarea></td>
                        </tr>

                        <tr>
                            <td>Opthalmologic Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="opthalmologic_disorder" name="opthalmologic_disorder" value="Yes" onchange="toggleTextarea('opthalmologic_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="3_findings" id="findingsTextarea_opthalmologic_disorder" onchange="clearInput('opthalmologic_disorder')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>ENT Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="ent_disorder" name="ent_disorder" value="Yes" onchange="toggleTextarea('ent_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="4_findings" id="findingsTextarea_ent_disorder" onchange="clearInput('ent_disorder')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Bronchial Asthma</td>
                            <td class="text-center">
                                <input type="checkbox" id="bronchial_asthma" name="bronchial_asthma" value="Yes" onchange="toggleTextarea('bronchial_asthma')" checked>
                            </td>
                            <td><textarea class="form-control" name="5_findings" id="findingsTextarea_bronchial_asthma" onchange="clearInput('bronchial_asthma')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Cardiac Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="cardiac_disorder" name="cardiac_disorder" value="Yes" onchange="toggleTextarea('cardiac_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="6_findings" id="findingsTextarea_cardiac_disorder" onchange="clearInput('cardiac_disorder')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Diabetes Melilitus</td>
                            <td class="text-center">
                                <input type="checkbox" id="diabetes_melilitus" name="diabetes_melilitus" value="Yes" onchange="toggleTextarea('diabetes_melilitus')" checked>
                            </td>
                            <td><textarea class="form-control" name="7_findings" id="findingsTextarea_diabetes_melilitus" onchange="clearInput('diabetes_melilitus')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Chronic Headache/Migraine</td>
                            <td class="text-center">
                                <input type="checkbox" id="chronic_headache_or_migraine" name="chronic_headache_or_migraine" value="Yes" onchange="toggleTextarea('chronic_headache_or_migraine')" checked>
                            </td>
                            <td><textarea class="form-control" name="8_findings" id="findingsTextarea_chronic_headache_or_migraine" onchange="clearInput('chronic_headache_or_migraine')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Hepatitis</td>
                            <td class="text-center">
                                <input type="checkbox" id="hepatitis" name="hepatitis" value="Yes" onchange="toggleTextarea('hepatitis')" checked>
                            </td>
                            <td><textarea class="form-control" name="9_findings" id="findingsTextarea_hepatitis" onchange="clearInput('hepatitis')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Hypertension</td>
                            <td class="text-center">
                                <input type="checkbox" id="hypertension" name="hypertension" value="Yes" onchange="toggleTextarea('hypertension')" checked>
                            </td>
                            <td><textarea class="form-control" name="10_findings" id="findingsTextarea_hypertension" onchange="clearInput('hypertension')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Thyroid Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="thyroid_disorder" name="thyroid_disorder" value="Yes" onchange="toggleTextarea('thyroid_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="11_findings" id="findingsTextarea_thyroid_disorder" onchange="clearInput('thyroid_disorder')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Blood Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="blood_disorder" name="blood_disorder" value="Yes" onchange="toggleTextarea('blood_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="12_findings" id="findingsTextarea_blood_disorder" onchange="clearInput('blood_disorder')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Tuberculosis</td>
                            <td class="text-center">
                                <input type="checkbox" id="tuberculosis" name="tuberculosis" value="Yes" onchange="toggleTextarea('tuberculosis')" checked>
                            </td>
                            <td><textarea class="form-control" name="13_findings" id="findingsTextarea_tuberculosis" onchange="clearInput('tuberculosis')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Peptic Ulcer</td>
                            <td class="text-center">
                                <input type="checkbox" id="peptic_ulcer" name="peptic_ulcer" value="Yes" onchange="toggleTextarea('peptic_ulcer')" checked>
                            </td>
                            <td><textarea class="form-control" name="14_findings" id="findingsTextarea_peptic_ulcer" onchange="clearInput('peptic_ulcer')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Musculoskeletal Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="musculoskeletal_disorder" name="musculoskeletal_disorder" value="Yes" onchange="toggleTextarea('musculoskeletal_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="15_findings" id="findingsTextarea_musculoskeletal_disorder" onchange="clearInput('musculoskeletal_disorder')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Infectious Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="infectious_disease" name="infectious_disease" value="Yes" onchange="toggleTextarea('infectious_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="16_findings" id="findingsTextarea_infectious_disease" onchange="clearInput('infectious_disease')" disabled>Not Applicable</textarea></td>
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
                                <input type="checkbox" id="bronchial_asthma_1" name="bronchial_asthma_1" value="Yes" onchange="toggleTextarea('bronchial_asthma_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="1_positive" id="findingsTextarea_bronchial_asthma_1" onchange="clearInput('bronchial_asthma_1')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Diabetes Melilitus</td>
                            <td class="text-center">
                                <input type="checkbox" id="diabetes_melilitus_1" name="diabetes_melilitus_1" value="Yes" onchange="toggleTextarea('diabetes_melilitus_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="2_positive" id="findingsTextarea_diabetes_melilitus_1" onchange="clearInput('diabetes_melilitus_1')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Thyroid Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="thyroid_disorder_1" name="thyroid_disorder_1" value="Yes" onchange="toggleTextarea('thyroid_disorder_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="3_positive" id="findingsTextarea_thyroid_disorder_1" onchange="clearInput('thyroid_disorder_1')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Opthalmologic Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="opthalmologic_disease" name="opthalmologic_disease" value="Yes" onchange="toggleTextarea('opthalmologic_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="4_positive" id="findingsTextarea_opthalmologic_disease" onchange="clearInput('opthalmologic_disease')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Cancer</td>
                            <td class="text-center">
                                <input type="checkbox" id="cancer" name="cancer" value="Yes" onchange="toggleTextarea('cancer')" checked>
                            </td>
                            <td><textarea class="form-control" name="5_positive" id="findingsTextarea_cancer" onchange="clearInput('cancer')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Cardiac Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="cardiac_disorder_1" name="cardiac_disorder_1" value="Yes" onchange="toggleTextarea('cardiac_disorder_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="6_positive" id="findingsTextarea_cardiac_disorder_1" onchange="clearInput('cardiac_disorder_1')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Hypertension</td>
                            <td class="text-center">
                                <input type="checkbox" id="hypertension_1" name="hypertension_1" value="Yes" onchange="toggleTextarea('hypertension_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="7_positive" id="findingsTextarea_hypertension_1" onchange="clearInput('hypertension_1')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Tuberculosis</td>
                            <td class="text-center">
                                <input type="checkbox" id="tuberculosis_1" name="tuberculosis_1" value="Yes" onchange="toggleTextarea('tuberculosis_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="8_positive" id="findingsTextarea_tuberculosis_1" onchange="clearInput('tuberculosis_1')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Nervous Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="nervous_disorder" name="nervous_disorder" value="Yes" onchange="toggleTextarea('nervous_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="9_positive" id="findingsTextarea_nervous_disorder" onchange="clearInput('nervous_disorder')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Musculoskeletal</td>
                            <td class="text-center">
                                <input type="checkbox" id="musculoskeletal" name="musculoskeletal" value="Yes" onchange="toggleTextarea('musculoskeletal')" checked>
                            </td>
                            <td><textarea class="form-control" name="10_positive" id="findingsTextarea_musculoskeletal" onchange="clearInput('musculoskeletal')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Liver Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="liver_disease" name="liver_disease" value="Yes" onchange="toggleTextarea('liver_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="11_positive" id="findingsTextarea_liver_disease" onchange="clearInput('liver_disease')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Kidney Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="kidney_disease" name="kidney_disease" value="Yes" onchange="toggleTextarea('kidney_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="12_positive" id="findingsTextarea_kidney_disease" onchange="clearInput('kidney_disease')" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td >Others</td>
                            <td colspan="2">
                                <textarea class="form-control" name="others_1"></textarea>
                            </td>
                        </tr>
                    </table>

                    <!-- Personal and Social History -->
                    <div class="text-center">
                        <h4><strong>C. Personal and Social History</strong></h4>
                    </div>
                    <div class="container border">
                        <div class="row my-3">
                            <input type="checkbox" id="smoker" name="smoker" value="Yes" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'smoker')" checked>
                            <div class="col-0">
                                <p class="mr-1"><strong>Smoker:</strong></p>
                            </div>
                            <input type="number" name="stick" class="col-0 mx-1" style="height: 25px; width: 50px;" id="stick" disable required>
                            <div class="col-0">
                                <p>sticks/day</p>
                            </div>
                            <input type="number" name="pack" class="col-0 mx-1" style="height: 25px; width: 50px;" id="pack" disable required>
                            <div class="col-0">
                                <p>pack year/s</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <input type="checkbox" id="alcoholic" name="alcoholic" value="Yes" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'alcoholic')" checked>
                            <div class="col-0">
                                <p class="mr-1"><strong>Alcoholic:</strong></p>
                            </div>
                            <input type="number" name="frequent" class="col-0 mx-1" style="height: 25px; width: 50px;" id="frequent" disable required>
                            <div class="col-0">
                                <p>bottles/shot</p>
                            </div>
                            <input type="number" name="week" class="col-0 mx-1" style="height: 25px; width: 50px;" id="week" disable required>
                            <div class="col-0">
                                <p>/week</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <input type="checkbox" id="medication" name="medication" value="Yes" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'medication')" checked>
                            <div class="col">
                                <p><strong>Medication:</strong></p>
                                <textarea class="form-control" name="take" id="take" disable required></textarea>
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
                                    <input type="checkbox" id="lnmp" name="lnmp" value="Yes" onchange="toggleTextarea('lnmp')" checked>
                                </td>
                                <td><textarea class="form-control" name="1_positive1" id="findingsTextarea_lnmp" onchange="clearInput('lnmp')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>OB Score</td>
                                <td class="text-center">
                                    <input type="checkbox" id="ob_score" name="ob_score" value="Yes" onchange="toggleTextarea('ob_score')" checked>
                                </td>
                                <td><textarea class="form-control" name="2_positive1" id="findingsTextarea_ob_score" onchange="clearInput('ob_score')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Abnormal Pregnancies</td>
                                <td class="text-center">
                                    <input type="checkbox" id="abnormal_pregnancies" name="abnormal_pregnancies" value="Yes" onchange="toggleTextarea('abnormal_pregnancies')" checked>
                                </td>
                                <td><textarea class="form-control" name="3_positive1" id="findingsTextarea_abnormal_pregnancies" onchange="clearInput('abnormal_pregnancies')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Date of Last Delivery</td>
                                <td class="text-center">
                                    <input type="checkbox" id="date_of_last_delivery" name="date_of_last_delivery" value="Yes" onchange="toggleTextarea('date_of_last_delivery')" checked>
                                </td>
                                <td><textarea class="form-control" name="4_positive1" id="findingsTextarea_date_of_last_delivery" onchange="clearInput('date_of_last_delivery')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Breast/Uterus/Ovaries</td>
                                <td class="text-center">
                                    <input type="checkbox" id="breast_uterus_ovaries" name="breast_uterus_ovaries" value="Yes" onchange="toggleTextarea('breast_uterus_ovaries')" checked>
                                </td>
                                <td><textarea class="form-control" name="5_positive1" id="findingsTextarea_breast_uterus_ovaries" onchange="clearInput('breast_uterus_ovaries')" disabled>Not Applicable</textarea></td>
                            </tr>
                        </table>
                    
                        <!-- Hospitalization and Operation -->
                        <div class="container border my-3 pt-2">
                            <div class="row">
                                <input type="checkbox" id="hospitalization" name="hospitalization" value="Yes" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'hospitalization')" checked>
                                <div class="col-0 mb-3">
                                    <p class="h5 mr-1"><strong>E. Hospitalization/s:</strong></p>
                                </div>
                                <input type="number" name="hosp_times" class="col-0 mx-1" style="height: 25px; width: 138px;" id="hosp_times" disable required>
                            </div>
                            <div class="row">
                                <input type="checkbox" id="operation" name="operation" value="Yes" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'operation')" checked>
                                <div class="col-0">
                                    <p class="h5 mr-1"><strong>F. Operation/s:</strong></p>
                                </div>
                                <input type="number" name="op_times" class="col-0 mx-1" style="height: 25px; width: 185px;" id="op_times" disable required>
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
                                    <input type="checkbox" id="skin" name="skin" value="Yes" onchange="toggleTextarea('skin')" checked>
                                </td>
                                <td><textarea class="form-control" name="1_positive2" id="findingsTextarea_skin" onchange="clearInput('skin')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Opthalmologic</td>
                                <td class="text-center">
                                    <input type="checkbox" id="opthalmologic" name="opthalmologic" value="Yes" onchange="toggleTextarea('opthalmologic')" checked>
                                </td>
                                <td><textarea class="form-control" name="2_positive2" id="findingsTextarea_opthalmologic" onchange="clearInput('opthalmologic')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>ENT</td>
                                <td class="text-center">
                                    <input type="checkbox" id="ent" name="ent" value="Yes" onchange="toggleTextarea('ent')" checked>
                                </td>
                                <td><textarea class="form-control" name="3_positive2" id="findingsTextarea_ent" onchange="clearInput('ent')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Cardiovascular</td>
                                <td class="text-center">
                                    <input type="checkbox" id="cardiovascular" name="cardiovascular" value="Yes" onchange="toggleTextarea('cardiovascular')" checked>
                                </td>
                                <td><textarea class="form-control" name="4_positive2" id="findingsTextarea_cardiovascular" onchange="clearInput('cardiovascular')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Respiratory</td>
                                <td class="text-center">
                                    <input type="checkbox" id="respiratory" name="respiratory" value="Yes" onchange="toggleTextarea('respiratory')" checked>
                                </td>
                                <td><textarea class="form-control" name="5_positive2" id="findingsTextarea_respiratory" onchange="clearInput('respiratory')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Gastro Intestinal</td>
                                <td class="text-center">
                                    <input type="checkbox" id="gastro_intestinal" name="gastro_intestinal" value="Yes" onchange="toggleTextarea('gastro_intestinal')" checked>
                                </td>
                                <td><textarea class="form-control" name="6_positive2" id="findingsTextarea_gastro_intestinal" onchange="clearInput('gastro_intestinal')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Neuro-Psychiatric</td>
                                <td class="text-center">
                                    <input type="checkbox" id="neuro_psychiatric" name="neuro_psychiatric" value="Yes" onchange="toggleTextarea('neuro_psychiatric')" checked>
                                </td>
                                <td><textarea class="form-control" name="7_positive2" id="findingsTextarea_neuro_psychiatric" onchange="clearInput('neuro_psychiatric')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Hematology</td>
                                <td class="text-center">
                                    <input type="checkbox" id="hematology" name="hematology" value="Yes" onchange="toggleTextarea('hematology')" checked>
                                </td>
                                <td><textarea class="form-control" name="8_positive2" id="findingsTextarea_hematology" onchange="clearInput('hematology')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Genitourinary</td>
                                <td class="text-center">
                                    <input type="checkbox" id="genitourinary" name="genitourinary" value="Yes" onchange="toggleTextarea('genitourinary')" checked>
                                </td>
                                <td><textarea class="form-control" name="9_positive2" id="findingsTextarea_genitourinary" onchange="clearInput('genitourinary')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Musculo-Skeletal</td>
                                <td class="text-center">
                                    <input type="checkbox" id="musculo_skeletal" name="musculo_skeletal" value="Yes" onchange="toggleTextarea('musculo_skeletal')" checked>
                                </td>
                                <td><textarea class="form-control" name="10_positive2" id="findingsTextarea_musculo_skeletal" onchange="clearInput('musculo_skeletal')" disabled>Not Applicable</textarea></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="position-right ml-auto" style="width: 75px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
        function toggleTextarea(checkboxId) {
            var textarea = document.getElementById("findingsTextarea_" + checkboxId);
            var checkbox = document.getElementById(checkboxId);
            textarea.disabled = checkbox.checked;
            if (!checkbox.checked) {
                textarea.value = ""; // Clear input text
                checkbox.value = "No";
                textarea.required = true;
            }else{
                textarea.value = "Not Applicable"
                checkbox.value = "Yes";
                textarea.required = false;
            }
        }

        function clearInput(checkboxId) {
            var textarea = document.getElementById("findingsTextarea_" + checkboxId);
            var checkbox = document.getElementById(checkboxId);
            if (!checkbox.checked) {
                textarea.value = ""; // Clear input text
            }
        }

        function updateCheckboxValue(checkbox, type) {
            var medicationText = document.getElementById("take");
            const stickInput = document.getElementById("stick");
            const packInput = document.getElementById("pack");
            const frequentInput = document.getElementById("frequent");
            const weekInput = document.getElementById("week");
            const hospInput = document.getElementById("hosp_times");
            const opInput = document.getElementById("op_times");

            if (checkbox.checked) {
                checkbox.value = "Yes";
                if (type === 'smoker') {
                    stickInput.disabled = false;
                    packInput.disabled = false;
                    stickInput.required = true;
                    packInput.required = true;
                } else if (type === 'alcoholic') {
                    frequentInput.disabled = false;
                    weekInput.disabled = false;
                    frequentInput.required = true;
                    weekInput.required = true;
                } else if (type === 'medication'){
                    medicationText.disabled = false;
                    medicationText.required = true;
                } else if (type === 'hospitalization'){
                    hospInput.disabled = false;
                    hospInput.required = true;
                } else if (type === 'operation'){
                    opInput.disabled = false;
                    opInput.required = true;
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
                } else if (type === 'alcoholic') {
                    frequentInput.disabled = true;
                    weekInput.disabled = true;
                    frequentInput.required = false;
                    weekInput.required = false;
                    frequentInput.value = '';
                    weekInput.value = '';
                } else if (type === 'medication'){
                    medicationText.disabled = true;
                    medicationText.required = false;
                    medicationText.value = "";
                } else if (type === 'hospitalization'){
                    hospInput.disabled = true;
                    hospInput.required = false;
                    hospInput.value = "";
                } else if (type === 'operation'){
                    opInput.disabled = true;
                    opInput.required = false;
                    opInput.value = "";
                } 
            }
        }
    </script>
@stop