<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\MedicalExam;
use App\Models\PastMedicalHistory;
use App\Models\PastMedicalHistoryFinding;
use App\Models\FamilyHistory;
use App\Models\FamilyHistoryPositive;
use App\Models\PersonalAndSocialHistory;
use App\Models\ObGyneHistory;
use App\Models\ObGyneHistoryPositive;
use App\Models\ReviewOfSystem;
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

        // Connect Past Medical History Finding ID to the Past Medical History ID
        $request->validate([
            '1_findings',
            '2_findings',
            '3_findings',
            '4_findings',
            '5_findings',
            '6_findings',
            '7_findings',
            '8_findings',
            '9_findings',
            '10_findings',
            '11_findings',
            '12_findings',
            '13_findings',
            '14_findings',
            '15_findings',
            '16_findings',
        ]);

        $pastMedicalHistoryID = $pastMedicalHistory->id;
        $pastMedicalHistoryFindingData = $request->all();
        $pastMedicalHistoryFindingData['past_medical_history_id'] = $pastMedicalHistoryID;

        // Create Past Medical History Finding
        PastMedicalHistoryFinding::create($pastMedicalHistoryFindingData);

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

        // Connect Family History Positive ID to the Family History ID
        $request->validate([
            '1_positive',
            '2_positive',
            '3_positive',
            '4_positive',
            '5_positive',
            '6_positive',
            '7_positive',
            '8_positive',
            '9_positive',
            '10_positive',
            '11_positive',
            '12_positive',
        ]);

        $familyHistoryID = $familyHistory->id;
        $familyHistoryPositiveData = $request->all();
        $familyHistoryPositiveData['family_history_id'] = $familyHistoryID;

        // Create Family History Positive
        FamilyHistoryPositive::create($familyHistoryPositiveData);

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

        
        // Connect OB-GYNE History Positive ID to the OB-GYNE History ID
        $request->validate([
            '1_positive1',
            '2_positive1',
            '3_positive1',
            '4_positive1',
            '5_positive1',
            '1_positive2',
            '2_positive2',
            '3_positive2',
            '4_positive2',
            '5_positive2',
            '6_positive2',
            '7_positive2',
            '8_positive2',
            '9_positive2',
            '10_positive2',
        ]);
        
        $obGyneHistoryID = $obGyneHistory->id;
        $reviewOfSystemID = $reviewOfSystem->id;
        $obGyneHistoryPositiveData = $request->all();
        $obGyneHistoryPositiveData['ob_gyne_history_id'] = $obGyneHistoryID;
        $obGyneHistoryPositiveData['review_of_system_id'] = $reviewOfSystemID;
        
        // Create OB-GYNE History Positive
        ObGyneHistoryPositive::create($obGyneHistoryPositiveData);

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
