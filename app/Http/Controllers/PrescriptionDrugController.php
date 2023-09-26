<?php

namespace App\Http\Controllers;

use App\Models\PrescriptionDrug;
use Illuminate\Http\Request;

class PrescriptionDrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugs = PrescriptionDrug::join('prescriptions', 'prescription_drugs.prescription_id','='
        , 'prescriptions.id')
        ->select('prescription_drugs.drugname', 'prescription_drugs.refilllimit', 
        'prescription_drugs.prescriptions_id', 'prescription.ssn', 
        'prescription.presp', 'prescription.DocId')
        ->paginate(5);

        return response()->json($drugs);
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
            'drugname' => 'required', 
            'refilllimit' => 'required', 
            'pres' => 'required'
        ]);

        $drug = PrescriptionDrug::create([
            'drugname' => $request->drugname, 
            'refilllimit' => $request->refilllimit, 
            'prescriptions_id' => $request->pres
        ]);

        return response()->json($drug);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drug = PrescriptionDrug::join('prescriptions', 'prescription_drugs.prescription_id','='
        ,'prescriptions.id')
        ->select('prescription_drugs.drugname', 'prescription_drugs.refilllimit', 
        'prescription_drugs.prescriptions_id', 'prescription.ssn', 
        'prescription.presp', 'prescription.DocId')
        ->where('prescription_drugs.id',$id)
        ->get();

        return response()->json($drug);
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
            'drugname' => 'required', 
            'refilllimit' => 'required', 
            'pres' => 'required'
        ]);

        $drug = PrescriptionDrug::find($id);
            $drug->drugname = $request->drugname; 
            $drug->refilllimit = $request->refilllimit; 
            $drug->prescriptions_id = $request->pres;
        $drug->update();

        return response()->json($drug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drug = PrescriptionDrug::find($id);
        $drug->delete();
        return response()->json('data deleted');
    }
}
