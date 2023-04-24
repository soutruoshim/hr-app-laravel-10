<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branchs = Branch::latest()->get();
        return view('backend.pages.branch.index',compact('branchs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.branch.branch_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Branch::insert([
            'branch_name' => $request->branch_name,
            'branch_head' => $request->branch_head,
            'address' => $request->address,
            'phone' => $request->phone,
            'late' => $request->late,
            'long' => $request->long,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Branch Inserted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('all.branch')->with($notification);
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
        $branch = Branch::findOrFail($id);
        return view('backend.pages.branch.branch_edit',compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->id;

        Branch::findOrFail($id)->update([
            'branch_name' => $request->branch_name,
            'branch_head' => $request->branch_head,
            'address' => $request->address,
            'phone' => $request->phone,
            'late' => $request->late,
            'long' => $request->long,
            'status' => $request->status

        ]);


         $notification = array(
            'message' => 'Branch Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('all.branch')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Branch::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Branch Deleted Successfully',
           'alert-type' => 'success'

       );

       return redirect()->back()->with($notification);

    }
}
