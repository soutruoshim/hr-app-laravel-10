<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use App\Models\ShiftTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('backend.pages.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branchs = Branch::latest()->get();
        $employees = Employee::latest()->get();
        $shifttimes = ShiftTime::latest()->get();
        return view('backend.pages.employee.employee_add', compact('branchs', 'employees', 'shifttimes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        if($request->file('avatar')){

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);

            $user->assignRole($request->role);


            $image = $request->file('avatar');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('upload/employee/'.$name_gen);
            $save_url = 'upload/employee/'.$name_gen;
            // $company = Employee::findOrFail($id);
            // $img = $company->logo;
            // if(!empty($img)) unlink($img);


            Employee::insert([
                'user_id' => $user->id,
                'address' => $request->address,
                'dob' => $request->dob,
                'phone' => $request->phone,

                'gender' => $request->gender,
                'branch_id' => $request->branch_id,
                'department_id' => $request->department_id,
                'position_id' => $request->position_id,

                'supervisor' => $request->supervisor,
                'office_time' => $request->office_time,
                'employment_type' => $request->employment_type,
                'user_type' => $request->user_type,

                'joining_date' => $request->joining_date,
                'work_space' => $request->work_space,
                'bank_name' => $request->bank_name,
                'bank_account' => $request->bank_account,
                'bank_account_type' => $request->bank_account_type,

                'leave_allocated' => $request->leave_allocated,
                'salary' => $request->salary,
                'verification_status' => $request->verification_status,
                'user_status' => $request->user_status,
                'upload_avatar' => $save_url,
                'description' => $request->description
            ]);
        }

        $notification = array(
            'message' => 'Employee Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employee')->with($notification);
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
        $employees = Employee::latest()->get();
        $employee = Employee::findOrFail($id);
        $branchs = Branch::latest()->get();
        $departments = Department::latest()->get();
        $positions = Position::latest()->get();
        $shifttimes = ShiftTime::latest()->get();

        return view('backend.pages.employee.employee_edit', compact('branchs','employee', 'employees', 'shifttimes','departments','positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->id;
        if($request->file('avatar')){

            $image = $request->file('avatar');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('upload/employee/'.$name_gen);
            $save_url = 'upload/employee/'.$name_gen;

            $employee = Employee::findOrFail($id);
            $user = User::findOrFail($employee->user_id);

            // delete old image
            $img = $employee->upload_avatar;
            if(!empty($img)) unlink($img);


            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => !empty($request->password)?Hash::make($request->password):$user->password,
                'role' => $request->role
            ]);

            $user->assignRole($request->role);

            $employee->update([
                'user_id' => $user->id,
                'address' => $request->address,
                'dob' => $request->dob,
                'phone' => $request->phone,

                'gender' => $request->gender,
                'branch_id' => $request->branch_id,
                'department_id' => $request->department_id,
                'position_id' => $request->position_id,

                'supervisor' => $request->supervisor,
                'office_time' => $request->office_time,
                'employment_type' => $request->employment_type,
                'user_type' => $request->user_type,

                'joining_date' => $request->joining_date,
                'work_space' => $request->work_space,
                'bank_name' => $request->bank_name,
                'bank_account' => $request->bank_account,
                'bank_account_type' => $request->bank_account_type,

                'leave_allocated' => $request->leave_allocated,
                'salary' => $request->salary,
                'verification_status' => $request->verification_status,
                'user_status' => $request->user_status,
                'upload_avatar' => $save_url,
                'description' => $request->description
            ]);
        }else{
            $employee = Employee::findOrFail($id);
            $user = User::findOrFail($employee->user_id);

            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => !empty($request->password)?Hash::make($request->password):$user->password,
                'role' => $request->role
            ]);

            $user->assignRole($request->role);

            $employee->update([
                'user_id' => $user->id,
                'address' => $request->address,
                'dob' => $request->dob,
                'phone' => $request->phone,

                'gender' => $request->gender,
                'branch_id' => $request->branch_id,
                'department_id' => $request->department_id,
                'position_id' => $request->position_id,

                'supervisor' => $request->supervisor,
                'office_time' => $request->office_time,
                'employment_type' => $request->employment_type,
                'user_type' => $request->user_type,

                'joining_date' => $request->joining_date,
                'work_space' => $request->work_space,
                'bank_name' => $request->bank_name,
                'bank_account' => $request->bank_account,
                'bank_account_type' => $request->bank_account_type,

                'leave_allocated' => $request->leave_allocated,
                'salary' => $request->salary,
                'verification_status' => $request->verification_status,
                'user_status' => $request->user_status,
                'description' => $request->description
            ]);
        }

         $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employee')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee =  Employee::findOrFail($id);
        $user = User::findOrFail($employee->user_id);

        // delete old image
        $img = $employee->upload_avatar;
        if(!empty($img)) unlink($img);

        $employee->delete();
        $user->delete();

        $notification = array(
           'message' => 'Employee Deleted Successfully',
           'alert-type' => 'success'
        );

       return redirect()->back()->with($notification);
    }
}
