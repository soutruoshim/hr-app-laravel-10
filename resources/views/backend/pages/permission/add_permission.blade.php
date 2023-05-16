@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">

                                            <li class="breadcrumb-item active">Add Permission</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Permission</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

    <form id="myForm" method="post" action="{{ route('permission.store') }}">
    	@csrf


         <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Permission Name </label>
                <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Add Permission">
            </div>

        </div>



        <div class="row">
            <div class="form-group col-md-6 mb-3">
                <label for="inputEmail4" class="form-label">Group Name </label>
                <select name="group_name" class="form-select" id="example-select">
                    <option> Select One Category </option>
                    <option value="company-setup">Company Setup</option>
                    <option value="shift-management">Shift-Management  </option>
                    <option value="employee-management">Employee Management</option>
                    <option value="leave-management">Leave Management </option>
                    <option value="attendance-management">Attendance</option>
                    <option value="team-meeting-management">Team Meeting</option>
                    <option value="holiday-management">Holiday</option>
                    <option value="notice-management">Notice </option>
                    <option value="content-management">Content</option>
                    <option value="role-management">Role and Permission</option>
                    <option value="notification-management">Notification</option>
                    <option value="appsetting-setup">App Setting Setup</option>
                </select>
            </div>

        </div>
   <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>

                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->



@endsection
