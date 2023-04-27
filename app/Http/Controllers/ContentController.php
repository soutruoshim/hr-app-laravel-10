<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::latest()->get();
        return view('backend.pages.content.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.content.content_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Content::insert([
            'title' => $request->title,
            'content_type' => $request->content_type,
            'description' => $request->description,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Content Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.content')->with($notification);
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
        $content = Content::findOrFail($id);
        return view('backend.pages.content.content_edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->id;
        Content::findOrFail($id)->update([
            'title' => $request->title,
            'content_type' => $request->content_type,
            'description' => $request->description,
            'status' => $request->status
        ]);

         $notification = array(
            'message' => 'Content Updated Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('all.content')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Content::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Content Deleted Successfully',
           'alert-type' => 'success'

       );

       return redirect()->back()->with($notification);
    }
}
