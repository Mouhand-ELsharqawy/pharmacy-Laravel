<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Prescription;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::join('prescriptions', 'orders.prescriptions_id','=','prescriptions.id')
        ->select('orders.orderdate', 'prescriptions.ssn', 'prescriptions.presp', 
        'prescriptions.DocId')
        ->paginate(5);
        return response()->json($orders);
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
            'orderdate' => 'required', 
            'prescription' => 'required'
        ]);

        $prescriptionid = Prescription::where('ssn',$request->prescription)->first()->id;

        $order = Order::create([
            'orderdate' => $request->orderdate, 
            'prescriptions_id' => $prescriptionid
        ]);

        return response()->json($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::join('prescriptions', 'orders.prescriptions_id','=','prescriptions.id')
        ->select('orders.orderdate', 'prescriptions.ssn', 'prescriptions.presp', 
        'prescriptions.DocId')
        ->where('orders.id',$id)
        ->get();

        return response()->json($order);
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
            'orderdate' => 'required', 
            'prescription' => 'required'
        ]);

        $prescriptionid = Prescription::where('ssn',$request->prescription)->first()->id;

        $order = Order::find($id);
            $order->orderdate = $request->orderdate;
            $order->prescriptions_id = $prescriptionid;
        $order->update();

        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();
        return response()->json('data deleted');
    }
}
