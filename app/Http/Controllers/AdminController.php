<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Holiday;
use App\Models\Leave;
use App\Models\LeaveType;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/admin/logout/page');

    } // End Method
    public function AdminDashboard(){


        $employees = Employee::count();
        $paidLeave = LeaveType::where("paid_leave", "=", "1")->count();
        $unpaidLeave = LeaveType::where("paid_leave", "=", "0")->count();
        $holidays = Holiday::count();
        //DB::enableQueryLog();
        $leaveTodays = Leave::whereDate('leave_from', '>=', date('Y-m-d'))
                             ->whereDate('leave_to', '>=', date('Y-m-d'))->count();
       //$query = DB::getQueryLog();
       //dd($query);

       $leavePendingRequests = Leave::where('status', '=', 'pending')->count();
       $leaveEarlyRequests = 0;

       $checkins = Attendance::whereDate('date', '=', date('Y-m-d'))
                               ->whereNotNull('check_in')->count();

       $checkouts = Attendance::whereDate('date', '=', date('Y-m-d'))
                               ->whereNotNull('check_out')->count();

                               $param = date("Y-m-d");
        $attendances = Employee::where('user_status', 'active')
                     ->leftJoin('attendances', function($join) use ($param)
                     {
                         $join->on('employees.id', '=', 'attendances.employee_id')
                              ->whereDate('date','=', $param);
                     })
                     ->get(['Employees.*', 'attendances.date', 'attendances.check_in','attendances.check_out','attendances.attendance_by','attendances.check_out','attendances.status']);



        return view('admin.index', compact("employees", "paidLeave", "unpaidLeave", "holidays", "leaveTodays", "leavePendingRequests","leaveEarlyRequests", "checkins", "checkouts", "attendances"));
    }

    public function AdminLogin(){

        return view('admin.admin_login');

    }

    public function AdminLogoutPage(){
        return view('admin.admin_logout');
    }// End Method
}
