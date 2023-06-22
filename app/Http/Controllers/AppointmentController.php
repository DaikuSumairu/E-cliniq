<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('name');

        // Perform a query to retrieve the users based on the search term
        $users = User::where('name', 'like', '%' . $searchTerm . '%')->get(['id', 'name', 'school_id']);

        // Return the users as a JSON response
        return response()->json($users);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::orderBy('date')
            ->orderBy('start_time')
            ->paginate(5);

        $appointed = Appointment::all();

        if(auth()->user()->role == 'nurse')
        {
            return view('nurse.appointment.index',compact('appointments', 'appointed'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        elseif(auth()->user()->role == 'doctor')
        {
            return view('doctor.appointment.index',compact('appointments', 'appointed'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        elseif(auth()->user()->role == 'dentist')
        {
            return view('dentist.appointment.index',compact('appointments', 'appointed'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        elseif(auth()->user()->role == 'student')
        {
            return view('student.appointment.index', compact('appointments', 'appointed'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        elseif(auth()->user()->role == 'faculty')
        {
            return view('faculty.appointment.index', compact('appointments', 'appointed'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id',
            'name',
            'school_id',
            'date',
            'start_time',
            'end_time',
            'reason',
            'status',
        ]);
    
        Appointment::create($request->all());
    
        return redirect()->back()->with('success','Record updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'status',
        ]);

        $appointment->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
    
        return redirect()->back();
    }
}
