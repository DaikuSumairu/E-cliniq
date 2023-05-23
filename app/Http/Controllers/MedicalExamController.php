<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\MedicalExam;
use App\Models\PastMedicalHistory;
use App\Models\PastMedicalHistoryFinding;
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
    public function store(Request $request)
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
            'others_findings',
        ]);

        $pastMedicalHistoryID = $pastMedicalHistory->id;
        $pastMedicalHistoryFindingData = $request->all();
        $pastMedicalHistoryFindingData['past_medical_history_id'] = $pastMedicalHistoryID;

        // Create Past Medical History Finding
        PastMedicalHistoryFinding::create($pastMedicalHistoryFindingData);

        return Redirect::back()->with('success', 'Record created successfully.');
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
