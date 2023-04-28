<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $param = isset($_GET['attendance_date'])? $_GET['attendance_date'] : date("Y-m-d");
        $employees = Employee::where('user_status', 'active')
                     ->leftJoin('attendances', function($join) use ($param)
                     {
                         $join->on('employees.id', '=', 'attendances.employee_id')
                              ->where('date','=', $param);
                     })
                     ->get(['Employees.*', 'attendances.date', 'attendances.check_in','attendances.check_out','attendances.attendance_by','attendances.check_out','attendances.status']);
        return view('backend.pages.attendance.index',compact('employees'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, string $date)
    {
        $employee = Employee::findOrFail($id);
        return view('backend.pages.attendance.show', compact('employee', 'date'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getAttendanceByMonth(){
        $attendances = Attendance::whereMonth('date',$_GET['month'])
                                    ->whereYear('date',$_GET['year'])
                                    ->Where('employee_id', $_GET['emp_id'])
                                    ->get();
        return json_encode($attendances);
    }
}
