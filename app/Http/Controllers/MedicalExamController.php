<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\MedicalExam;
use App\Models\PastMedicalHistory;
use App\Models\FamilyHistory;
use App\Models\PersonalAndSocialHistory;
use App\Models\ObGyneHistory;
use App\Models\ReviewOfSystem;
use App\Models\PhysicalExamination;
use App\Models\MedicalExamResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class MedicalExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Record $record)
    {
        return view('nurse.record.medical-exam.create',compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Record $record)
    {
        // Connect Medical Exam ID to that specific Record ID
        $recordID = $request->input('record_id');
        $medicalExamData = $request->all();
        $medicalExamData['record_id'] = $recordID;

        // Create Medical Exam
        $medicalExam = MedicalExam::create($medicalExamData);

        // Connect Past Medical History ID to the Medical Exam ID
        $request->validate([
            'allergies',
            'skin_disease',
            'opthalmologic_disorder',
            'ent_disorder',
            'bronchial_asthma',
            'cardiac_disorder',
            'diabetes_melilitus',
            'chronic_headache_or_migraine',
            'hepatitis',
            'hypertension',
            'thyroid_disorder',
            'blood_disorder',
            'tuberculosis',
            'peptic_ulcer',
            'musculoskeletal_disorder',
            'infectious_disease',
            'others',
        ]);

        $medicalExamID = $medicalExam->id;
        $pastMedicalHistoryData = $request->all();
        $pastMedicalHistoryData['medical_exam_id'] = $medicalExamID;

        // Create Past Medical History
        $pastMedicalHistory = PastMedicalHistory::create($pastMedicalHistoryData);

        // Connect Family History ID to the Medical Exam ID
        $request->validate([
            'bronchial_asthma_1',
            'diabetes_melilitus_1',
            'thyroid_disorder_1',
            'opthalmologic_disease',
            'cancer',
            'cardiac_disorder_1',
            'hypertension_1',
            'tuberculosis_1',
            'nervous_disorder',
            'musculoskeletal',
            'liver_disease',
            'kidney_disease',
            'others_1',
        ]);

        $familyHistoryData = $request->all();
        $familyHistoryData['medical_exam_id'] = $medicalExamID;

        // Create Family History
        $familyHistory = FamilyHistory::create($familyHistoryData);

        // Connect Personal and Social History ID to the Medical Exam ID
        $request->validate([
            'smoker',
            'stick',
            'pack',
            'alcoholic',
            'frequent',
            'week',
            'medication',
            'take',
            'hospitalization',
            'hosp_times',
            'operation',
            'op_times',
        ]);
        
        $personalAndSocialHisData = $request->all();
        $personalAndSocialHisData['medical_exam_id'] = $medicalExamID;
        
        // Create Personal and Social History
        PersonalAndSocialHistory::create($personalAndSocialHisData);
        
        // Connect OB-GYNE History ID to the Medical Exam ID
        $request->validate([
            'lnmp',
            'ob_score',
            'abnormal_pregnancies',
            'date_of_last_delivery',
            'breast_uterus_ovaries',
        ]);
        
        $obGyneHistoryData = $request->all();
        $obGyneHistoryData['medical_exam_id'] = $medicalExamID;
        
        // Create OB-GYNE History
        $obGyneHistory = ObGyneHistory::create($obGyneHistoryData);

        // Connect Review of System ID to the Medical Exam ID
        $request->validate([
            'skin',
            'opthalmologic',
            'ent',
            'cardiovascular',
            'respiratory',
            'gastro_intestinal',
            'neuro_psychiatric',
            'hematology',
            'genitourinary',
            'musculo_skeletal',
        ]);
        
        $reviewOfSystemData = $request->all();
        $reviewOfSystemData['medical_exam_id'] = $medicalExamID;
        
        // Create Review of System
        $reviewOfSystem = ReviewOfSystem::create($reviewOfSystemData);

        // Connect OB-GYNE History ID to the Medical Exam ID
        $request->validate([
            'height',
            'weight',
            'bp1',
            'bp2',
            'cardiac_rate',
            'respiratory_rate',
            'bmi',
            'general_appearance',
            'skin1',
            'head_and_scalp',
            'eyes',
            'corrected',
            'pupils',
            'ear_eardrums',
            'nose_sinuses',
            'mouth_throat',
            'neck_thyroid',
            'chest_breast_axilla',
            'heart_cardiovascular',
            'lungs_respiratory',
            'abdomen',
            'back_flanks',
            'anus_rectum',
            'genito_urinary_system',
            'inguinal_genitals',
            'musculo_skeletal1',
            'extremities',
            'reflexes',
            'neurological',
        ]);
        
        $physicalExaminationData = $request->all();
        $physicalExaminationData['medical_exam_id'] = $medicalExamID;
        
        // Create OB-GYNE History
        $physicalExamination = PhysicalExamination::create($physicalExaminationData);

        // Connect Medical Exam Response ID to the 5 table that connect to the Medical Exam ID
        $request->validate([
            //Past Medical History
            '1_pm_respond',
            '2_pm_respond',
            '3_pm_respond',
            '4_pm_respond',
            '5_pm_respond',
            '6_pm_respond',
            '7_pm_respond',
            '8_pm_respond',
            '9_pm_respond',
            '10_pm_respond',
            '11_pm_respond',
            '12_pm_respond',
            '13_pm_respond',
            '14_pm_respond',
            '15_pm_respond',
            '16_pm_respond',
            'others_pm_respond',

            //Family History
            '1_fh_respond',
            '2_fh_respond',
            '3_fh_respond',
            '4_fh_respond',
            '5_fh_respond',
            '6_fh_respond',
            '7_fh_respond',
            '8_fh_respond',
            '9_fh_respond',
            '10_fh_respond',
            '11_fh_respond',
            '12_fh_respond',
            'others_fh_respond',

            //OB-GYNE History
            '1_ob_respond',
            '2_ob_respond',
            '3_ob_respond',
            '4_ob_respond',
            '5_ob_respond',

            //Review of System
            '1_rs_respond',
            '2_rs_respond',
            '3_rs_respond',
            '4_rs_respond',
            '5_rs_respond',
            '6_rs_respond',
            '7_rs_respond',
            '8_rs_respond',
            '9_rs_respond',
            '10_rs_respond',

            //Physical Examination
            '1_pe_respond',
            '2_pe_respond',
            '3_pe_respond',
            'od_pe_respond',
            'od1_pe_respond',
            'os_pe_respond',
            'os1_pe_respond',
            'od_pe_respond1',
            'od1_pe_respond1',
            'os_pe_respond1',
            'os1_pe_respond1',
            '6_pe_respond',
            '7_pe_respond',
            '8_pe_respond',
            '9_pe_respond',
            '10_pe_respond',
            '11_pe_respond',
            '12_pe_respond',
            '13_pe_respond',
            '14_pe_respond',
            '15_pe_respond',
            '16_pe_respond',
            '17_pe_respond',
            '18_pe_respond',
            '19_pe_respond',
            '20_pe_respond',
            '21_pe_respond',
            '22_pe_respond',
            'diagnosis',
        ]);
        
        $pastMedicalHistoryID = $pastMedicalHistory->id;
        $familyHistoryID = $familyHistory->id;
        $obGyneHistoryID = $obGyneHistory->id;
        $reviewOfSystemID = $reviewOfSystem->id;
        $physicalExaminationID = $physicalExamination->id;
        $MedicalExamResponseData = $request->all();
        $MedicalExamResponseData['past_medical_history_id'] = $pastMedicalHistoryID;
        $MedicalExamResponseData['family_history_id'] = $familyHistoryID;
        $MedicalExamResponseData['ob_gyne_history_id'] = $obGyneHistoryID;
        $MedicalExamResponseData['review_of_system_id'] = $reviewOfSystemID;
        $MedicalExamResponseData['physical_examination_id'] = $physicalExaminationID;
        
        // Create OB-GYNE History
        MedicalExamResponse::create($MedicalExamResponseData);

        return redirect()->route('nurse.recordShow', ['record' => $recordID])->with('success', 'Record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalExam $medical_exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalExam $medical_exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalExam $medical_exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalExam $medical_exam)
    {
        //
    }
}
