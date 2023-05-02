<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Holiday;
use App\Models\LeaveType;
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

        return view('admin.index', compact("employees", "paidLeave", "unpaidLeave", "holidays"));
    }

    public function AdminLogin(){

        return view('admin.admin_login');

    }

    public function AdminLogoutPage(){
        return view('admin.admin_logout');
    }// End Method
}
