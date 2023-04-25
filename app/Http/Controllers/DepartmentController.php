<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::latest()->get();
        return view('backend.pages.department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $branchs = Branch::latest()->get();
        return view('backend.pages.department.department_add', compact('branchs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Department::insert([
            'branch_id' => $request->branch_id,
            'department_name' => $request->department_name,
            'department_head' => $request->department_head,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Department Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.department')->with($notification);
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
        $department = Department::findOrFail($id);
        $branchs = Branch::latest()->get();
        return view('backend.pages.department.department_edit',compact('department', 'branchs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->id;
        Department::findOrFail($id)->update([
            'branch_id' => $request->branch_id,
            'department_name' => $request->department_name,
            'department_head' => $request->department_head,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => $request->status
        ]);

         $notification = array(
            'message' => 'Department Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('all.department')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Department::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Department Deleted Successfully',
           'alert-type' => 'success'

       );

       return redirect()->back()->with($notification);
    }

    public function getDepartmentByBrand($branch_id){
        $departments = Department::where('branch_id',$branch_id)->get();
        return json_encode($departments);
    }
}
