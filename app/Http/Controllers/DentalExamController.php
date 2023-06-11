<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\DentalExam;
use App\Models\DentalExamResponse;
use App\Models\DentalExamRestoration;
use App\Models\DentalExamExtraction;
use Illuminate\Http\Request;

class DentalExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Record $record)
    {
        return view('nurse.record.dental-exam.create',compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Connect Dental Exam ID to that specific Record ID
        $recordID = $request->input('record_id');
        $dentalExamData = $request->all();
        $dentalExamData['record_id'] = $recordID;

        // Create Dental Exam
        $dentalExam = DentalExam::create($dentalExamData);

        // Connect Dental Exam Response ID to the Medical Exam ID
        $request->validate([
            'oral_hygiene',
            'gingival_color',
            'consistency_of_the_gingival',
            'oral_prophylaxis',
            'restoration',
            'extraction',
            'prosthodontic_restoration',
            'orthodontist',
        ]);

        $dentalExamID = $dentalExam->id;
        $dentalExamResponseData = $request->all();
        $dentalExamResponseData['dental_exam_id'] = $dentalExamID;

        // Create Dental Exam Response
        $dentalExamResponse = DentalExamResponse::create($dentalExamResponseData);

        // Connect Dental Exam Restoration ID to the Medical Exam ID
        $request->validate([
            'restoration_lt1',
            'restoration_lt2',
            'restoration_lt3',
            'restoration_lt4',
            'restoration_lt5',
            'restoration_lt6',
            'restoration_lt7',
            'restoration_lt8',
            'restoration_lb1',
            'restoration_lb2',
            'restoration_lb3',
            'restoration_lb4',
            'restoration_lb5',
            'restoration_lb6',
            'restoration_lb7',
            'restoration_lb8',
            'restoration_rt1',
            'restoration_rt2',
            'restoration_rt3',
            'restoration_rt4',
            'restoration_rt5',
            'restoration_rt6',
            'restoration_rt7',
            'restoration_rt8',
            'restoration_rb1',
            'restoration_rb2',
            'restoration_rb3',
            'restoration_rb4',
            'restoration_rb5',
            'restoration_rb6',
            'restoration_rb7',
            'restoration_rb8',
        ]);

        $dentalExamResponseID = $dentalExamResponse->id;
        $dentalExamRestorationData = $request->all();
        $dentalExamRestorationData['dental_exam_response_id'] = $dentalExamResponseID;

        // Create Dental Exam Restoration
        DentalExamRestoration::create($dentalExamRestorationData);

        // Connect Dental Exam Extraction ID to the Medical Exam ID
        $request->validate([
            'extraction_lt1',
            'extraction_lt2',
            'extraction_lt3',
            'extraction_lt4',
            'extraction_lt5',
            'extraction_lt6',
            'extraction_lt7',
            'extraction_lt8',
            'extraction_lb1',
            'extraction_lb2',
            'extraction_lb3',
            'extraction_lb4',
            'extraction_lb5',
            'extraction_lb6',
            'extraction_lb7',
            'extraction_lb8',
            'extraction_rt1',
            'extraction_rt2',
            'extraction_rt3',
            'extraction_rt4',
            'extraction_rt5',
            'extraction_rt6',
            'extraction_rt7',
            'extraction_rt8',
            'extraction_rb1',
            'extraction_rb2',
            'extraction_rb3',
            'extraction_rb4',
            'extraction_rb5',
            'extraction_rb6',
            'extraction_rb7',
            'extraction_rb8',
        ]);

        $dentalExamResponseID = $dentalExamResponse->id;
        $dentalExamExtractionData = $request->all();
        $dentalExamExtractionData['dental_exam_response_id'] = $dentalExamResponseID;

        // Create Dental Exam Extraction
        DentalExamExtraction::create($dentalExamExtractionData);
        
        return redirect()->route('nurse.recordShow', ['record' => $recordID])->with('success', 'Record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DentalExam $dentalExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DentalExam $dentalExam)
    {
        return view('nurse.record.dental-exam.edit',compact('dentalExam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DentalExam $dentalExam,)
    {
        $recordID = $request->input('record_id');
        $dentalExamData = $request->all();
    
        $dentalExam->update($dentalExamData);
    
        // Connect Dental Exam Response ID to the Medical Exam ID
        $request->validate([
            'oral_hygiene',
            'gingival_color',
            'consistency_of_the_gingival',
            'oral_prophylaxis',
            'restoration',
            'extraction',
            'prosthodontic_restoration',
            'orthodontist',
        ]);
    
        $dentalExamResponseData = $request->all();
    
        // Update or Create Dental Exam Response
        $dentalExamResponse = $dentalExam->dental_exam_response;

        $dentalExamResponse->update($dentalExamResponseData);
        
    
        // Connect Dental Exam Restoration ID to the Medical Exam ID
        $request->validate([
            'restoration_lt1',
            'restoration_lt2',
            'restoration_lt3',
            'restoration_lt4',
            'restoration_lt5',
            'restoration_lt6',
            'restoration_lt7',
            'restoration_lt8',
            'restoration_lb1',
            'restoration_lb2',
            'restoration_lb3',
            'restoration_lb4',
            'restoration_lb5',
            'restoration_lb6',
            'restoration_lb7',
            'restoration_lb8',
            'restoration_rt1',
            'restoration_rt2',
            'restoration_rt3',
            'restoration_rt4',
            'restoration_rt5',
            'restoration_rt6',
            'restoration_rt7',
            'restoration_rt8',
            'restoration_rb1',
            'restoration_rb2',
            'restoration_rb3',
            'restoration_rb4',
            'restoration_rb5',
            'restoration_rb6',
            'restoration_rb7',
            'restoration_rb8',
        ]);
    
        $dentalExamRestorationData = $request->all();
    
        // Update or Create Dental Exam Restoration
        $dentalExamRestoration = $dentalExam->dental_exam_response->dental_exam_restoration;

        $dentalExamRestoration->update($dentalExamRestorationData);
        
        
        // Connect Dental Exam Extraction ID to the Medical Exam ID
        $request->validate([
            'extraction_lt1',
            'extraction_lt2',
            'extraction_lt3',
            'extraction_lt4',
            'extraction_lt5',
            'extraction_lt6',
            'extraction_lt7',
            'extraction_lt8',
            'extraction_lb1',
            'extraction_lb2',
            'extraction_lb3',
            'extraction_lb4',
            'extraction_lb5',
            'extraction_lb6',
            'extraction_lb7',
            'extraction_lb8',
            'extraction_rt1',
            'extraction_rt2',
            'extraction_rt3',
            'extraction_rt4',
            'extraction_rt5',
            'extraction_rt6',
            'extraction_rt7',
            'extraction_rt8',
            'extraction_rb1',
            'extraction_rb2',
            'extraction_rb3',
            'extraction_rb4',
            'extraction_rb5',
            'extraction_rb6',
            'extraction_rb7',
            'extraction_rb8',
        ]);
    
        $dentalExamExtractionData = $request->all();
    
        // Update or Create Dental Exam Extraction
        $dentalExamExtraction = $dentalExam->dental_exam_response->dental_exam_extraction;

        $dentalExamExtraction->update($dentalExamExtractionData);

    
        return redirect()->route('nurse.recordShow', ['record' => $recordID])->with('success', 'Record updated successfully.');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DentalExam $dentalExam)
    {
        //
    }
}
