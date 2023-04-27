<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $holidays = Holiday::latest()->get();
        return view('backend.pages.holiday.index',compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.holiday.holiday_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Holiday::insert([
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'description' => $request->description,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Holiday Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.holiday')->with($notification);
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
        $holiday = Holiday::findOrFail($id);
        return view('backend.pages.holiday.holiday_edit',compact('holiday'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->id;
        Holiday::findOrFail($id)->update([
            'event_name' => $request->event_name,
            'event_date' => $request->event_date,
            'description' => $request->description,
            'status' => $request->status
        ]);

         $notification = array(
            'message' => 'Holiday Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.holiday')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Holiday::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Holiday Deleted Successfully',
           'alert-type' => 'success'

       );

       return redirect()->back()->with($notification);
    }
}
