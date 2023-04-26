<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Notice;
use App\Models\NoticeEmployee;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = Notice::latest()->get();
        return view('backend.pages.notice.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::latest()->get();
        return view('backend.pages.notice.notice_add', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $notice = Notice::create([
            'title' => $request->title,
            'status' => $request->status,
            'description' => $request->description
        ]);

        if(!empty($_POST['employees'])) {
            foreach($_POST['employees'] as $selected){
                NoticeEmployee::insert([
                    'notice_id' => $notice->id,
                    'employee_id' => $selected
                ]);
            }
        }

        $notification = array(
            'message' => 'Notice Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.notice')->with($notification);

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
