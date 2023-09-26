<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Order;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::join('orders','employees.orders_id','=','orders.id')
        ->select('employees.fname', 'employees.lname', 'employees.dob', 'employees.salary', 
        'employees.startdate', 'employees.enddate', 'employees.role', 'employees.liscense', 
        'employees.ssn', 'employees.phone','orders.orderdate')
        ->paginate(5);

        return response()->json($employees);
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
            'dob' => 'required', 
            'salary' => 'required', 
            'startdate' => 'required', 
            'enddate' => 'required', 
            'role' => 'required', 
            'liscense' => 'required', 
            'ssn' => 'required', 
            'phone' => 'required', 
            'order' => 'required'
        ]);
        

        $employee = Employee::create([
            'fname' => $request->fname, 
            'lname' => $request->lname, 
            'dob' => $request->dob, 
            'salary' => $request->salary, 
            'startdate' => $request->startdate, 
            'enddate' => $request->enddate, 
            'role' => $request->role, 
            'liscense' => $request->liscense, 
            'ssn' => $request->ssn, 
            'phone' => $request->phone, 
            'orders_id' => $request->order
        ]);

        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::join('orders','employees.orders_id','=','orders.id')
        ->select('employees.fname', 'employees.lname', 'employees.dob', 'employees.salary', 
        'employees.startdate', 'employees.enddate', 'employees.role', 'employees.liscense', 
        'employees.ssn', 'employees.phone','orders.orderdate')
        ->where('employees.id',$id)
        ->get();

        return response()->json($employee);
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
            'dob' => 'required', 
            'salary' => 'required', 
            'startdate' => 'required', 
            'enddate' => 'required', 
            'role' => 'required', 
            'liscense' => 'required', 
            'ssn' => 'required', 
            'phone' => 'required', 
            'order' => 'required'
        ]);
        

        $employee = Employee::find($id);
        $employee->fname = $request->fname;
        $employee->lname = $request->lname; 
        $employee->dob = $request->dob;
        $employee->salary = $request->salary; 
        $employee->startdate = $request->startdate; 
        $employee->enddate = $request->enddate;
        $employee->role = $request->role;
        $employee->liscense = $request->liscense; 
        $employee->ssn = $request->ssn;
        $employee->phone = $request->phone; 
        $employee->orders_id = $request->order;
        
        $employee->update();
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json('data deleted');
    }
}
