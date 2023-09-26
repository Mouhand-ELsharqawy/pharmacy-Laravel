<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::join('customers','bills.customers_id','=','customers.id')
        ->select('bills.ssn', 'bills.insrpay', 'bills.custpay', 'bills.totalamount',
        'customers.fname', 'customers.lname', 'customers.phone')
        ->paginate(5);

        return response()->json($bills);
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
            'insrpay' => 'required', 
            'custpay' => 'required', 
            'totalamount' => 'required',
            'customer' => 'required' 
        ]);
        $customerid = Customer::where('phone',$request->customer)->first()->id;

        $bill = Bill::create([
            'ssn' => $request->ssn,
            'insrpay' => $request->insrpay,
            'custpay' => $request->custpay,
            'totalamount' => $request->totalamount,
            'customers_id' => $customerid
        ]);

        return response()->json($bill);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bill = Bill::join('customers','bills.customers_id','=','customers.id')
        ->select('bills.ssn', 'bills.insrpay', 'bills.custpay', 'bills.totalamount',
        'customers.fname', 'customers.lname', 'customers.phone')
        ->where('bills.id',$id)
        ->get();

        return response()->json($bill);
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
            'insrpay' => 'required', 
            'custpay' => 'required', 
            'totalamount' => 'required',
            'customer' => 'required' 
        ]);
        $customerid = Customer::where('phone',$request->customer)->first()->id;

        $bill = Bill::find($id);
            $bill->ssn = $request->ssn;
            $bill->insrpay = $request->insrpay;
            $bill->custpay = $request->custpay;
            $bill->totalamount = $request->totalamount;
            $bill->customers_id = $customerid;
            $bill->update();

        return response()->json($bill);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bill = Bill::find($id);
        $bill->delete();
        return response()->json('data deleted');
    }
}
