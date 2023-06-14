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
        if(auth()->user()->role == 'nurse')
        {
            return view('nurse.record.consultation.create',compact('record'));
        }
        elseif(auth()->user()->role == 'doctor')
        {
            return view('doctor.record.consultation.create',compact('record'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Connect Consultation ID to that specific Record ID
        $recordID = $request->input('record_id');
        $consultationData = $request->all();
        $consultationData['record_id'] = $recordID;

        // Create Consultation
        $consultation = Consultation::create($consultationData);

        // Connect Consultation Response ID to the Consultation ID
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

        // Create Consultation Response
        ConsultationResponse::create($consultationResponseData);
        
        if(auth()->user()->role == 'nurse')
        {
            return redirect()->route('nurse.recordShow', ['record' => $recordID])->with('success', 'Consultation created successfully.');
        }
        elseif(auth()->user()->role == 'doctor')
        {
            return redirect()->route('doctor.recordShow', ['record' => $recordID])->with('success', 'Consultation created successfully.');
        }
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
        if(auth()->user()->role == 'nurse')
        {
            return view('nurse.record.consultation.edit',compact('consultation'));
        }
        elseif(auth()->user()->role == 'doctor')
        {
            return view('doctor.record.consultation.edit',compact('consultation'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consultation $consultation)
    {
        // Connect Consultation ID to that specific Record ID
        $recordID = $request->input('record_id');
        $consultationData = $request->all();

        $consultation->update($consultationData);

        // Connect Consultation Response ID to the Consultation ID
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

        $consultationResponseData = $request->all();

        $consultationResponse = $consultation->consultation_response;

        $consultationResponse->update($consultationResponseData);

        if(auth()->user()->role == 'nurse')
        {
            return redirect()->route('nurse.recordShow', ['record' => $recordID])->with('success', 'Consultation updated successfully.');
        }
        elseif(auth()->user()->role == 'doctor')
        {
            return redirect()->route('doctor.recordShow', ['record' => $recordID])->with('success', 'Consultation updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        //
    }
}
