<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\DentalExam;
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DentalExam $dentalExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DentalExam $dentalExam)
    {
        //
    }
}
