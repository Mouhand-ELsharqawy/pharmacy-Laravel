<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\OrderedDrug;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::join('ordered_drugs','medicines.ordered_drugs','=','ordered_drugs.id')
        ->select('medicines.medtype', 'medicines.manufacturer', 'medicines.stockqty', 
        'medicines.price', 'medicines.expiredate', 'medicines.desc', 'ordered_drugs.OrderedQty', 
        'ordered_drugs.BatchNo', 'ordered_drugs.price')
        ->paginate(5);

        return response()->json($medicines);
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
            'medtype' => 'required', 
            'manufacturer' => 'required', 
            'stockqty' => 'required', 
            'price' => 'required', 
            'expiredate' => 'required', 
            'desc' => 'required', 
            'ordered' => 'required'
        ]);

        $orderedid = OrderedDrug::where('BatchNo', $request->ordered)->first()->id;

        $medicine = Medicine::create([
            'medtype' => $request->medtype, 
            'manufacturer' => $request->manufacturer, 
            'stockqty' => $request->stockqty, 
            'price' => $request->price, 
            'expiredate' => $request->expiredate, 
            'desc' => $request->desc, 
            'ordered_drugs_id' => $orderedid
        ]);

        return response()->json($medicine);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medicine = Medicine::join('ordered_drugs','medicines.ordered_drugs','=','ordered_drugs.id')
        ->select('medicines.medtype', 'medicines.manufacturer', 'medicines.stockqty', 
        'medicines.price', 'medicines.expiredate', 'medicines.desc', 'ordered_drugs.OrderedQty', 
        'ordered_drugs.BatchNo', 'ordered_drugs.price')
        ->where('medicines',$id)
        ->get();

        return response()->json($medicine);
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
            'medtype' => 'required', 
            'manufacturer' => 'required', 
            'stockqty' => 'required', 
            'price' => 'required', 
            'expiredate' => 'required', 
            'desc' => 'required', 
            'ordered' => 'required'
        ]);

        $orderedid = OrderedDrug::where('BatchNo', $request->ordered)->first()->id;

        $medicine = Medicine::find($id);
        $medicine->medtype = $request->medtype;
        $medicine->manufacturer = $request->manufacturer; 
        $medicine->stockqty = $request->stockqty;
        $medicine->price = $request->price;
        $medicine->expiredate = $request->expiredate;
        $medicine->desc = $request->desc;
        $medicine->ordered_drugs_id = $orderedid;
        $medicine->update();

        return response()->json($medicine);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();
        return response()->json('data deleted');
    }
}
