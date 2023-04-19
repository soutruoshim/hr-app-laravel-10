<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::find(1);
        return view('backend.pages.company.company',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
        $id = $request->id;

        $days = $request->weekend;
        $sunday = 0;
        $monday = 0;
        $tuesday = 0;
        $wednesday = 0;
        $thursday = 0;
        $friday = 0;
        $saturday = 0;
        //dd($days);
        foreach ($days as $day) {
           switch($day){
               case '1': $sunday = $day; break;
               case '2': $monday = $day; break;
               case '3': $tuesday = $day; break;
               case '4': $wednesday = $day; break;
               case '5': $thursday = $day; break;
               case '6': $friday = $day; break;
               case '7': $saturday = $day; break;
           }
        }

        if($request->file('logo')){
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250,250)->save('upload/company/'.$name_gen);
            $save_url = 'upload/company/'.$name_gen;

            $company = Company::findOrFail($id);
            $img = $company->logo;
            if(!empty($img)) unlink($img);

            $company->update([
                'company_name' => $request->company_name,
                'company_owner' => $request->company_owner,
                'address' => $request->address,
                'email' => $request->email,
                'website_url' => $request->website_url,
                'phone' => $request->phone,
                'sunday' => $sunday,
                'monday' => $monday,
                'tuesday' => $tuesday,
                'wednesday' => $wednesday,
                'thursday' => $thursday,
                'friday' => $friday,
                'saturday' => $saturday,
                'status' => $request->status,
                'logo'=> $save_url
            ]);

        }else{
            Company::findOrFail($id)->update([
                'company_name' => $request->company_name,
                'company_owner' => $request->company_owner,
                'address' => $request->address,
                'email' => $request->email,
                'website_url' => $request->website_url,
                'phone' => $request->phone,
                'sunday' => $sunday,
                'monday' => $monday,
                'tuesday' => $tuesday,
                'wednesday' => $wednesday,
                'thursday' => $thursday,
                'friday' => $friday,
                'saturday' => $saturday,
                'status' => $request->status
            ]);
        }

        $notification = array(
            'message' => 'Company Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
