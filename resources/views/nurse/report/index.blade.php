@extends('adminlte::page')

@section('title', 'Reports')

@section('content_header')
    <h1>Reports</h1>
@stop

@php
    //Visi One
    //Medicine
    $facMedicine = 0;
    $studMedicine = 0;

    //CARDIOLOGY
    //Hypertension
    $facHypertension = 0;
    $studHypertension = 0;
    //BP Monitoring
    $facBP = 0;
    $studBP = 0;
    //Bradycardia
    $facBradycardia = 0;
    $studBradycardia = 0;
    //Hypotension
    $facHypotension = 0;
    $studHypotension = 0;
    //CARDIOLOGY TOTAL
    $facCARDIOLOGYTOTAL = 0;
    $studCARDIOLOGYTOTAL = 0;

    //PULMONOLOGY
    //URTI
    $facURTI = 0;
    $studURTI = 0;
    //Pneumonia
    $facPneumonia = 0;
    $studPneumonia = 0;
    //PTB
    $facPTB = 0;
    $studPTB = 0;
    //Bronchitis
    $facBronchitis = 0;
    $studBronchitis = 0;
    //Lung Pathology
    $facLungPathology = 0;
    $studLungPathology = 0;
    //Acute Bronchitis
    $facAcuteBronchitis = 0;
    $studAcuteBronchitis = 0;
    //PULMONOLOGY TOTAL
    $facPULMONOLOGYTOTAL = 0;
    $studPULMONOLOGYTOTAL = 0;

    //GASTROENTEROLOGY
    //Acute Gastroenterology
    $facAcuteGastroenterology = 0;
    $studAcuteGastroenterology = 0;
    //GERD
    $facGERD = 0;
    $studGERD = 0;
    //Hemorrhoids
    $facHemorrhoids = 0;
    $studHemorrhoids = 0;
    //Anorexia
    $facAnorexia = 0;
    $studAnorexia = 0;
    //GASTROENTEROLOGY TOTAL
    $facGASTROENTEROLOGYTOTAL = 0;
    $studGASTROENTEROLOGYTOTAL = 0;


    // Iterate over reports
    foreach($reports as $report) {
        //Medicine
        if($report->role == "faculty" && $report->visitone->meds == "Yes"){
            $facMedicine++;
        }

        //Cardiology
        if($report->role == "student" && $report->visitone->meds == "Yes"){
            $studMedicine++;
        }
        if ($report->role == "faculty" && $report->visitone->hypertension == "Yes") {
            $facHypertension++;
        }
        if ($report->role == "student" && $report->visitone->hypertension == "Yes") {
            $studHypertension++;
        }
        if ($report->role == "faculty" && $report->visitone->bp_monitoring == "Yes") {
            $facBP++;
        }
        if ($report->role == "student" && $report->visitone->bp_monitoring == "Yes") {
            $studBP++;
        }
        if ($report->role == "faculty" && $report->visitone->bradycardia == "Yes") {
            $facBradycardia++;
        }
        if ($report->role == "student" && $report->visitone->bradycardia == "Yes") {
            $studBradycardia++;
        }
        if ($report->role == "faculty" && $report->visitone->hypotension == "Yes") {
            $facHypotension++;
        }
        if ($report->role == "student" && $report->visitone->hypotension == "Yes") {
            $studHypotension++;
        }

        //Pulmonology
        if($report->role == "faculty" && $report->visitone->urti == "Yes"){
            $facURTI++;
        }
        if($report->role == "student" && $report->visitone->urti == "Yes"){
            $studURTI++;
        }
        if($report->role == "faculty" && $report->visitone->pneumonia == "Yes"){
            $facPneumonia++;
        }
        if($report->role == "student" && $report->visitone->pneumonia == "Yes"){
            $studPneumonia++;
        }
        if($report->role == "faculty" && $report->visitone->ptb == "Yes"){
            $facPTB++;
        }
        if($report->role == "student" && $report->visitone->ptb == "Yes"){
            $studPTB++;
        }
        if($report->role == "faculty" && $report->visitone->bronchitis == "Yes"){
            $facBronchitis++;
        }
        if($report->role == "student" && $report->visitone->bronchitis == "Yes"){
            $studBronchitis++;
        }
        if($report->role == "faculty" && $report->visitone->lung_pathology == "Yes"){
            $facLungPathology++;
        }
        if($report->role == "student" && $report->visitone->lung_pathology == "Yes"){
            $studLungPathology++;
        }
        if($report->role == "faculty" && $report->visitone->acute_bronchitis == "Yes"){
            $facAcuteBronchitis++;
        }
        if($report->role == "student" && $report->visitone->acute_bronchitis == "Yes"){
            $studAcuteBronchitis++;
        }

        //Gastroenterology
        if($report->role == "faculty" && $report->visitone->acute_gastroenteritis == "Yes"){
            $facAcuteGastroenterology++;
        }
        if($report->role == "student" && $report->visitone->acute_gastroenteritis == "Yes"){
            $studAcuteGastroenterology++;
        }
        if($report->role == "faculty" && $report->visitone->gerd == "Yes"){
            $facGERD++;
        }
        if($report->role == "student" && $report->visitone->gerd == "Yes") {
            $studGERD++;
        }
        if($report->role == "faculty" && $report->visitone->hemorrhoids == "Yes"){
            $facHemorrhoids++;
        }
        if($report->role == "student" && $report->visitone->hemorrhoids == "Yes"){
            $studHemorrhoids++;
        }
        if($report->role == "faculty" && $report->visitone->anorexia == "Yes"){
            $facAnorexia++;
        }
        if($report->role == "student" && $report->visitone->anorexia == "Yes"){
            $studAnorexia++;
        }
    }

    
    $facCARDIOLOGYTOTAL = $facHypertension+
                            $facBP +
                            $facBradycardia +
                            $facHypotension;
    $studCARDIOLOGYTOTAL = $studHypertension+
                            $studBP +
                            $studBradycardia +
                            $studHypotension;;

                            
    $facPULMONOLOGYTOTAL = $facURTI +
                            $facPneumonia +
                            $facPTB +
                            $facBronchitis +
                            $facLungPathology +
                            $facAcuteBronchitis;
    $studPULMONOLOGYTOTAL = $studURTI +
                            $studPneumonia +
                            $studPTB +
                            $studBronchitis +
                            $studLungPathology +
                            $studAcuteBronchitis;


    $facGASTROENTEROLOGYTOTAL = $facAcuteGastroenterology + 
                        $facGERD +
                        $facHemorrhoids +
                        $facAnorexia;
    $studGASTROENTEROLOGYTOTAL = $studAcuteGastroenterology + 
                        $studGERD +
                        $studHemorrhoids +
                        $studAnorexia;
@endphp

@section('content')
    <div class="container border" style="height: 600px; overflow: auto;">
        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">CLINIC VISIT FOR MEDS</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Total:</td>
                <td>{{ $facMedicine }}</td>
                <td>{{ $studMedicine }}</td>
            </tr>
        </table>
        
        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">CARDIOLOGY</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Hypertension</td>
                <td>{{ $facHypertension }}</td>
                <td>{{ $studHypertension }}</td>
            </tr>
            <tr>
                <td>BP Monitoring</td>
                <td>{{ $facBP }}</td>
                <td>{{ $studBP }}</td>
            </tr>
            <tr>
                <td>Bradycardia</td>
                <td>{{ $facBradycardia }}</td>
                <td>{{ $studBradycardia }}</td>
            </tr>
            <tr>
                <td>Hypotension</td>
                <td>{{ $facHypotension }}</td>
                <td>{{ $studHypotension }}</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>{{ $facCARDIOLOGYTOTAL }}</td>
                <td>{{ $studCARDIOLOGYTOTAL }}</td>
            </tr>
        </table>

        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">PULMONOLOGY</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>URTI</td>
                <td>{{ $facURTI }}</td>
                <td>{{ $studURTI }}</td>
            </tr>
            <tr>
                <td>Pneumonia</td>
                <td>{{ $facPneumonia }}</td>
                <td>{{ $studPneumonia }}</td>
            </tr>
            <tr>
                <td>PTB</td>
                <td>{{ $facPTB }}</td>
                <td>{{ $studPTB }}</td>
            </tr>
            <tr>
                <td>Bronchitis</td>
                <td>{{ $facBronchitis }}</td>
                <td>{{ $studBronchitis }}</td>
            </tr>
            <tr>
                <td>Lung Pathology</td>
                <td>{{ $facLungPathology }}</td>
                <td>{{ $studLungPathology }}</td>
            </tr>
            <tr>
                <td>Acute Bronchitis</td>
                <td>{{ $facAcuteBronchitis }}</td>
                <td>{{ $studAcuteBronchitis }}</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>{{ $facPULMONOLOGYTOTAL }}</td>
                <td>{{ $studPULMONOLOGYTOTAL }}</td>
            </tr>
        </table>

        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">GASTROENTEROLOGY</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Acute Gastroenterology</td>
                <td>{{ $facAcuteGastroenterology }}</td>
                <td>{{ $studAcuteGastroenterology }}</td>
            </tr>
            <tr>
                <td>GERD</td>
                <td>{{ $facGERD }}</td>
                <td>{{ $studGERD }}</td>
            </tr>
            <tr>
                <td>Hemorrhoids</td>
                <td>{{ $facHemorrhoids }}</td>
                <td>{{ $studHemorrhoids }}</td>
            </tr>
            <tr>
                <td>Anorexia</td>
                <td>{{ $facAnorexia }}</td>
                <td>{{ $studAnorexia }}</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>{{ $facGASTROENTEROLOGYTOTAL }}</td>
                <td>{{ $studGASTROENTEROLOGYTOTAL }}</td>
            </tr>
        </table>
        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">MUSCULO SKELETAL</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Ligament Sprain</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Muscle Strain</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Costrochondritis</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Soft Tissue Contusion</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Fracture</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Gouty Arthritis</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Plantar Fasciitis</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Dislocation</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </table>

        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">OPTHALMOLOGY</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Conjunctivitis</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Stye</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Foreign Body</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </table>

        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">ENT</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Stomatitis</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Epistaxis</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Otitis Media</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Foreign Body Removal</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </table>
        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">NEUROLOGY</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Tension Headache</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Migraine</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Vertigo</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Hyperventilation Syndrome</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Insomnia</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Seizure</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Bell's Palsy</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </table>
        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">DERMATOLOGY</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Folliculitis</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Carbuncle</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Burn</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Wound Dressing</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Infected Wound</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Blister Wound</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Seborrheic Dermatitis</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Bruise / Hematoma</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </table>
        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">NEPHROLOGY</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Urinary Tract Infection</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Renal Disease</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Urolithiasis</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </table>
        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">ENDOCRINOLOGY</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Hypoglycemia</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Dyslipidemia</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Diabetes Mellitus</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </table>
        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">OB-GYNE</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Dysmenorrhea</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Hormonal Imbalance</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Pregnancy</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </table>
        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">HEMATOLOGIC</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Leukemia</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Blood Dyscrasia</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Anemia</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </table>
        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">SURGERY</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Lacerated Wound</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Punctured Wound</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Animal Bite</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Superfacial Abrasions</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Foreign Body Removal</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </table>
        <table class="table table-sm table-bordered mt-3">
            <tr>
                <th style="width: 200px;">ALLERGOLOGY</th>
                <th style="width: 200px;">APC STAFF/FACULTY</th>
                <th style="width: 200px;">STUDENTS</th>
            </tr>
            <tr>
                <td>Contact Dermatitis</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Allergic Rhinitis</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Bronchial Asthma</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Hypersensitivity</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Total:</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </table>
    </div>
@stop

@section('footer')
    <p class="mb-0 h6">Asia Pacific College Data Privacy Act</p>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop