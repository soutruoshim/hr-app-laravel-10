<?php

namespace App\Http\Controllers;

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
                     ->get();
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
    public function show(string $id)
    {

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
}
