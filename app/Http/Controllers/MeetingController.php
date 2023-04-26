<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Meeting;
use App\Models\MeetingEmployee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meetings = Meeting::latest()->get();
        return view('backend.pages.meeting.index',compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::latest()->get();
        return view('backend.pages.meeting.meeting_add', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('upload/meeting/'.$name_gen);
            $save_url = 'upload/meeting/'.$name_gen;

            $meeting = Meeting::create([

                'title' => $request->title,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'venue' => $request->venue,
                'description' => $request->description,
                'image' => $save_url
            ]);

            if(!empty($_POST['employees'])) {
                foreach($_POST['employees'] as $selected){
                    MeetingEmployee::insert([
                        'meeting_id' => $meeting->id,
                        'employee_id' => $selected
                    ]);
                }
            }
        }

        $notification = array(
            'message' => 'Meeting Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.meeting')->with($notification);


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
        $meeting = Meeting::findOrFail($id);
        $employees = Employee::latest()->get();

        $emp_selected = [];

        foreach($meeting->meeting_employee as $emp){
           $emp_selected[] = $emp->employee_id;
        }


        return view('backend.pages.meeting.meeting_edit',compact('meeting', 'employees', 'emp_selected'));
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
