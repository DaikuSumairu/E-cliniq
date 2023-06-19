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
    public function index(Request $request)
    {
        $query = $request->input('query');

        $users = User::whereNotIn('role', [2, 3, 4, 5])
            ->where('school_id', 'like', "%{$query}%")
            ->orderBy('name')
            ->paginate(10);
        $records = Record::all();

        if(auth()->user()->role == 'nurse')
        {
            return view('nurse.record.index',compact('users', 'records', 'query'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
        }
        elseif(auth()->user()->role == 'doctor')
        {
            return view('doctor.record.index',compact('users', 'records', 'query'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
        }
        elseif(auth()->user()->role == 'dentist')
        {
            return view('dentist.record.index',compact('users', 'records', 'query'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
        }
        elseif(auth()->user()->role == 'student')
        {
            $record = Record::where('user_id', '=', auth()->user()->id)->first();
            return view('student.record.index', compact('record'));
        }
        elseif(auth()->user()->role == 'faculty')
        {
            $record = Record::where('user_id', '=', auth()->user()->id)->first();
            return view('faculty.record.index', compact('record'));
        }
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
    //public function store(Request $request)
    //{
    //    //
    //}

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        if(auth()->user()->role == 'nurse')
        {
            return view('nurse.record.show',compact('record'));
        }
        elseif(auth()->user()->role == 'doctor')
        {
            return view('doctor.record.show',compact('record'));
        }
        elseif(auth()->user()->role == 'dentist')
        {
            return view('dentist.record.show',compact('record'));
        }
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
