<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::latest()->get();
        return view('backend.pages.position.index',compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::latest()->get();
        return view('backend.pages.position.position_add', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Position::insert([
            'department_id' => $request->department_id,
            'position_name' => $request->position_name,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Position Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.position')->with($notification);
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
        $position = Position::findOrFail($id);
        $departments = Department::latest()->get();

        return view('backend.pages.position.position_edit',compact('position', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->id;
        Position::findOrFail($id)->update([
            'department_id' => $request->department_id,
            'position_name' => $request->position_name,
            'status' => $request->status
        ]);

         $notification = array(
            'message' => 'Position Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('all.position')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Position::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Position Deleted Successfully',
           'alert-type' => 'success'

       );

       return redirect()->back()->with($notification);
    }

    public function getPositionByDepartment($department_id){
        $positions = Position::where('department_id',$department_id)->get();
        return json_encode($positions);
    }
}
