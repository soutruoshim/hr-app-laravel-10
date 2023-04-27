<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notify::latest()->get();
        return view('backend.pages.notification.index',compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.notification.notification_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $notification = Notify::create([
            'title' => $request->title,
            'status' => $request->status,
            'description' => $request->description
        ]);
        $notification = array(
            'message' => 'Notification Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.notify')->with($notification);
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
        $notification = Notify::findOrFail($id);
        return view('backend.pages.notification.notification_edit',compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $id = $request->id;
            Notify::findOrFail($id)->update([
                'title' => $request->title,
                'status' => $request->status,
                'description' => $request->description
            ]);
            $notification = array(
                'message' => 'Notification Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.notify')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notice = Notify::findOrFail($id);
        $notice->delete();
        $notification = array(
           'message' => 'Notification Deleted Successfully',
           'alert-type' => 'success'

       );
       return redirect()->back()->with($notification);
    }
}
