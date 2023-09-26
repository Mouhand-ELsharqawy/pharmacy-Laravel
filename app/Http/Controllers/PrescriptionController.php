<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pres = Prescription::paginate(5);
        return response()->json($pres);
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
            'ssn' => 'required', 
            'presp' => 'required', 
            'DocId' => 'required'
        ]);

        $pres = Prescription::create($request->all());
        return response()->json($pres);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pres = Prescription::find($id);
        return response()->json($pres);
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
            'ssn' => 'required', 
            'presp' => 'required', 
            'DocId' => 'required'
        ]);

        $pres = Prescription::find($id);

            $pres->ssn = $request->ssn; 
            $pres->presp = $request->presp;
            $pres->DocId = $request->DocId;
        $pres->update();
        return response()->json($pres);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pres = Prescription::find($id);
        $pres->delete();
        return response()->json('data deleted');
    }
}
