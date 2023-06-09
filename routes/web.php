<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShiftTimeController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('admin.dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';


Route::middleware(['auth','role:admin'])->group(function() {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin', [AdminController::class, 'AdminDashboard'])->name('all.category');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    // Permission all Route && Roles all Route
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission','AllPermission')->name('all.permission');
        Route::get('/add/permission','AddPermission')->name('add.permission');
        Route::post('/store/permission','StorePermission')->name('permission.store');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission');
        Route::post('/update/permission','UpdatePermission')->name('permission.update');
        Route::get('/delete/permission/{id}','DeletePermission')->name('delete.permission');

        Route::get('/all/roles','AllRoles')->name('all.roles');
        Route::get('/add/roles','AddRoles')->name('add.roles');
        Route::post('/store/roles','StoreRoles')->name('roles.store');
        Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles');
        Route::post('/update/roles','UpdateRoles')->name('roles.update');
        Route::get('/delete/roles/{id}','DeleteRoles')->name('delete.roles');
        Route::get('/add/roles/permission','AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store','RolePermisssionStore')->name('role.permission.store');
        Route::get('/all/roles/permission','AllRolesPermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}','AdminEditRoles')->name('admin.edit.roles');
        Route::get('/admin/delete/roles/{id}','AdminDeleteRoles')->name('admin.delete.roles');
        Route::post('/role/permission/update/{id}','RolePermissionUpdate')->name('role.permission.update');

    });

    // company profile
    Route::controller(CompanyController::class)->group(function(){
        Route::get('/company','index')->name('company');
        Route::post('/update/company/{id}','update')->name('update.company');
    });

     // branch
     Route::controller(BranchController::class)->group(function(){
        Route::get('/all/branch','index')->name('all.branch');
        Route::get('/add/branch','create')->name('add.branch');
        Route::post('/store/branch','store')->name('branch.store');
        Route::get('/edit/branch/{id}','edit')->name('edit.branch');
        Route::post('/update/branch/{id}','update')->name('branch.update');
        Route::get('/delete/branch/{id}','destroy')->name('delete.branch');
    });

     // department
     Route::controller(DepartmentController::class)->group(function(){
        Route::get('/all/department','index')->name('all.department');
        Route::get('/add/department','create')->name('add.department');
        Route::post('/store/department','store')->name('department.store');
        Route::get('/edit/department/{id}','edit')->name('edit.department');
        Route::post('/update/department/{id}','update')->name('department.update');
        Route::get('/delete/department/{id}','destroy')->name('delete.department');

        Route::get('/department/ajax/{brand_id}', 'getDepartmentByBrand');
    });

     // position
     Route::controller(PositionController::class)->group(function(){
        Route::get('/all/position','index')->name('all.position');
        Route::get('/add/position','create')->name('add.position');
        Route::post('/store/position','store')->name('position.store');
        Route::get('/edit/position/{id}','edit')->name('edit.position');
        Route::post('/update/position/{id}','update')->name('position.update');
        Route::get('/delete/position/{id}','destroy')->name('delete.position');

        Route::get('/position/ajax/{department_id}', 'getPositionByDepartment');
     });

      // employee
      Route::controller(EmployeeController::class)->group(function(){
        Route::get('/all/employee','index')->name('all.employee');
        Route::get('/add/employee','create')->name('add.employee');
        Route::post('/store/employee','store')->name('employee.store');
        Route::get('/edit/employee/{id}','edit')->name('edit.employee');
        Route::post('/update/employee/{id}','update')->name('employee.update');
        Route::get('/delete/employee/{id}','destroy')->name('delete.employee');
     });

     // Shift Time
     Route::controller(ShiftTimeController::class)->group(function(){
        Route::get('/all/shifttime','index')->name('all.shifttime');
        Route::get('/add/shifttime','create')->name('add.shifttime');
        Route::post('/store/shifttime','store')->name('shifttime.store');
        Route::get('/edit/shifttime/{id}','edit')->name('edit.shifttime');
        Route::post('/update/shifttime/{id}','update')->name('shifttime.update');
        Route::get('/delete/shifttime/{id}','destroy')->name('delete.shifttime');
     });

     // Meeting
      Route::controller(MeetingController::class)->group(function(){
        Route::get('/all/meeting','index')->name('all.meeting');
        Route::get('/add/meeting','create')->name('add.meeting');
        Route::post('/store/meeting','store')->name('meeting.store');
        Route::get('/edit/meeting/{id}','edit')->name('edit.meeting');
        Route::post('/update/meeting/{id}','update')->name('meeting.update');
        Route::get('/delete/meeting/{id}','destroy')->name('delete.meeting');
      });

      // Notice
      Route::controller(NoticeController::class)->group(function(){
        Route::get('/all/notice','index')->name('all.notice');
        Route::get('/add/notice','create')->name('add.notice');
        Route::post('/store/notice','store')->name('notice.store');
        Route::get('/edit/notice/{id}','edit')->name('edit.notice');
        Route::post('/update/notice/{id}','update')->name('notice.update');
        Route::get('/delete/notice/{id}','destroy')->name('delete.notice');
      });

       // Leave type
       Route::controller(LeaveTypeController::class)->group(function(){
        Route::get('/all/leave_type','index')->name('all.leave_type');
        Route::get('/add/leave_type','create')->name('add.leave_type');
        Route::post('/store/leave_type','store')->name('leave_type.store');
        Route::get('/edit/leave_type/{id}','edit')->name('edit.leave_type');
        Route::post('/update/leave_type/{id}','update')->name('leave_type.update');
        Route::get('/delete/leave_type/{id}','destroy')->name('delete.leave_type');
       });

       // Holiday
       Route::controller(HolidayController::class)->group(function(){
        Route::get('/all/holiday','index')->name('all.holiday');
        Route::get('/add/holiday','create')->name('add.holiday');
        Route::post('/store/holiday','store')->name('holiday.store');
        Route::get('/edit/holiday/{id}','edit')->name('edit.holiday');
        Route::post('/update/holiday/{id}','update')->name('holiday.update');
        Route::get('/delete/holiday/{id}','destroy')->name('delete.holiday');
      });

      // Content
      Route::controller(ContentController::class)->group(function(){
        Route::get('/all/content','index')->name('all.content');
        Route::get('/add/content','create')->name('add.content');
        Route::post('/store/content','store')->name('content.store');
        Route::get('/edit/content/{id}','edit')->name('edit.content');
        Route::post('/update/content/{id}','update')->name('content.update');
        Route::get('/delete/content/{id}','destroy')->name('delete.content');
      });

    // Notification
    Route::controller(NotificationController::class)->group(function(){
        Route::get('/all/notify','index')->name('all.notify');
        Route::get('/add/notify','create')->name('add.notify');
        Route::post('/store/notify','store')->name('notify.store');
        Route::get('/edit/notify/{id}','edit')->name('edit.notify');
        Route::post('/update/notify/{id}','update')->name('notify.update');
        Route::get('/delete/notify/{id}','destroy')->name('delete.notify');
    });
    // Notification
    Route::controller(AttendanceController::class)->group(function(){
        Route::get('/all/attendance','index')->name('all.attendance');
        Route::get('/show/attendance/{id}/{date}','show')->name('show.attendance');
        Route::post('/store/attendance','store')->name('attendance.store');
        Route::get('/attendance/ajax', 'getAttendanceByMonth');
    });

     // Leave
     Route::controller(LeaveController::class)->group(function(){
        Route::get('/all/leave','index')->name('all.leave');
        Route::get('/add/leave','create')->name('add.leave');
        Route::post('/store/leave','store')->name('leave.store');
        Route::get('/edit/leave/{id}','edit')->name('edit.leave');
        Route::post('/update/leave/{id}','update')->name('leave.update');
        Route::get('/delete/leave/{id}','destroy')->name('delete.leave');
      });

          // App setting
    Route::controller(AppSettingController::class)->group(function(){
        Route::get('/app_setting','index')->name('app_setting');
        Route::post('/update/app_setting/{id}','update')->name('update.app_setting');
    });
});


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class)->name('admin.login');
Route::get('/admin/logout/page', [AdminController::class, 'AdminLogoutPage'])->name('admin.logout.page');
