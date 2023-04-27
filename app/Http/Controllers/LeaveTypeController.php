<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leave_types = LeaveType::latest()->get();
        return view('backend.pages.leave_type.index',compact('leave_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.leave_type.leave_type_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        LeaveType::insert([
            'leave_type_name' => $request->leave_type_name,
            'paid_leave' => $request->paid_leave,
            'leave_allocated' => $request->leave_allocated,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'LeaveType Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.leave_type')->with($notification);
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
        $leave_type = LeaveType::findOrFail($id);
        return view('backend.pages.leave_type.leave_type_edit',compact('leave_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->id;
        LeaveType::findOrFail($id)->update([
            'leave_type_name' => $request->leave_type_name,
            'paid_leave' => $request->paid_leave,
            'leave_allocated' => $request->leave_allocated,
            'status' => $request->status
        ]);

         $notification = array(
            'message' => 'LeaveType Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('all.leave_type')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LeaveType::findOrFail($id)->delete();

        $notification = array(
           'message' => 'LeaveType Deleted Successfully',
           'alert-type' => 'success'

       );

       return redirect()->back()->with($notification);
    }
}
