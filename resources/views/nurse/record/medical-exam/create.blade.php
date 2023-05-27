@extends('adminlte::page')

@section('title', 'Creating Medical Exam')

@section('content_header')
    <h1>Creating Medical Exam</h1>
@stop

@section('content')
    <div class="container mx-auto pb-4" style="height: 625px; overflow: auto;">
        <form method="POST" action="{{ route('nurse.medExamStore') }}">
            @csrf
            <!-- Record ID Created (Hidden) -->
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <input type="hidden" name="date_created" value="{{ now() }}">
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
                            <input type="checkbox" id="smoker" name="smoker" value="No" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'smoker')">
                            <div class="col-0">
                                <p class="mr-1"><strong>Smoker:</strong></p>
                            </div>
                            <input type="number" name="stick" class="col-0 mx-1" style="height: 25px; width: 50px;" id="stick" disabled>
                            <div class="col-0">
                                <p>sticks/day</p>
                            </div>
                            <input type="number" name="pack" class="col-0 mx-1" style="height: 25px; width: 50px;" id="pack" disabled>
                            <div class="col-0">
                                <p>pack year/s</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <input type="checkbox" id="alcoholic" name="alcoholic" value="No" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'alcoholic')">
                            <div class="col-0">
                                <p class="mr-1"><strong>Alcoholic:</strong></p>
                            </div>
                            <input type="number" name="frequent" class="col-0 mx-1" style="height: 25px; width: 50px;" id="frequent" disabled>
                            <div class="col-0">
                                <p>bottles/shot</p>
                            </div>
                            <input type="number" name="week" class="col-0 mx-1" style="height: 25px; width: 50px;" id="week" disabled>
                            <div class="col-0">
                                <p>/week</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <input type="checkbox" id="medication" name="medication" value="No" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'medication')">
                            <div class="col">
                                <p><strong>Medication:</strong></p>
                                <textarea class="form-control" name="take" id="take" disabled></textarea>
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
                                <input type="checkbox" id="hospitalization" name="hospitalization" value="No" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'hospitalization')">
                                <div class="col-0 mb-3">
                                    <p class="h5 mr-1"><strong>E. Hospitalization/s:</strong></p>
                                </div>
                                <input type="number" name="hosp_times" class="col-0 mx-1" style="height: 25px; width: 138px;" id="hosp_times" disabled>
                            </div>
                            <div class="row">
                                <input type="checkbox" id="operation" name="operation" value="No" class="col-0" style="height: 25px; width: 30px;" onchange="updateCheckboxValue(this, 'operation')">
                                <div class="col-0">
                                    <p class="h5 mr-1"><strong>F. Operation/s:</strong></p>
                                </div>
                                <input type="number" name="op_times" class="col-0 mx-1" style="height: 25px; width: 185px;" id="op_times" disabled>
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
                <h2><strong>II. Physical Examination</strong></h2>
                <div class="row mx-auto mb-3">
                    <div class="col border">
                        <p class="mb-1"><strong>Height:</strong></p>
                        <div class="row">
                            <div class="col-0 ml-2">
                                <input type="number" name="height" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="height" required>
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
                                <input type="number" name="weight" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="weight" required>
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
                    <div class="col border">
                        <p class="mb-1"><strong>Cardiac Rate:</strong></p>
                        <input type="number" name="cardiac_rate" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="cardiac_rate" required>
                    </div> 
                    <div class="col border">
                        <p class="mb-1"><strong>Respiratory Rate</strong></p>
                        <input type="number" name="respiratory_rate" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="respiratory_rate" required>
                    </div> 
                    <div class="col border">
                        <p class="mb-1"><strong>BMI:</strong></p>
                        <input type="number" name="bmi" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="bmi" required>
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
                                    <input type="checkbox" id="general_appearance" name="general_appearance" value="Yes" onchange="toggleTextarea('general_appearance')" checked>
                                </td>
                                <td><textarea class="form-control" name="1_findings1" id="findingsTextarea_general_appearance" onchange="clearInput('general_appearance')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Skin</td>
                                <td class="text-center">
                                    <input type="checkbox" id="skin1" name="skin1" value="Yes" onchange="toggleTextarea('skin1')" checked>
                                </td>
                                <td><textarea class="form-control" name="2_findings1" id="findingsTextarea_skin1" onchange="clearInput('skin1')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Head and Scalp</td>
                                <td class="text-center">
                                    <input type="checkbox" id="head_and_scalp" name="head_and_scalp" value="Yes" onchange="toggleTextarea('head_and_scalp')" checked>
                                </td>
                                <td><textarea class="form-control" name="3_findings1" id="findingsTextarea_head_and_scalp" onchange="clearInput('head_and_scalp')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Eyes</td>
                                <td class="text-center">
                                    <input type="checkbox" id="eyes" name="eyes" value="Yes" onchange="updateCheckboxValue(this, 'eyes')" checked>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-0">
                                            <input type="number" name="od_findings1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od_findings1" disabled>
                                        </div>
                                        <div class="col-0">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0">
                                            <input type="number" name="od1_findings1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od1_findings1" disabled>
                                        </div>
                                        <div class="col-0">
                                            <p>OD</p>
                                        </div>
                                        <div class="col-0">
                                            <input type="number" name="os_findings1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os_findings1" disabled>
                                        </div>
                                        <div class="col-0">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0">
                                            <input type="number" name="os1_findings1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os1_findings1" disabled>
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
                                    <input type="checkbox" id="corrected" name="corrected" value="Yes" onchange="updateCheckboxValue(this, 'corrected')" checked>
                                </td>
                                <td>
                                <div class="row">
                                        <div class="col-0">
                                            <input type="number" name="od_findings2" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od_findings2" disabled>
                                        </div>
                                        <div class="col-0">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0">
                                            <input type="number" name="od1_findings2" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od1_findings2" disabled>
                                        </div>
                                        <div class="col-0">
                                            <p>OD</p>
                                        </div>
                                        <div class="col-0">
                                            <input type="number" name="os_findings2" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os_findings2" disabled>
                                        </div>
                                        <div class="col-0">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0">
                                            <input type="number" name="os1_findings2" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os1_findings2" disabled>
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
                                    <input type="checkbox" id="pupils" name="pupils" value="Yes" onchange="toggleTextarea('pupils')" checked>
                                </td>
                                <td><textarea class="form-control" name="6_findings1" id="findingsTextarea_pupils" onchange="clearInput('pupils')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Ear, Eardrums</td>
                                <td class="text-center">
                                    <input type="checkbox" id="ear_eardrums" name="ear_eardrums" value="Yes" onchange="toggleTextarea('ear_eardrums')" checked>
                                </td>
                                <td><textarea class="form-control" name="7_findings1" id="findingsTextarea_ear_eardrums" onchange="clearInput('ear_eardrums')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Nose, Sinuses</td>
                                <td class="text-center">
                                    <input type="checkbox" id="nose_sinuses" name="nose_sinuses" value="Yes" onchange="toggleTextarea('nose_sinuses')" checked>
                                </td>
                                <td><textarea class="form-control" name="8_findings1" id="findingsTextarea_nose_sinuses" onchange="clearInput('nose_sinuses')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Mouth, Throat</td>
                                <td class="text-center">
                                    <input type="checkbox" id="mouth_throat" name="mouth_throat" value="Yes" onchange="toggleTextarea('mouth_throat')" checked>
                                </td>
                                <td><textarea class="form-control" name="9_findings1" id="findingsTextarea_mouth_throat" onchange="clearInput('mouth_throat')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Neck, Thyroid</td>
                                <td class="text-center">
                                    <input type="checkbox" id="neck_thyroid" name="neck_thyroid" value="Yes" onchange="toggleTextarea('neck_thyroid')" checked>
                                </td>
                                <td><textarea class="form-control" name="10_findings1" id="findingsTextarea_neck_thyroid" onchange="clearInput('neck_thyroid')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Chest, Breast, Axilla</td>
                                <td class="text-center">
                                    <input type="checkbox" id="chest_breast_axilla" name="chest_breast_axilla" value="Yes" onchange="toggleTextarea('chest_breast_axilla')" checked>
                                </td>
                                <td><textarea class="form-control" name="11_findings1" id="findingsTextarea_chest_breast_axilla" onchange="clearInput('chest_breast_axilla')" disabled>Not Applicable</textarea></td>
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
                                    <input type="checkbox" id="heart_cardiovascular" name="heart_cardiovascular" value="Yes" onchange="toggleTextarea('heart_cardiovascular')" checked>
                                </td>
                                <td><textarea class="form-control" name="12_findings1" id="findingsTextarea_heart_cardiovascular" onchange="clearInput('heart_cardiovascular')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Lungs-Respiratory</td>
                                <td class="text-center">
                                    <input type="checkbox" id="lungs_respiratory" name="lungs_respiratory" value="Yes" onchange="toggleTextarea('lungs_respiratory')" checked>
                                </td>
                                <td><textarea class="form-control" name="13_findings1" id="findingsTextarea_lungs_respiratory" onchange="clearInput('lungs_respiratory')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Abdomen</td>
                                <td class="text-center">
                                    <input type="checkbox" id="abdomen" name="abdomen" value="Yes" onchange="toggleTextarea('abdomen')" checked>
                                </td>
                                <td><textarea class="form-control" name="14_findings1" id="findingsTextarea_abdomen" onchange="clearInput('abdomen')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Back, Flanks</td>
                                <td class="text-center">
                                    <input type="checkbox" id="back_flanks" name="back_flanks" value="Yes" onchange="toggleTextarea('back_flanks')" checked>
                                </td>
                                <td><textarea class="form-control" name="15_findings1" id="findingsTextarea_back_flanks" onchange="clearInput('back_flanks')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Anus, Rectum</td>
                                <td class="text-center">
                                    <input type="checkbox" id="anus_rectum" name="anus_rectum" value="Yes" onchange="toggleTextarea('anus_rectum')" checked>
                                </td>
                                <td><textarea class="form-control" name="16_findings1" id="findingsTextarea_anus_rectum" onchange="clearInput('anus_rectum')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Genito-Urinary System</td>
                                <td class="text-center">
                                    <input type="checkbox" id="genito_urinary_system" name="genito_urinary_system" value="Yes" onchange="toggleTextarea('genito_urinary_system')" checked>
                                </td>
                                <td><textarea class="form-control" name="17_findings1" id="findingsTextarea_genito_urinary_system" onchange="clearInput('genito_urinary_system')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Inguinal, Genitals</td>
                                <td class="text-center">
                                    <input type="checkbox" id="inguinal_genitals" name="inguinal_genitals" value="Yes" onchange="toggleTextarea('inguinal_genitals')" checked>
                                </td>
                                <td><textarea class="form-control" name="18_findings1" id="findingsTextarea_inguinal_genitals" onchange="clearInput('inguinal_genitals')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Musculo-Skeletal</td>
                                <td class="text-center">
                                    <input type="checkbox" id="musculo_skeletal1" name="musculo_skeletal1" value="Yes" onchange="toggleTextarea('musculo_skeletal1')" checked>
                                </td>
                                <td><textarea class="form-control" name="19_findings1" id="findingsTextarea_musculo_skeletal1" onchange="clearInput('musculo_skeletal1')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Extremities</td>
                                <td class="text-center">
                                    <input type="checkbox" id="extremities" name="extremities" value="Yes" onchange="toggleTextarea('extremities')" checked>
                                </td>
                                <td><textarea class="form-control" name="20_findings1" id="findingsTextarea_extremities" onchange="clearInput('extremities')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Reflexes</td>
                                <td class="text-center">
                                    <input type="checkbox" id="reflexes" name="reflexes" value="Yes" onchange="toggleTextarea('reflexes')" checked>
                                </td>
                                <td><textarea class="form-control" name="21_findings1" id="findingsTextarea_reflexes" onchange="clearInput('reflexes')" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Neurological</td>
                                <td class="text-center">
                                    <input type="checkbox" id="neurological" name="neurological" value="Yes" onchange="toggleTextarea('neurological')" checked>
                                </td>
                                <td><textarea class="form-control" name="22_findings1" id="findingsTextarea_neurological" onchange="clearInput('neurological')" disabled>Not Applicable</textarea></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <h4><strong>DIAGNOSIS:</strong></h4>
                <div class="row mx-auto mb-3">
                <textarea class="form-control" name="diagnosis" id="diagnosis"></textarea>
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
            const odInput = document.getElementById("od_findings1");
            const od1Input = document.getElementById("od1_findings1");
            const osInput = document.getElementById("os_findings1");
            const os1Input = document.getElementById("os1_findings1");
            const od12Input = document.getElementById("od_findings2");
            const od123Input = document.getElementById("od1_findings2");
            const os12Input = document.getElementById("os_findings2");
            const os123Input = document.getElementById("os1_findings2");

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
                } else if (type === 'eyes'){
                    odInput.disabled = true;
                    od1Input.disabled = true;
                    osInput.disabled = true;
                    os1Input.disabled = true;
                    odInput.required = false;
                    od1Input.required = false;
                    osInput.required = false;
                    os1Input.required = false;
                } else if (type === 'corrected'){
                    od12Input.disabled = true;
                    od123Input.disabled = true;
                    os12Input.disabled = true;
                    os123Input.disabled = true;
                    od12Input.required = false;
                    od123Input.required = false;
                    os12Input.required = false;
                    os123Input.required = false;
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
                } else if (type === 'eyes'){
                    odInput.disabled = false;
                    od1Input.disabled = false;
                    osInput.disabled = false;
                    os1Input.disabled = false;
                    odInput.required = true;
                    od1Input.required = true;
                    osInput.required = true;
                    os1Input.required = true;
                } else if (type === 'corrected'){
                    od12Input.disabled = false;
                    od123Input.disabled = false;
                    os12Input.disabled = false;
                    os123Input.disabled = false;
                    od12Input.required = true;
                    od123Input.required = true;
                    os12Input.required = true;
                    os123Input.required = true;
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
@stop