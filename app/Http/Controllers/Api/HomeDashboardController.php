<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class HomeDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function checkIn(Request $request){

        $emp_id = Auth::user()->employee->id;
        $date = date('Y-m-d');
        $late = Auth::user()->employee->branch->late;
        $long =  Auth::user()->employee->branch->long;

        $attendance = Attendance::insert([
            'check_in' => $request->check_in_at,
            'date' => $date,
            'employee_id' => $emp_id,
            'check_in_late'=> $late,
            'check_in_long'=> $long,
            'attendance_by' => Auth::id()
        ]);

        if($attendance){
            return response()->json([
                "success" => true,
                "message" => "Check-in success",
                "data" => $attendance
                ]);
        }

        return response()->json([
            "success" => false,
            "message" => "Check-in failed"
            ]);
    }

    public function checkOut(Request $request){

        $emp_id = $request->emp_id;
        $date = $request->date;
        $late = Auth::user()->employee->branch->late;
        $long =  Auth::user()->employee->branch->long;

        $attendance = Attendance::where('date', '=', $date)
        ->where('employee_id', '=', $emp_id)->get()->first();

        if($attendance){
            $attendance->update([
                'check_out' => $request->check_out_at,
                'check_out_late'=> $late,
                'check_out_long'=> $long,
                'attendance_by' => Auth::id()
            ]);
        }else{
            return response()->json([
                "success" => true,
                "message" => "Please check-in first",
                "data" => $attendance
                ]);
        }

        if($attendance){
            return response()->json([
                "success" => true,
                "message" => "Check-out success",
                "data" => $attendance
                ]);
        }
        return response()->json([
            "success" => false,
            "message" => "Check-out failed"
            ]);
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
        //
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
