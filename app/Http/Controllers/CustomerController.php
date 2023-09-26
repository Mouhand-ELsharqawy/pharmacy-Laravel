<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Insurance;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::join('insurances','customers.insurances_id','=','insurances.id')
        ->select('cutomers.fname', 'cutomers.lname', 'cutomers.phone', 'cutomers.gender', 
        'cutomers.address', 'cutomers.ssn', 'cutomers.dob','insurances.compname', 
        'insurances.coinsurance', 'insurances.startdate', 'insurances.enddate')
        ->paginate(5);

        return response()->json($customers);
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
            'fname' => 'required', 
            'lname' => 'required', 
            'phone' => 'required', 
            'gender' => 'required', 
            'address' => 'required', 
            'ssn' => 'required', 
            'dob' => 'required',
            'insurance' => 'required'
        ]);

        $insuranceid = Insurance::where('compname',$request->insurance)->first()->id;

        $customer = Customer::create([
            'fname' => $request->fname, 
            'lname' => $request->lname, 
            'phone' => $request->phone, 
            'gender' => $request->gender, 
            'address' => $request->address, 
            'ssn' => $request->ssn, 
            'dob' => $request->dob, 
            'insurances_id' => $insuranceid
        ]);

        return response()->json($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::join('insurances','customers.insurances_id','=','insurances.id')
        ->select('cutomers.fname', 'cutomers.lname', 'cutomers.phone', 'cutomers.gender', 
        'cutomers.address', 'cutomers.ssn', 'cutomers.dob','insurances.compname', 
        'insurances.coinsurance', 'insurances.startdate', 'insurances.enddate')
        ->where('customers',$id)
        ->get();

        return response()->json($customer);
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
            'fname' => 'required', 
            'lname' => 'required', 
            'phone' => 'required', 
            'gender' => 'required', 
            'address' => 'required', 
            'ssn' => 'required', 
            'dob' => 'required',
            'insurance' => 'required'
        ]);

        $insuranceid = Insurance::where('compname',$request->insurance)->first()->id;

        $customer = Customer::find($id);
            $customer->fname = $request->fname; 
            $customer->lname = $request->lname; 
            $customer->phone = $request->phone; 
            $customer->gender = $request->gender; 
            $customer->address = $request->address;
            $customer->ssn = $request->ssn; 
            $customer->dob = $request->dob;
            $customer->insurances_id = $insuranceid;
        
        $customer->update();

        return response()->json($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json('data removed');
    }
}
