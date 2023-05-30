<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Consultation;
use App\Models\ConsultationResponse;
use Illuminate\Http\Request;

class ConsultationController extends Controller
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
        return view('nurse.record.consultation.create',compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Connect Medical Exam ID to that specific Record ID
        $recordID = $request->input('record_id');
        $consultationData = $request->all();
        $consultationData['record_id'] = $recordID;

        // Create Medical Exam
        $consultation = Consultation::create($consultationData);

        // Connect Past Medical History ID to the Medical Exam ID
        $request->validate([
            'complaint',
            'pulse',
            'oxygen',
            'respiratory_rate',
            'bp1',
            'bp2',
            'temperature',
            'treatment',
            'remarks',
        ]);

        $consultationID = $consultation->id;
        $consultationResponseData = $request->all();
        $consultationResponseData['consultation_id'] = $consultationID;

        // Create Past Medical History
        ConsultationResponse::create($consultationResponseData);
        
        return redirect()->route('nurse.recordShow', ['record' => $recordID])->with('success', 'Record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        //
    }
}
