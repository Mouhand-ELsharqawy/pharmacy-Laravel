<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insurances = Insurance::paginate(5);
        return response()->json($insurances);
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
            'compname' => 'required', 
            'coinsurance' => 'required', 
            'startdate' => 'required', 
            'enddate' => 'required'
        ]);

        $insurance = Insurance::create([
            'compname' => $request->compname, 
            'coinsurance' => $request->coinsurance, 
            'startdate' => $request->startdate, 
            'enddate' => $request->enddate
        ]);

        return response()->json($insurance);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $insurance = Insurance::find($id);
        return response()->json($insurance);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'compname' => 'required', 
            'coinsurance' => 'required', 
            'startdate' => 'required', 
            'enddate' => 'required'
        ]);

        $insurance = Insurance::find($id);
        $insurance->compname = $request->compname;
        $insurance->coinsurance = $request->coinsurance; 
        $insurance->startdate = $request->startdate;
        $insurance->enddate = $request->enddate;
        
        $insurance->update();
        return response()->json($insurance);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $insurance = Insurance::find($id);
        $insurance->delete();
        return response()->json('data deleted');
    }
}
