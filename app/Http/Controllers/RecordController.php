<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereNotIn('role', [2, 3, 4, 5])
            ->orderBy('school_id')
            ->paginate(10);
        $records = Record::paginate(10);

        return view('nurse.record.index',compact('users', 'records'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    //public function create($user)
    //{
    //    
    //}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_created',
            'birth_date' => 'required',
            'age',
            'sex' => 'required',
            'civil_status' => 'required',
            'address' => 'required',
            'mobile_number' => 'required',
            'contact_person' => 'required',
            'contact_person_number' => 'required',
        ]);

        $userID = $request->input('user_id');

        $recordData = $request->all();
        $recordData['user_id'] = $userID;

        Record::create($recordData);

        return redirect()->back()->with('success','Record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        return view('nurse.record.show',compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    //public function edit(Record $record)
    //{
    //    
    //}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $request->validate([
            'date_updated',
            'birth_date' => 'required',
            'age',
            'sex' => 'required',
            'civil_status' => 'required',
            'address' => 'required',
            'mobile_number' => 'required',
            'contact_person' => 'required',
            'contact_person_number' => 'required',
        ]);
        
        $record->update($request->all());
        
        return redirect()->back()->with('success','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(Record $record)
    //{
    //    $record->delete();
    //     
    //    return redirect()->route('nurse.record.index')
    //                    ->with('success','Record deleted successfully');
    //}
}
