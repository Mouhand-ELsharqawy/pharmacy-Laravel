<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifies = Notification::join('employees','notifications.employees_id','=','employees.id')
        ->select('notifications.type', 'notifications.message','employees.fname',
         'employees.lname', 'employees.salary', 'employees.phone')
        ->paginate(5);

        return response()->json($notifies);
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
            'type' => 'required', 
            'message' => 'required', 
            'employee' => 'required'
        ]);

        $employeeid = Employee::where('phone',$request->employee)->first()->id;

        $notify = Notification::create([
            'type' => $request->type, 
            'message' => $request->message, 
            'employees_id' => $employeeid
        ]);

        return response()->json($notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notify = Notification::join('employees','notifications.employees_id','=','employees.id')
        ->select('notifications.type', 'notifications.message','employees.fname',
         'employees.lname', 'employees.salary', 'employees.phone')
        ->where('notifications.id',$id)
        ->get();

        return response()->json($notify);
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
            'type' => 'required', 
            'message' => 'required', 
            'employee' => 'required'
        ]);

        $employeeid = Employee::where('phone',$request->employee)->first()->id;

        $notify = Notification::find($id);
           $notify->type = $request->type;
           $notify->message = $request->message; 
           $notify->employees_id = $employeeid;
        $notify->update();

        return response()->json($notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notify = Notification::find($id);
        $notify->delete();
        return response()->json('data deleted');
    }
}
