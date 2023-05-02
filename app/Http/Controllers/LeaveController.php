<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $leaveTypes = LeaveType::latest()->get();

        $requested_by = isset($_GET['requested_by'])?$_GET['requested_by']:"";
        $month = isset($_GET['month'])?$_GET['month']:date('m');
        $year = isset($_GET['year'])?$_GET['year']:date('Y');
        $leave_type_selected = isset($_GET['leave_type'])?$_GET['leave_type']:"";
        $status = isset($_GET['status'])?$_GET['status']:"";

        $leaves = Leave::where('request_by', '=', $requested_by)
                         ->orWhereMonth('request_date', '=', $month)
                         ->orWhereYear('request_date', '=', $year)
                         ->orWhere('leave_type', '=', $leave_type_selected)
                         ->orWhere('status', '=', $status)
                         ->get();

        return view('backend.pages.leave.index',compact('leaves', 'leaveTypes'));
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
        $id = $request->leave_id;

        Leave::findOrFail($id)->update([
            'status' => $request->leave_form_status,
            'reason' => $request->amdin_remark
        ]);

         $notification = array(
            'message' => 'Leave Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Leave::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Leave Deleted Successfully',
           'alert-type' => 'success'

       );

       return redirect()->back()->with($notification);
    }
}
