<?php

namespace App\Http\Controllers;

use App\Models\Disposal;
use App\Models\Employee;
use App\Models\Medicine;
use Illuminate\Http\Request;

class DisposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disposals = Disposal::join('employees','disposals.employees_id','=','employees.id')
        ->join('medicines','disposals.medicines_id','=','medicines.id')
        ->select('disposals.dispqty', 'disposals.company', 'disposals.dispdate',
        'employees.fname', 'employees.lname', 'employees.salary', 'employees.phone',
        'medicines.medtype', 'medicines.manufacturer')
        ->paginate(5);

        return response()->json($disposals);
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
            'dispqty' => 'required', 
            'company' => 'required', 
            'dispdate' => 'required', 
            'medicine' => 'required', 
            'employee' => 'required'
        ]);

        $medicineid = Medicine::where('medtype',$request->medicine)->first()->id;
        $employeeid = Employee::where('phone',$request->employee)->first()->id;

        $disposal = Disposal::create([
            'dispqty' => $request->dispqty, 
            'company' => $request->company, 
            'dispdate' => $request->dispdate, 
            'medicines_id' => $medicineid, 
            'employees_id' => $employeeid
        ]);

        return response()->json($disposal);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $disposal = Disposal::join('employees','disposals.employees_id','=','employees.id')
        ->join('medicines','disposals.medicines_id','=','medicines.id')
        ->select('disposals.dispqty', 'disposals.company', 'disposals.dispdate',
        'employees.fname', 'employees.lname', 'employees.salary', 'employees.phone',
        'medicines.medtype', 'medicines.manufacturer')
        ->where('disposals.id',$id)
        ->get();

        return response()->json($disposal);
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
            'dispqty' => 'required', 
            'company' => 'required', 
            'dispdate' => 'required', 
            'medicine' => 'required', 
            'employee' => 'required'
        ]);

        $medicineid = Medicine::where('medtype',$request->medicine)->first()->id;
        $employeeid = Employee::where('phone',$request->employee)->first()->id;

        $disposal = Disposal::find($id);
            $disposal->dispqty = $request->dispqty; 
            $disposal->company = $request->company; 
            $disposal->dispdate = $request->dispdate; 
            $disposal->medicines_id = $medicineid;
            $disposal->employees_id = $employeeid;
        $disposal->update();
        
        return response()->json($disposal);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $disposal = Disposal::find($id);
        $disposal->delete();
        return response()->json('data deleted');
    }
}
