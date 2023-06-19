@extends('adminlte::page')

@section('title', 'Create Medical Examination Record')

@section('content_header')
    <h1>Creating Medical Examination Record</h1>
@stop

@section('content')
    <div class="container mx-auto pb-4" style="height: 555px; overflow: auto;">
        <form method="POST" action="{{ route('nurse.medExamStore') }}">
            @csrf
            <!-- Record ID Created (Hidden) -->
            <input type="hidden" name="record_id" value="{{ $record->id }}">
            <input type="hidden" name="date_created" value="{{ now() }}">

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
                                <input type="checkbox" id="allergies" name="allergies" value="Yes" onchange="toggleTextarea('allergies')" checked>
                            </td>
                            <td><textarea class="form-control" name="1_pm_respond" id="findingsTextarea_allergies" disabled>Not Applicable</textarea></td>
                        </tr>

                        <tr>
                            <td>Skin Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="skin_disease" name="skin_disease" value="Yes" onchange="toggleTextarea('skin_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="2_pm_respond" id="findingsTextarea_skin_disease" disabled>Not Applicable</textarea></td>
                        </tr>

                        <tr>
                            <td>Opthalmologic Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="opthalmologic_disorder" name="opthalmologic_disorder" value="Yes" onchange="toggleTextarea('opthalmologic_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="3_pm_respond" id="findingsTextarea_opthalmologic_disorder" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>ENT Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="ent_disorder" name="ent_disorder" value="Yes" onchange="toggleTextarea('ent_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="4_pm_respond" id="findingsTextarea_ent_disorder" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Bronchial Asthma</td>
                            <td class="text-center">
                                <input type="checkbox" id="bronchial_asthma" name="bronchial_asthma" value="Yes" onchange="toggleTextarea('bronchial_asthma')" checked>
                            </td>
                            <td><textarea class="form-control" name="5_pm_respond" id="findingsTextarea_bronchial_asthma" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Cardiac Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="cardiac_disorder" name="cardiac_disorder" value="Yes" onchange="toggleTextarea('cardiac_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="6_pm_respond" id="findingsTextarea_cardiac_disorder" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Diabetes Melilitus</td>
                            <td class="text-center">
                                <input type="checkbox" id="diabetes_melilitus" name="diabetes_melilitus" value="Yes" onchange="toggleTextarea('diabetes_melilitus')" checked>
                            </td>
                            <td><textarea class="form-control" name="7_pm_respond" id="findingsTextarea_diabetes_melilitus" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Chronic Headache/Migraine</td>
                            <td class="text-center">
                                <input type="checkbox" id="chronic_headache_or_migraine" name="chronic_headache_or_migraine" value="Yes" onchange="toggleTextarea('chronic_headache_or_migraine')" checked>
                            </td>
                            <td><textarea class="form-control" name="8_pm_respond" id="findingsTextarea_chronic_headache_or_migraine" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Hepatitis</td>
                            <td class="text-center">
                                <input type="checkbox" id="hepatitis" name="hepatitis" value="Yes" onchange="toggleTextarea('hepatitis')" checked>
                            </td>
                            <td><textarea class="form-control" name="9_pm_respond" id="findingsTextarea_hepatitis" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Hypertension</td>
                            <td class="text-center">
                                <input type="checkbox" id="hypertension" name="hypertension" value="Yes" onchange="toggleTextarea('hypertension')" checked>
                            </td>
                            <td><textarea class="form-control" name="10_pm_respond" id="findingsTextarea_hypertension" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Thyroid Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="thyroid_disorder" name="thyroid_disorder" value="Yes" onchange="toggleTextarea('thyroid_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="11_pm_respond" id="findingsTextarea_thyroid_disorder" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Blood Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="blood_disorder" name="blood_disorder" value="Yes" onchange="toggleTextarea('blood_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="12_pm_respond" id="findingsTextarea_blood_disorder" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Tuberculosis</td>
                            <td class="text-center">
                                <input type="checkbox" id="tuberculosis" name="tuberculosis" value="Yes" onchange="toggleTextarea('tuberculosis')" checked>
                            </td>
                            <td><textarea class="form-control" name="13_pm_respond" id="findingsTextarea_tuberculosis" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Peptic Ulcer</td>
                            <td class="text-center">
                                <input type="checkbox" id="peptic_ulcer" name="peptic_ulcer" value="Yes" onchange="toggleTextarea('peptic_ulcer')" checked>
                            </td>
                            <td><textarea class="form-control" name="14_pm_respond" id="findingsTextarea_peptic_ulcer" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Musculoskeletal Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="musculoskeletal_disorder" name="musculoskeletal_disorder" value="Yes" onchange="toggleTextarea('musculoskeletal_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="15_pm_respond" id="findingsTextarea_musculoskeletal_disorder" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Infectious Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="infectious_disease" name="infectious_disease" value="Yes" onchange="toggleTextarea('infectious_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="16_pm_respond" id="findingsTextarea_infectious_disease" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td >Others</td>
                            <td colspan="2">
                                <textarea class="form-control" name="others_pm_respond"></textarea>
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
                            <td><textarea class="form-control" name="1_fh_respond" id="findingsTextarea_bronchial_asthma_1" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Diabetes Melilitus</td>
                            <td class="text-center">
                                <input type="checkbox" id="diabetes_melilitus_1" name="diabetes_melilitus_1" value="Yes" onchange="toggleTextarea('diabetes_melilitus_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="2_fh_respond" id="findingsTextarea_diabetes_melilitus_1" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Thyroid Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="thyroid_disorder_1" name="thyroid_disorder_1" value="Yes" onchange="toggleTextarea('thyroid_disorder_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="3_fh_respond" id="findingsTextarea_thyroid_disorder_1" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Opthalmologic Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="opthalmologic_disease" name="opthalmologic_disease" value="Yes" onchange="toggleTextarea('opthalmologic_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="4_fh_respond" id="findingsTextarea_opthalmologic_disease" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Cancer</td>
                            <td class="text-center">
                                <input type="checkbox" id="cancer" name="cancer" value="Yes" onchange="toggleTextarea('cancer')" checked>
                            </td>
                            <td><textarea class="form-control" name="5_fh_respond" id="findingsTextarea_cancer" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Cardiac Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="cardiac_disorder_1" name="cardiac_disorder_1" value="Yes" onchange="toggleTextarea('cardiac_disorder_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="6_fh_respond" id="findingsTextarea_cardiac_disorder_1" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Hypertension</td>
                            <td class="text-center">
                                <input type="checkbox" id="hypertension_1" name="hypertension_1" value="Yes" onchange="toggleTextarea('hypertension_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="7_fh_respond" id="findingsTextarea_hypertension_1" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Tuberculosis</td>
                            <td class="text-center">
                                <input type="checkbox" id="tuberculosis_1" name="tuberculosis_1" value="Yes" onchange="toggleTextarea('tuberculosis_1')" checked>
                            </td>
                            <td><textarea class="form-control" name="8_fh_respond" id="findingsTextarea_tuberculosis_1" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Nervous Disorder</td>
                            <td class="text-center">
                                <input type="checkbox" id="nervous_disorder" name="nervous_disorder" value="Yes" onchange="toggleTextarea('nervous_disorder')" checked>
                            </td>
                            <td><textarea class="form-control" name="9_fh_respond" id="findingsTextarea_nervous_disorder" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Musculoskeletal</td>
                            <td class="text-center">
                                <input type="checkbox" id="musculoskeletal" name="musculoskeletal" value="Yes" onchange="toggleTextarea('musculoskeletal')" checked>
                            </td>
                            <td><textarea class="form-control" name="10_fh_respond" id="findingsTextarea_musculoskeletal" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Liver Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="liver_disease" name="liver_disease" value="Yes" onchange="toggleTextarea('liver_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="11_fh_respond" id="findingsTextarea_liver_disease" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Kidney Disease</td>
                            <td class="text-center">
                                <input type="checkbox" id="kidney_disease" name="kidney_disease" value="Yes" onchange="toggleTextarea('kidney_disease')" checked>
                            </td>
                            <td><textarea class="form-control" name="12_fh_respond" id="findingsTextarea_kidney_disease" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td >Others</td>
                            <td colspan="2">
                                <textarea class="form-control" name="others_fh_respond"></textarea>
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
                            <td><textarea class="form-control" name="1_ob_respond" id="findingsTextarea_lnmp" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>OB Score</td>
                            <td class="text-center">
                                <input type="checkbox" id="ob_score" name="ob_score" value="Yes" onchange="toggleTextarea('ob_score')" checked>
                            </td>
                            <td><textarea class="form-control" name="2_ob_respond" id="findingsTextarea_ob_score" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Abnormal Pregnancies</td>
                            <td class="text-center">
                                <input type="checkbox" id="abnormal_pregnancies" name="abnormal_pregnancies" value="Yes" onchange="toggleTextarea('abnormal_pregnancies')" checked>
                            </td>
                            <td><textarea class="form-control" name="3_ob_respond" id="findingsTextarea_abnormal_pregnancies" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Date of Last Delivery</td>
                            <td class="text-center">
                                <input type="checkbox" id="date_of_last_delivery" name="date_of_last_delivery" value="Yes" onchange="toggleTextarea('date_of_last_delivery')" checked>
                            </td>
                            <td><textarea class="form-control" name="4_ob_respond" id="findingsTextarea_date_of_last_delivery" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Breast/Uterus/Ovaries</td>
                            <td class="text-center">
                                <input type="checkbox" id="breast_uterus_ovaries" name="breast_uterus_ovaries" value="Yes" onchange="toggleTextarea('breast_uterus_ovaries')" checked>
                            </td>
                            <td><textarea class="form-control" name="5_ob_respond" id="findingsTextarea_breast_uterus_ovaries" disabled>Not Applicable</textarea></td>
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
                            <td><textarea class="form-control" name="1_rs_respond" id="findingsTextarea_skin" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Opthalmologic</td>
                            <td class="text-center">
                                <input type="checkbox" id="opthalmologic" name="opthalmologic" value="Yes" onchange="toggleTextarea('opthalmologic')" checked>
                            </td>
                            <td><textarea class="form-control" name="2_rs_respond" id="findingsTextarea_opthalmologic" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>ENT</td>
                            <td class="text-center">
                                <input type="checkbox" id="ent" name="ent" value="Yes" onchange="toggleTextarea('ent')" checked>
                            </td>
                            <td><textarea class="form-control" name="3_rs_respond" id="findingsTextarea_ent" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Cardiovascular</td>
                            <td class="text-center">
                                <input type="checkbox" id="cardiovascular" name="cardiovascular" value="Yes" onchange="toggleTextarea('cardiovascular')" checked>
                            </td>
                            <td><textarea class="form-control" name="4_rs_respond" id="findingsTextarea_cardiovascular" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Respiratory</td>
                            <td class="text-center">
                                <input type="checkbox" id="respiratory" name="respiratory" value="Yes" onchange="toggleTextarea('respiratory')" checked>
                            </td>
                            <td><textarea class="form-control" name="5_rs_respond" id="findingsTextarea_respiratory" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Gastro Intestinal</td>
                            <td class="text-center">
                                <input type="checkbox" id="gastro_intestinal" name="gastro_intestinal" value="Yes" onchange="toggleTextarea('gastro_intestinal')" checked>
                            </td>
                            <td><textarea class="form-control" name="6_rs_respond" id="findingsTextarea_gastro_intestinal" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Neuro-Psychiatric</td>
                            <td class="text-center">
                                <input type="checkbox" id="neuro_psychiatric" name="neuro_psychiatric" value="Yes" onchange="toggleTextarea('neuro_psychiatric')" checked>
                            </td>
                            <td><textarea class="form-control" name="7_rs_respond" id="findingsTextarea_neuro_psychiatric" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Hematology</td>
                            <td class="text-center">
                                <input type="checkbox" id="hematology" name="hematology" value="Yes" onchange="toggleTextarea('hematology')" checked>
                            </td>
                            <td><textarea class="form-control" name="8_rs_respond" id="findingsTextarea_hematology" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Genitourinary</td>
                            <td class="text-center">
                                <input type="checkbox" id="genitourinary" name="genitourinary" value="Yes" onchange="toggleTextarea('genitourinary')" checked>
                            </td>
                            <td><textarea class="form-control" name="9_rs_respond" id="findingsTextarea_genitourinary" disabled>Not Applicable</textarea></td>
                        </tr>
                        <tr>
                            <td>Musculo-Skeletal</td>
                            <td class="text-center">
                                <input type="checkbox" id="musculo_skeletal" name="musculo_skeletal" value="Yes" onchange="toggleTextarea('musculo_skeletal')" checked>
                            </td>
                            <td><textarea class="form-control" name="10_rs_respond" id="findingsTextarea_musculo_skeletal" disabled>Not Applicable</textarea></td>
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
                                <input type="number" name="height" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="height" required>cm.
                            </div>
                        </div>
                    </div> 
                    <div class="col border">
                        <p class="mb-1"><strong>Weight:</strong></p>
                        <div class="row">
                            <div class="col-0 ml-2">
                                <input type="number" name="weight" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="weight" required>kg.
                            </div>
                        </div>
                    </div> 
                    <div class="col border">
                        <p class="mb-1"><strong>BP (mm/hg):</strong></p>
                        <div class="row">
                            <div class="col-0" style="margin-left: 1px;">
                                <input type="number" name="bp1" class="col-0 mx-1 mb-1" style="height: 25px; width: 50px;" id="bp1" required>
                            </div>
                            <div class="col-0">
                                <p>/</p>
                            </div>
                            <div class="col-0">
                                <input type="number" name="bp2" class="col-0 mx-1 mb-1" style="height: 25px; width: 50px;" id="bp2" required>
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
                                <input type="number" name="cardiac_rate" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="cardiac_rate" required>
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
                                <input type="number" name="respiratory_rate" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="respiratory_rate" required>
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
                                <input type="number" name="bmi" class="col-0 mx-1 mb-2" style="height: 25px; width: 50px;" id="bmi" readonly>
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
                                    <input type="checkbox" id="general_appearance" name="general_appearance" value="Yes" onchange="toggleTextarea('general_appearance')" checked>
                                </td>
                                <td><textarea class="form-control" name="1_pe_respond" id="findingsTextarea_general_appearance" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Skin</td>
                                <td class="text-center">
                                    <input type="checkbox" id="skin1" name="skin1" value="Yes" onchange="toggleTextarea('skin1')" checked>
                                </td>
                                <td><textarea class="form-control" name="2_pe_respond" id="findingsTextarea_skin1" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Head and Scalp</td>
                                <td class="text-center">
                                    <input type="checkbox" id="head_and_scalp" name="head_and_scalp" value="Yes" onchange="toggleTextarea('head_and_scalp')" checked>
                                </td>
                                <td><textarea class="form-control" name="3_pe_respond" id="findingsTextarea_head_and_scalp" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Eyes</td>
                                <td class="text-center">
                                    <input type="checkbox" id="eyes" name="eyes" value="Yes" onchange="updateCheckboxValue(this, 'eyes')" checked>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-0">
                                            <input type="number" name="od_pe_respond" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od_pe_respond" disabled>
                                        </div>
                                        <div class="col-0">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0">
                                            <input type="number" name="od1_pe_respond" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od1_pe_respond" disabled>
                                        </div>
                                        <div class="col-0">
                                            <p>OD</p>
                                        </div>
                                        <div class="col-0">
                                            <input type="number" name="os_pe_respond" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os_pe_respond" disabled>
                                        </div>
                                        <div class="col-0">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0">
                                            <input type="number" name="os1_pe_respond" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os1_pe_respond" disabled>
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
                                            <input type="number" name="od_pe_respond1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od_pe_respond1" disabled>
                                        </div>
                                        <div class="col-0">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0">
                                            <input type="number" name="od1__pe_respond1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="od__pe_respond1" disabled>
                                        </div>
                                        <div class="col-0">
                                            <p>OD</p>
                                        </div>
                                        <div class="col-0">
                                            <input type="number" name="os_pe_respond1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os_pe_respond1" disabled>
                                        </div>
                                        <div class="col-0">
                                            <p>/</p>
                                        </div>
                                        <div class="col-0">
                                            <input type="number" name="os1__pe_respond1" class="col-0 mx-1 mb-2" style="height: 25px; width: 40px;" id="os__pe_respond1" disabled>
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
                                <td><textarea class="form-control" name="6_pe_respond" id="findingsTextarea_pupils" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Ear, Eardrums</td>
                                <td class="text-center">
                                    <input type="checkbox" id="ear_eardrums" name="ear_eardrums" value="Yes" onchange="toggleTextarea('ear_eardrums')" checked>
                                </td>
                                <td><textarea class="form-control" name="7_pe_respond" id="findingsTextarea_ear_eardrums" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Nose, Sinuses</td>
                                <td class="text-center">
                                    <input type="checkbox" id="nose_sinuses" name="nose_sinuses" value="Yes" onchange="toggleTextarea('nose_sinuses')" checked>
                                </td>
                                <td><textarea class="form-control" name="8_pe_respond" id="findingsTextarea_nose_sinuses" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Mouth, Throat</td>
                                <td class="text-center">
                                    <input type="checkbox" id="mouth_throat" name="mouth_throat" value="Yes" onchange="toggleTextarea('mouth_throat')" checked>
                                </td>
                                <td><textarea class="form-control" name="9_pe_respond" id="findingsTextarea_mouth_throat" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Neck, Thyroid</td>
                                <td class="text-center">
                                    <input type="checkbox" id="neck_thyroid" name="neck_thyroid" value="Yes" onchange="toggleTextarea('neck_thyroid')" checked>
                                </td>
                                <td><textarea class="form-control" name="10_pe_respond" id="findingsTextarea_neck_thyroid" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Chest, Breast, Axilla</td>
                                <td class="text-center">
                                    <input type="checkbox" id="chest_breast_axilla" name="chest_breast_axilla" value="Yes" onchange="toggleTextarea('chest_breast_axilla')" checked>
                                </td>
                                <td><textarea class="form-control" name="11_pe_respond" id="findingsTextarea_chest_breast_axilla" disabled>Not Applicable</textarea></td>
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
                                <td><textarea class="form-control" name="12_pe_respond" id="findingsTextarea_heart_cardiovascular" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Lungs-Respiratory</td>
                                <td class="text-center">
                                    <input type="checkbox" id="lungs_respiratory" name="lungs_respiratory" value="Yes" onchange="toggleTextarea('lungs_respiratory')" checked>
                                </td>
                                <td><textarea class="form-control" name="13_pe_respond" id="findingsTextarea_lungs_respiratory" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Abdomen</td>
                                <td class="text-center">
                                    <input type="checkbox" id="abdomen" name="abdomen" value="Yes" onchange="toggleTextarea('abdomen')" checked>
                                </td>
                                <td><textarea class="form-control" name="14_pe_respond" id="findingsTextarea_abdomen" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Back, Flanks</td>
                                <td class="text-center">
                                    <input type="checkbox" id="back_flanks" name="back_flanks" value="Yes" onchange="toggleTextarea('back_flanks')" checked>
                                </td>
                                <td><textarea class="form-control" name="15_pe_respond" id="findingsTextarea_back_flanks" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Anus, Rectum</td>
                                <td class="text-center">
                                    <input type="checkbox" id="anus_rectum" name="anus_rectum" value="Yes" onchange="toggleTextarea('anus_rectum')" checked>
                                </td>
                                <td><textarea class="form-control" name="16_pe_respond" id="findingsTextarea_anus_rectum" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Genito-Urinary System</td>
                                <td class="text-center">
                                    <input type="checkbox" id="genito_urinary_system" name="genito_urinary_system" value="Yes" onchange="toggleTextarea('genito_urinary_system')" checked>
                                </td>
                                <td><textarea class="form-control" name="17_pe_respond" id="findingsTextarea_genito_urinary_system" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Inguinal, Genitals</td>
                                <td class="text-center">
                                    <input type="checkbox" id="inguinal_genitals" name="inguinal_genitals" value="Yes" onchange="toggleTextarea('inguinal_genitals')" checked>
                                </td>
                                <td><textarea class="form-control" name="18_pe_respond" id="findingsTextarea_inguinal_genitals" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Musculo-Skeletal</td>
                                <td class="text-center">
                                    <input type="checkbox" id="musculo_skeletal1" name="musculo_skeletal1" value="Yes" onchange="toggleTextarea('musculo_skeletal1')" checked>
                                </td>
                                <td><textarea class="form-control" name="19_pe_respond" id="findingsTextarea_musculo_skeletal1" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Extremities</td>
                                <td class="text-center">
                                    <input type="checkbox" id="extremities" name="extremities" value="Yes" onchange="toggleTextarea('extremities')" checked>
                                </td>
                                <td><textarea class="form-control" name="20_pe_respond" id="findingsTextarea_extremities" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Reflexes</td>
                                <td class="text-center">
                                    <input type="checkbox" id="reflexes" name="reflexes" value="Yes" onchange="toggleTextarea('reflexes')" checked>
                                </td>
                                <td><textarea class="form-control" name="21_pe_respond" id="findingsTextarea_reflexes" disabled>Not Applicable</textarea></td>
                            </tr>
                            <tr>
                                <td>Neurological</td>
                                <td class="text-center">
                                    <input type="checkbox" id="neurological" name="neurological" value="Yes" onchange="toggleTextarea('neurological')" checked>
                                </td>
                                <td><textarea class="form-control" name="22_pe_respond" id="findingsTextarea_neurological" disabled>Not Applicable</textarea></td>
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
        </form>
    </div>
@stop

@section('footer')
    <p class="mb-0 h5 text-right">Asia Pacific College Data Privacy Act</p>
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
                checkbox.value = "No"; // Set checkbox value to "No"
                textarea.required = true;
            }else{
                textarea.value = "Not Applicable";
                checkbox.value = "Yes"; // Set checkbox value to "Yes"
                textarea.required = false;
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
            const odInput = document.getElementById("od_pe_respond");
            const od1Input = document.getElementById("od1_pe_respond");
            const osInput = document.getElementById("os_pe_respond");
            const os1Input = document.getElementById("os1_pe_respond");
            const od12Input = document.getElementById("od_pe_respond1");
            const od123Input = document.getElementById("od__pe_respond1");
            const os12Input = document.getElementById("os_pe_respond1");
            const os123Input = document.getElementById("os__pe_respond1");

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
                    odInput.value = '';
                    od1Input.value = '';
                    osInput.value = '';
                    os1Input.value = '';
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
                    medicationText.value = '';
                } else if (type === 'hospitalization'){
                    hospInput.disabled = true;
                    hospInput.required = false;
                    hospInput.value = '';
                } else if (type === 'operation'){
                    opInput.disabled = true;
                    opInput.required = false;
                    opInput.value = '';
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