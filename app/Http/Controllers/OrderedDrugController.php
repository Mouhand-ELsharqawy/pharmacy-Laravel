<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedDrug;
use Illuminate\Http\Request;

class OrderedDrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugs = OrderedDrug::join('orders','ordered_drugs.orders_id','=','orders.id')
        ->select('ordered_drugs.OrderedQty', 'ordered_drugs.BatchNo', 'ordered_drugs.price')
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
            'OrderedQty' => 'required', 
            'BatchNo' => 'required', 
            'price' => 'required', 
            'order' => 'required'
        ]);

        $orderid = Order::where('orderdate',$request->order)->first()->id;

        $drug = OrderedDrug::create([
            'OrderedQty' => $request->OrderQty, 
            'BatchNo' => $request->BatchNo, 
            'price' => $request->price, 
            'orders_id' => $orderid
        ]);

        return response()->json($drug);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drug = OrderedDrug::join('orders','ordered_drugs.orders_id','=','orders.id')
        ->select('ordered_drugs.OrderedQty', 'ordered_drugs.BatchNo', 'ordered_drugs.price')
        ->where('ordered_drugs.id',$id)
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
            'OrderedQty' => 'required', 
            'BatchNo' => 'required', 
            'price' => 'required', 
            'order' => 'required'
        ]);

        $orderid = Order::where('orderdate',$request->order)->first()->id;

        $drug = OrderedDrug::find($id);
            $drug->OrderedQty = $request->OrderQty;
            $drug->BatchNo = $request->BatchNo;
            $drug->price = $request->price;
            $drug->orders_id = $orderid;
        
        $drug->update();
        return response()->json($drug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drug = OrderedDrug::find($id);
        $drug->delete();
        return response()->json($drug);
    }
}
