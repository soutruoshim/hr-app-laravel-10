<?php

namespace App\Http\Controllers;

use App\Models\ShiftTime;
use Illuminate\Http\Request;

class ShiftTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifttimes = ShiftTime::latest()->get();
        return view('backend.pages.shifttime.index',compact('shifttimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.shifttime.shifttime_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ShiftTime::insert([
            'opening_time' => $request->opening_time,
            'closing_time' => $request->closing_time,
            'shift' => $request->shift,
            'category' => $request->category,
            'description' => $request->description,
            'week_holiday_count' => $request->week_holiday_count,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Shift Time Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.shifttime')->with($notification);
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
        $shifttime = ShiftTime::findOrFail($id);
        return view('backend.pages.shifttime.shifttime_edit',compact('shifttime'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->id;
        ShiftTime::findOrFail($id)->update([
            'opening_time' => $request->opening_time,
            'closing_time' => $request->closing_time,
            'shift' => $request->shift,
            'category' => $request->category,
            'description' => $request->description,
            'week_holiday_count' => $request->week_holiday_count,
            'status' => $request->status
        ]);

         $notification = array(
            'message' => 'ShiftTime Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('all.shifttime')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ShiftTime::findOrFail($id)->delete();

        $notification = array(
           'message' => 'ShiftTime Deleted Successfully',
           'alert-type' => 'success'

       );

       return redirect()->back()->with($notification);
    }
}
